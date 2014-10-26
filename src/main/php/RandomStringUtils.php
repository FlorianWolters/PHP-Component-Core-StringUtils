<?php
/**
 * FlorianWolters\Component\Core\RandomStringUtils
 *
 * PHP Version 5.3
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2014 Florian Wolters (http://blog.florianwolters.de)
 * @license   https://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      https://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 */

namespace FlorianWolters\Component\Core;

use \InvalidArgumentException;

/**
 * The class {@see RandomStringUtils} offers operations for random `string`s.
 *
 * This class is inspired by the Java class {@link
 * https://commons.apache.org/proper/commons-lang/javadocs/api-3.1/org/apache/commons/lang3/RandomStringUtils.html
 * RandomStringUtils} from the {@link https://commons.apache.org/lang Apache
 * Commons Lang Application Programming Interface (API)}.
 *
 * @since Class available since Release 0.2.0
 */
final class RandomStringUtils
{
    // @codeCoverageIgnoreStart

    /**
     * {@see RandomStringUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     *
     *     RandomStringUtils::random(42);
     *
     */
    protected function __construct()
    {
        // NOOP
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
     * If start and end are both `0`, `$startPosition` is set to `' '` and
     * `$endPosition` is set to `'z'`, the ASCII printable characters, will be
     * used, unless letters and numbers are both `false`, in which case, all
     * printable characters are used that are *not* alphanumeric.
     *
     * If `$characters` is not an empty array, characters will be chosen from
     * the set of characters specified.
     *
     * @param integer        $count         The length of the random string to
     *    create.
     * @param integer|string $startPosition The position in the set of
     *    characters to start at.
     * @param integer|string $endPosition   The position in the set of
     *    characters to end before.
     * @param boolean        $letters       `true` if only letters are allowed.
     * @param boolean        $numbers       `true` if only numbers are allowed.
     * @param array          $characters    The set of characters to choose
     *    randoms from.
     *
     * @return string The random string.
     * @throws InvalidArgumentException If `$count` is less than `0`.
     */
    public static function random(
        $count,
        $startPosition = 0,
        $endPosition = 0,
        $letters = true,
        $numbers = true,
        array $characters = array()
    ) {
        if (0 === $count) {
            return StringUtils::EMPTY_STR;
        }

        if (0 > $count) {
            throw new InvalidArgumentException(
                'Requested random string length ' . $count . ' is less than 0.'
            );
        }

        foreach ($characters as $intValue) {
            if (false === CharUtils::isAscii($intValue)) {
                throw new InvalidArgumentException(
                    'Requested set of characters does not contain characters only.'
                );
            }
        }

        if (false === \is_int($startPosition)) {
            $startPosition = CharUtils::fromAsciiCharToValue($startPosition);
        }

        if (false === \is_int($endPosition)) {
            $endPosition = CharUtils::fromAsciiCharToValue($endPosition);
        }

        if (0 > $startPosition) {
            throw new InvalidArgumentException(
                'Requested start position ' . $startPosition . ' is less than 0.'
            );
        }
        if (0 > $endPosition) {
            throw new InvalidArgumentException(
                'Requested end position ' . $endPosition . ' is less than 0.'
            );
        }

        if ((0 === $startPosition) && (0 === $endPosition)) {
            $startPosition = 32;
            $endPosition = 123;

            if ((false === $letters) && (false === $numbers)) {
                $characters = \array_values(
                    \array_diff(
                        CharUtils::charAsciiPrintableArray(),
                        CharUtils::charAsciiAlphanumericArray()
                    )
                );
            }
        }

        $charactersUpperBound = (\count($characters) - 1);
        $result = '';

        while (0 !== $count--) {
            if (!$characters) {
                $intValue = \rand($startPosition, $endPosition);
            } else {
                $intValue = CharUtils::fromAsciiCharToValue(
                    $characters[\rand(0, $charactersUpperBound)]
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
