<?php
namespace FlorianWolters\Component\Core;

use \InvalidArgumentException;

/**
 * The class {@link CharUtils} offers operations on characters.
 *
 * This class is inspired by the Java class {@link
 * http://commons.apache.org/lang/api/org/apache/commons/lang3/CharUtils.html
 * CharUtils} from the {@link http://commons.apache.org/lang Apache Commons
 * Lang Application Programming Interface (API)}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.2.0
 */
class CharUtils
{
    /**
     * The `\u000d` carriage return (CR) character ('\r').
     *
     * @var string
     */
    const CR = "\r";

    /**
     * The `\u000a` linefeed (LF) character ('\n').
     *
     * @var string
     */
    const LF = "\n";

    // @codeCoverageIgnoreStart

    /**
     * {@link CharUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     * /---code php
     * CharUtils::isAscii('a');
     * \---
     */
    protected function __construct()
    {
    }

    // @codeCoverageIgnoreEnd

    /**
     * Returns all ASCII 7 bit characters in an array.
     *
     * @return array[string] All ASCII 7 bit characters.
     */
    public static function charAsciiArray()
    {
        static $charAsciiArray = null;

        if (null === $charAsciiArray) {
            $charAsciiArray = \array_merge(
                self::charAsciiControlArray(),
                self::charAsciiPrintableArray()
            );
        }

        return $charAsciiArray;
    }

    /**
     * Returns all ASCII 7 bit alphabetic characters in an array.
     *
     * @return array[string] All ASCII 7 bit alphabetic characters.
     */
    public static function charAsciiAlphaArray()
    {
        static $charAsciiAlphaArray = null;

        if (null === $charAsciiAlphaArray) {
            $charAsciiAlphaArray = \array_merge(
                self::charAsciiAlphaLowerArray(),
                self::charAsciiAlphaUpperArray()
            );
        }

        return $charAsciiAlphaArray;
    }

    /**
     * Returns all ASCII 7 bit alphabetic lowercase characters in an array.
     *
     * @return array[string] All ASCII 7 bit alphabetic lowercase characters.
     */
    public static function charAsciiAlphaLowerArray()
    {
        static $charAsciiAlphaLowerArray = array();

        if (!$charAsciiAlphaLowerArray) {
            for ($i = 97; $i < 123; ++$i) {
                $charAsciiAlphaLowerArray[] = \chr($i);
            }
        }

        return $charAsciiAlphaLowerArray;
    }

    /**
     * Returns all ASCII 7 bit alphabetic uppercase characters in an array.
     *
     * @return array[string] All ASCII 7 bit alphabetic uppercase characters.
     */
    public static function charAsciiAlphaUpperArray()
    {
        static $charAsciiAlphaUpperArray = array();

        if (!$charAsciiAlphaUpperArray) {
            for ($i = 65; $i < 91; ++$i) {
                $charAsciiAlphaUpperArray[] = \chr($i);
            }
        }

        return $charAsciiAlphaUpperArray;
    }

    /**
     * Returns all ASCII 7 bit alphanumeric characters in an array.
     *
     * @return array[string] All ASCII 7 bit alphanumeric characters.
     */
    public static function charAsciiAlphanumericArray()
    {
        static $charAsciiAlphanumericArray = null;

        if (null === $charAsciiAlphanumericArray) {
            $charAsciiAlphanumericArray = \array_merge(
                self::charAsciiNumericArray(),
                self::charAsciiAlphaArray()
            );
        }

        return $charAsciiAlphanumericArray;
    }

    /**
     * Returns all ASCII 7 bit control characters in an array.
     *
     * @return array[string] All ASCII 7 bit control characters.
     */
    public static function charAsciiControlArray()
    {
        static $charAsciiControlArray = array();

        if (!$charAsciiControlArray) {
            for ($i = 0; $i < 32; ++$i) {
                $charAsciiControlArray[] = \chr($i);
            }
            $charAsciiControlArray[] = \chr(127);
        }

        return $charAsciiControlArray;
    }

    /**
     * Returns all ASCII 7 bit printable characters in an array.
     *
     * @return array[string] All ASCII 7 bit printable characters.
     */
    public static function charAsciiPrintableArray()
    {
        static $charAsciiPrintableArray = array();

        if (!$charAsciiPrintableArray) {
            for ($i = 32; $i < 127; ++$i) {
                $charAsciiPrintableArray[] = \chr($i);
            }
        }

        return $charAsciiPrintableArray;
    }

    /**
     * Returns all ASCII 7 bit numeric characters in an array.
     *
     * @return array[string] All ASCII 7 bit numeric characters.
     */
    public static function charAsciiNumericArray()
    {
        static $charAsciiNumericArray = array();

        if (!$charAsciiNumericArray) {
            for ($i = 48; $i < 58; ++$i) {
                $charAsciiNumericArray[] = (string) ($i - 48);
            }
        }

        return $charAsciiNumericArray;
    }

