This is a Starter Laravel 8 kanban project with Vue  and Bootstrap 5 

project url   `https://arcane-hollows-38712.herokuapp.com/`
project git url   `https://github.com/kipkuruibarnaba/kanban.git`

## Instalation Guide:

As always you need to:

`composer install`

Then

`npm install`

`npm run dev` or `npm run watch`

And don't forget the `.env` file and to generate the `APP_KEY` using `php artisan key:generate`

`php artisan migrate`

Then you can run:

`php artisan serve`

For the BACKEND TESTS For API
 
 `login`  this will generate the access token.

 login url is `http://127.0.0.1:8000/api/login`

 initial credentials for generating access token    `{"email":"john@doe.com", "password":"password" }`
 

 For fetching the data use this url `http://127.0.0.1:8000/api/getdata`
 Ensure to have the access token

