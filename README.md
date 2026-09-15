# PHP/MySQL Business Management Application

Internal business management web application developed during a one-month professional internship at Grupo Futuro in Granada, Spain, in 2026.

> Note: This repository preserves the project in the state in which it was completed during the internship. The source code has not been retrospectively rewritten or modernized for portfolio purposes.

## Project context

The application was developed independently from tasks assigned by my internship mentor. I implemented each task, presented the result to the mentor, and then continued with the next functionality.

The resulting application was used by the company after the internship.

## Tech stack

- PHP
- MySQL
- PDO
- SQL
- HTML
- CSS
- JavaScript
- Fetch API
- Async/Await
- FormData
- AJAX-style asynchronous requests
- DOM manipulation
- Composer
- Dompdf

## Main modules

The application contains separate sections for internal business operations, including:

- Employees (`trabajadores`)
- Users (`usuarios`)
- Companies (`empresas`)
- Company follow-up records (`seguimientos`)
- Agenda (`agenda`)
- Mail records (`correos`)
- Forum / questions and responses (`foro`)
- Services (`servicios`)
- Work reports (`partes_trabajo`)
- Employee days off (`dias_libres`)
- Employee document management

## Main functionality

### Data management

The project implements database-backed operations for creating, reading, updating and deleting records across multiple modules.

It includes:

- Record creation and editing
- Record deletion
- Basic and advanced search
- Dynamic forms
- Database queries from PHP
- PDO prepared statements in multiple database operations

### Asynchronous interface

Several parts of the application communicate with PHP scripts without a full page reload.

The JavaScript code uses:

- `fetch()`
- `async / await`
- `FormData`
- Dynamic DOM updates

This approach is used in features such as forms, search, record management, document management, forum interactions and days-off management.

### User access

The project contains:

- User login
- Logout
- User-related data management
- Authentication logic connected to the MySQL database

### Employee documents

The application includes functionality for:

- Uploading employee documents
- Viewing document records
- Renaming document records
- Deleting documents
- Downloading stored documents

### Forum

The forum module includes functionality for:

- Adding questions
- Adding responses/comments
- Searching
- Advanced search
- Viewing additional information dynamically
- Deleting questions and responses

### Company follow-up

The company module includes follow-up functionality for recording and managing interactions associated with companies and services.

### PDF generation

The application uses Dompdf to generate PDF documents from application data.

PDF-related functionality is present in several sections of the project, including the agenda, employees, mail records, forum and work reports.

## Database

The application was built to work with a MySQL database.

The PHP code contains SQL operations including:

- `SELECT`
- `INSERT`
- `UPDATE`
- `DELETE`

Database access is handled with PDO, including prepared statements in multiple parts of the application.

The original project archive does not include a standalone SQL database dump. The repository is therefore primarily presented as a source-code portfolio project unless the database export is added separately.

## Project structure

The project is organized into functional directories such as:

```text
agenda/
ajax/
correos/
dias_libres/
empresas/
foro/
partes_trabajo/
servicios/
trabajadores/
usuarios/
vendor/
```

The repository also contains shared PHP, JavaScript and CSS files used across the application.

## Dependency

The project uses Dompdf through Composer:

```json
"dompdf/dompdf": "^3.1"
```

## Development approach

The backend was written in vanilla PHP without a PHP framework.

The project combines server-side PHP and MySQL with client-side JavaScript to provide dynamic interaction and asynchronous updates.

## Author

Semen Shchouplov

Full Stack Developer  
Granada, Spain · Open to relocation
