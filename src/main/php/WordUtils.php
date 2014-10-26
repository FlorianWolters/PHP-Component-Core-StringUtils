<?php
/**
 * FlorianWolters\Component\Core\WordUtils
 *
 * PHP Version 5.3
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2010-2014 Florian Wolters (http://blog.florianwolters.de)
 * @license   https://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      https://github.com/FlorianWolters/PHP-Component-Core-StringUtils
 */

namespace FlorianWolters\Component\Core;

/**
 * The class {@see WordUtils} offers operations on `string`s that contain words.
 *
 * This class is inspired by the Java class {@link
 * https://commons.apache.org/proper/commons-lang/javadocs/api-3.1/org/apache/commons/lang3/text/WordUtils.html
 * WordUtils} from the {@link https://commons.apache.org/lang Apache Commons Lang
 * Application Programming Interface (API)}.
 *
 * @see   StringUtils
 * @since Class available since Release 0.1.0
 */
final class WordUtils
{
    // @codeCoverageIgnoreStart

    /**
     * {@see WordUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     *
     *     WordUtils::wrap('foo bar', 20);
     */
    protected function __construct()
    {
        // NOOP
    }

    // @codeCoverageIgnoreEnd

    /* -------------------------------------------------------------------------
     * Abbreviating
     * ---------------------------------------------------------------------- */

    /**
     * Abbreviates a string nicely.
     *
     * This method searches for the first space after the lower limit and
     * abbreviates the `string` there. It will also append any `string` passed
     * as a parameter to the end of the `string`.
     *
     * The upper limit can be specified to forcibly abbreviate a `string`.
     *
     * @param string  $inputString The `string` to be abbreviated. If `null` is
     *    passed, `null` is returned. If the empty `string` is passed, the empty
     *    `string` is returned.
     * @param integer $lowerLimit  The lower limit.
     * @param integer $upperLimit  The upper limit; specify `-1` if no limit is
     *    desired. If the upper limit is lower than the lower limit, it will be
     *    adjusted to be the same as the lower limit.
     * @param string  $append      The `string` to be appended to the end of the
     *    abbreviated `string`. This is appended ONLY if the string was indeed
     *    abbreviated. The append does not count towards the lower or upper
     *    limits.
     *
     * @return string|null The abbreviated `string` or `null` if `null` `string`
     *    input.
     */
    public static function abbreviate(
        $inputString,
        $lowerLimit,
        $upperLimit = -1,
        $append = StringUtils::EMPTY_STR
    ) {
        if (true === StringUtils::isEmpty($inputString)) {
            return $inputString;
        }

        $length = StringUtils::length($inputString);

        // if the $lowerLimit value is greater than the length of the string,
        // set to the length of the string
        if ($lowerLimit > $length) {
            $lowerLimit = $length;
        }

        // if the $upperLimit value is -1 (i.e. no limit) or is greater than the
        // length of the string, set to the length of the string
        if ((-1 === $upperLimit) || $upperLimit > $length) {
            $upperLimit = $length;
        }

        // if $upperLimit is less than $iLower, raise it to lower
        if ($upperLimit < $lowerLimit) {
            $upperLimit = $lowerLimit;
        }

        $index = StringUtils::indexOf($inputString, ' ', $lowerLimit);

        if (-1 === $index) {
            $result = StringUtils::substring($inputString, 0, $upperLimit);

            if ($upperLimit !== $length) {
                // only if abbreviation has occured do we append the $append
                // value
                $result .= $append;
            }
        } elseif ($index > $upperLimit) {
            $result = StringUtils::substring($inputString, 0, $upperLimit);
            $result .= $append;
        } else {
            $result = StringUtils::substring($inputString, 0, $index);
            $result .= $append;
        }

        return $result;
    }

    /* -------------------------------------------------------------------------
     * Capitalizing
     * ---------------------------------------------------------------------- */

    /**
     * Capitalizes all the whitespace separated words in a `string`.
     *
     * Only the first letter of each word is changed. To convert the rest of
     * each word to lowercase at the same time, use {@see capitalizeFully}.
     *
     * A `null` input `string` returns `null`.
     *
     * Capitalization uses the unicode title case, normally equivalent to upper
     * case.
     *
     *     WordUtils::capitalize(null);        // null
     *     WordUtils::capitalize('');          // ''
     *     WordUtils::capitalize('i am FINE'); // 'I Am FINE'
     *
     * @param string $inputString The `string` to capitalize.
     *
     * @return string|null The capitalized `string` or `null` if `null` `string`
     *    input.
     * @see WordUtils::uncapitalize
     */
    public static function capitalize($inputString)
    {
        return \ucwords($inputString);
    }

    /**
     * Converts all the whitespace separated words in a `string` into
     * capitalized words, that is each word is made up of a titlecase character
     * and then a series of lowercase characters.
     *
     * A `null` input `string` returns `null`.
     * Capitalization uses the Unicode title case, normally equivalent to upper
     * case.
     *
     *     WordUtils::capitalizeFully(null);        //  null
     *     WordUtils::capitalizeFully('');          //  ''
     *     WordUtils::capitalizeFully('i am FINE'); // 'I Am Fine'
     *
     * @param string $inputString The `string` to capitalize.
     *
     * @return string|null The capitalized `string` or `null` if `null` `string`
     *    input.
     */
    public static function capitalizeFully($inputString)
    {
        $inputStringLower = StringUtils::lowerCase($inputString);
        $result = self::capitalize($inputStringLower);

        return $result;
    }

