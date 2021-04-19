<?php

namespace WordlistConsumer\Maker;

use WordlistConsumer\Interfaces\ConsumerMakerInterface;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\ConsumerFacade;

class PersonMaker implements ConsumerMakerInterface
{
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
     * @return PersonMaker
     */
    public function reset(ConsumerOptions $options = null): PersonMaker
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
     * @return object
     */
    public function make(ConsumerOptions $options = null): PersonMaker
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
        $this->person->age = rand($ageOptions->min ?? 18, $ageOptions->max ?? 80);
    }

    /**
     * @return void
     */
    private function makeBirth(): void
    {
        $this->person->birth = new \stdClass;
        $this->person->birth->day = rand(1, 27);
        $this->person->birth->month = rand(1, 12);
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
