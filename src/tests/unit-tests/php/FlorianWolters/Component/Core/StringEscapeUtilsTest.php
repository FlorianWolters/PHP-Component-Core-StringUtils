<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@see StringEscapeUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.3.0
 *
 * @covers    FlorianWolters\Component\Core\StringEscapeUtils
 */
class StringEscapeUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @group specification
     * @testdox The definition of the class StringEscapeUtils is correct.
     */
    public function testClassDefinition()
    {
        $reflectedClass = new \ReflectionClass(
            __NAMESPACE__ . '\StringEscapeUtils'
        );
        $this->assertTrue($reflectedClass->inNamespace());
        $this->assertFalse($reflectedClass->isAbstract());
        $this->assertTrue($reflectedClass->isFinal());
        $this->assertFalse($reflectedClass->isInstantiable());
        $this->assertFalse($reflectedClass->isInterface());
        $this->assertFalse($reflectedClass->isInternal());
        $this->assertFalse($reflectedClass->isIterateable());
        $this->assertTrue($reflectedClass->isUserDefined());

    }

    /**
     * @return void
     *
     * @group specification
     * @testdox The definition of the constructor StringEscapeUtils::__construct is correct.
     * @test
     */
    public function testConstructorDefinition()
    {
        $reflectedConstructor = new \ReflectionMethod(
            __NAMESPACE__ . '\StringEscapeUtils',
            '__construct'
        );
        $this->assertFalse($reflectedConstructor->isAbstract());
        $this->assertTrue($reflectedConstructor->isConstructor());
        $this->assertFalse($reflectedConstructor->isFinal());
        $this->assertTrue($reflectedConstructor->isProtected());
    }

    /**
     * @return mixed[][]
     */
    public static function providerEscapeHtml()
    {
        return [
            ['plain text', 'plain text', 'no escaping'],
            ['', '', 'empty string'],
            [null, null, 'null'],
            ['bread &amp; butter', 'bread & butter', 'ampersand'],
            ['&quot;bread&quot; &amp; butter', '"bread" & butter', 'quotes'],
            ['greater than &gt;', 'greater than >', 'final character only'],
            ['&lt; less than', '< less than', 'first character only'],
            ["Huntington's chorea", "Huntington's chorea", 'apostrophe']
        ];
    }

    /**
     * @return void
     *
     * @coversDefaultClass escapeHtml
     * @dataProvider providerEscapeHtml
     * @test
     */
    public function testEscapeHtml($expected, $str, $assertMessage)
    {
        $actual = StringEscapeUtils::escapeHtml($str);

        $this->assertEquals($expected, $actual, $assertMessage);
    }

    /**
     * @return void
     *
     * @coversDefaultClass unescapeHtml
     * @dataProvider providerEscapeHtml
     * @test
     */
    public function testUnescapeHtml($str, $expected, $assertMessage)
    {
        $actual = StringEscapeUtils::unescapeHtml($str);

        $this->assertEquals($expected, $actual, $assertMessage);
    }

    /**
     * @return mixed[][]
     */
    public static function providerEscapeRegEx()
    {
        return [
            ['', ''],
            [null, null],
            ['don\/t stop', 'don/t stop'],
            ['don\+t stop', 'don+t stop']
        ];
    }

    /**
     * @return void
     *
     * @coversDefaultClass escapeRegEx
     * @dataProvider providerEscapeRegEx
     * @test
     */
    public function testEscapeRegEx($expected, $str)
    {
        $actual = StringEscapeUtils::escapeRegEx($str);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return mixed[][]
     */
    public static function providerEscapeSql()
    {
        return [
            ['', ''],
            [null, null],
            ["don''t stop", "don't stop"]
        ];
    }

    /**
     * @return void
     *
     * @coversDefaultClass escapeSql
     * @dataProvider providerEscapeSql
     * @test
     */
    public function testEscapeSql($expected, $str)
    {
        $actual = StringEscapeUtils::escapeSql($str);

        $this->assertEquals($expected, $actual);
    }
}
