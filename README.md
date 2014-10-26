# Component\Core\StringUtils

**Component\Core\StringUtils** is a simple-to-use [PHP][1] component that
provides operations on the data type `string`.

[![Build Status](https://travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils.svg)](https://travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/badges/quality-score.png?s=0744ad1bafd52212a1611a009fba51c30e43269f)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/)
[![Code Coverage](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/badges/coverage.png?s=994c9213d82eeadd3ecd8516a87d30cd95e07771)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/2f306db2-c7a1-4146-998d-c92ceec7514e/mini.png)](https://insight.sensiolabs.com/projects/2f306db2-c7a1-4146-998d-c92ceec7514e)
[![Coverage Status](https://coveralls.io/repos/FlorianWolters/PHP-Component-Core-StringUtils/badge.png?branch=master)](https://coveralls.io/r/FlorianWolters/PHP-Component-Core-StringUtils?branch=master)

[![Latest Stable Version](https://poser.pugx.org/florianwolters/component-core-stringutils/v/stable.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)
[![Total Downloads](https://poser.pugx.org/florianwolters/component-core-stringutils/downloads.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)
[![Monthly Downloads](https://poser.pugx.org/florianwolters/component-core-stringutils/d/monthly.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)
[![Daily Downloads](https://poser.pugx.org/florianwolters/component-core-stringutils/d/daily.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)
[![Latest Unstable Version](https://poser.pugx.org/florianwolters/component-core-stringutils/v/unstable.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)
[![License](https://poser.pugx.org/florianwolters/component-core-stringutils/license.png)](https://packagist.org/packages/florianwolters/component-core-stringutils)

[![Stories in Ready](https://badge.waffle.io/florianwolters/php-component-core-stringutils.png?label=ready&title=Ready)](https://waffle.io/florianwolters/php-component-core-stringutils)
[![Dependency Status](https://www.versioneye.com/user/projects/51c33104007fcd000200043c/badge.png)](https://www.versioneye.com/user/projects/51c33104007fcd000200043c)
[![Dependencies Status](https://depending.in/FlorianWolters/PHP-Component-Core-StringUtils.png)](http://depending.in/FlorianWolters/PHP-Component-Core-StringUtils)
[![HHVM Status](http://hhvm.h4cc.de/badge/florianwolters/component-core-stringutils.png)](http://hhvm.h4cc.de/package/florianwolters/component-core-stringutils)

## Table of Contents (ToC)

* [Introduction](#introduction)
* [Features](#features)
* [Requirements](#requirements)
* [Usage](#usage)
* [Installation](#installation)
* [Testing](#testing)
* [Contributing](#contributing)
* [Credits](#credits)
* [License](#license)

## Introduction

## Introduction

The [string functions][100] of the [PHP][1] scripting language are not
consistent:

* Some function names begin with `str`, e. g. `strpos`.
* Some function names begin with `str_`, e. g. `str_rot13`.
* Some function names **do not** begin with `str`, e. g. `trim` and `substr`.

Quite a lot of the built-in string functions are only *Wrapper Functions* for
the string functions of the underlying C programming language. Therefore a lot
of useful string functions are not included in the [PHP][1] standard library.

**FlorianWolters\Component\Core\StringUtils** offers static classes that offer
operations on the data type `string`. The goal of this project is to create an
unified and simplified Application Programming Interface (API) for string
functions to use in the [PHP][1] scripting language.

This project is inspired by the following Java classes from the [Apache Commons
Lang Application Programming Interface (API)][101]:

* [StringUtils][102]
* [WordUtils][104]
* [CharUtils][104]
* [RandomStringUtils][105]

The implementation has been adapted and abstracted for [PHP][1].

## Features

* The class `StringUtils` offers operations (currently **39** methods) on the
  data type `string`.
* The class `WordUtils` offers operations (currently **7** methods) on the data
  type `string` that contain words.
* The class `CharUtils` offers operations (currently **18** methods) on
  characters.
* The class `RandomStringUtils` offers operations (currently **7** methods) for
  random `string`s.
* Artifacts tested with both static and dynamic test procedures:
    * Dynamic component tests (unit and integration tests) implemented with
      [PHPUnit][41].
    * Static code analysis performed using the following tools:
        * [PHP_CodeSniffer][40]: Style Checker
        * [PHP Mess Detector (PHPMD)][44]: Code Analyzer
        * [PHP Depend][45]: Code Metrics
        * [phpcpd][42]: Copy/Paste Detector (CPD)
        * [phpdcd][43]: Dead Code Detector (DCD)
        * [SensioLabs Security Checker][47]: Security Checker
    * Continuous Integration (CI) using the following web services:
        * [Scrutinizer CI][21]
        * [SensioLabsInsight][22]
        * [Coveralls][23]
        * [VersionEye][24]
        * [Depending][25]
        * [Waffle][26]
* Provides a [Packagist][3] package which can be installed using the dependency
  manager [Composer][2]. Click [here][51] for the package on [Packagist][3].
* Provides a complete Application Programming Interface (API) documentation
  generated with the documentation generator [Sami][46]. Click
  [here][52] for the API documentation.
* Follows the following "standards" from the [PHP Framework Interoperability
  Group (FIG)][10]. PSR stands for PHP Standards Recommendation:
    * [PSR-0][11]: Autoloading Standards

        > Aims to provide a standard file, class and namespace convention to
        > allow plug-and-play code.
    * [PSR-1][12]: Basic Coding Standard

        > Aims to ensure a high level of technical interoperability between
        > shared PHP code.
    * [PSR-2][13]: Coding Style Guide

        > Provides a Coding Style Guide for projects looking to standardize
        > their code.
    * [PSR-4][14]: Autoloader

        > A more modern take on autoloading reflecting advances in the
        > ecosystem.
* Follows the [Semantic Versioning][4] (SemVer) specification version 2.0.0.

## Requirements

### Production

* [PHP][1] >= 5.3.3
* [Composer][2]

### Development

* [PHPUnit][41]
* [phpcpd][42]
* [phpdcd][43]
* [PHP_CodeSniffer][40]
* [PHP Mess Detector (PHPMD)][44]
* [Sami][46]
* [SensioLabs Security Checker][47]
* [php-coveralls][48]

## Installation

**Component\Util\Singleton** should be installed using the dependency manager
[Composer][2].

> [Composer][2] is a tool for dependency management in [PHP][1]. It allows you
> to declare the dependent libraries your project needs and it will install them
> in your project for you.

The [Composer][2] installer can be downloaded with `php`.

    php -r "readfile('https://getcomposer.org/installer');" | php

> This will just check a few [PHP][1] settings and then download `composer.phar`
> to your working directory. This file is the [Composer][2] binary. It is a PHAR
> ([PHP][1] archive), which is an archive format for [PHP][1] which can be run
> on the command line, amongst other things.

> To resolve and download dependencies, run the `install` command:

    php composer.phar install

If you are creating a component that relies on **Component\Util\Singleton**,
please make sure that you add **Component\Util\Singleton** to your component's
`composer.json` file:

```json
{
    "require": {
        "florianwolters/component-core-stringutils": "0.3.*"
    }
}
```

## Usage

The best documentation for **Component\Core\StringUtils** are the unit tests,
which are shipped in the package.

**Component\Core\StringUtils** contains *static classes* only. Therefore
instances of the classes can **not** be constructed.

Instead, the classes should be used as:
```php
StringUtils::trim(' foo ');
WordUtils::wrap('foo bar', 20);
```

## Testing

    phpunit

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

* [Florian Wolters][9]
* [All Contributors][50]

## License

This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Lesser General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along
with this program. If not, see <https://gnu.org/licenses/lgpl.txt>.

[1]: https://php.net
     "PHP: Hypertext Preprocessor"
[2]: https://getcomposer.org
     "Composer"
[3]: https://packagist.org
     "Packagist"
[4]: http://semver.org
     "Semantic Versioning"
[9]: https://github.com/FlorianWolters
     "FlorianWolters · GitHub"
[10]: http://php-fig.org
      "PHP-FIG — PHP Framework Interop Group"
[11]: http://php-fig.org/psr/psr-0
      "PSR-0 requirements for autoloader interoperability"
[12]: http://php-fig.org/psr/psr-1
      "PSR-1 basic coding style guide"
[13]: http://php-fig.org/psr/psr-2
      "PSR-2 coding style guide"
[14]: http://php-fig.org/psr/psr-4
      "PSR-4: Improved Autoloading"
[20]: https://travis-ci.org
      "Travis CI"
[21]: https://scrutinizer-ci.com
      "Scrutinizer CI"
[22]: https://insight.sensiolabs.com
      "SensioLabsInsight"
[23]: https://coveralls.io
      "Coveralls"
[24]: https://versioneye.com
      "VersionEye"
[25]: https://depending.in
      "Depending"
[26]: https://waffle.io
      "Waffle"
[27]: http://hhvm.h4cc.de
      "HHVM Support in PHP Projects"
[40]: https://pear.php.net/package/PHP_CodeSniffer
      "PHP_CodeSniffer"
[41]: https://phpunit.de
      "PHPUnit"
[42]: https://github.com/sebastianbergmann/phpcpd
      "sebastianbergmann/phpcpd · GitHub"
[43]: https://github.com/sebastianbergmann/phpdcd
      "sebastianbergmann/phpdcd · GitHub"
[44]: http://phpmd.org
      "PHPMD - PHP Mess Detector"
[45]: http://pdepend.org
      "PHP Depend - Software Metrics for PHP"
[46]: https://github.com/fabpot/sami
      "fabpot/sami · GitHub"
[47]: https://github.com/sensiolabs/security-checker
      "SensioLabs Security Checker"
[48]: https://github.com/satooshi/php-coveralls
      "satooshi/php-coveralls · GitHub"
[50]: https://github.com/FlorianWolters/PHP-Component-Core-StringUtils/contributors
      "Contributors to FlorianWolters/PHP-Component-Core-StringUtils"
[51]: https://packagist.org/packages/florianwolters/component-core-stringutils
      "florianwolters/component-core-stringutils - Packagist"
[52]: http://blog.florianwolters.de/PHP-Component-Core-StringUtils
      "Application Programming Interface (API) documentation"
[100]: https://php.net/ref.strings
       "PHP: String Functions"
[101]: https://commons.apache.org/lang
       "Commons Lang"
[102]: https://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/StringUtils.html
       "StringUtils (Commons Lang 3 API)"
[103]: https://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/text/WordUtils.html
       "WordUtils (Commons Lang 3 API)"
[104]: http://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/CharUtils.html
       "CharUtils (Commons Lang 3 API)"
[105]: https://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/RandomStringUtils.html
       "RandomStringUtils (Commons Lang 3 API)"
