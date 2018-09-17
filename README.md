# Drupal Standards Composer Commands
[![Latest Stable Version](https://poser.pugx.org/nickwilde1990/drupal-standards-composer-commands/version)](https://packagist.org/packages/nickwilde1990/drupal-standards-composer-commands)
[![Total Downloads](https://poser.pugx.org/nickwilde1990/drupal-standards-composer-commands/downloads)](https://packagist.org/packages/nickwilde1990/drupal-standards-composer-commands)
[![Latest Unstable Version](https://poser.pugx.org/nickwilde1990/drupal-standards-composer-commands/v/unstable)](https://packagist.org/packages/nickwilde1990/drupal-standards-composer-commands)
[![License](https://poser.pugx.org/nickwilde1990/drupal-standards-composer-commands/license)](https://packagist.org/packages/nickwilde1990/drupal-standards-composer-commands)


## Table Of Contents

* [Introduction](#introduction)
* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Configuration](#configuration)
* [Contributing](#contributing)
* [Licence](#license)

## Introduction

Provides composer commands to check your project according to Drupal Standards.
Sets up all the requirements for basic standards checks. If you have them, this
will use `phpcs.xml` and similar to use your customized standards.

## Installation
Install through [Composer](https://getcomposer.io). Due to the status of some of
the dependencies, you will need to have `"minimum-stability": "dev"` in your
composer config. When using that, in most cases, it is recommended to also use
`"prefer-stable": true`.

```bash
composer require --dev nickwilde1990/drupal-standards-composer-commands
```

## Usage
Run

```bash
composer commandname/alias
```

**Note:** Unless/Until [this pull request
](https://github.com/composer/composer/pull/7648) lands in composer, you will
need to run any command provided by this in your project root (same location as
your `composer.json`).

### Available Commands
* `drupal-eslint`: Runs Eslint on your code (checks JS standards). Will
  use default Drupal 8 standards if you do not have a `.eslintrc.json`.
* `drupal-eslint-fix`: Runs Eslint fix mode on your code (automatically
  fix JS standards compliance issues). Will use default Drupal 8 standards if
  you do not have a `.eslintrc.json`.
* `drupal-phpcs`: Runs PHPCS on your code (checks PHP standards). Will use
  standard Drupal 8 mode if you do not have a `phpcs.xml` or `phpcs.xml.dist`.
* `drupal-phpcbf`: Runs PHPCBF on your code (automatically fixes many PHP
  standards issues). Will use standard Drupal 8 mode if you do not have a
  `phpcs.xml` or `phpcs.xml.dist`.
* `drupal-stylelint`: Runs Stylelint on your code (checks CSS standards). Will
  use default Drupal 8 standards if you do not have a `.stylelintrc.json`.
* `drupal-stylelint-fix`: Runs Stylelint fix mode on your code (automatically
  fix CSS standards compliance issues). Will use default Drupal 8 standards if
  you do not have a `.stylelintrc.json`.

## Known issues

[See open bug reports in the issue queue.](https://github.com/NickWilde1990/drupal-standards-composer-commands/issues)

## Contribution

Contributions are welcome!

## License

Copyright (C) 2018 Nick Wilde.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>
