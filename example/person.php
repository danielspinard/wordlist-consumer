<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug as DisplayErrors;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Consumers\PersonConsumer;

/**
 * Symfony component (only require-dev)
 */
DisplayErrors::enable();

/**
 * WordlistConsumerOptions component
 */
$options = ConsumerOptions::create();

/**
 * wordlist: your wordlist names path (string)
 */
ConsumerOptions::addOption('name', ['wordlist' => __DIR__ . '/wordlist/names.txt']);

/**
 * between {min} and {max} years
 * min: minimum age (int)
 * max: maximum age (int)
 */
ConsumerOptions::addOption('age', [
    'min' => 18,
    'max' => 65
]);

/**
 * wordlist: your wordlist surnames path (string)
 */
ConsumerOptions::addOption('surname', ['wordlist' => __DIR__ . '/wordlist/surnames.txt']);

/**
 * wordlist: your wordlist email domains (string)
 */
ConsumerOptions::addOption('email', ['wordlist' => __DIR__ . '/wordlist/domains.txt']);

/**
 * wordlist: your wordlist address
 */
ConsumerOptions::addOption('address', [
    'wordlist' => __DIR__ . '/wordlist/address.txt'
]);

/**
 * Make person with options
 */
$person = new PersonConsumer($options);

dump($person);

dump('My name is ' . $person->name);
dump('I have ' . $person->age . ' years');
dump('I was born on the ' . $person->birth->day .  'th of the ' . $person->birth->month . 'th month');
dump('Send me an e-mail at ' . $person->email);
