<?php
namespace FlorianWolters\Component\Core;

use \InvalidArgumentException;

/**
 * The class {@see RandomStringUtils} offers operations for random `string`s.
 *
 * This class is inspired by the Java class {@link
 * http://commons.apache.org/lang/api/org/apache/commons/lang3/RandomStringUtils.html
 * RandomStringUtils} from the {@link http://commons.apache.org/lang Apache
 * Commons Lang Application Programming Interface (API)}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 * @since     Class available since Release 0.2.0
 */
final class RandomStringUtils
{
    // @codeCoverageIgnoreStart

    /**
     * {@see RandomStringUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     * /---code php
     * RandomStringUtils::random(42);
     * \---
     */
    protected function __construct()
    {
    }

    // @codeCoverageIgnoreEnd

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of alphabetic characters.
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string.
     */
    public static function randomAlphabetic($count)
    {
        return self::random($count, 0, 0, true, false);
    }

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of lower cased alphabetic
     * characters.
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string.
     */
    public static function randomAlphabeticLower($count)
    {
        return self::random($count, 'a', 'z', true, false);
    }

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of upper cased alphabetic
     * characters.
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string.
     */
    public static function randomAlphabeticUpper($count)
    {
        return self::random($count, 'A', 'Z', true, false);
    }

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of alpha-numeric characters.
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string.
     */
    public static function randomAlphanumeric($count)
    {
        return self::random($count);
    }

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of characters whose ASCII value is
     * between `32` and `126` (inclusive).
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string
     */
    public static function randomAscii($count)
    {
        return self::random($count, 32, 127, true, false);
    }

    /**
     * Creates a random string whose length is the number of characters
     * specified.
     *
     * Characters will be chosen from the set of numeric characters.
     *
     * @param integer $count The length of the random string to create.
     *
     * @return string The random string.
     */
    public static function randomNumeric($count)
    {
        return self::random($count, 0, 0, false);
    }

    /**
     * Creates a random string based on a variety of options.
     *
     * If start and end are both `0`, `$start` is set to `' '` and `$end` is set
     * to `'z'`, the ASCII printable characters, will be used, unless letters
     * and numbers are both `false`, in which case, all printable characters are
     * used that are *not* alphanumeric.
     *
     * If `$chars` is not an empty array, characters will be chosen from the set
     * of characters specified.
     *
     * @param integer $count   The length of the random string to create.
     * @param integer $start   The position in set of characters to start at.
     * @param integer $end     The position in set of characters to end before.
     * @param boolean $letters `true` if only letters are allowed.
     * @param boolean $numbers `true` if only numbers are allowed.
     * @param array   $chars   The set of characters to choose randoms from.
     *
     * @return string The random string.
     * @throws InvalidArgumentException If `$count` is less than `0`.
     */
    public static function random(
        $count,
        $start = 0,
        $end = 0,
        $letters = true,
        $numbers = true,
        array $chars = array()
    ) {
        if (0 === $count) {
            return StringUtils::EMPTY_STR;
        }

        if (0 > $count) {
            throw new InvalidArgumentException(
                'Requested random string length ' . $count . ' is less than 0.'
            );
        }

        foreach ($chars as $intValue) {
            if (false === CharUtils::isAscii($intValue)) {
                throw new InvalidArgumentException(
                    'Requested set of characters does not contain characters only.'
                );
            }
        }

        if (false === \is_int($start)) {
            $start = CharUtils::fromAsciiCharToValue($start);
        }

        if (false === \is_int($end)) {
            $end = CharUtils::fromAsciiCharToValue($end);
        }

        if (0 > $start) {
            throw new InvalidArgumentException(
                'Requested start position ' . $start . ' is less than 0.'
            );
        }
        if (0 > $end) {
            throw new InvalidArgumentException(
                'Requested end position ' . $end . ' is less than 0.'
            );
        }

        if ((0 === $start) && (0 === $end)) {
            $start = 32;
            $end = 123;

            if ((false === $letters) && (false === $numbers)) {
                $chars = \array_values(
                    \array_diff(
                        CharUtils::charAsciiPrintableArray(),
                        CharUtils::charAsciiAlphanumericArray()
                    )
                );
            }
        }

        $charsUpperBound = (\count($chars) - 1);
        $result = '';

        while (0 !== $count--) {
            if (!$chars) {
                $intValue = \rand($start, $end);
            } else {
                $intValue = CharUtils::fromAsciiCharToValue(
                    $chars[\rand(0, $charsUpperBound)]
                );
            }

            $charValue = CharUtils::fromAsciiValueToChar($intValue);

            if ((true === $letters) && (true === CharUtils::isAsciiAlpha($charValue))
                || (true === $numbers) && (true === CharUtils::isAsciiNumeric($charValue))
                || (false === $letters) && (false === $numbers)
            ) {
                $result .= $charValue;
            } else {
                ++$count;
            }
        }

        return $result;
    }
}
