<?php

namespace TwentySeven\Password;

use TwentySeven\Password\WordListInterface as WList;

/**
 * Password generator.
 */
class Generator
{
    /**
     * @var WList[] Array of used word lists.
     */
    protected $lists;

    /**
     * Construct password generator.
     *
     * @param WList[]|WList $lists Array of word lists or word list.
     */
    public function __construct($lists = null)
    {
        if (!isset($lists)) {
            $lists = new WordList\En();
        }
        if (!is_array($lists)) {
            $lists = [ $lists ];
        }
        $this->lists = $lists;
    }

    /**
     * Generate password from word lists.
     *
     * @param int    $lenght    Password length in words.
     * @param string $separator Word separator.
     *
     * @return string Generated password.
     */
    public function generate($lenght = 4, $separator = ' ')
    {
        $length = count($this->lists);

        $words = [];
        $randomArray = static::getRandomArray($lenght);
        foreach ($randomArray as $index => $random) {
            $list = $this->lists[$index % $length];
            $words[] = $list->get($random);
        }

        return implode($separator, $words);
    }

    /**
     * Static function generates Russian phrase password.
     *
     * @param int    $lenght    Password length in words.
     * @param string $separator Word separator.
     *
     * @return string Generated password.
     */
    public static function generateRu($lenght = 4, $separator = ' ')
    {
        $list = new WordList\Ru();
        return (new static($list))->generate($lenght, $separator);
    }

    /**
     * Static function generates English phrase password.
     *
     * @param int    $lenght    Password length in words.
     * @param string $separator Word separator.
     *
     * @return string Generated password.
     */
    public static function generateEn($lenght = 4, $separator = ' ')
    {
        $list = new WordList\En();
        return (new static($list))->generate($lenght, $separator);
    }

    /**
     * Static function generates German phrase password.
     *
     * @param int    $lenght    Password length in words.
     * @param string $separator Word separator.
     *
     * @return string Generated password.
     */
    public static function generateDe($lenght = 4, $separator = ' ')
    {
        $list = new WordList\De();
        return (new static($list))->generate($lenght, $separator);
    }

    /**
     * Static function generates transliterated Russian phrase password
     *
     * @param int    $lenght    Password length in words.
     * @param string $separator Word separator.
     *
     * @return string Generated password.
     */
    public static function generateRuTranslit($lenght = 4, $separator = ' ')
    {
        $list = new WordList\RuTranslit();
        return (new static($list))->generate($lenght, $separator);
    }

    /**
     * Get array of random numbers between 0.0 - 1.0.
     *
     * @param int $length Array length.
     *
     * @return float[] Array of random values 0.0 - 1.0.
     */
    protected static function getRandomArray($length)
    {
        $bytes = random_bytes($length * 2);
        $result = [];
        foreach (unpack('S*', $bytes) as $long) {
            $result[] = $long / 0xFFFF;
        }
        return $result;
    }
}
