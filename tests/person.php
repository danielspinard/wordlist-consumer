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
 * WordlistConsumer options component
 */
$options = ConsumerOptions::create();
ConsumerOptions::addOption('age', ['min' => 18, 'max' => 65]);
ConsumerOptions::addOption('name', ['wordlist' => __DIR__ . '/wordlist/names.txt']);
ConsumerOptions::addOption('surname', ['wordlist' => __DIR__ . '/wordlist/surnames.txt']);

/**
 * Make person with options
 */
$person = new Person($options);
dump('full name: ' . $person->name . ' ' . $person->surname);
