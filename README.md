# SIA — Academic Information System

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square\&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue?style=flat-square\&logo=php)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=flat-square\&logo=tailwind-css)
![Vite](https://img.shields.io/badge/Vite-7.x-646CFF?style=flat-square\&logo=vite)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

**SIA** is a web-based Academic Information System built with Laravel.
It provides a simple and structured interface for managing academic data such as students, lecturers, classes, courses, and grades.

This project was developed as part of a **Web 2 Practicum** assignment.

---

## Table of Contents

* [Overview](#overview)
* [Features](#features)
* [Tech Stack](#tech-stack)
* [Project Structure](#project-structure)
* [Database Design](#database-design)
* [Grade Calculation](#grade-calculation)
* [Requirements](#requirements)
* [Installation](#installation)
* [Environment Configuration](#environment-configuration)
* [Running the Application](#running-the-application)
* [Available Scripts](#available-scripts)
* [Main Routes](#main-routes)
* [Testing](#testing)
* [Development Notes](#development-notes)
* [Author](#author)
* [License](#license)

---

## Overview

SIA helps manage academic administration data in one Laravel application.
The application includes authentication, dashboard statistics, CRUD modules, data validation, relational database management, and automatic grade calculation.

The main modules are:

* Authentication
* Dashboard
* Class Management
* Lecturer Management
* Student Management
* Course Management
* Grade Management
* User Profile Management

---

## Features

### Authentication

* User registration
* User login
* User logout
* Email verification support
* Password reset support
* Profile update
* Account deletion

### Dashboard

* Total number of students
* Total number of lecturers
* Total number of courses
* Total number of classes
* Latest registered students
* Grade distribution summary

### Class Management

* Create, read, update, and delete class data
* Search classes by class name or class code
* Prevent deletion if the class still has related students

### Lecturer Management

* Create, read, update, and delete lecturer data
* Search lecturers by name, NIP, or email
* Prevent deletion if the lecturer still has related courses

### Student Management

* Create, read, update, and delete student data
* Assign students to classes
* Search students by name, NIM, or email
* View student details with related class and grade records

### Course Management

* Create, read, update, and delete course data
* Assign courses to lecturers
* Search courses by course name or course code

### Grade Management

* Create, read, update, and delete student grades
* Assign grades to students and courses
* Input assignment, midterm, and final exam scores
* Automatically calculate the final score
* Automatically determine the letter grade
* Prevent duplicate grade records for the same student and course

---

## Tech Stack

| Category          | Technology                                                   |
| ----------------- | ------------------------------------------------------------ |
| Backend Framework | Laravel 12                                                   |
| Language          | PHP 8.2+                                                     |
| Authentication    | Laravel Breeze                                               |
| Frontend Template | Blade                                                        |
| Styling           | Tailwind CSS                                                 |
| JavaScript        | Alpine.js, Axios                                             |
| Build Tool        | Vite                                                         |
| Database          | MySQL, SQLite, PostgreSQL, or any Laravel-supported database |
| Package Manager   | Composer, npm                                                |
| Testing           | PHPUnit                                                      |

---

## Project Structure

```bash
SIA/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── auth.php
│   └── web.php
├── storage/
├── tests/
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── tailwind.config.js
├── vite.config.js
└── README.md
```

### Important Directories

| Directory              | Description                                            |
| ---------------------- | ------------------------------------------------------ |
| `app/Http/Controllers` | Application controllers for dashboard and CRUD modules |
| `app/Http/Requests`    | Form request validation classes                        |
| `app/Models`           | Eloquent models and relationships                      |
| `database/migrations`  | Database table definitions                             |
| `resources/views`      | Blade templates                                        |
| `routes/web.php`       | Main web routes                                        |
| `routes/auth.php`      | Authentication routes generated by Laravel Breeze      |

---

## Database Design

The application uses the following main entities:

| Table          | Description        |
| -------------- | ------------------ |
| `users`        | Application users  |
| `kelas`        | Class data         |
| `dosens`       | Lecturer data      |
| `mahasiswas`   | Student data       |
| `mata_kuliahs` | Course data        |
| `nilais`       | Student grade data |

### Entity Relationships

```text
Kelas        1 ──── * Mahasiswa
Dosen        1 ──── * MataKuliah
Mahasiswa    1 ──── * Nilai
MataKuliah   1 ──── * Nilai
```

Relationship explanation:

* One class can have many students.
* One lecturer can teach many courses.
* One student can have many grade records.
* One course can have many grade records.
* One grade record belongs to one student and one course.

---

## Grade Calculation

The final score is calculated using the following formula:

```text
Final Score = (Assignment Score × 30%) + (Midterm Score × 35%) + (Final Exam Score × 35%)
```

Letter grade rules:

| Final Score | Grade |
| ----------: | :---: |
|    85 - 100 |   A   |
|  70 - 84.99 |   B   |
|  55 - 69.99 |   C   |
|  40 - 54.99 |   D   |
|   0 - 39.99 |   E   |

---

## Requirements

Make sure your environment has the following installed:

* PHP 8.2 or higher
* Composer
* Node.js
* npm
* MySQL, SQLite, PostgreSQL, or another Laravel-supported database
* Git

---

## Installation

Clone the repository:

```bash
git clone https://github.com/dzakwannajmi/SIA.git
cd SIA
```

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

---

## Environment Configuration

Open the `.env` file and configure your database connection.

Example using MySQL:

```env
APP_NAME=SIA
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sia
DB_USERNAME=root
DB_PASSWORD=
```

After configuring the database, run the migrations:

```bash
php artisan migrate
```

If you want to reset and rebuild the database during development, run:

```bash
php artisan migrate:fresh
```

---

## Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Start the Vite development server:

```bash
npm run dev
```

Then open the application in your browser:

```text
http://127.0.0.1:8000
```

For production build assets:

```bash
npm run build
```

---

## Available Scripts

### Composer Scripts

| Command            | Description                                                           |
| ------------------ | --------------------------------------------------------------------- |
| `composer run dev` | Run Laravel server, queue listener, log viewer, and Vite concurrently |
| `composer test`    | Clear config and run the test suite                                   |

### npm Scripts

| Command         | Description                          |
| --------------- | ------------------------------------ |
| `npm run dev`   | Start Vite development server        |
| `npm run build` | Build frontend assets for production |

---

## Main Routes

| Route          | Description             | Authentication |
| -------------- | ----------------------- | -------------- |
| `/`            | Redirects to dashboard  | Yes            |
| `/dashboard`   | Dashboard page          | Yes            |
| `/kelas`       | Class management        | Yes            |
| `/dosen`       | Lecturer management     | Yes            |
| `/mahasiswa`   | Student management      | Yes            |
| `/mata-kuliah` | Course management       | Yes            |
| `/nilai`       | Grade management        | Yes            |
| `/profile`     | User profile management | Yes            |
| `/login`       | Login page              | No             |
| `/register`    | Registration page       | No             |

Most application routes are protected by Laravel authentication middleware.

---

## Testing

Run the test suite:

```bash
php artisan test
```

or:

```bash
composer test
```

---

## Development Notes

* The project follows Laravel MVC structure.
* Form Request classes are used to keep validation logic separate from controllers.
* Eloquent relationships are used to connect classes, students, lecturers, courses, and grades.
* Pagination is used on data listing pages.
* Search functionality is available in several CRUD modules.
* Delete protection is implemented for related data such as classes with students and lecturers with courses.
* Final score and letter grade are calculated automatically when grade data is stored or updated.

---

## Recommended Next Improvements

* Add database seeders for sample academic data.
* Add screenshots to improve README presentation.
* Add feature tests for each CRUD module.
* Add role-based access control, such as admin and staff roles.
* Add export functionality for student grades.
* Add dashboard charts for better data visualization.

---

## Author

**Muhammad Dzakwan Najmi**

* GitHub: [@dzakwannajmi](https://github.com/dzakwannajmi)

---

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
::: 
