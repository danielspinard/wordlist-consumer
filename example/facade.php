<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug as DisplayErrors;
use WordlistConsumer\ConsumerFacade;

/**
 * Symfony component (only require-dev)
 */
DisplayErrors::enable();

/**
 * Consumer component, take a string randomly from any wordlist
 */
ConsumerFacade::load(__DIR__ . '/wordlist/names.txt');

/**
 * Get a random string from the loaded wordlist
 */
dump('name: ' . ConsumerFacade::string());
dump('other name: ' . ConsumerFacade::string());

/**
 * Loading another wordlist
 */
ConsumerFacade::load(__DIR__ . '/wordlist/surnames.txt');

/**
 * Geturn several random strings with limiter (size) and delimiter
 */
$size = 2;
$delimiter = ' - ';
dump('two random surnames: ' . ConsumerFacade::strings($size, $delimiter));
