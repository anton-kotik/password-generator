<?php

namespace TwentySevenTest\Password;

use PHPUnit_Framework_TestCase as TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

use TwentySeven\Password\Generator;
use TwentySeven\Password\WordListInterface;

use TwentySevenTest\Password\WordList\TestWordList;

class GeneratorTest extends TestCase
{
    public function testWordListCalled()
    {
        $list1 = $this->createWordListMock();
        $list1->expects($this->exactly(5))->method('get');

        $generator = new Generator($list1);
        $generator->generate(5);

        $list2 = $this->createWordListMock();
        $list2->expects($this->exactly(2))->method('get');

        $list3 = $this->createWordListMock();
        $list3->expects($this->exactly(1))->method('get');

        $generator = new Generator([$list2, $list3]);
        $generator->generate(3);
    }

    public function testSeparator()
    {
        $list = new TestWordList();

        $generator = new Generator($list);
        $password = $generator->generate(4, '-');

        $this->assertEquals('test-test-test-test', $password);
    }

    public function testGenerateRu()
    {
        $password = Generator::generateRu(4, ' ');
        $this->assertNotEmpty($password);
    }

    public function testGenerateEn()
    {
        $password = Generator::generateEn(4, ' ');
        $this->assertNotEmpty($password);
    }

    public function testGenerateDe()
    {
        $password = Generator::generateDe(4, ' ');
        $this->assertNotEmpty($password);
    }

    public function testGenerateRuTranslit()
    {
        $password = Generator::generateRuTranslit(4, ' ');
        $this->assertNotEmpty($password);
    }

    /**
     * @return WordListInterface|MockObject
     */
    protected function createWordListMock()
    {
        return $this->getMockForAbstractClass(WordListInterface::class);
    }
}
