# Laravel Response

A lightweight reusable response trait for clean and structured API success/error responses in Laravel (8 → 12).

![Packagist Downloads](https://img.shields.io/packagist/dt/fadyreda99/laravel-response)
![Latest Version](https://img.shields.io/packagist/v/fadyreda99/laravel-response)
![License](https://img.shields.io/badge/license-MIT-green)

---

## 🚀 Introduction

This package provides a simple and consistent structure for API responses in Laravel applications.  
It gives you two reusable methods:

- `successResponse()` → Standard successful response
- `errorResponse()` → Standard error response

Works with Laravel **8, 9, 10, 11, and 12**.

---

## 📦 Installation

```bash
composer require fadyreda99/laravel-response

Laravel auto-discovers the package, so no configuration needed.


🧩 Usage
Import and use the trait in any controller:


use fadyreda99\LaravelResponse\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return $this->successResponse(
            ['users' => User::all()],
            'Users fetched successfully'
        );
    }
}



✅ Response Methods
1. Success Response
successResponse(
    $data = null,
    string $message = 'Request succeeded',
    int $code = 200,
    ?array $pagination = null,
    ?array $additionals = null
)

Example:
return $this->successResponse(
    ['id' => 1, 'name' => 'Fady'],
    'User loaded successfully'
);

Response:
{
    "status": "success",
    "message": "User loaded successfully",
    "data": {
        "id": 1,
        "name": "Fady"
    }
}

With pagination:
return $this->successResponse(
    $users,
    'Users retrieved',
    200,
    ['page' => 1, 'total' => 20]
);

With additional data:
return $this->successResponse(
    $users,
    'Users retrieved',
    200,
    ['page' => 1, 'total' => 20],
    ['testKey'=> 'test value']
);


2. Error Response
errorResponse(
    string $message = 'Request failed',
    int $code = 400,
    $data = null
)


Example:
return $this->errorResponse(
    'Invalid credentials',
    401
);

Response:
{
    "status": "error",
    "message": "Invalid credentials"
}

With extra data:
return $this->errorResponse(
    'Validation error',
    422,
    ['email' => 'Email is required']
);


```
