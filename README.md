# Laravel Dashboard

[![Lint PR](https://github.com/achyutkneupane/Laravel-Dashboard/actions/workflows/prlint.yml/badge.svg)](https://github.com/achyutkneupane/Laravel-Dashboard/actions/workflows/prlint.yml)
[![Bump version](https://github.com/achyutkneupane/Laravel-Dashboard/actions/workflows/tagrelease.yml/badge.svg)](https://github.com/achyutkneupane/Laravel-Dashboard/actions/workflows/tagrelease.yml)
[![Latest Stable Version](http://poser.pugx.org/achyutn/laravel-dashboard/v)](https://packagist.org/packages/achyutn/laravel-dashboard)
[![Total Downloads](http://poser.pugx.org/achyutn/laravel-dashboard/downloads)](https://packagist.org/packages/achyutn/laravel-dashboard)
[![Dependents](http://poser.pugx.org/achyutn/laravel-dashboard/dependents)](https://packagist.org/packages/achyutn/laravel-dashboard)

This package is used to create a dashboard for your Laravel application. It is highly customizable and easy to use.

## Installation

You can install the package via composer:

```bash
composer require achyutn/laravel-dashboard
```

You can publish the views and config file with:

```bash
php artisan vendor:publish --provider="AchyutN\Dashboard\DashboardServiceProvider"
```

Install `sass` and `bootstrap` to your project:

```bash
npm install sass bootstrap
```

## Usage

You can simply customize the dashboard by editing the `config/dashboard.php` file.