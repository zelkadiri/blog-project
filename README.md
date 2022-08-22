# Blog Project
Here is the blog project based on the following instruction :

A customer approached us to build a web blogging platform.

The homepage will show all the blog posts to everyone visiting the web. Any user will be able to register in the platform, login to a private area to see the posts he created and, if they want, create new ones. They won't be able to edit or delete them.

The blog posts will only contain a title, description and publication date. The users should be able to sort them by publication_date.

# Instruction
```bash
# create a .env file
cp .env.example .env

# add the database connection config to your .env file
DB_CONNECTION=mysql
DB_DATABASE=blog_project
DB_USERNAME=root
DB_PASSWORD=

# install composer dependencies
composer update

# install npm dependencies
npm install

# generate a key for your application
php artisan key:generate

# run the migration files to generate the schema
php artisan migrate

# run the front end
npm run dev
# run your laravel project with 
php artisan serve
```
