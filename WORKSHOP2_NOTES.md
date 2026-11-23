# Workshop 2: MVC & DRY refactor (Training Institute Management System)

## Run it
```bash
composer install
cp .env.example .env        # set DB_DATABASE / DB_USERNAME / DB_PASSWORD
php artisan key:generate
php artisan migrate
php artisan serve
```
Visit `/students` and `/courses`.

## What was done (Completion Criteria)
- `StudentController` and `CourseController` with all 7 resource methods
- `routes/web.php` has no closures for Students/Courses: just `Route::resource()` x2
- All links and forms use `route()` names
- Route model binding in `show`, `edit`, `update`, `destroy`
- Validation rules written once in a private `rules()` method in each controller (`Rule::unique()->ignore()` on update)
- `Student` model: `date_of_birth` date cast and `age` accessor. `Course` model: `is_active` boolean cast and `fee` decimal cast.
- One stylesheet: `public/css/app.css`
- Layout: `components/layouts/app.blade.php` (`<x-layouts.app>`, used by Student pages) and `layouts/app.blade.php` (`@extends`, used by Course pages as in Step 15). Both share the same navbar and footer.
- Navbar and footer markup lives once, in `partials/navbar.blade.php` and `partials/footer.blade.php`. `<x-navbar />` and `<x-footer />` just include these, so the "DRY test" (edit the footer partial and both Student and Course pages change) works.
- Blade components: `alert`, `delete-form`, `form-input`, `form-textarea`, `students/form`
- Shared form partial for create and edit: `student/_form.blade.php` and `course/_form.blade.php`
- Expected: 14 routes in `php artisan route:list --except-vendor` (7 students.*, 7 courses.*)

## Note on the workshop PDF
The PDF mixes two approaches. Step 13 says to use components, while Step 15, the final structure and the criteria still say `@extends('layouts.app')` and `partials/`. This project includes both, so every step in the PDF works as written.
