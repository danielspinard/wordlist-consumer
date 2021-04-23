<?php

namespace WordlistConsumer\Maker;

use WordlistConsumer\Interfaces\ConsumerMakerInterface;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\ConsumerFacade;

class PersonMaker implements ConsumerMakerInterface
{
    /**
     * @const int
     */
    const MIN_AGE = 18;

    /**
     * @const int
     */
    const MAX_AGE = 65;

    /**
     * @const int
     */
    const MIN_DAYS = 1;

    /**
     * @const int
     */
    const MAX_DAYS = 27;

    /**
     * @const int
     */
    const MIN_MONTH = 1;

    /**
     * @const int
     */
    const MAX_MONTH = 12;

    /**
     * @var object
     */
    private $person;

    /**
     * @var ConsumerOptions
     */
    private $options;

    /**
     * @param ConsumerOptions $options
     * @return ConsumerMakerInterface
     */
    public function reset(ConsumerOptions $options = null): ConsumerMakerInterface
    {
        $this->person = new \stdClass();
        $this->options = $options;
        return $this;
    }

    /**
     * @return object
     */
    public function result(): object
    {
        return $this->person;
    }

    /**
     * @param ConsumerOptions $consumerOptions
     * @return ConsumerMakerInterface
     */
    public function make(ConsumerOptions $options = null): ConsumerMakerInterface
    {
        $this->reset($options);
        
        foreach (get_class_methods($this) as $method) {
            if ($method === __FUNCTION__ || strpos($method, 'make') === false) {
                continue;
            }

            $this->$method();
        }

        return $this;
    }

    /**
     * @param string $name
     * @return object
     */
    private function option(string $name): object
    {
        return (object) $this->options::getOption($name);
    }

    /**
     * @return void
     */
    private function makeName(): void
    {
        $wordlist = $this->option('name')->wordlist;
        $this->person->name = ConsumerFacade::load($wordlist)::string();
    }

    /**
     * @return void
     */
    private function makeSurname(): void
    {
        $wordlist = $this->option('surname')->wordlist;
        $this->person->surname = ConsumerFacade::load($wordlist)::string();
    }

    /**
     * @return void
     */
    private function makeEmail(): void
    {
        $wordlist = $this->option('email')->wordlist;
        $email = [
            'name' => $this->person->name,
            'surname' => substr($this->person->surname, 0, 4) . rand(999, 9999),
            'domain' => '@' . ConsumerFacade::load($wordlist)::string()
        ];
        
        $this->person->email = strtolower($email['name'] . $email['surname'] . $email['domain']);
    }

    /**
     * @return void
     */
    private function makeAge(): void
    {
        $ageOptions = $this->option('age');
        $this->person->age = rand(
            $ageOptions->min ?? PersonMaker::MIN_AGE,
            $ageOptions->max ?? PersonMaker::MAX_AGE
        );
    }

    /**
     * @return void
     */
    private function makeBirth(): void
    {
        $this->person->birth = new \stdClass;
        $this->person->birth->day = rand(PersonMaker::MIN_DAYS, PersonMaker::MAX_DAYS);
        $this->person->birth->month = rand(PersonMaker::MIN_MONTH, PersonMaker::MAX_MONTH);
        $this->person->birth->year = (new \DateTime())->format('Y') - $this->person->age;
    }

    /**
     * @return void
     */
    private function makeAddress(): void
    {
        $this->person->address = null;
    }
}
