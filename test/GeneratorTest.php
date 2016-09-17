<?php

namespace TwentySevenTest\Password;

use PHPUnit_Framework_TestCase as TestCase;

use TwentySeven\Password\Generator;

class GeneratorTest extends TestCase
{
    public function testWordListCalled()
    {
        $list = $this->getMockForAbstractClass('TwentySeven\Password\WordListInterface');
        $list->expects($this->exactly(5))->method('get');

        $generator = new Generator($list);
        $generator->generate(5);
    }

    public function testWordListArrayCalled()
    {
        $list1 = $this->getMockForAbstractClass('TwentySeven\Password\WordListInterface');
        $list1->expects($this->exactly(2))->method('get');

        $list2 = $this->getMockForAbstractClass('TwentySeven\Password\WordListInterface');
        $list2->expects($this->exactly(1))->method('get');

        $generator = new Generator([$list1, $list2]);
        $generator->generate(3);
    }

    public function testSeparator()
    {
        $list = $this->getMockForAbstractClass('TwentySeven\Password\WordListInterface');
        $list->expects($this->any())->method('get')->will($this->returnValue('test'));

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
}
