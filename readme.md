# Laravel Response

A lightweight Laravel package that provides a clean, consistent structure for API success and error responses.
Supports **Laravel 8 → 12** with auto-discovery.

---

<p align="center">
    <img src="https://img.shields.io/packagist/v/fadyreda99/laravel-response?style=for-the-badge">
    <img src="https://img.shields.io/packagist/dt/fadyreda99/laravel-response?style=for-the-badge">
    <img src="https://img.shields.io/badge/Laravel-8%20|%209%20|%2010%20|%2011%20|%2012-red?style=for-the-badge">
    <img src="https://img.shields.io/badge/license-MIT-green?style=for-the-badge">
</p>

---

## 🚀 Introduction

Every Laravel project needs a unified structure for API responses.
This package solves that by providing:

- `successResponse()` → Standard success JSON
- `errorResponse()` → Standard error JSON
- Optional `BaseController` → Automatically includes the trait
- Clean, readable, reusable responses across all your apps

---

## 📦 Installation

```bash
composer require fadyreda99/laravel-response
```

Laravel auto-discovers the package — **no configuration needed.**

---

## 🧩 Usage

### Import and use the trait:

```php
use Fadyreda99\LaravelResponse\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    ###basic example to return success response 
    public function successIndex()
    {
        return $this->successResponse(
            ['users' => User::all()],
            'Users fetched successfully'
        );
    }

    ###basic example to return error response 
    public function errorIndex()
    {
        return $this->errorResponse(
            'Invalid request',
            400
        );
    }
}
```

---

# 📘 Full Examples (Everything You Need)

---

## ✅ 1. Success Response

### 🔹 Basic Example

```php
return $this->successResponse(
    ['id' => 1, 'name' => 'Fady'],
    'User loaded successfully'
);
```

**Response JSON:**

```json
{
  "status": "success",
  "message": "User loaded successfully",
  "data": {
    "id": 1,
    "name": "Fady"
  }
}
```

---

### 🔹 With Pagination

```php
return $this->successResponse(
    $users,
    'Users retrieved',
    200,
    [
        'page' => 1,
        'per_page' => 10,
        'total' => 100
    ]
);
```

**Response JSON:**

```json
{
    "status": "success",
    "message": "Users retrieved",
    "data": [...],
    "pagination": {
        "page": 1,
        "per_page": 10,
        "total": 100
    }
}
```

---

### 🔹 With Additional Data

```php
return $this->successResponse(
    $users,
    'Users retrieved',
    200,
    ['page' => 1],
    ['debug' => 'Extra info here']
);
```

**Response JSON:**

```json
{
    "status": "success",
    "message": "Users retrieved",
    "data": [...],
    "pagination": { "page": 1 },
    "additionals": { "debug": "Extra info here" }
}
```

---

## ❌ 2. Error Response

### 🔹 Basic Error Example

```php
return $this->errorResponse(
    'Invalid request',
    400
);
```

**Response JSON:**

```json
{
  "status": "error",
  "message": "Invalid request"
}
```

---

### 🔹 Error With Additional Data

```php
return $this->errorResponse(
    'Validation failed',
    422,
    ['email' => 'Email is required']
);
```

**Response JSON:**

```json
{
  "status": "error",
  "message": "Validation failed",
  "data": {
    "email": "Email is required"
  }
}
```

# 📝 License

This package is open-sourced under the **MIT License**.
