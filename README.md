# V-Commerce

## Description

This project is a Laravel-based web application designed for e-commerce application with paypal integration

## Setup

### Requirements

1. PHP >= 8.3
2. Composer
3. Node.js >= 16.10
4. npm or Yarn
5. MySQL or any other compatible database

### Installation

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Run `composer install` to install PHP dependencies.
4. Run npm install to install JavaScript dependencies.
5. Create a copy of the `.env.example` file and rename it to `.env`.
6. Configure your database settings in the `.env` file.
7. Generate an application key by running `php artisan key:generate`.
8. Run database migrations using `php artisan migrate`.
Usage:

## Running the Application

1. Start the development server by running `php artisan serve`.
2. Run the vite for hot reload `npm run dev`
3. Access the application in your browser at `http://localhost:8000`.

## Authentication

The application includes user authentication. Register a new account or log in with existing credentials to access the features.

## Features

### User Dashboard

Users can view their orders, billing details, and manage their account settings.

### Admin Panel

Administrators have access to manage products, users, orders, and other administrative tasks.

### Product Management

Admins can add, edit, and delete products with details such as name, description, price, and image.

### Order Processing

Users can add products to their cart and proceed to purchase, with options for payment processing.

### Billing Details

Users can manage their billing information for order processing
