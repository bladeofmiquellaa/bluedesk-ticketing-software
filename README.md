# BlueDesk app

An app for Answering Tickets.

![Alt text](/public/images/screen.png "LaraGigs")

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Seeding The Database
To add the dummy listings with a single user, run the following
```
php artisan db:seed
```

### Running The App
Upload the files to your document root, Valet folder or run
```
php artisan serve
```

## License

The BlueDesk app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
