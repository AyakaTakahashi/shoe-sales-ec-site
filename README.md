# Shoe Sales EC Site
Welcome to the Shoe Sales EC Site, an e-commerce platform dedicated exclusively to the sale of shoes. Our platform offers a seamless shopping experience for customers looking to purchase their next pair of shoes, as well as comprehensive management tools for administrators.

## Technology
- PHP laravel
- MySQL
- Docker

## Features
Our site is designed with both the end-user and administrators in mind, featuring:

- User Authentication: Secure login system for users and administrators.
- User Registration/Editing: New users can sign up, and existing users can update their details easily.
- Customer Features:
  - Product Listings: Browse our extensive catalog of shoes.
  - Product Details: View detailed information about each product.
- Administrator Features:
  - Product Management: Admins can add, edit, and delete product listings to keep the catalog up to date.

## Directory
shoe-sales-ec-site
- docker-compose.yml
- docker
  - php
    - Dockerfile
    - php.ini
  - nginx
    - default.conf
- src
  - shoe-sales-ec-site project file(PHP laravel)

## Getting Started
To get started with our project, follow these steps:

- Clone the repository to your local machine.
- Ensure you have Docker installed on your system.
- Navigate to the project directory.
- Run docker-compose up --build to build and start the Docker containers.
- Run php artisan migrate:fresh --seed to setup the database
- Access the frontend at http://localhost