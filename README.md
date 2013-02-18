# FlorianWolters\Component\Core\StringUtils

[![Build Status](https://secure.travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils.png?branch=master)](http://travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils)

**FlorianWolters\Component\Core\StringUtils** is a simple-to-use [PHP][17] component that provides operations on the data type `string`.

## Introduction

The [string functions][26] of the [PHP][17] scripting language are not consistent:

* Some function names begin with `str`, e.g. `strpos`.
* Some function names begin with `str_`, e.g. `str_rot13`.
* Some function names **do not** begin begin with `str`, e.g. `trim` and `substr`.

Quite a lot of the built-in string functions are only *Wrapper Functions* for the string functions of the underlying C programming language. Therefore a lot of useful string functions are not included in the [PHP][17] standard library.

**FlorianWolters\Component\Core\StringUtils** offers static classes that offer operations on the data type `string`. The goal of this project is to create an unified and simplified Application Programming Interface (API) for string functions to use in the [PHP][17] scripting language.

This project is inspired by the following Java classes from the [Apache Commons Lang API][27]:

* [StringUtils][28]
* [WordUtils][29]
* [CharUtils][30]
* [RandomStringUtils][31]

The implementation has been adapted and abstracted for [PHP][17].

## Features

* The class `FlorianWolters\Component\Core\StringUtils` offers operations (currently **38** methods) on the data type `string`.
* The class `FlorianWolters\Component\Core\WordUtils` offers operations (currently **7** methods) on the data type `string` that contain words.
* The class `FlorianWolters\Component\Core\CharUtils` offers operations (currently **18** methods) on characters.
* The class `FlorianWolters\Component\Core\RandomStringUtils` offers operations (currently **7** methods) for random `string`s.
* Artifacts tested with both static and dynamic test procedures:
    * Dynamic component tests (unit tests) implemented using [PHPUnit][19].
    * Static code analysis performed using the following tools:
        * [PHP_CodeSniffer][14]: Style Checker
        * [PHP Mess Detector (PHPMD)][18]: Code Analyzer
        * [phpcpd][4]: Copy/Paste Detector (CPD)
        * [phpdcd][5]: Dead Code Detector (DCD)
* Installable via [Composer][3] or the [PEAR command line installer][11]:
    * Provides a [Packagist][25] package which can be installed using the dependency manager [Composer][3].

      Click [here][24] for the package on [Packagist][25].
    * Provides a [PEAR package][13] which can be installed using the package manager [PEAR installer][11].

      Click [here][9] for the [PEAR channel][12].
* Provides a complete Application Programming Interface (API) documentation generated with the documentation generator [ApiGen][2].

  Click [here][1] for the current API documentation.
* Follows the [PSR-0][6] requirements for autoloader interoperability.
* Follows the [PSR-1][7] basic coding style guide.
* Follows the [PSR-2][8] coding style guide.
* Follows the [Semantic Versioning][20] Specification (SemVer) 2.0.0-rc.1.

## Requirements

* [PHP][17] >= 5.3.0

## Installation

### Local Installation

**FlorianWolters\Component\Core\StringUtils** should be installed using the dependency manager [Composer][3]. [Composer][3] can be installed with [PHP][6].

    php -r "eval('?>'.file_get_contents('http://getcomposer.org/installer'));"

> This will just check a few [PHP][17] settings and then download `composer.phar` to your working directory. This file is the [Composer][3] binary. It is a PHAR ([PHP][17] archive), which is an archive format for [PHP][17] which can be run on the command line, amongst other things.
>
> Next, run the `install` command to resolve and download dependencies:

    php composer.phar install

### System-Wide Installation

**FlorianWolters\Component\Core\StringUtils** should be installed using the [PEAR installer][11]. This installer is the [PHP][17] community's de-facto standard for installing [PHP][17] components.

    pear channel-discover pear.florianwolters.de
    pear install --alldeps fw/StringUtils

## As A Dependency On Your Component

### Composer

If you are creating a component that relies on **FlorianWolters\Component\Core\StringUtils**, please make sure that you add **FlorianWolters\Component\Core\StringUtils** to your component's `composer.json` file:

```json
{
    "require": {
        "florianwolters/component-core-stringutils": "0.1.*"
    }
}
```

### PEAR

If you are creating a component that relies on **FlorianWolters\Component\Core\StringUtils**, please make sure that you add **FlorianWolters\Component\Core\StringUtils** to your component's `package.xml` file:

```xml
<dependencies>
  <required>
    <package>
      <name>StringUtils</name>
      <channel>pear.florianwolters.de</channel>
      <min>0.1.0</min>
      <max>0.1.99</max>
    </package>
  </required>
</dependencies>
```

## Usage

The best documentation for **FlorianWolters\Component\Core\StringUtils** are the unit tests, which are shipped in the package. You will find them installed into your [PEAR][10] repository, which on Linux systems is normally `/usr/share/php/test`.

### Examples

**FlorianWolters\Component\Core\StringUtils** only contains static classes. Therefore instances of the classes can **NOT** be constructed.

Instead, the classes should be used as:
```php
StringUtils::trim(' foo ');
WordUtils::wrap('foo bar', 20);
```

## Development Environment

If you want to patch or enhance this component, you will need to create a suitable development environment. The easiest way to do that is to install [phix4componentdev][16]:

    # phix4componentdev
    pear channel-discover pear.phix-project.org
    pear install phix/phix4componentdev

You can then clone the Git repository:

    # PHP-Component-Core-StringUtils
    git clone http://github.com/FlorianWolters/PHP-Component-Core-StringUtils

Then, install a local copy of this component's dependencies to complete the development environment:

    # build vendor/ folder
    phing build-vendor

To make life easier for you, common tasks (such as running unit tests, generating code review analytics, and creating the [PEAR package][13]) have been automated using [phing][15]. You'll find the automated steps inside the `build.xml` file that ships with the component.

Run the command `phing` in the component's top-level folder to see the full list of available automated tasks.

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along with this program. If not, see <http://gnu.org/licenses/lgpl.txt>.

[1]: http://blog.florianwolters.de/PHP-Component-Core-StringUtils
     "FlorianWolters\Component\Core | Application Programming Interface (API) documentation"
[2]: http://apigen.org
     "ApiGen | API documentation generator for PHP 5.3.+"
[3]: http://getcomposer.org
     "Composer"
[4]: https://github.com/sebastianbergmann/phpcpd
     "sebastianbergmann/phpcpd · GitHub"
[5]: https://github.com/sebastianbergmann/phpdcd
     "sebastianbergmann/phpdcd · GitHub"
[6]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
     "PSR-0 requirements for autoloader interoperability"
[7]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
     "PSR-1 basic coding style guide"
[8]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
     "PSR-2 coding style guide"
[9]: http://pear.florianwolters.de
     "PEAR channel of Florian Wolters"
[10]: http://pear.php.net
      "PEAR - PHP Extension and Application Repository"
[11]: http://pear.php.net/manual/en/guide.users.commandline.cli.php
      "Manual :: Command line installer (PEAR)"
[12]: http://pear.php.net/manual/en/guide.users.concepts.channel.php
      "Manual :: PEAR Channels"
[13]: http://pear.php.net/manual/en/guide.users.concepts.package.php
      "Manual :: PEAR Packages"
[14]: http://pear.php.net/package/PHP_CodeSniffer
      "PHP_CodeSniffer"
[15]: http://phing.info
      "Phing"
[16]: https://github.com/stuartherbert/phix4componentdev
      "stuartherbert/phix4componentdev · GitHub"
[17]: http://php.net
      "PHP: Hypertext Preprocessor"
[18]: http://phpmd.org
      "PHPMD - PHP Mess Detector"
[19]: http://phpunit.de
      "sebastianbergmann/phpunit · GitHub"
[20]: http://semver.org
      "Semantic Versioning"
[24]: http://packagist.org/packages/florianwolters/component-core-stringutils
      "florianwolters/component-core-stringutils - Packagist"
[25]: http://packagist.org
      "Packagist"
[26]: http://php.net/ref.strings
      "PHP: String Functions"
[27]: http://commons.apache.org/lang
      "Commons Lang"
[28]: http://commons.apache.org/lang/api/org/apache/commons/lang3/StringUtils.html
      "StringUtils (Commons Lang 3 API)"
[29]: http://commons.apache.org/lang/api/org/apache/commons/lang3/text/WordUtils.html
      "WordUtils (Commons Lang 3 API)"
[30]: http://commons.apache.org/lang/api/org/apache/commons/lang3/text/CharUtils.html
      "CharUtils (Commons Lang 3 API)"
[31]: http://commons.apache.org/lang/api/org/apache/commons/lang3/text/RandomStringUtils.html
      "RandomStringUtils (Commons Lang 3 API)"
