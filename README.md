# FlorianWolters\Component\Core\StringUtils

**FlorianWolters\Component\Core\StringUtils** is a simple-to-use [PHP][17] component that provides operations on the data type `string`.

[![Build Status](https://travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils.svg?branch=master)](https://travis-ci.org/FlorianWolters/PHP-Component-Core-StringUtils)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/badges/quality-score.png?s=0744ad1bafd52212a1611a009fba51c30e43269f)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/)
[![Code Coverage](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/badges/coverage.png?s=994c9213d82eeadd3ecd8516a87d30cd95e07771)](https://scrutinizer-ci.com/g/FlorianWolters/PHP-Component-Core-StringUtils/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/2f306db2-c7a1-4146-998d-c92ceec7514e/mini.png)](https://insight.sensiolabs.com/projects/2f306db2-c7a1-4146-998d-c92ceec7514e)
[![Coverage Status](https://coveralls.io/repos/FlorianWolters/PHP-Component-Core-StringUtils/badge.png)](https://coveralls.io/r/FlorianWolters/PHP-Component-Core-StringUtils)

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
  * [Local Installation](#local-installation)
  * [System-Wide Installation](#system-wide-installation)
* [As A Dependency On Your Component](#as-a-dependency-on-your-component)
  * [Composer](#composer)
  * [PEAR](#pear)
* [Development Environment](#development-environment)
* [Contributing](#contributing)
* [Credits](#credits)
* [License](#license)

## Introduction

The [string functions][28] of the [PHP][17] scripting language are not consistent:

* Some function names begin with `str`, e. g. `strpos`.
* Some function names begin with `str_`, e. g. `str_rot13`.
* Some function names **do not** begin with `str`, e. g. `trim` and `substr`.

Quite a lot of the built-in string functions are only *Wrapper Functions* for the string functions of the underlying C programming language. Therefore a lot of useful string functions are not included in the [PHP][17] standard library.

**FlorianWolters\Component\Core\StringUtils** offers static classes that offer operations on the data type `string`. The goal of this project is to create an unified and simplified Application Programming Interface (API) for string functions to use in the [PHP][17] scripting language.

This project is inspired by the following Java classes from the [Apache Commons Lang Application Programming Interface (API)][29]:

* [StringUtils][30]
* [WordUtils][31]
* [CharUtils][32]
* [RandomStringUtils][33]

The implementation has been adapted and abstracted for [PHP][17].

## Features

* The class `FlorianWolters\Component\Core\StringUtils` offers operations (currently **39** methods) on the data type `string`.
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
        * Click [here][24] for the package on [Packagist][25].
    * Provides a [PEAR package][13] which can be installed using the package manager [PEAR installer][11].
        * Click [here][9] for the [PEAR channel][12].
* Provides a complete Application Programming Interface (API) documentation generated with the documentation generator [phpDocumentor][2].
    * Click [here][1] for the current API documentation.
* Follows the following "standards" from the [PHP Framework Interoperability Group (FIG)][27]. PSR stands for PHP Standards Recommendation:
    * [PSR-0][6]: Autoloading Standards

        > Aims to provide a standard file, class and namespace convention to allow plug-and-play code.
    * [PSR-1][7]: Basic Coding Standard

        > Aims to ensure a high level of technical interoperability between shared PHP code.
    * [PSR-2][8]: Coding Style Guide

        > Provides a Coding Style Guide for projects looking to standardize their code.
    * [PSR-4][26]: Autoloader

        > A more modern take on autoloading reflecting advances in the ecosystem.
* Follows the [Semantic Versioning][20] Specification (SemVer) 2.0.0.

## Requirements

### Production

* [PHP][17] >= 5.3.3
* [Composer][3]

### Development

* [PHPUnit][19] >= 4.1

## Usage

The best documentation for **FlorianWolters\Component\Core\StringUtils** are the unit tests, which are shipped in the package. You will find them installed into your [PEAR][10] repository, which on Linux systems is normally `/usr/share/php/test`.

### Examples

**FlorianWolters\Component\Core\StringUtils** contains static classes only. Therefore instances of the classes can **NOT** be constructed.

Instead, the classes should be used as:
```php
StringUtils::trim(' foo ');
WordUtils::wrap('foo bar', 20);
```

## Installation

### Local Installation using [Composer][3]

**FlorianWolters\Component\Core\StringUtils** should be installed using the dependency manager [Composer][3].

> [Composer][3] is a tool for dependency management in [PHP][17]. It allows you to declare the dependent libraries your project needs and it will install them in your project for you.

The [Composer][3] installer can be downloaded with `php`.

    php -r "readfile('https://getcomposer.org/installer');" | php

> This will just check a few [PHP][17] settings and then download `composer.phar` to your working directory. This file is the [Composer][3] binary. It is a PHAR ([PHP][17] archive), which is an archive format for [PHP][17] which can be run on the command line, amongst other things.

> To resolve and download dependencies, run the `install` command:

    php composer.phar install

### System-Wide Installation using [PEAR][10]

**FlorianWolters\Component\Core\StringUtils** can be installed using the [PEAR installer][11].

    pear channel-discover pear.florianwolters.de
    pear install --alldeps fw/StringUtils

## As A Dependency On Your Component

### Composer

If you are creating a component that relies on **FlorianWolters\Component\Core\StringUtils**, please make sure that you add **FlorianWolters\Component\Core\StringUtils** to your component's `composer.json` file:

```json
{
    "require": {
        "florianwolters/component-core-stringutils": "0.4.*"
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
      <min>0.4.0</min>
      <max>0.4.99</max>
    </package>
  </required>
</dependencies>
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

## Contributing

See [`CONTRIBUTING.md`](CONTRIBUTING.md).

## Credits

* [Florian Wolters](https://github.com/FlorianWolters)
* [All Contributors](https://github.com/FlorianWolters/PHP-Component-Util-Command/contributors)

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along with this program. If not, see <http://gnu.org/licenses/lgpl.txt>.

[1]: http://blog.florianwolters.de/PHP-Component-Core-StringUtils
     "Application Programming Interface (API) documentation"
[2]: http://phpdoc.org
     "phpDocumentor 2"
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
[26]: http://php-fig.org/psr/psr-4
      "PSR-4: Improved Autoloading"
[27]: http://php-fig.org
      "PHP-FIG — PHP Framework Interop Group"
[28]: http://php.net/ref.strings
      "PHP: String Functions"
[29]: http://commons.apache.org/lang
      "Commons Lang"
[30]: http://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/StringUtils.html
      "StringUtils (Commons Lang 3 API)"
[31]: http://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/text/WordUtils.html
      "WordUtils (Commons Lang 3 API)"
[32]: http://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/CharUtils.html
      "CharUtils (Commons Lang 3 API)"
[33]: http://commons.apache.org/proper/commons-lang/apidocs/org/apache/commons/lang3/RandomStringUtils.html
      "RandomStringUtils (Commons Lang 3 API)"
