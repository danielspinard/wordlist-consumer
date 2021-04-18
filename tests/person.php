<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug as DisplayErrors;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Consumers\Person;

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
 * Make person with options
 */
$person = new Person($options);
dd($person);
