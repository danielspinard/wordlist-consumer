<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug as DisplayErrors;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Consumers\AddressConsumer;

/**
 * Symfony component (only require-dev)
 */
DisplayErrors::enable();

/**
 * WordlistConsumerOptions component
 */
$options = ConsumerOptions::create();

/**
 * Address consumer options [wordlist/blacklist-country's]
 */
ConsumerOptions::addOption('address', [
    'wordlist' => __DIR__ . '/wordlist/address.txt',
    'blacklist' => [
        'Brazil', 'Argentina'
    ]
]);

/**
 * Make person with options
 */
$address = new AddressConsumer($options);

dd($address);
