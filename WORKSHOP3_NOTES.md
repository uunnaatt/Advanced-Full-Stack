# Workshop 3: REST API (Training Institute)

## Run it
```bash
composer install            # installs laravel/sanctum (added by php artisan install:api)
cp .env.example .env        # set your MySQL details
php artisan key:generate
php artisan migrate         # also creates personal_access_tokens (Sanctum)
php artisan serve
```
API base URL: `http://127.0.0.1:8000/api`

## What was done
- `php artisan install:api` ran: added `laravel/sanctum`, `routes/api.php`, `config/sanctum.php`, the personal access tokens migration, the `api:` route in `bootstrap/app.php`, and `HasApiTokens` on `User`
- Form Requests: `app/Http/Requests/Student/{Store,Update}StudentRequest.php` and `app/Http/Requests/Course/{Store,Update}CourseRequest.php`
- API Resources: `app/Http/Resources/StudentResource.php` and `CourseResource.php`
- API controllers (kept separate from the web controllers): `app/Http/Controllers/Api/StudentController.php` and `CourseController.php`
- `routes/api.php`: `Route::apiResource('students', ...)` and `Route::apiResource('courses', ...)`

## Endpoints and status codes
| Method | URL | Success | Errors |
|---|---|---|---|
| GET | /api/students, /api/courses | 200 | |
| POST | /api/students, /api/courses | 201 | 422 validation |
| GET | /api/students/{id}, /api/courses/{id} | 200 | 404 |
| PUT/PATCH | /api/students/{id}, /api/courses/{id} | 200 | 404, 422 |
| DELETE | /api/students/{id}, /api/courses/{id} | 204 (no body) | 404 |

## Testing in Postman
Import `Workshop3.postman_collection.json` (Postman → Import). It contains every endpoint, plus the validation, duplicate-email and 404 cases. Run the requests in order and take a screenshot of each one for the report.

## Note: a fix to the workshop PDF
If you follow the PDF exactly, `Route::apiResource('students', ...)` creates routes named `students.index` and so on. These clash with the web routes from Workshop 2, so `route('students.index')` in the Blade views would start pointing at `/api/students`. The API routes are therefore wrapped in `Route::name('api.')->group(...)`, which gives them the names `api.students.index` and so on. The URLs are unchanged.
