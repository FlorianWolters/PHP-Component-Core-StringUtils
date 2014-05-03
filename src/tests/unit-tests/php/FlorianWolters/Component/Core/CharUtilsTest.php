<?php
/**
 * FlorianWolters\Component\Core\StringUtils
 *
 * PHP Version 5.3
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2014 Florian Wolters (http://blog.florianwolters.de)
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 */

namespace FlorianWolters\Component\Core;

/**
 * Test class for {@see CharUtils}.
 *
 * @since  Class available since Release 0.2.0
 * @covers FlorianWolters\Component\Core\CharUtils
 */
class CharUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @group specification
     * @testdox The definition of the class RandomStringUtils is correct.
     * @test
     */
    public function testClassDefinition()
    {
        $reflectedClass = new \ReflectionClass(
            __NAMESPACE__ . '\RandomStringUtils'
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
     * @testdox The definition of the constructor StringUtils::__construct is correct.
     * @test
     */
    public function testConstructorDefinition()
    {
        $reflectedConstructor = new \ReflectionMethod(
            __NAMESPACE__ . '\RandomStringUtils',
            '__construct'
        );
        $this->assertFalse($reflectedConstructor->isAbstract());
        $this->assertTrue($reflectedConstructor->isConstructor());
        $this->assertFalse($reflectedConstructor->isFinal());
        $this->assertTrue($reflectedConstructor->isProtected());
    }

    /**
     * @coversDefaultClass charAsciiArray
     * @test
     */
    public function testCharAsciiArray()
    {
        $actual = CharUtils::charAsciiArray();

        $this->assertCount(128, $actual);
    }

    /**
     * @coversDefaultClass charAsciiAlphaArray
     * @test
     */
    public function testCharAsciiAlphaArray()
    {
        $actual = CharUtils::charAsciiAlphaArray();

        $this->assertCount(52, $actual);
    }

    /**
     * @coversDefaultClass charAsciiAlphaLowerArray
     * @test
     */
    public function testCharAsciiAlphaLowerArray()
    {
        $actual = CharUtils::charAsciiAlphaLowerArray();

        $this->assertCount(26, $actual);
    }

    /**
     * @coversDefaultClass charAsciiAlphaUpperArray
     * @test
     */
    public function testCharAsciiAlphaUpperArray()
    {
        $actual = CharUtils::charAsciiAlphaUpperArray();

        $this->assertCount(26, $actual);
    }

    /**
     * @coversDefaultClass charAsciiAlphanumericArray
     * @test
     */
    public function testCharAsciiAlphanumericArray()
    {
        $actual = CharUtils::charAsciiAlphanumericArray();

        $this->assertCount(62, $actual);
    }

    /**
     * @coversDefaultClass charAsciiControlArray
     * @test
     */
    public function testCharAsciiControlArray()
    {
        $actual = CharUtils::charAsciiControlArray();

        $this->assertCount(33, $actual);
    }

    /**
     * @coversDefaultClass charAsciiNumericArray
     * @test
     */
    public function testCharAsciiNumericArray()
    {
        $actual = CharUtils::charAsciiNumericArray();

        $this->assertCount(10, $actual);
    }

    /**
     * @coversDefaultClass charAsciiPrintableArray
     * @test
     */
    public function testCharAsciiPrintableArray()
    {
        $actual = CharUtils::charAsciiPrintableArray();

        $this->assertCount(95, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAscii()
    {
        $result = array();

        foreach (CharUtils::charAsciiArray() as $char) {
            $result[] = array(true, $char);
        }

        $result[] = array(false, null);
        $result[] = array(false, false);
        $result[] = array(false, '');
        $result[] = array(false, .1);
        $result[] = array(false, new \stdClass);
        $result[] = array(false, '€');
        $result[] = array(false, ' 	');
        $result[] = array(false, 'þ');
        $result[] = array(false, 'ÿ');

        return $result;
    }

    /**
     * @coversDefaultClass isAscii
     * @dataProvider providerTestIsAscii
     * @test
     */
    public function testIsAscii($expected, $char)
    {
        $actual = CharUtils::isAscii($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiAlpha()
    {
        $result = array();

        foreach (CharUtils::charAsciiAlphaArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiAlpha
     * @dataProvider providerTestIsAsciiAlpha
     * @test
     */
    public function testIsAsciiAlpha($expected, $char)
    {
        $actual = CharUtils::isAsciiAlpha($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiAlphaLower()
    {
        $result = array();

        foreach (CharUtils::charAsciiAlphaLowerArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }
        foreach (CharUtils::charAsciiAlphaUpperArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiAlphaLower
     * @dataProvider providerTestIsAsciiAlphaLower
     * @test
     */
    public function testIsAsciiAlphaLower($expected, $char)
    {
        $actual = CharUtils::isAsciiAlphaLower($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiAlphaUpper()
    {
        $result = array();

        foreach (CharUtils::charAsciiAlphaUpperArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }
        foreach (CharUtils::charAsciiAlphaLowerArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiAlphaUpper
     * @dataProvider providerTestIsAsciiAlphaUpper
     * @test
     */
    public function testIsAsciiAlphaUpper($expected, $char)
    {
        $actual = CharUtils::isAsciiAlphaUpper($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiAlphanumeric()
    {
        $result = array();

        foreach (CharUtils::charAsciiAlphanumericArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiAlphanumeric
     * @dataProvider providerTestIsAsciiAlphanumeric
     * @test
     */
    public function testIsAsciiAlphanumeric($expected, $char)
    {
        $actual = CharUtils::isAsciiAlphanumeric($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiControl()
    {
        $result = array();

        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiPrintableArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiControl
     * @dataProvider providerTestIsAsciiControl
     * @test
     */
    public function testIsAsciiControl($expected, $char)
    {
        $actual = CharUtils::isAsciiControl($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiNumeric()
    {
        $result = array();

        foreach (CharUtils::charAsciiNumericArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }
        foreach (CharUtils::charAsciiAlphaArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiNumeric
     * @dataProvider providerTestIsAsciiNumeric
     * @test
     */
    public function testIsAsciiNumeric($expected, $char)
    {
        $actual = CharUtils::isAsciiNumeric($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerTestIsAsciiPrintable()
    {
        $result = array();

        foreach (CharUtils::charAsciiPrintableArray() as $char) {
            $result[] = array(true, $char);
        }
        foreach (CharUtils::charAsciiControlArray() as $char) {
            $result[] = array(false, $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass isAsciiPrintable
     * @dataProvider providerTestIsAsciiPrintable
     * @test
     */
    public function testIsAsciiPrintable($expected, $char)
    {
        $actual = CharUtils::isAsciiPrintable($char);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerAscii()
    {
        $result = array();

        foreach (CharUtils::charAsciiArray() as $char) {
            $result[] = array(\ord($char), $char);
        }

        return $result;
    }

    /**
     * @coversDefaultClass fromAsciiValueToChar
     * @dataProvider providerAscii
     * @test
     */
    public function testFromAsciiValueToChar($value, $char)
    {
        $actual = CharUtils::fromAsciiValueToChar($value);

        $this->assertEquals($char, $actual);
    }

    /**
     * @return array
     */
    public static function providerFromAsciiValueToCharException()
    {
        return array(
            array(null),
            array(false),
            array(''),
            array(.1),
            array(new \stdClass),
            array(-1),
            array(128)
        );
    }

    /**
     * @coversDefaultClass fromAsciiValueToChar
     * @dataProvider providerFromAsciiValueToCharException
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The specified argument is not an ASCII value.
     * @test
     */
    public function testFromAsciiValueToCharThrowsInvalidArgumentException(
        $value
    ) {
        CharUtils::fromAsciiValueToChar($value);
    }

    /**
     * @coversDefaultClass fromAsciiCharToValue
     * @dataProvider providerAscii
     * @test
     */
    public function testFromAsciiCharToValue($value, $char)
    {
        $actual = CharUtils::fromAsciiCharToValue($char);

        $this->assertEquals($value, $actual);
    }

    /**
     * @return array
     */
    public static function providerFromAsciiCharToValueException()
    {
        return array(
            array(null),
            array(false),
            array(''),
            array(.1),
            array(new \stdClass),
            array('€'),
            array(' 	'),
            array('þ'),
            array('ÿ')
        );
    }

    /**
     * @coversDefaultClass fromAsciiCharToValue
     * @dataProvider providerFromAsciiCharToValueException
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The specified argument is not an ASCII character.
     * @test
     */
    public function testFromAsciiCharToValueThrowsInvalidArgumentException(
        $char
    ) {
        CharUtils::fromAsciiCharToValue($char);
    }
}
