
![Logo](https://camo.githubusercontent.com/bc96fa3c2d0e2a3690404219a841c1705a7aae0cc05d4ee2e7fa138836067bc9/68747470733a2f2f692e696d6775722e636f6d2f7461534c70594d2e706e67)


# Drivvn Developer Tech Test

This is a simple Laravel application for managing a car inventory. It allows you to add, delete, list, and update cars, and also manage available colors. This README provides instructions on setting up and running the application.



## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [How Extra Data Models Could Improve the Design](#how-extra-data-models-could-improve-the-design)
- [Testing](#testing)
## Requirements

- PHP (>= 8.1)
- Composer
- Laravel (>= 10.0)
- Database (e.g., MySQL, PostgreSQL, SQLite)
## Installation

1. Clone the repository to your local machine:

```bash
    git clone https://github.com/Timmsy1998/drivvn-tech-test.git
    cd drivvn-tech-test
```

2. Install PHP Dependencies using Composer:

```bash
    composer install
```

3. Configure your `.env` file. You can copy the example file and modify it as needed:

```bash
    cp .env.example .env
```
Update your database connection settings in the `.env` file.

4. Generate an application key:

```bash
    php artisan key:generate
```

5. Run database migrations to create the necessary tables:

```bash
    php artisan migrate
```

6. Seed the database with sample colour information:

```bash
    php artisan db:seed
```

7. Start the development server:

```bash
    php artisan serve
```
The Application will be accessible at `http://localhost:8000`.



Personally, I used XAMPP to run this locally on my machine.

There are other methods available, but this is just my personal preference
## Usage

### Car Management

- **Adding a Car**: Use the API endpoint `POST /api/cars` to add a new car to the inventory. Provide the car's details in the request payload.
- **Retrieving a Car**: Use `GET /api/cars/{id}` to retrieve a specific car by its ID.
- **Deleting a Car**: Use `DELETE /api/cars/{id}` to delete a car by its ID.
- **Listing All Cars**: Use `GET /api/cars` to list all cars in the inventory.

### Color Management

- **Adding, Updating, Deleting, and Listing Colors**: These operations are also supported through respective API endpoints.

## How Extra Data Models Could Improve the Design

Enhancing the design of our car inventory application with additional data models brings several notable benefits:

- **Manufacturer Model**: Create a `Manufacturer` model to represent car manufacturers, providing better categorization and detailed information about car makers.

- **User Model**: If you plan to introduce user-specific features, consider creating a `User` model to manage user accounts and their associations with cars.

- **Features Model**: Track additional features or specifications of cars by implementing a `Feature` model, which allows for more detailed information about each vehicle.

- **Pricing Model**: Efficiently manage pricing data for cars, including price history and discounts, using a `Pricing` model, enabling more sophisticated pricing strategies.

- **Images Model**: Store car images with an `Image` model, facilitating the association of images with specific cars for a richer visual experience.

By introducing these supplementary data models, our application becomes more comprehensive, organized, and feature-rich. This improvement elevates the overall functionality and user experience, ensuring a more robust and valuable tool for managing and exploring our car inventory.
## Testing

The application includes a sett of unit tests. Run the tests using PHPUnit:

```bash
    ./vendor/bin/phpunit
```

