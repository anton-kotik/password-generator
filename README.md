
# XKCD Phrase Password Generator

A flexible and scriptable password generator which generates strong 
passphrases, inspired by [XKCD Comic 936](http://xkcd.com/936/).
Generated passwords easy to remember, but hard to quess passwords.

[![XKCD Password Strength](http://imgs.xkcd.com/comics/password_strength.png)](http://xkcd.com/936/)

## Installing

With [Composer](https://getcomposer.org):

```bash
$ composer require 27cm/password-generator
```

## Basic usage

Library generates phrases from frequently used words: 

* English phrases (example "throat fast only idea")
* German phrases (examle "laut welt ganze liter")
* Russian phrases (example "тоже металл пора подача")
* Russian transliterated phrases (example "kater nekiy zabrat dazhe")

Generate password with default length (4 words) and default separator (space).

```php
use TwentySeven\Password\Generator;
use TwentySeven\Password\WordList;

echo Generator::generateEn();
// => "throat fast only idea"

echo Generator::generateDe();
// => "laut welt ganze liter"

echo Generator::generateRu();
// => "тоже металл пора подача"

echo Generator::generateRuTranslit();
// => "kater nekiy zabrat dazhe"

echo TwentySeven\Password\Generator::generateEn(5, '-');
// => "ritual-error-raise-arab-tail"

$lists = [ new WordList\En(), new WordList\RuTranslit() ];
echo Generator::generate($lists, 5, '-');
// => "idea-dovod-critic-sever-happy"
```

## Word lists

### English

List of 2048 most frequently used English words.

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|-----------
**WordList\En**              | all words  | 4-6          | have, that
**WordList\En\Nouns**        | nouns      | 4-6          | time, year
**WordList\En\Verbs**        | verbs      | 4-6          | have, would
**WordList\En\Adjectives**   | adjectives | 4-8          | other, good

### German

List of 2048 most frequently used german words ([source](ttp://wortschatz.uni-leipzig.de/html/wliste.html)).
Words with diacritic letters (ä, ö, ü) and eszett (ß) excluded.

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|-----------
**WordList\De**              | all words  | 4-6          | sich, nicht

### Russian

Lists consist of 2048 most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)).

Class                        | Comment    | Word lenghth | Example 
---------------------------- | -----------|--------------|---------------
**WordList\Ru**              | all words  | 4-6          | быть, этот
**WordList\Ru\Nouns**        | nouns      | 4-8          | человек, время
**WordList\Ru\Verbs**        | verbs      | 4-8          | быть, мочь
**WordList\Ru\Adjectives**   | adjectives | 4-8          | новый, большой

### Russian Transliterated 

List of 2048 transliterated most frequently used Russain words ([source](http://dict.ruslang.ru/freq.php)). 
"Hard" to transliterate letters (ь, ъ) excluded. 

Class                                | Comment    | Word lenghth | Example 
------------------------------------ | -----------|--------------|---------------
**WordList\RuTranslit**              | all words  | 4-6          | chto, etot
**WordList\RuTranslit\Nouns**        | nouns      | 4-8          | chelovek, vremya
**WordList\RuTranslit\Verbs**        | verbs      | 4-8          | moch, skazat
**WordList\RuTranslit\Adjectives**   | adjectives | 4-8          | novyy, bolshoy

## Security

Library uses [CSPRNG](https://secure.php.net/manual/en/book.csprng.php) for random number generation.
