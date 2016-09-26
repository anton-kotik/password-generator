<?php

namespace TwentySevenTest\Password\WordList;

use TwentySeven\Password\WordListInterface;

class TestWordList implements WordListInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($random)
    {
        return 'test';
    }
}
