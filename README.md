# Vaccine Scheduling System

This is a simple job listing application using Laravel (backend) and Vue.js (frontend). The main use case is that a company can post jobs with minimal data (such as title and description), and candidates can view and apply.


- This project is containerized with docker.
- Using laravel service repository design pattern.
- 15 jobs are created with seeder.
- Some job applications are created with seeder
- Email notification are implemented with laravel job and queue.


## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Configuration](#configuration)
- [Queue Configuration](#queue-configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Improvements](#improvement)

## Features

- **Job list:** Users can see all companies job list.
- **Job details:** User can see job details.
- **Apply Jobs:** Users can apply job by name and email.
- **Total view and total applicants:** User can see how much jobpost viwed and how much applicant applied.

## Technologies Used

- **PHP**: Version 8.0 or higher
- **Laravel**: Version 10.x
- **MySQL**: For the database
- **Composer**: For dependency management
- **Guzzle**: For HTTP requests (if needed)
- **Laravel Queues**: For background job processing (email notifications)
- **Vue JS 3**: For SPA
- **Vite**: For asset compile.
- **Docker**: For containerization the project

## Installation

1. **Clone the repository:**
- git clone https://github.com/Zannatul/job-listing-app.git
- Go project root folder.
- Open terminal and run following commands.
- ```bash
    sudo docker compose build
    sudo docker compose up -d
    sudo docker exec -it job_listings_app sh
    composer install
    cp .env.example .env
    php artisan key:generate  
    php artisan migrate
    php artisan db:seed

- if face any problem related to FROM php:8.2-fpm-alpine then please run this command.
- ```bash
    rm  ~/.docker/config.json 

## Configuration
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailgun.org
- MAIL_PORT=587
- MAIL_USERNAME=your_username
- MAIL_PASSWORD=your_password
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS=no-reply@example.com
- MAIL_FROM_NAME="${APP_NAME}"
- QUEUE_CONNECTION=database

## Queue Configuration

- ```bash
    php artisan queue:work

## Testing
- No text cases are written.

## improvement



