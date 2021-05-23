<?php

namespace WordlistConsumer\Maker;

use stdClass;
use DateTime;
use WordlistConsumer\MakerBase;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\WordlistNotFoundException;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;

class PersonMaker extends MakerBase
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
     * PersonMaker constructor.
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        parent::__construct($options);
    }

    /**
     * @return ConsumerMakerInterface
     */
    public function make(): ConsumerMakerInterface
    {
        foreach (get_class_methods($this) as $method) {
            if ($method === __FUNCTION__ || strpos($method, 'make') === false) {
                continue;
            }

            $this->$method();
        }

        return $this;
    }

    /**
     * @return void
     * @throws OptionNotFoundException|WordlistNotFoundException
     */
    private function makeName(): void
    {
        $this->maker->name = $this->string('name');
    }

    /**
     * @return void
     * @throws OptionNotFoundException
     * @throws WordlistNotFoundException
     */
    private function makeSurname(): void
    {
        $this->maker->surname = $this->string('surname');
    }

    /**
     * @throws OptionNotFoundException
     * @throws WordlistNotFoundException
     */
    private function makeEmail(): void
    {
        $base = [
            'name' => $this->maker->name,
            'surname' => substr($this->maker->surname, 0, 4) . rand(999, 9999),
            'domain' => '@' . $this->string('email')
        ];

        $this->maker->email = strtolower($base['name'] . $base['surname'] . $base['domain']);
    }

    /**
     * @return void
     * @throws OptionNotFoundException
     */
    private function makeAge(): void
    {
        $ageOptions = $this->option('age');
        $this->maker->age = rand(
            $ageOptions->min ?? PersonMaker::MIN_AGE,
            $ageOptions->max ?? PersonMaker::MAX_AGE
        );
    }

    /**
     * @return void
     */
    private function makeBirth(): void
    {
        $birth = new stdClass;
        $birth->day = rand(PersonMaker::MIN_DAYS, PersonMaker::MAX_DAYS);
        $birth->month = rand(PersonMaker::MIN_MONTH, PersonMaker::MAX_MONTH);
        $birth->year = (new DateTime())->format('Y') - $this->maker->age;

        $this->maker->birth = $birth;
    }

    /**
     * @return void
     */
    private function makeAddress(): void
    {
        $this->maker->address = new stdClass();
    }
}
