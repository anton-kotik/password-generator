<?php

namespace TwentySeven\Password;

/**
 * Interface for words list.
 */
interface WordListInterface
{
    /**
     * Get word form word list.
     *
     * @param float $random random position of word in list (float from 0.0 to 1.0)
     *
     * @return string word
     */
    public function get($random);
}
