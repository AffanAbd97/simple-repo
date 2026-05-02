# Laravel Repository Generator

This package provides an Artisan command to generate a Repository and Interface for Laravel projects, implementing the Repository Pattern.

## Requirements

- PHP ^8.1
- Laravel 10.x, 11.x, or 12.x

## Installation

Install the package via Composer:

```bash
composer require sazl/laravel-repokit
```

The service provider will be auto-discovered by Laravel.

## Usage

### Basic Usage (Query Builder)

Generate a repository using Query Builder:

```bash
php artisan make:repository User
```

This creates:
- `app/Repositories/Contracts/UserRepositoryInterface.php`
- `app/Repositories/Databases/UserRepository.php`

### With Eloquent Model

Generate a repository using an Eloquent model:

```bash
php artisan make:repository User --model=User
```

This creates the same files but the repository implementation uses Eloquent model injection instead of Query Builder.

### Auto-Binding

The command automatically adds the interface-to-implementation binding in your `AppServiceProvider::register()` method.

## Clone and Test Locally

### 1. Clone the Repository

```bash
git clone https://github.com/sazl/laravel-repokit.git
cd laravel-repokit
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Run Tests

This package uses Orchestra Testbench for testing:

```bash
./vendor/bin/phpunit
```

### 4. Test in a Laravel Project (Local Development)

To test this package in a local Laravel project, add the repository to your Laravel project's `composer.json`.

The `url` path can be:
- **Relative path** - relative to your Laravel project's root directory
- **Absolute path** - full path from disk drive

**Example with relative path:**

```
Your folder structure:
D:\Projects\
├── my-laravel-app\      <-- Your Laravel project
│   └── composer.json
└── laravel-repokit\     <-- This package
```

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-repokit"
        }
    ],
    "require": {
        "sazl/laravel-repokit": "*"
    }
}
```

**Example with absolute path:**

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "D:/Projects/laravel-repokit"
        }
    ],
    "require": {
        "sazl/laravel-repokit": "*"
    }
}
```

> **Note:** On Windows, use forward slashes (`/`) or escaped backslashes (`\\`) in the path.

Then run:

```bash
composer update sazl/laravel-repokit
```

Now you can use the `make:repository` command in your Laravel project.

## Generated Files Structure

```
app/
└── Repositories/
    ├── Contracts/
    │   └── {Name}RepositoryInterface.php
    └── Databases/
        └── {Name}Repository.php
```

## License

MIT
