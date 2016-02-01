# Laravel 5 Shared Category Package

This package manages categories in a shared table

## Requirements
This package currently requires Laravel >= 5.0

## Installation
require by packagist

composer require JLeonardoLemos/categories

```js
  composer require JLeonardoLemos/categories
```
Add service provider on array in app.php

```php
  'JLeonardoLemos\Categories\Providers\CategoriesServiceProvider',
```
Or

```php
  JLeonardoLemos\Categories\Providers\CategoriesServiceProvider::class,
```

Configure your model

```php
  use JLeonardoLemos\Categories\CategoryableContract;
  use JLeonardoLemos\Categories\CategoryableTrait;
```
```php
  class ModelName extends Model implements CategoryableContract
  {

  use CategoryableTrait;
```
On views

```php
  {!! Category::select('Categoria', 'group_slug') !!}
```
Obs: use group slug to bring only a specific category group

publish migrations

```js
  php artisan vendor:publish
```
run migrations

```js
  php artisan migrate
```
## How to use

Seed your categories table, you can to use any Eloquent method to handle this categories

```php
  	Category::create([
        'name' => 'category 1'
        , 'group_slug' => 'group 1'
        , 'description' => ''
    ]);

  	Category::create([
        'name' => 'category 2'
        , 'group_slug' => 'group 1'
        , 'description' => ''
    ]);    
```
Obs: The categories are grouped by group_slug

You must to create the relationship with category table only once

```php
	$model->categoriesSet()->create([
		'category_id' => 1
    ]);
```
If the relationship is created, you can update it

```php
	$categoriesSet = $new->categoriesSet()->first();
	$categoriesSet->category_id = 4;
	$categoriesSet->save();
```

Access the category 

```php
	$model->category
```

## Recursive

The category model has a category_id attribute, this is the parent category id

To access the parent of a given model

```php
	Category::first()->daddy
```
To access the children

```php
	Category::first()->dearChildren
```