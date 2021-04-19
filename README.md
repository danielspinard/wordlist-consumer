# Wordlist Consumer

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
```
