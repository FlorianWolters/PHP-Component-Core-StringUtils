<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@link StringUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\StringUtils
 */
class StringUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @group specification
     * @testdox The definition of the class StringUtils is correct.
     * @test
     */
    public function testClassDefinition()
    {
        $reflectedClass = new \ReflectionClass(__NAMESPACE__ . '\StringUtils');
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
            __NAMESPACE__ . '\StringUtils',
            '__construct'
        );
        $this->assertFalse($reflectedConstructor->isAbstract());
        $this->assertTrue($reflectedConstructor->isConstructor());
        $this->assertFalse($reflectedConstructor->isFinal());
        $this->assertTrue($reflectedConstructor->isProtected());
    }

    /**
     * @return array
     */
    public function providerCharAt()
    {
        return array(
            array('a', 'abc', 0),
            array('b', 'abc', 1),
            array('c', 'abc', 2)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass charAt
     * @dataProvider providerCharAt
     * @test
     */
    public function testCharAt($expected, $str, $pos)
    {
        $actual = StringUtils::charAt($str, $pos);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass charAt
     * @expectedException OutOfBoundsException
     * @test
     */
    public function testExceptionCharAt()
    {
        StringUtils::charAt('', 1);
    }

    /**
     * @return array
     */
    public function providerChomp()
    {
        return array(
            // with $str parameter
            array('foo', "foo\r\n"),
            array('foo', "foo\n"),
            array('foo', "foo\r"),
            array('foo ', "foo \r"),
            array('foo', 'foo'),
            array("foo\n", "foo\n\n"),
            array("foo\r\n", "foo\r\n\r\n"),
            array("foo\nfoo", "foo\nfoo"),
            array("foo\n\rfoo", "foo\n\rfoo"),
            array('', "\n"),
            array('', "\r"),
            array('a', 'a'),
            array('', "\r\n"),
            array('', ''),
            array(null, null),
            array('foo' . "\n", 'foo' . "\n\r")
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass chomp
     * @dataProvider providerChomp
     * @test
     */
    public function testChomp($expected, $str)
    {
        $actual = StringUtils::chomp($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerChop()
    {
        return array(
            array(null, null),
            array('', ''),
            array('abc ', "abc \r"),
            array('abc', "abc\n"),
            array('ab', 'abc'),
            array("abc\nab", "abc\nabc"),
            array('', 'a'),
            array('', "\r"),
            array('', "\n"),
            array('', "\r\n")
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass chop
     * @dataProvider providerChop
     * @test
     */
    public function testChop($expected, $str)
    {
        $actual = StringUtils::chop($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerIsBlank()
    {
        return array(
            array(true, null),
            array(true, ''),
            array(true, ' '),
            array(false, 'bob'),
            array(false, '  bob  ')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass isBlank
     * @dataProvider providerIsBlank
     * @test
     */
    public function testIsBlank($expected, $str)
    {
        $actual = StringUtils::isBlank($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @dataProvider providerIsBlank
     * @coversDefaultClass isNotBlank
     * @test
     */
    public function testIsNotBlank($expected, $str)
    {
        $actual = StringUtils::isNotBlank($str);
        $this->assertEquals(!$expected, $actual);
    }

    /**
     * @return array
     */
    public function providerIsEmpty()
    {
        return array(
            array(true, null),
            array(true, ''),
            array(false, ' '),
            array(false, 'bob'),
            array(false, '  bob  ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerIsEmpty
     * @coversDefaultClass isEmpty
     * @test
     */
    public function testIsEmpty($expected, $str)
    {
        $actual = StringUtils::isEmpty($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @dataProvider providerIsEmpty
     * @coversDefaultClass isNotEmpty
     * @test
     */
    public function testIsNotEmpty($expected, $str)
    {
        $actual = StringUtils::isNotEmpty($str);
        $this->assertEquals(!$expected, $actual);
    }

    /**
     * @return array
     */
    public function providerLength()
    {
        return array(
            array(0, null),
            array(0, ''),
            array(1, ' '),
            array(3, 'bob'),
            array(7, '  bob  ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerLength
     * @coversDefaultClass length
     * @test
     */
    public function testLength($expected, $str)
    {
        $actual = StringUtils::length($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerLowerCase()
    {
        return array(
            array(null, null),
            array('', ''),
            array('abc', 'aBc')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerLowerCase
     * @coversDefaultClass lowerCase
     * @test
     */
    public function testLowerCase($expected, $str)
    {
        $actual = StringUtils::lowerCase($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerUpperCase()
    {
        return array(
            array(null, null),
            array('', ''),
            array('ABC', 'aBc')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerUpperCase
     * @coversDefaultClass upperCase
     * @test
     */
    public function testUpperCase($expected, $str)
    {
        $actual = StringUtils::upperCase($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerReplace()
    {
        return array(
            array(null, null, null, null),
            array('', '', null, null, null),
            array('any', 'any', null, null, null),
            array('any', 'any', null, null, null),
            array('any', 'any', '', null, null),
            array('any', 'any', null, null, 0),
            array('abaa', 'abaa', 'a', null, -1),
            array('b', 'abaa', 'a', '', -1),
            array('abaa', 'abaa', 'a', 'z', 0),
            array('zbaa', 'abaa', 'a', 'z', 1),
            array('zbza', 'abaa', 'a', 'z', 2),
            array('zbzz', 'abaa', 'a', 'z', -1)
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerReplace
     * @coversDefaultClass replace
     * @test
     */
    public function testReplace($expected, $str, $search, $replace, $max = -1)
    {
        $actual = StringUtils::replace($str, $search, $replace, $max);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerTrim()
    {
        return array(
            array(null, null),
            array('', ''),
            array('', '     '),
            array('abc', 'abc'),
            array('abc', '    abc    ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerTrim
     * @coversDefaultClass trim
     * @test
     */
    public function testTrim($expected, $str)
    {
        $actual = StringUtils::trim($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerTrimToEmpty()
    {
        return array(
            array('', null),
            array('', ''),
            array('', '     '),
            array('abc', 'abc'),
            array('abc', '    abc    ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerTrimToEmpty
     * @coversDefaultClass trimToEmpty
     * @test
     */
    public function testTrimToEmpty($expected, $str)
    {
        $actual = StringUtils::trimToEmpty($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerTrimToNull()
    {
        return array(
            array(null, null),
            array(null, ''),
            array(null, '     '),
            array('abc', 'abc'),
            array('abc', '    abc    ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerTrimToNull
     * @coversDefaultClass trimToNull
     * @test
     */
    public function testTrimToNull($expected, $str)
    {
        $actual = StringUtils::trimToNull($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStrip()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('abc', 'abc', null),
            array('abc', '  abc', null),
            array('abc', 'abc  ', null),
            array('abc', ' abc ', null),
            array('  abc', '  abcyx', 'xyz')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerStrip
     * @coversDefaultClass strip
     * @test
     */
    public function testStrip($expected, $str, $chars)
    {
        $actual = StringUtils::strip($str, $chars);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStripToEmpty()
    {
        return array(
            array('', null),
            array('', ''),
            array('', '   '),
            array('abc', 'abc'),
            array('abc', '  abc'),
            array('abc', 'abc  '),
            array('abc', ' abc '),
            array('ab c', ' ab c ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerStripToEmpty
     * @coversDefaultClass stripToEmpty
     * @test
     */
    public function testStripToEmpty($expected, $str)
    {
        $actual = StringUtils::stripToEmpty($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStripToNull()
    {
        return array(
            array(null, null),
            array(null, ''),
            array(null, '   '),
            array('abc', 'abc'),
            array('abc', '  abc'),
            array('abc', 'abc  '),
            array('abc', ' abc '),
            array('ab c', ' ab c ')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerStripToNull
     * @coversDefaultClass stripToNull
     * @test
     */
    public function testStripToNull($expected, $str)
    {
        $actual = StringUtils::stripToNull($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStripStart()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('abc', 'abc', ''),
            array('abc', 'abc', null),
            array('abc', '  abc', null),
            array('abc  ', 'abc  ', null),
            array('abc ', ' abc ', null),
            array('abc  ', 'yxabc  ', 'xyz')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerStripStart
     * @coversDefaultClass stripStart
     * @test
     */
    public function testStripStart($expected, $str, $chars)
    {
        $actual = StringUtils::stripStart($str, $chars);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStripEnd()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('abc', 'abc', ''),
            array('abc', 'abc', null),
            array('  abc', '  abc', null),
            array('abc', 'abc  ', null),
            array(' abc', ' abc ', null),
            array('  abc', '  abcyx', 'xyz')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerStripEnd
     * @coversDefaultClass stripEnd
     * @test
     */
    public function testStripEnd($expected, $str, $chars)
    {
        $actual = StringUtils::stripEnd($str, $chars);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerCompare()
    {
        return array(
            array(-3, null, 'abc'),
            array(-1, 'ABC', 'abc'),
            array(0, null, null),
            array(0, 'abc', 'abc'),
            array(1, 'abc', 'ABC'),
            array(3, 'abc', null),
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerCompare
     * @coversDefaultClass compare
     * @test
     */
    public function testCompare($expected, $str1, $str2)
    {
        $actual = StringUtils::compare($str1, $str2);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerCompareIgnoreCase()
    {
        return array(
            array(0, null, null),
            array(3, null, 'abc'),
            array(-3, 'abc', null),
            array(0, 'abc', 'abc'),
            array(0, 'abc', 'ABC')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerCompareIgnoreCase
     * @coversDefaultClass compareIgnoreCase
     * @test
     */
    public function testCompareIgnoreCase($expected, $str1, $str2)
    {
        $actual = StringUtils::compareIgnoreCase($str1, $str2);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerEqual()
    {
        return array(
            array(true, null, null),
            array(false, null, 'abc'),
            array(false, 'abc', null),
            array(true, 'abc', 'abc'),
            array(false, 'abc', 'ABC')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerEqual
     * @coversDefaultClass equal
     * @test
     */
    public function testEqual($expected, $str1, $str2)
    {
        $actual = StringUtils::equal($str1, $str2);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerEqualsIgnoreCase()
    {
        return array(
            array(true, null, null),
            array(false, null, 'abc'),
            array(false, 'abc', null),
            array(true, 'abc', 'abc'),
            array(true, 'abc', 'ABC')
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerEqualsIgnoreCase
     * @coversDefaultClass equalsIgnoreCase
     * @test
     */
    public function testEqualsIgnoreCase($expected, $str1, $str2)
    {
        $actual = StringUtils::equalsIgnoreCase($str1, $str2);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerIndexOf()
    {
        return array(
            array(-1, null, null, null),
            array(-1, null, null, null),
            array(0, '', '', 0),
            array(0, 'aabaabaa', 'a', 0),
            array(2, 'aabaabaa', 'b', 0),
            array(1, 'aabaabaa', 'ab', 0),
            array(5, 'aabaabaa', 'b', 3),
            array(-1, 'aabaabaa', 'b', 9),
            array(2, 'aabaabaa', 'b', -1),
            array(2, 'aabaabaa', '', 2),
            array(3, 'abc', '', 9),
            // not found
            array(-1, '0123456789', ' ', 0)
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerIndexOf
     * @coversDefaultClass indexOf
     * @test
     */
    public function testIndexOf($expected, $str, $search, $startPos = 0)
    {
        $actual = StringUtils::indexOf($str, $search, $startPos);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerLastIndexOf()
    {
        return array(
            array(-1, null, null, null),
            array(-1, null, null, null),
            array(0, '', '', 0),
            array(7, 'aabaabaa', 'a', 0),
            array(5, 'aabaabaa', 'b', 0),
            array(4, 'aabaabaa', 'ab', 0),
            array(5, 'aabaabaa', 'b', 3),
            array(-1, 'aabaabaa', 'b', 9),
            array(5, 'aabaabaa', 'b', -1),
            array(2, 'aabaabaa', '', 2),
            array(3, 'abc', '', 9),
            // not found
            array(-1, '0123456789', ' ', 0)
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerLastIndexOf
     * @coversDefaultClass LastIndexOf
     * @test
     */
    public function testLastIndexOf($expected, $str, $search, $startPos = 0)
    {
        $actual = StringUtils::lastIndexOf($str, $search, $startPos);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSplit()
    {
        return array(
            array(null, null, null, null),
            array(array(), '', null, null),
            array(array('ab', 'cd', 'ef'), 'ab cd ef', null, 0),
            array(array('ab', 'cd', 'ef'), 'ab   cd ef', null, 0),
            array(array('ab', 'cd', 'ef'),'ab:cd:ef', ':', 0),
            array(array('ab', 'cd:ef'),'ab:cd:ef', ':', 2)
        );
    }

    /**
     * @return void
     *
     * @dataProvider providerSplit
     * @coversDefaultClass split
     * @test
     */
    public function testSplit($expected, $str, $chars = null, $max = 0)
    {
        $actual = StringUtils::split($str, $chars, $max);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSubstring()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('abc', 'abc', 0),
            array('c', 'abc', 2),
            array('', 'abc', 4),
            array('bc', 'abc', -2),
            array('abc', 'abc', -4),
            array(null, null, null, null),
            array('', '', null, null),
            array('ab', 'abc', 0, 2),
            array('', 'abc', 2, 0),
            array('c', 'abc', 2, 4),
            array('', 'abc', 4, 6),
            array('', 'abc', 2, 2),
            array('b', 'abc', -2, -1),
            array('ab', 'abc', -4, 2)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass substring
     * @dataProvider providerSubstring
     * @test
     */
    public function testSubstring($expected, $str, $start, $end = null)
    {
        $actual = StringUtils::substring($str, $start, $end);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSubstringAfter()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('', null, null),
            array('', 'abc', null),
            array('bc', 'abc', 'a'),
            array('cba', 'abcba', 'b'),
            array('', 'abc', 'c'),
            array('', 'abc', 'd'),
            array('abc', 'abc', '')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass substringAfter
     * @dataProvider providerSubstringAfter
     * @test
     */
    public function testSubstringAfter($expected, $str, $separator)
    {
        $actual = StringUtils::substringAfter($str, $separator);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSubstringAfterLast()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('', null, ''),
            array('', 'abc', null),
            array('', null, null),
            array('bc', 'abc', 'a'),
            array('a', 'abcba', 'b'),
            array('', 'abc', 'c'),
            array('', 'a', 'a'),
            array('', 'a', 'z')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass substringAfterLast
     * @dataProvider providerSubstringAfterLast
     * @test
     */
    public function testSubstringAfterLast($expected, $str, $separator)
    {
        $actual = StringUtils::substringAfterLast($str, $separator);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSubstringBefore()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('', 'abc', 'a'),
            array('a', 'abcba', 'b'),
            array('ab', 'abc', 'c'),
            array('abc', 'abc', 'd'),
            array('', 'abc', ''),
            array('abc', 'abc', null)
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass substringBefore
     * @dataProvider providerSubstringBefore
     * @test
     */
    public function testSubstringBefore($expected, $str, $separator)
    {
        $actual = StringUtils::substringBefore($str, $separator);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerSubstringBeforeLast()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('abc', 'abcba', 'b'),
            array('ab', 'abc', 'c'),
            array('', 'a', 'a'),
            array('a', 'a', 'z'),
            array('a', 'a', null),
            array('a', 'a', '')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass substringBeforeLast
     * @dataProvider providerSubstringBeforeLast
     * @test
     */
    public function testSubstringBeforeLast($expected, $str, $separator)
    {
        $actual = StringUtils::substringBeforeLast($str, $separator);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerCapitalize()
    {
        return array(
             array(null, null),
             array('', ''),
             array('Cat', 'cat'),
             array('CAt', 'cAt')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass capitalize
     * @dataProvider providerCapitalize
     * @test
     */
    public function testCapitalize($expected, $str)
    {
        $actual = StringUtils::capitalize($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerUncapitalize()
    {
        return array(
             array(null, null),
             array('', ''),
             array('cat', 'Cat'),
             array('cAT', 'CAT')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass uncapitalize
     * @dataProvider providerUncapitalize
     * @test
     */
    public function testUncapitalize($expected, $str)
    {
        $actual = StringUtils::uncapitalize($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerRepeat()
    {
        return array(
            array(null, null, 2, null),
            array(null, null, 2, 'x'),
            array('', '', 0, null),
            array('', '', 2, ''),
            array('xxx', '', 3, 'x'),
            array('?, ?, ?', '?', 3, ', ')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass repeat
     * @dataProvider providerRepeat
     * @test
     */
    public function testRepeat($expected, $str, $repeat, $separator = null)
    {
        $actual = StringUtils::repeat($str, $repeat, $separator);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerEndsWith()
    {
        return array(
            array(true, null, null),
            array(false, null, 'def'),
            array(false, 'abcdef', null),
            array(true, 'abcdef', 'def'),
            array(false, 'ABCDEF', 'def'),
            array(false, 'ABCDEF', 'cde')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass endsWith
     * @dataProvider providerEndsWith
     * @test
     */
    public function testEndsWith($expected, $str, $suffix)
    {
        $actual = StringUtils::endsWith($str, $suffix);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerStartsWith()
    {
        return array(
            array(true, null, null),
            array(true, 'abcdef', 'abc'),
            array(false, null, 'def'),
            array(false, 'abcdef', null),
            array(false, 'ABCDEF', 'abc'),
            array(false, 'ABCDEF', 'cde')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass startsWith
     * @dataProvider providerStartsWith
     * @test
     */
    public function testStartsWith($expected, $str, $prefix)
    {
        $actual = StringUtils::startsWith($str, $prefix);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerRemoveEnd()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('*', '*', null),
            array('www.domain.com', 'www.domain.com', '.com.'),
            array('www.domain', 'www.domain.com', '.com'),
            array('www.domain.com', 'www.domain.com', 'domain'),
            array('abc', 'abc', '')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass removeEnd
     * @dataProvider providerRemoveEnd
     * @test
     */
    public function testRemoveEnd($expected, $str, $remove)
    {
        $actual = StringUtils::removeEnd($str, $remove);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function providerRemoveStart()
    {
        return array(
            array(null, null, null),
            array('', '', null),
            array('*', '*', null),
            array('www.domain.com', 'www.domain.com', '.com.'),
            array('domain.com', 'www.domain.com', 'www.'),
            array('www.domain.com', 'www.domain.com', 'domain'),
            array('abc', 'abc', '')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass removeStart
     * @dataProvider providerRemoveStart
     * @test
     */
    public function testRemoveStart($expected, $str, $remove)
    {
        $actual = StringUtils::removeStart($str, $remove);
        $this->assertEquals($expected, $actual);
    }
}
