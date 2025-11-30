Laravel Response

A lightweight Laravel package that provides a clean, consistent structure for API success and error responses.

Supports Laravel 8 → 12 with auto-discovery.

<p align="center"> <img src="https://img.shields.io/packagist/v/fadyreda99/laravel-response?style=for-the-badge"> <img src="https://img.shields.io/packagist/dt/fadyreda99/laravel-response?style=for-the-badge"> <img src="https://img.shields.io/badge/Laravel-8%20|%209%20|%2010%20|%2011%20|%2012-red?style=for-the-badge"> <img src="https://img.shields.io/badge/license-MIT-green?style=for-the-badge"> </p>

🚀 Introduction
Every Laravel project needs a unified structure for API responses.
This package solves that by providing:
-successResponse() → Standard success JSON
-errorResponse() → Standard error JSON
-BaseController (optional) → Add the trait automatically
-Clean, readable, reusable responses across all your apps

📦 Installation
composer require fadyreda99/laravel-response

🧩 Usage
Import and use the trait in your controller
use Fadyreda99\LaravelResponse\ResponseTrait;

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

📘 Full Examples (EVERYTHING YOU NEED)

✅ 1️⃣ Success Response
🔹 Basic Example
return $this->successResponse(
['id' => 1, 'name' => 'Fady'],
'User loaded successfully'
);

Response JSON:
{
"status": "success",
"message": "User loaded successfully",
"data": {
"id": 1,
"name": "Fady"
}
}

🔹 With Pagination
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

Response JSON:
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

🔹 With Additional Data
return $this->successResponse(
$users,
'Users retrieved',
200,
['page' => 1],
['debug' => 'Extra info here']
);

Response JSON:
{
"status": "success",
"message": "Users retrieved",
"data": [...],
"pagination": { "page": 1 },
"additionals": { "debug": "Extra info here" }
}

❌ 2️⃣ Error Response
🔹 Basic Error
return $this->errorResponse(
'Invalid request',
400
);

Response JSON:
{
"status": "error",
"message": "Invalid request"
}

🔹 Error with Extra Data
return $this->errorResponse(
'Validation failed',
422,
['email' => 'The email field is required']
);

Response JSON:
{
"status": "error",
"message": "Validation failed",
"data": {
"email": "The email field is required"
}
}

📝 License
This package is open-sourced under the MIT License.
