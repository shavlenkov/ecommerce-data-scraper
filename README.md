# ecommerce-data-scraper

### Requirements to run the application
1. PHP >= **8.4.4**
2. Laravel >= **12**
3. Composer >= **2.7.1**
4. Docker >= **27.3.1**
5. Docker Compose >= **1.29.2**

### How to run the application?
1. Clone the repository:

   `git clone https://github.com/shavlenkov/ecommerce-data-scraper.git`
2. Navigate to the ecommerce-data-scraper folder:

   `cd ecommerce-data-scraper/`
3. Create an .env file from the .env.example file:

   `cp .env.example .env`
4. Update the following lines in the .env file:

   ```
   DB_DATABASE=
   DB_USERNAME=
   DB_PASSWORD=
   ```
5. Install all dependencies using Composer utility:

   `composer install`
6. Run containers using Docker Compose utility:

   `docker-compose up -d`
7. Access the container's shell:

   `docker exec -it ecommerce-data-scraper_laravel.test_1 bash`
    1. Assign the correct permissions to the bootstrap and storage folders:

       `chmod -R 775 bootstrap/ storage/`
    2. Generate App Key:

       `php artisan key:generate`
    3. Run migrations and seeders:

       `php artisan migrate --seed`
