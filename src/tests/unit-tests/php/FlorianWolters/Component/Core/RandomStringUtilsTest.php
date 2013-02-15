<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@link RandomStringUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.2.0
 *
 * @covers FlorianWolters\Component\Core\RandomStringUtils
 */
class RandomStringUtilsTest extends \PHPUnit_Framework_TestCase
{
    const COUNT_FOR_RANDOM_TESTS = 50;

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
     * @return array
     */
    public static function providerTestRandomLength()
    {
        return array(
            array(0),
            array(1),
            array(2),
            array(4),
            array(8),
            array(16),
            array(32),
            array(64),
            array(128)
        );
    }

    /**
     * @coversDefaultClass randomAlphabetic
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomAlphabeticReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:alpha:]', $count);
        $actual = RandomStringUtils::randomAlphabetic($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomAlphabetic
     * @test
     */
    public function testRandomAlphabeticReturnsRandomResult()
    {
        $first = RandomStringUtils::randomAlphabetic(self::COUNT_FOR_RANDOM_TESTS);
        $second = RandomStringUtils::randomAlphabetic(self::COUNT_FOR_RANDOM_TESTS);

        $this->assertNotEquals($first, $second);
    }

    /**
     * @coversDefaultClass randomAlphabeticLower
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomAlphabeticLowerReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:lower:]', $count);
        $actual = RandomStringUtils::randomAlphabeticLower($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomAlphabeticUpper
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomAlphabeticUpperReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:upper:]', $count);
        $actual = RandomStringUtils::randomAlphabeticUpper($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomAlphanumeric
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomAlphanumericReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:alnum:]', $count);
        $actual = RandomStringUtils::randomAlphanumeric($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomAlphanumeric
     * @test
     */
    public function testRandomAlphanumericReturnsRandomResult()
    {
        $first = RandomStringUtils::randomAlphanumeric(self::COUNT_FOR_RANDOM_TESTS);
        $second = RandomStringUtils::randomAlphanumeric(self::COUNT_FOR_RANDOM_TESTS);

        $this->assertNotEquals($first, $second);
    }

    /**
     * @coversDefaultClass randomAscii
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomAsciiReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:ascii:]', $count);
        $actual = RandomStringUtils::randomAscii($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomAscii
     * @test
     */
    public function testRandomAsciiReturnsRandomResult()
    {
        $first = RandomStringUtils::randomAscii(self::COUNT_FOR_RANDOM_TESTS);
        $second = RandomStringUtils::randomAscii(self::COUNT_FOR_RANDOM_TESTS);

        $this->assertNotEquals($first, $second);
    }

    /**
     * @coversDefaultClass randomNumeric
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomNumericReturnsCorrectResult($count)
    {
        $pattern = $this->buildExpectedPattern('[:digit:]', $count);
        $actual = RandomStringUtils::randomNumeric($count);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass randomNumeric
     * @test
     */
    public function testRandomNumericReturnsRandomResult()
    {
        $first = RandomStringUtils::randomNumeric(self::COUNT_FOR_RANDOM_TESTS);
        $second = RandomStringUtils::randomNumeric(self::COUNT_FOR_RANDOM_TESTS);

        $this->assertNotEquals($first, $second);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithStartAndEndReturnsAsciiLower($count)
    {
        $pattern = $this->buildExpectedPattern('[:lower:]', $count);
        $actual = RandomStringUtils::random($count, 97, 122);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithStartAndEndReturnsAsciiUpper($count)
    {
        $pattern = $this->buildExpectedPattern('[:upper:]', $count);
        $actual = RandomStringUtils::random($count, 65, 80);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithStartAndEndReturnsAsciiDigit($count)
    {
        $pattern = $this->buildExpectedPattern('[:digit:]', $count);

        $actual = RandomStringUtils::random($count, 48, 57);
        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithLettersAndNoNumbers($count)
    {
        $pattern = $this->buildExpectedPattern('[:alpha:]', $count);
        $actual = RandomStringUtils::random($count, 0, 0, true, false);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithNoLettersAndNumbers($count)
    {
        $pattern = $this->buildExpectedPattern('[:digit:]', $count);
        $actual = RandomStringUtils::random($count, 0, 0, false, true);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithNoLettersAndNoNumbers($count)
    {
        $pattern = '/^.*$/';
        $actual = RandomStringUtils::random($count, 0, 0, false, false);

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestRandomLength
     * @test
     */
    public function testRandomWithChars($count)
    {
        $charsStr = 'abcdefg';
        $chars = \str_split($charsStr);
        $pattern = $this->buildExpectedPattern($charsStr, $count);
        $actual = RandomStringUtils::random(
            $count,
            0,
            0,
            true,
            true,
            $chars
        );

        $this->assertRegExp($pattern, $actual);
    }

    /**
     * @param string  $class
     * @param integer $count
     *
     * @return string
     */
    private function buildExpectedPattern($class, $count)
    {
        return '/^[' . $class . ']{' . $count . '}$/';
    }

    /**
     * @return array
     */
    public static function providerTestExceptions()
    {
        return array(
            array(-1, 0, 0),
            array(1, -1, 0),
            array(1, 0, -1)
        );
    }

    /**
     * @coversDefaultClass random
     * @dataProvider providerTestExceptions
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testExceptions($count, $start, $end)
    {
        RandomStringUtils::random($count, $start, $end);
    }
}
