# PHP Technical Assessment

## Overview

This is a lightweight custom PHP MVC application built without using a framework.

It demonstrates:

* Custom MVC architecture
* PSR-4 autoloading with Composer
* CRUD operations (Create, Read, Update, Delete)
* Session-based authentication
* Input validation
* Error handling and logging
* MySQL database integration
* Frontend asset compilation using Vite

---

## Live Demo

https://techtest.mitchell.cymru/books

---

## Tech Stack

* PHP 8.3
* MySQL / MariaDB
* Composer
* PDO
* Vite
* SCSS / JavaScript

---

## Features

* View all books
* Create a book
* Edit a book
* Delete a book
* Login/logout system
* Validation for forms
* Error logging
* Simple UI with compiled assets

---

## Setup Instructions

### 1. Clone repository

```bash
git clone https://github.com/Ade-Mitchell/php-technical-assessment.git
cd php-technical-assessment
```

---

### 2. Install PHP dependencies

```bash
composer install
composer dump-autoload
```

---

### 3. Database setup

Create a database:

```
technical_assessment
```

Update:

```
config/database.php
```

Then import:

```
database/dump.sql
```

---

### 4. Install frontend dependencies

```bash
npm install
```

---

### 5. Build frontend

```bash
npm run build
```

---

### 6. Serve application

Set your web server document root to:

```
public/
```

---

## Authentication

This application uses a simple session-based authentication system.

Use the following credentials:

- Username: admin
- Password: password123

Authentication is required for:

- Creating books
- Editing books
- Updating books
- Deleting books
---

## Project Structure

```
app/
  Controllers/
  Core/
  Models/
config/
database/
public/
resources/
routes/
storage/
```

---
## Database Schema

The application uses a single `books` table with the following structure:

- id (INT, primary key, auto increment)
- title (VARCHAR)
- author (VARCHAR)
- published_year (INT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

The full schema and sample data are provided in:

database/dump.sql

Import this file into your MySQL database to set up the application.

---

## Error Logging

Errors are logged to:

```
storage/logs/app.log
```

---

## Build Process

Assets are built using Vite:

```bash
npm run build
```

Output:

```
public/build/assets/
```

Compiled frontend assets are committed to the repository and served directly in production.

---

## Architecture Overview

The application follows a custom MVC pattern:

- Router handles incoming requests and dispatches to controllers
- Controllers handle request logic and coordinate models and views
- Models interact with the database using PDO
- Views render HTML using PHP templates

PSR-4 autoloading is used to organise the codebase and automatically load classes.

---

## Notes

* Authentication is session-based
* No user management (not required by brief)
* Minimal UI to prioritise functionality
* Uses query strings for edit routes

---

## Future Improvements

* CSRF protection
* Flash messages
* Route parameters
* API support
* Better UI

---