    /**
     * Checks whether the specified character is ASCII 7 bit.
     *
     * /---code php
     * CharUtils::isAscii('a')      = true
     * CharUtils::isAscii('A')      = true
     * CharUtils::isAscii('3')      = true
     * CharUtils::isAscii('-')      = true
     * CharUtils::isAscii('\n')     = true
     * CharUtils::isAscii('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return boolean `true` if the character is ASCII 7 bit; `false`
     *                 otherwise.
     */
    public static function isAscii($char)
    {
        return (true === \is_string($char))
            && (1 === \preg_match('/^[[:ascii:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit alphabetic.
     *
     * /---code php
     * CharUtils::isAsciiAlpha('a')      = true
     * CharUtils::isAsciiAlpha('A')      = true
     * CharUtils::isAsciiAlpha('3')      = false
     * CharUtils::isAsciiAlpha('-')      = false
     * CharUtils::isAsciiAlpha('\n')     = false
     * CharUtils::isAsciiAlpha('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return boolean `true` if the character is ASCII 7 bit alphabetic;
     *                 `false` otherwise.
     */
    public static function isAsciiAlpha($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:alpha:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit alphabetic lowercase.
     *
     * /---code php
     * CharUtils::isAsciiAlphaLower('a')      = true
     * CharUtils::isAsciiAlphaLower('A')      = false
     * CharUtils::isAsciiAlphaLower('3')      = false
     * CharUtils::isAsciiAlphaLower('-')      = false
     * CharUtils::isAsciiAlphaLower('\n')     = false
     * CharUtils::isAsciiAlphaLower('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return boolean `true` if the character is ASCII 7 bit alphabetic
     *                 lowercase; `false` otherwise.
     */
    public static function isAsciiAlphaLower($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:lower:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit alphabetic uppercase.
     *
     * /---code php
     * CharUtils::isAsciiAlphaUpper('a')      = false
     * CharUtils::isAsciiAlphaUpper('A')      = true
     * CharUtils::isAsciiAlphaUpper('3')      = false
     * CharUtils::isAsciiAlphaUpper('-')      = false
     * CharUtils::isAsciiAlphaUpper('\n')     = false
     * CharUtils::isAsciiAlphaUpper('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return boolean `true` if the character is ASCII 7 bit alphabetic
     *                 uppercase; `false` otherwise.
     */
    public static function isAsciiAlphaUpper($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:upper:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit numeric.
     *
     * /---code php
     * CharUtils::isAsciiAlphanumeric('a')      = true
     * CharUtils::isAsciiAlphanumeric('A')      = true
     * CharUtils::isAsciiAlphanumeric('3')      = true
     * CharUtils::isAsciiAlphanumeric('-')      = false
     * CharUtils::isAsciiAlphanumeric('\n')     = false
     * CharUtils::isAsciiAlphanumeric('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return boolean `true` if the character is ASCII 7 bit numeric; `false`
     *                 otherwise.
     */
    public static function isAsciiAlphanumeric($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:alnum:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit control.
     *
     * /---code php
     * CharUtils::isAsciiControl('a')      = false
     * CharUtils::isAsciiControl('A')      = false
     * CharUtils::isAsciiControl('3')      = false
     * CharUtils::isAsciiControl('-')      = false
     * CharUtils::isAsciiControl('\n')     = true
     * CharUtils::isAsciiControl('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return true if less than 32 or equals 127
     */
    public static function isAsciiControl($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:cntrl:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit numeric.
     *
     * /---code php
     * CharUtils::isAsciiNumeric('a')      = false
     * CharUtils::isAsciiNumeric('A')      = false
     * CharUtils::isAsciiNumeric('3')      = true
     * CharUtils::isAsciiNumeric('-')      = false
     * CharUtils::isAsciiNumeric('\n')     = false
     * CharUtils::isAsciiNumeric('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return true if between 48 and 57 inclusive
     */
    public static function isAsciiNumeric($char)
    {
        return (true === self::isAscii($char))
            && (1 === \preg_match('/^[[:digit:]]$/', $char));
    }

    /**
     * Checks whether the character is ASCII 7 bit printable.
     *
     * /---code php
     * CharUtils::isAsciiPrintable('a')      = true
     * CharUtils::isAsciiPrintable('A')      = true
     * CharUtils::isAsciiPrintable('3')      = true
     * CharUtils::isAsciiPrintable('-')      = true
     * CharUtils::isAsciiPrintable('\n')     = false
     * CharUtils::isAsciiPrintable('&copy;') = false
     * \---
     *
     * @param string $char The character to check.
     *
     * @return true if between 32 and 126 inclusive
     */
    public static function isAsciiPrintable($char)
    {
        return (true === self::isAscii($char))
            && (false === self::isAsciiControl($char));
    }

    /**
     * Returns the ASCII character of the specified ASCII value.
     *
     * @param integer $char The ASCII value.
     *
     * @return string The ASCII character.
     * @throws InvalidArgumentException If `$int` is not an ASCII value.
     */
    public static function fromAsciiValueToChar($int)
    {
        if (false === self::isAsciiValue($int)) {
            throw new \InvalidArgumentException(
                'The specified argument is not an ASCII value.'
            );
        }

        return \chr($int);
    }

    /**
     * Checks whether the specified integer is the value for an ASCII 7 bit
     * character.
     *
     * @param integer $int The integer to check.
     *
     * @return boolean `true` whether the integer is an ASCII value; `false`
     *                 otherwise.
     */
    private static function isAsciiValue($int)
    {
        return (true === \is_int($int))
            && ($int > -1)
            && ($int < 128);
    }

    /**
     * Returns the ASCII value of the specified ASCII character.
     *
     * @param string $char The ASCII character.
     *
     * @return integer The ASCII value.
     * @throws InvalidArgumentException If `$char` is not an ASCII character.
     */
    public static function fromAsciiCharToValue($char)
    {
        if (false === self::isAscii($char)) {
            throw new \InvalidArgumentException(
                'The specified argument is not an ASCII character.'
            );
        }

        return \ord($char);
    }
}