    /**
     * Uncapitalizes all the whitespace separated words in a `string`.
     *
     * Only the first letter of each word is changed. A `null` input `string`
     * returns `null`.
     *
     *     WordUtils::uncapitalize(null);        // null
     *     WordUtils::uncapitalize('');          // ''
     *     WordUtils::uncapitalize('I Am FINE'); // 'i am fINE'
     *
     * @param string $inputString The `string` to uncapitalize.
     *
     * @return string The uncapitalized `string` or `null` if `null` `string`
     *    input.
     * @see WordUtils::capitalize
     */
    public static function uncapitalize($inputString)
    {
        $func = function (array $matches) {
            return StringUtils::lowerCase($matches[0]);
        };

        return \preg_replace_callback(
            '~\b\w~',
            $func,
            $inputString
        );
    }

    /**
     * Extracts the initial letters from each word in the `string`.
     *
     * The first letter of the string and all first letters after the defined
     * delimiters are returned as a new string. Their case is not changed.
     *
     * If the delimiters array is `null`, then Whitespace is used.
     * A `null` input `string` returns `null`.
     * An empty delimiter `array` returns an empty `string`.
     *
     *     WordUtils::initials(null, null);             // null
     *     WordUtils::initials('', null);               // ''
     *     WordUtils::initials('Ben John Lee', null);   // 'BJL'
     *     WordUtils::initials('Ben J.Lee', null);      // 'BJ'
     *     WordUtils::initials('Ben J.Lee', [' ','.']); // 'BJL'
     *
     * @param string      $inputString The `string` to get initials from.
     * @param array|null  $delimiters  Set of characters to determine words,
     *    `null` means whitespace.
     *
     * @return string|null `string` of initial letters or `null` if `null`
     *    `string` input.
     */
    public static function initials($inputString, array $delimiters = null)
    {
        if (true === StringUtils::isEmpty($inputString)) {
            return $inputString;
        }

        if ((null !== $delimiters) && (0 === \count($delimiters))) {
            return StringUtils::EMPTY_STR;
        }

        $inputStringLen = StringUtils::length($inputString);
        $buffer = array();
        $lastWasGap = true;

        for ($i = 0; $i < $inputStringLen; ++$i) {
            $char = StringUtils::charAt($inputString, $i);

            $delimiter = self::isDelimiter($char, $delimiters);
            if (true === $delimiter) {
                $lastWasGap = true;
            } elseif (true === $lastWasGap) {
                $buffer[] = $char;
                $lastWasGap = false;
            }
        }

        return \implode($buffer);
    }

    /**
    * Checks whether the specified string is a delimiter.
    *
    * @param string     $char       The string to check.
    * @param array|null $delimiters The delimiters.
     *
    * @return boolean `true` if it is a delimiter; `false` otherwise.
    */
    private static function isDelimiter($char, array $delimiters = null)
    {
        if (null === $delimiters) {
            return \ctype_space($char);
        }

        foreach ($delimiters as $delimiter) {
            if ($char === $delimiter) {
                return true;
            }
        }

        return false;
    }

    /**
     * Swaps the case of a `string` using a word based algorithm.
     *
     * * Upper case character converts to Lower case
     * * Lower case character converts to Upper case
     *
     * A `null` input `string` returns `null`.
     *
     *     WordUtils::swapCase(null);                // null
     *     WordUtils::swapCase('');                  // ''
     *     WordUtils::swapCase('The dog has a BONE); // 'tHE DOG HAS A bone'
     *
     * @param string $inputString The `string` to swap case.
     *
     * @return string|null The changed `string` or `null` if `null` `string`
     *    input.
     */
    public static function swapCase($inputString)
    {
        if (true === StringUtils::isEmpty($inputString)) {
            return $inputString;
        }

        $buffer = \str_split($inputString);
        $length = \count($buffer);

        for ($i = 0; $i < $length; ++$i) {
            $char = $buffer[$i];

            if (true === \ctype_upper($char)) {
                $buffer[$i] = StringUtils::lowerCase($char);
            } elseif (true === \ctype_lower($char)) {
                $buffer[$i] = StringUtils::upperCase($char);
            }
        }

        return \implode($buffer);
    }

    /* -------------------------------------------------------------------------
     * Wrapping
     * ---------------------------------------------------------------------- */

    /**
     * Wraps a single line of text, identifying words by `' '`.
     *
     * Leading spaces on a new line are stripped. Trailing spaces are not
     * stripped.
     *
     *     WordUtils::wrap(null, null, null, null); // null
     *     WordUtils::wrap('', null, null, null);   // ''
     *
     * @param string $inputString The `string` to be word wrapped.
     * @param integer    $wrapLength The column to wrap the words at, less than
     *    `1` is treated as `1`.
     * @param string|null $newLineInsertion The `string` to insert for a new
     *    line, `null` uses the system property line separator.
     * @param boolean $wrapLongWords `true` if long words (such as URLs) should
     *    be wrapped.
     *
     * @return string|null A line with newlines inserted, `null` if `null`
     *    input.
     */
    public static function wrap(
        $inputString,
        $wrapLength,
        $newLineInsertion = null,
        $wrapLongWords = false
    ) {
        if (null === $inputString) {
            return null;
        }

        if (null === $newLineInsertion) {
            $newLineInsertion = \PHP_EOL;
        }

        if (1 > $wrapLength) {
            $wrapLength = 1;
        }

        $wordWrap = \wordwrap(
            StringUtils::stripStart($inputString, null),
            $wrapLength,
            $newLineInsertion,
            $wrapLongWords
        );

        $result = StringUtils::EMPTY_STR;
        $split = StringUtils::split($wordWrap, $newLineInsertion);

        foreach ($split as $fragment) {
            $result .= StringUtils::stripStart($fragment, null) . $newLineInsertion;
        }

        return StringUtils::removeEnd($result, $newLineInsertion);
    }
}
