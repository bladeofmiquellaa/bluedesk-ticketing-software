# BlueDesk app

An app for Answering Tickets.

![Alt text](/public/images/screen.png "BlueDesk")

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

### Getting User Access Key
Signup and copy the user access key

![Alt text](/public/images/User_Access_Key.png "BlueDesk")

### Getting Token For Your Customer
Send request including user access key and your customer email to Api to Get a Token for a customer


api => 127.0.0.1:8000/api/tokens/generate

Now, your customer can access his panel through this link and see his/her previous ticket or open a ticket

127.0.0.1:8000/tickets/{token_body}

## License

The BlueDesk app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
