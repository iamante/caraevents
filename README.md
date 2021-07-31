# Caraevents Management System

![Caraevents](public/images/GIF_2.gif)

An online reservation system that focuses on reservation, inquiries and advertising the client's product thru online, build using Laravel Framework and Bootstrap. A capstone project for the Bachelor's Degree of Information Technology in Access Computer College - lagro.

## Getting Started

### Pre-requisite

- [XAMPP](https://www.apachefriends.org/download.html)
- [NPM](https://nodejs.org/en/download/)
- [Git/Git bash](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/download/)
- Knowledge in PHP and MySQL

### Installation

#### 1. Clone the Repository <a name="clone-repo"></a>

a. In your terminal Go to `C:/xampp/htdocs`

```bash
cd 'C:/xampp/htdocs'
```
b. Clone the repository

```bash
git clone https://github.com/iamante/caraevents.git
```

c. Go to the `caraevents` directory

```bash
cd 'caraevents'
```

d. Install Dependencies

```bash
composer install
```
#### 2. Database configuration

a. Run both `Apache` and `mySQL` in the XAMPP Control Panel.

b. Go to `localhost/phpmyadmin` in your browser. Then login and create a database named `caraevents`. In the main directory of `caraevents`, find .env.example. Open it and update the database information below. After that, save it as .env.

> **Note**
> Set your APP_URL in your .env file. This is needed for Voyager to correctly resolve asset URLs.
> 
> The default credentials for the phpMyAdmin are:
>
> username: root
>
> password:
>
> _You can leave the password blank._

```
APP_NAME='Caraevents'
APP_URL=http://localhost:8000 
...
DB_DATABASE=caraevents
DB_USERNAME=YourUsername
DB_PASSWORD=YourPassword
```
c. Go to your terminal to generate key

```bash
php artisan key:generate
```

d. Run the Database Migration

```
php artisan migrate
```

e. Migrate dummy data

```
composer dump-autoload
```

```
php artisan db:seed
```

f. Create a symbolic link:

```bash
php artisan storage:link
```

g. Install voyager and packages

```bash
npm install
```

#### 3. Check the Apps

a. `npm run dev`

b. `php artisan serve`

c. Visit `localhost:8000` in your browser

d. Visit `/admin` if you want to access the Voyager admin backend. Admin User/Password: `admin@admin.com/password`. Admin Web User/Password: `caraevents@admin.com/123123123`

## Built with

### Main Tech
- HTML, CSS, SASS, Javascript, PHP and MySQL
- [Laravel Framework](https://laravel.com)
- [JQuery](https://jquery.com)
- [Bootstrap 4](https://getbootstrap.com)

### Plugin
- [Voyager](https://voyager.devdojo.com) - Admin package for Laravel
- [Chart.js](https://www.chartjs.org) - Javascript plugin for flexible charting
- [Typeahead.js](https://twitter.github.io/typeahead.js/example) - Auto suggestion javascript plugin
- [Slick.js](https://kenwheeler.github.io/slick) - Easy carousel javascript plugin
- [jQuery datetimepicker](https://xdsoft.net/jqplugins/datetimepicker) - Date and Time picker calendar plugin
