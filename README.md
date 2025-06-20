<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# BRAIP Back-End

## Description

This is the back-end of the BRAIP system, developed in Laravel, a robust and elegant PHP framework. It provides RESTful APIs to manage products, categories, and other essential functionalities for the system.

### Main Features

- Product CRUD
- Advanced filters for product search
- Category management
- Support for product images
- Sorting by creation date

## Installation and Execution Steps

### Prerequisites

- PHP >= 8.1
- Composer
- SQLite database (or another configured in `.env`)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/braip-backend.git
   cd braip-backend
   ```
2. Install dependencies:

   ```bash
   composer install
   ```
3. Configure the `.env` file:

   ```bash
   cp .env.example .env
   ```

   Update the environment variables as needed.
4. Generate the application key:

   ```bash
   php artisan key:generate
   ```
5. Run migrations:

   ```bash
   php artisan migrate
   ```

### Execution

1. Start the development server:

   ```bash
   php artisan serve
   ```
2. Access the system at `http://localhost:8000`.

## Technical Decisions

### Framework

We chose Laravel for its simplicity, robustness, and large community. It offers features like Eloquent ORM, an intuitive routing system, and support for database migrations.

### Database

We use SQLite to facilitate local development. The system is compatible with other databases like MySQL and PostgreSQL.

### Code Structure

- **Controllers**: Manage the logic of HTTP requests.
- **Models**: Represent database entities.
- **Routes**: Define API endpoints.

### Filters and Sorting

We implemented advanced filters for product search, allowing combinations of criteria such as name, category, and image presence. The default sorting is by creation date, ensuring the most recent items are displayed first.

### Error Handling

All endpoints have robust error handling, returning clear messages and appropriate HTTP status codes.
