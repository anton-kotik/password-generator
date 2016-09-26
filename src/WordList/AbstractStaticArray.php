<?php

namespace TwentySeven\Password\WordList;

use TwentySeven\Password\WordListInterface;

/**
 * Word list stored in static array.
 */
abstract class AbstractStaticArray implements WordListInterface
{
    /**
     * @var array Array of words.
     */
    protected static $words = [ 'correct', 'horse', 'battery', 'staple' ];

    /**
     * {@inheritdoc}
     */
    public function get($random)
    {
        $length = count(static::$words);
        $position = (int) ($random * ($length - 1));
        return static::$words[$position];
    }
}
