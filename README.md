[![Build Status](https://travis-ci.org/dc/FilterCollection.svg)](https://travis-ci.org/dc/FilterCollection)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dc/FilterCollection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dc/FilterCollection/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/DigitalCharacter/FilterCollection/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/DigitalCharacter/FilterCollection/?branch=master)
[![Packagist](https://img.shields.io/packagist/v/digitalcharacter/filter-collection.svg?style=flat-square)](https://packagist.org/packages/digitalcharacter/filter-collection)

# FilterCollection
Simple nested Filter Collection

# Composer Install
```bash
composer require dc/FilterCollection@stable
```

```json
{
    "require": {
        "dc/FilterCollection": "@stable"
    }
}
```

# Usage

## Change Logical Collection
```php
<?php
use dc\Filter\Collection;

$collection = new Collection(Collection::LOGICAL_AND);
$collection = new Collection(Collection::LOGICAL_OR);
$collection = new Collection(Collection::LOGICAL_XAND);
$collection = new Collection(Collection::LOGICAL_XOR);
```

## Add Parent Collection
```php
<?php
use dc\Filter\Collection;

$parent = new Collection();
$child = new Collection(Collection::LOGICAL_AND, $parent);
```

## Available Filter
```php
<?php
use dc\Filter\Collection;

$collection = new Collection();

//Equal
$collection->addEqual('key', 'value');

//Not Equal
$collection->addNotEqual('key', 'value');

//Exists
$collection->addExists('key', true);

//Greater Than
$collection->addGreaterThan('key', 1);

//Greater Than Equal
$collection->addGreaterThanEqual('key', 1);

//Lower Than
$collection->addLowerThan('key', 1);

//Lower Than Equal
$collection->addLowerThanEqual('key', 1);

//In 
$collection->addIn('key', [1,2,3]);

//Not In 
$collection->addNotIn('key', [1,2,3]);

//Query
$collection->addQuery('key', '%value%');

//Regex
$collection->addRegex('key', '/value/');

//Custom Filter
$collection->addCustomFilter('key', 'value', 'find_in_set');
```

## Example
```php
<?php 
use dc\Filter\Collection;

$collection = new Collection();
$collection->addEqual('user', 'user@example.com')
    ->addEqual('active', 1)
    ->addCollection(Collection::LOGICAL_OR)
        ->addEqual('role', 'admin')
        ->addEqual('role', 'superadmin')
        ->parent()
    ->addCollection(Collection::LOGICAL_XAND)
        ->addEqual('foo', 'bar');

```

