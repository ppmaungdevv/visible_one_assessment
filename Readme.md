# Visible One Assessment

This repository contains the source code for the Visible One code assessment.

## Project Structure

- **app/**: Contains the main application files.
- **config/**: Configuration files for the application.
- **docker/**: Docker configurations, including MySQL setup.
- **nginx/**: NGINX configuration files.
- **public/**: Publicly accessible files.
- **vendor/**: Composer dependencies.

## Setup

### Prerequisites

- Docker
- Docker Compose

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/ppmaungdevv/visible_one_assessment.git
    cd visible_one_assessment
    ```

2. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

3. Build and start the Docker containers:
    ```bash
    docker-compose up --build
    ```

4. Initialize the database:
    ```bash
    docker exec -it <app_container_name> php init_db.php
    ```

## Usage

Access the application at `http://localhost:8080`.

