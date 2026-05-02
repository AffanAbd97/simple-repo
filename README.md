# Laravel RepoKit

![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![Laravel](https://img.shields.io/badge/Laravel-10%2B-red)
![License](https://img.shields.io/badge/license-MIT-green)

A lightweight Laravel package that generates Repository and Interface scaffolding to enforce clean architecture and reduce boilerplate in backend applications.

---

## Why?

In many Laravel projects, business logic and data access are tightly coupled, making the code harder to maintain, scale, and test.

Laravel RepoKit helps you:
- Separate concerns using the Repository Pattern
- Maintain a clean and scalable architecture
- Reduce repetitive boilerplate code
- Speed up development with automated scaffolding

---

## Requirements

- PHP ^8.1
- Laravel 10.x, 11.x, or 12.x

---

## Installation

Install the package via Composer:

```bash
composer require sazl/laravel-repokit
```

The service provider will be auto-discovered by Laravel.

---

## Usage

### Basic Usage (Query Builder)

Generate a repository using Query Builder:

```bash
php artisan make:repository User
```

This creates:
- `app/Repositories/Contracts/UserRepositoryInterface.php`
- `app/Repositories/Databases/UserRepository.php`

---

### With Eloquent Model

Generate a repository using an Eloquent model:

```bash
php artisan make:repository User --model=User
```

This creates the same files but uses Eloquent model injection instead of Query Builder.

---

### Auto-Binding

The command automatically registers interface-to-implementation binding inside your `AppServiceProvider::register()` method.

---

## Example Output

After running:

```bash
php artisan make:repository User --model=User
```

### Interface

```php
interface UserRepositoryInterface
{
    public function find(int $id);
    public function all();
}
```

### Implementation

```php
class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $model) {}

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
```

---

## Use Case

This package is ideal for:
- Medium to large-scale Laravel applications
- Teams enforcing clean architecture practices
- Developers who want consistent repository structure
- Projects requiring better separation of concerns

---

## Background

This package is inspired by real-world backend development, where maintaining a clear separation between business logic and data access is essential for long-term scalability and maintainability.

---

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

This package uses Orchestra Testbench:

```bash
./vendor/bin/phpunit
```

---

### 4. Test in a Laravel Project (Local Development)

Add this package as a local repository in your Laravel project's `composer.json`.

#### Example (relative path)

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

Then run:

```bash
composer update sazl/laravel-repokit
```

---

## Generated Files Structure

```
app/
└── Repositories/
    ├── Contracts/
    │   └── {Name}RepositoryInterface.php
    └── Databases/
        └── {Name}Repository.php
```

---

## License

MIT
