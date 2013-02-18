<?php
namespace FlorianWolters\Component\Core;

/**
 * Test class for {@see WordUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2012 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\WordUtils
 */
class WordUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return void
     *
     * @group specification
     * @testdox The definition of the class WordUtils is correct.
     * @test
     */
    public function testClassDefinition()
    {
        // Get the class via Reflection and test its signature.
        $reflectedClass = new \ReflectionClass(__NAMESPACE__ . '\WordUtils');
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
     * @testdox The definition of the constructor WordUtils::__construct is correct.
     * @test
     */
    public function testConstructorDefinition()
    {
        $reflectedConstructor = new \ReflectionMethod(
            __NAMESPACE__ . '\WordUtils',
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
    public static function abbreviateProvider()
    {
        return array(
            // check null and empty are returned respectively
            array(null, null, 1, -1, ''),
            array(StringUtils::EMPTY_STR, '', 1, -1, ''),
            // test upper limit
            array('01234', '0123456789', 0, 5, ''),
            array('01234', '0123456789', 5, 2, ''),
            array('012', '012 3456789', 2, 5, ''),
            array('012 3', '012 3456789', 5, 2, ''),
            array('0123456789', '0123456789', 0, -1, ''),
            array('01234-', '0123456789', 0, 5, '-'),
            array('01234-', '0123456789', 5, 2, '-'),
            // test upper limit and append string
            array('012', '012 3456789', 2, 5, null),
            array('012 3', '012 3456789', 5, 2, ''),
            array('0123456789', '0123456789', 0, -1, ''),
            // test lower value
            array('012', '012 3456789', 0, 5, null),
            array('01234', '01234 56789', 5, 10, null),
            array('01 23 45 67', '01 23 45 67 89', 9, -1, null),
            array('01 23 45 6', '01 23 45 67 89', 9, 10, null),
            array('0123456789', '0123456789', 15, 20, null),
            // test lower value and append string
            array('012', '012 3456789', 0, 5, null),
            array('01234-', '01234 56789', 5, 10, '-'),
            array('01 23 45 67abc', '01 23 45 67 89', 9, -1, 'abc'),
            array('01 23 45 6', '01 23 45 67 89', 9, 10, ''),
            // other
            array('', '0123456790', 0, 0, ''),
            array('', ' 0123456790', 0, -1, '')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass abbreviate
     * @dataProvider abbreviateProvider
     * @test
     */
    public function testAbbreviate(
        $expected,
        $str,
        $lower,
        $upper = -1,
        $append = ''
    ) {
        $actual = WordUtils::abbreviate($str, $lower, $upper, $append);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function capitalizeProvider()
    {
        return array(
            array(null, null),
            array('', ''),
            array('  ', '  '),
            array('I', 'I'),
            array('I', 'i'),
            array('I Am Here 123', 'i am here 123'),
            array('I Am Here 123', 'I Am Here 123'),
            array('I Am HERE 123', 'i am HERE 123'),
            array('I AM HERE 123', 'I AM HERE 123')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass capitalize
     * @dataProvider capitalizeProvider
     * @test
     */
    public function testCapitalize($expected, $str)
    {
        $actual = WordUtils::capitalize($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function capitalizeFullyProvider()
    {
        return array(
            array(null, null),
            array('', ''),
            array('  ', '  '),
            array('I', 'I'),
            array('I', 'i'),
            array('I Am Here 123', 'i am here 123'),
            array('I Am Here 123', 'I Am Here 123'),
            array('I Am Here 123', 'i am HERE 123'),
            array('I Am Here 123', 'I AM HERE 123')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass capitalizeFully
     * @dataProvider capitalizeFullyProvider
     * @test
     */
    public function testCapitalizeFully($expected, $str)
    {
        $actual = WordUtils::capitalizeFully($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function uncapitalizeProvider()
    {
        return array(
            array(null, null),
            array('', ''),
            array('  ', '  '),
            array('i', 'I'),
            array('i', 'i'),
            array('i am here 123', 'i am here 123'),
            array('i am here 123', 'I Am Here 123'),
            array('i am hERE 123', 'i am HERE 123'),
            array('i aM hERE 123', 'I AM HERE 123')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass uncapitalize
     * @dataProvider uncapitalizeProvider
     * @test
     */
    public function testUncapitalize($expected, $str)
    {
        $actual = WordUtils::uncapitalize($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function initialsProvider()
    {
        return array(
            // Without delimiters
            array(null, null, null),
            array('', '', null),
            array('', '  ', null),
            array('I', 'I', null),
            array('i', 'i', null),
            array('S', 'SJC', null),
            array('BJL', 'Ben John Lee', null),
            array('BJ', 'Ben J.Lee', null),
            array('BJ.L', ' Ben John . Lee', null),
            array('KO', "Kay O'Murphy", null),
            array('iah1', 'i am here 123', null),
            // With delimiters
            array(null, null, array()),
            array('', '', array()),
            array('', '  ', array()),
            array('', 'I', array()),
            array('', 'i', array()),
            array('', 'SJC', array()),
            array('', 'Ben John Lee', array()),
            array('', 'Ben J.Lee', array()),
            array('', ' Ben John . Lee', array()),
            array('', "Kay O'Murphy", array()),
            array('', 'i am here 123', array()),
            array(null, null, array(' ')),
            array('', '', array(' ')),
            array('', ' ', array(' ')),
            array('I', 'I', array(' ')),
            array('i', 'i', array(' ')),
            array('S', 'SJC', array(' ')),
            array('BJL', 'Ben John Lee', array(' ')),
            array('BJ', 'Ben J.Lee', array(' ')),
            array('BJ.L', ' Ben John . Lee', array(' ')),
            array('KO', "Kay O'Murphy", array(' ')),
            array('iah1', 'i am here 123', array(' ')),
            array(null, null, array(' ', '.')),
            array('', '', array(' ', '.')),
            array('', '  ', array(' ', '.')),
            array('I', 'I', array(' ', '.')),
            array('i', 'i', array(' ', '.')),
            array('S', 'SJC', array(' ', '.')),
            array('BJL', 'Ben John Lee', array(' ', '.')),
            array('BJL', 'Ben J.Lee', array(' ', '.')),
            array('BJL', ' Ben John . Lee', array(' ', '.')),
            array('KO', "Kay O'Murphy", array(' ', '.')),
            array('iah1', 'i am here 123', array(' ', '.')),
            array(null, null, array(' ', '.', "'")),
            array('', '', array(' ', '.', "'")),
            array('', '  ', array(' ', '.', "'")),
            array('I', 'I', array(' ', '.', "'")),
            array('i', 'i', array(' ', '.', "'")),
            array('S', 'SJC', array(' ', '.', "'")),
            array('BJL', 'Ben John Lee', array(' ', '.', "'")),
            array('BJL', 'Ben J.Lee', array(' ', '.', "'")),
            array('BJL', ' Ben John . Lee', array(' ', '.', "'")),
            array('KOM', "Kay O'Murphy", array(' ', '.', "'")),
            array('iah1', 'i am here 123', array(' ', '.', "'")),
            array(null, null, array('S', 'I', 'J', 'o', '1')),
            array('', '', array('S', 'I', 'J', 'o', '1')),
            array(' ', ' ', array('S', 'I', 'J', 'o', '1')),
            array('', 'I', array('S', 'I', 'J', 'o', '1')),
            array('i', 'i', array('S', 'I', 'J', 'o', '1')),
            array('C', 'SJC', array('S', 'I', 'J', 'o', '1')),
            array('Bh', 'Ben John Lee', array('S', 'I', 'J', 'o', '1')),
            array('B.', 'Ben J.Lee', array('S', 'I', 'J', 'o', '1')),
            array(' h', ' Ben John . Lee', array('S', 'I', 'J', 'o', '1')),
            array('K', "Kay O'Murphy", array('S', 'I', 'J', 'o', '1')),
            array('i2', 'i am here 123', array('S', 'I', 'J', 'o', '1'))
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass initials
     * @dataProvider initialsProvider
     * @test
     */
    public function testInitials($expected, $str, $delimiters)
    {
        $actual = WordUtils::initials($str, $delimiters);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function swapCaseProvider()
    {
        return array(
            array(null, null),
            array('', ''),
            array('  ', '  '),
            array('i', 'I'),
            array('I', 'i'),
            array('I AM HERE 123', 'i am here 123'),
            array('i aM hERE 123', 'I Am Here 123'),
            array('I AM here 123', 'i am HERE 123'),
            array('i am here 123', 'I AM HERE 123')
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass swapCase
     * @dataProvider swapCaseProvider
     * @test
     */
    public function testSwapCase($expected, $str)
    {
        $actual = WordUtils::swapCase($str);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function wrapProvider()
    {
        return array(
            array(null, null, 20, null, false),
            array(null, null, -1, null, false),
            array('', '', 20, null, false),
            array('', '', -1, null, false),
            // normal
            array(
                'Here is one line of' . \PHP_EOL . 'text that is going' . \PHP_EOL . 'to be wrapped after' . \PHP_EOL . '20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                null,
                false
            ), // long word at end
            array(
                'Click here to jump' . \PHP_EOL . 'to the jakarta' . \PHP_EOL . 'website -' . \PHP_EOL . 'http://jakarta.apache.org',
                'Click here to jump to the jakarta website - http://jakarta.apache.org',
                20,
                null,
                false
            ), // long word in middle
            array(
                'Click here,' . \PHP_EOL . 'http://jakarta.apache.org,' . \PHP_EOL . 'to jump to the' . \PHP_EOL . 'jakarta website',
                'Click here, http://jakarta.apache.org, to jump to the jakarta website',
                20,
                null,
                false
            ),
            array(null, null, 20, '\n', false),
            array(null, null, 20, '\n', true),
            array(null, null, 20, null, true),
            array(null, null, 20, null, false),
            array(null, null, -1, null, true),
            array(null, null, -1, null, false),
            array('', '', 20, '\n', false),
            array('', '', 20, '\n', true),
            array('', '', 20, null, false),
            array('', '', 20, null, true),
            array('', '', -1, null, false),
            array('', '', -1, null, true),
            // normal
            array(
                'Here is one line of\ntext that is going\nto be wrapped after\n20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                '\n',
                false
            ), array(
                'Here is one line of\ntext that is going\nto be wrapped after\n20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                '\n',
                true
            ), // unusual newline char
            array(
                'Here is one line of<br />text that is going<br />to be wrapped after<br />20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                '<br />',
                false
            ), array(
                'Here is one line of<br />text that is going<br />to be wrapped after<br />20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                '<br />',
                true
            ), // short line length
            array(
                'Here\nis one\nline',
                'Here is one line',
                6,
                '\n',
                false
            ), array(
                'Here\nis\none\nline',
                'Here is one line',
                2,
                '\n',
                false
            ), array(
                'Here\nis\none\nline',
                'Here is one line',
                -1,
                '\n',
                false
            ), // system newline char
            array(
                'Here is one line of' . \PHP_EOL . 'text that is going' . \PHP_EOL . 'to be wrapped after' . \PHP_EOL . '20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                null,
                false
            ), array(
                'Here is one line of' . \PHP_EOL . 'text that is going' . \PHP_EOL . 'to be wrapped after' . \PHP_EOL . '20 columns.',
                'Here is one line of text that is going to be wrapped after 20 columns.',
                20,
                null,
                true
            ), // with extra spaces
            array(
                'Here:  is  one  line\nof  text  that  is \ngoing  to  be \nwrapped  after  20 \ncolumns.',
                ' Here:  is  one  line  of  text  that  is  going  to  be  wrapped  after  20  columns.',
                20,
                '\n',
                false
            ), array(
                'Here:  is  one  line\nof  text  that  is \ngoing  to  be \nwrapped  after  20 \ncolumns.',
                ' Here:  is  one  line  of  text  that  is  going  to  be  wrapped  after  20  columns.',
                20,
                '\n',
                true
            ), // with tab
            array(
                'Here is\tone line of\ntext that is going\nto be wrapped after\n20 columns.',
                'Here is\tone line of text that is going to be wrapped after 20 columns.',
                20,
                '\n',
                false
            ), array(
                'Here is\tone line of\ntext that is going\nto be wrapped after\n20 columns.',
                'Here is\tone line of text that is going to be wrapped after 20 columns.',
                20,
                '\n',
                true
            ), // with tab at wrapColumn
            array(
                'Here is one line\nof\ttext that is\ngoing to be wrapped\nafter 20 columns.',
                'Here is one line of\ttext that is going to be wrapped after 20 columns.',
                20,
                '\n',
                false
            ), array(
                'Here is one line\nof\ttext that is\ngoing to be wrapped\nafter 20 columns.',
                'Here is one line of\ttext that is going to be wrapped after 20 columns.',
                20,
                '\n',
                true
            ), // difference because of long word
            array(
                'Click here to jump\nto the jakarta\nwebsite -\nhttp://jakarta.apache.org',
                'Click here to jump to the jakarta website - http://jakarta.apache.org',
                20,
                '\n',
                false
            ), array(
                'Click here to jump\nto the jakarta\nwebsite -\nhttp://jakarta.apach\ne.org',
                'Click here to jump to the jakarta website - http://jakarta.apache.org',
                20,
                '\n',
                true
            ), // difference because of long word in middle
            array(
                'Click here,\nhttp://jakarta.apache.org,\nto jump to the\njakarta website',
                'Click here, http://jakarta.apache.org, to jump to the jakarta website',
                20,
                '\n',
                false
            ), array(
                'Click here,\nhttp://jakarta.apach\ne.org, to jump to\nthe jakarta website',
                'Click here, http://jakarta.apache.org, to jump to the jakarta website',
                20,
                '\n',
                true
            )
        );
    }

    /**
     * @return void
     *
     * @coversDefaultClass wrap
     * @dataProvider wrapProvider
     * @test
     */
    public function testWrap(
        $expected,
        $str,
        $wrapLength,
        $newLine,
        $wrapLongWords
    ) {
        $actual = WordUtils::wrap($str, $wrapLength, $newLine, $wrapLongWords);
        $this->assertEquals($expected, $actual);
    }
}
