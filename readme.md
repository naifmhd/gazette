# Gazette

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/naifmhd/gazette/run-tests?label=tests)](https://github.com/naifmhd/gazette/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![StyleCI](https://github.styleci.io/repos/324795896/shield?branch=master)](https://github.styleci.io/repos/324795896)

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

```bash
$ composer require naifmhd/gazette
```

## Setting up the BML Connect credentials

Add your Gazette API Key and CLIENT ID and CLIENT SECRET to your config/services.php. You can refer to how to get the API Keys from the (Official Gazette API Documentation)[https://api.gazette.gov.mv/].

```php
// config/services.php
...
'gazette' => [
        'grant_type' => env('GAZETTE_GRANT_TYPE', 'client_credentials'),
        'client_id' => env('GAZETTE_CLIENT_ID'),
        'client_secret' => env('GAZETTE_CLIENT_SECRET'),
    ],
...
```

## Usage

```php
use Gazette;

$response = Gazette::iulaans();
```

## Available Methods

```php
Gazette::iulaans(int $page = null);
Gazette::iulaan(int $id);
Gazette::iulaanByType(IulaanType::VAZEEFA, int $page = null);
Gazette::vazeefaByType(VazeefaType::CONSTRUCTION, int $page = null);
Gazette::unpublished();
```

### Iulaan Types

```php
IulaanType::MASAKKAIY;
IulaanType::GANNAN_BEYNUNVAA;
IulaanType::KUYYAH_DHINUN;
IulaanType::KUYYAH_HIFUN;
IulaanType::VAZEEFA;
IulaanType::THAMREENU;
IulaanType::NEELAN;
IulaanType::AANMU_MAULOOMAATHU;
IulaanType::DHENNEVUN;
IulaanType::MUBAARAAI;
IulaanType::NOOS_BAYAAN;
IulaanType::INSURANCE;
```

### Vazeefa Types

```php
VazeefaType::ADMINISTRATION;
VazeefaType::PUBLIC_RELATIONS;
VazeefaType::CONSTRUCTION;
VazeefaType::EDUCATION;
VazeefaType::FINANCE;
VazeefaType::HEALTH;
VazeefaType::HUMAN_RESOURCE;
VazeefaType::INFORMATION_TECHNOLOGY;
VazeefaType::INSURANCE;
VazeefaType::PUBLISHING_JOURNALISM;
VazeefaType::TRANSPORT;
VazeefaType::LEGAL;
VazeefaType::TECHNICAL;
VazeefaType::CUSTOMER_SERVICE;
VazeefaType::MAINTENANCE;
VazeefaType::SUPPORT_STAFF;
VazeefaType::MECHANICAL;
VazeefaType::MANAGEMENT;
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email naifmhd@gmail.com instead of using the issue tracker.

## Credits

- [Naif Mohamed][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/naifmhd/gazette.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/naifmhd/gazette.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/naifmhd/gazette/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield
[link-packagist]: https://packagist.org/packages/naifmhd/gazette
[link-downloads]: https://packagist.org/packages/naifmhd/gazette
[link-travis]: https://travis-ci.org/naifmhd/gazette
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/naifmhd
[link-contributors]: ../../contributors
