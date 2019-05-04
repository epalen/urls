# Laravel URL Shortener

_URL Shortener using Laravel is an open source web app with the functionality to shorten urls with a considerable amount of characters.._

## 🚀 Starting 

_These instructions will allow you to obtain a copy of the project in operation on your local machine for development and testing purposes._

See **Deployment** to learn how to deploy the project.


### 📋 Requirements 

_What things do you need to install the software and how to install them?_

_This application is developed in version 5.7 of Laravel, the environment requirements are:_

### Server Requirements

_The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment._

_However, if you are not using Homestead, you will need to make sure your server meets the following requirements:_

```
PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
BCMath PHP Extension
```

### 🔧 Installation 

_1st - Download repository project by executing the following command:_

```
git clone https://github.com/epalen/urls.git
```

_2nd - Enter the repository._

```
cd urls
```

_3rd - Execute composer command._

```
composer install
```

_4th - Create .env file._

5th - Run migration and seeder to create user for administration access.

```
php artisan migrate --seed
```

## 💻 Functionalities and tests

_After the installation process, to perform the functionalities tests you must follow the following steps:_

_Visual tests:_

_1st - Access to any browser with the path 'http: //urls.test'.

_2nd - Enter url to be shortened in the input field, where it indicates enter a URL.

_Access to Dashboard_

_1st - Login placing the user admin@urls.com and password 123456.

_Using Postman we can perform tests using the POST, GET, PUT and DEL methods._

_The routes available in the Api Routes:_

_1st - //List Links Route::get('urls', 'LinkController@indexApi');

_2nd - //List single Link Route::get('url/{id}', 'LinkController@showApi');

_3rd - //Create new Link Route::post('url', 'LinkController@storeUrlapi');

_4th - //Create update Link Route::put('url', 'LinkController@storeUrlapi');

_5th - //Delete Link Route::delete('url/{id}', 'LinkController@destroyApi');

## 🛠️ Built with 

_Tools used in the development._

* [Laravel](https://laravel.com/) - The web framework used
* [Laravel Collective](https://laravelcollective.com/) - Packages to support components of the Laravel Framework

## Contributing 🖇️

Please read the [CONTRIBUTING.md] (https://gist.github.com/epalen/urls) for details of our code of conduct, and the process for sending us pull requests.

## Authors ✒️

* **Edward Palen** - *Initial Work* - [epalen](https://github.com/epalen)

## License 📄

This project is under the License (MIT) - see the file [LICENSE.md](LICENSE.md) for details


---
⌨️ with ❤️ by [epalen](https://github.com/epalen) 😊