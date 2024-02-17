# Fleet Management System (Bus-Booking System)

This project is a fleet management system developed using the Laravel Framework. It allows for the management and booking of buses.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them:

- PHP >= 8.1
- Composer
- MySQL or any compatible database system 

### Installing

A step-by-step guide to getting a development environment running:

1. Clone the repository: 

    git clone https://github.com/mahfat22/golyvTask.git

2. Install dependencies:

    
    composer install
    

3. Copy .env.example to .env and configure your environment variables, including database connection settings:

    
    cp .env.example .env
    

4. Generate an application key:

    
    php artisan key:generate
    

5. Run database migrations and seeders:

    
    php artisan migrate --seed
    

6. Start the application:

    
    php artisan serve
    

7. Access the application at http://127.0.0.1:8000. 

 

## Running the Tests

Explain how to run the automated tests for this system.

## Deployment

Add additional notes about how to deploy this on a live system.

## Built With

- [Laravel](https://laravel.com/) - The web framework used
- [MySQL](https://www.mysql.com/) - Database management system

## Authors

- *Mahmoud Ragaey* - Initial work - [mahfat22](https://github.com/mahfat22)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.