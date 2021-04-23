# Wordlist Consumer

[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=bugs)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=security_rating)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=danielspinard_wordlist-consumer&metric=alert_status)](https://sonarcloud.io/dashboard?id=danielspinard_wordlist-consumer)
[![CodeFactor](https://www.codefactor.io/repository/github/danielspinard/wordlist-consumer/badge)](https://www.codefactor.io/repository/github/danielspinard/wordlist-consumer)

## What is Wordlist-Consumer?
The word list consumer is an intelligent consumer, able to consume word lists and return an almost real object (Person, Address, Company)!

### Installing
This library can be installed by the composer, the command to install is the one below:
```
composer require danielspinard/wordlist-consumer
```
Open library [Packagist](https://packagist.org/packages/danielspinard/wordlist-consumer)

### Consumers
Person - ✔️ <br>
Address - ❌ <br>
Company - ❌

### Tests output
```
php tests/facade.php 

^ "name: Yvan"
^ "other name: Edwards"
^ "two random surnames: Jackson - Wood"
```
```
php tests/person.php 

^ WordlistConsumer\Consumers\Person^ {
  -name: "Maarten"
  -surname: "Giles"
  -email: "maartengile6125@outlook.com"
  -age: 36
  -birth: {
    +"day": 10
    +"month": 12
    +"year": 1985
  }
  -address: null
}

^ "My name is Maarten"
^ "I have 36 years"
^ "I was born on the 10th of the 12th month"
^ "Send me an e-mail at maartengile6125@outlook.com"

```
