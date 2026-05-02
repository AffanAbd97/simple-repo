# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Laravel Repokit (`sazl/laravel-repokit`) is a Composer package that provides an Artisan command for generating Repository Pattern classes in Laravel applications.

## Commands

```bash
# Install dependencies
composer install

# Run tests (uses Orchestra Testbench)
./vendor/bin/phpunit

# In a Laravel project using this package:
php artisan make:repository {Name}              # Creates repository with Query Builder
php artisan make:repository {Name} --model=User # Creates repository with Eloquent model
```

## Architecture

**Package Structure:**
- `src/RepositoryProvider.php` - Service provider that registers the Artisan command and publishes config/stubs
- `src/Commands/MakeRepositoryCommand.php` - Main generator command
- `stubs/` - Template files for generated code:
  - `repository.contract.stub` - Interface template
  - `repository.stub` - Query Builder implementation
  - `repository.model.stub` - Eloquent model implementation
- `config/repository.php` - Package configuration (currently empty, reserved for future options)

**Generated Files Structure (in Laravel projects):**
- `app/Repositories/Contracts/{Name}RepositoryInterface.php`
- `app/Repositories/Databases/{Name}Repository.php`
- Auto-binding added to `AppServiceProvider::register()`

**Two Repository Modes:**
1. Without `--model`: Uses Query Builder (`DB::connection()->table()`)
2. With `--model`: Uses Eloquent model injection

## Requirements

- PHP ^8.1
- Laravel 10.x, 11.x, or 12.x
