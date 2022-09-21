
---
Movie-quotes website is for people to share their favorite quotes from movies, singed user can create movie title and add there some quotes with images, user also can edit or delete movies or quotes. This website is translatable in Georgin.  

#
### Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Development](#development)
* [Deployment with CI / CD](#deployment-with-ci-\-cd)
* [Project Structure](#project-structure)
* [Service Interaction Map](#service-interaction-map)
* [Server Infrastructure](#server-infrastructure)
* [Database Backups](#database-backups)

#
### Prerequisites

* <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@8.1 and up*
* <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> *npm@6.14.17 and up*
* <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2.4.1 and up*


#
### Tech Stack

* <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@9.x](https://laravel.com/docs/6.x) - back-end framework
* <img src="readme/assets/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation

#
### Getting Started
<br>
1\. First of all you need to clone E Space repository from github:
```sh
git clone https://github.com/RedberryInternship/giorgi-kikadze-movie-quotes.git
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

and also:
```sh
npm run dev
```
in order to build your JS/SaaS resources.

4\. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:

#
**MYSQL:**
>DB_CONNECTION=mysql
>DB_HOST=127.0.0.1
>DB_PORT=3306
>DB_DATABASE=*****
>DB_USERNAME=*****
>DB_PASSWORD=*****

#

after setting up **.env** file, execute:
```sh
php artisan config:cache
```
in order to cache environment variables.

4\. Now execute in the root of you project following:
```sh
  php artisan key:generate
```
Which generates auth key.

##### Now, you should be good to go!
<br>

#


### Development
<br>
You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

when working on JS you may run:

```sh
  npm run dev
```
it builds your js files into executable scripts.
If you want to watch files during development, execute instead:

```sh
  npm run watch
```
it will watch JS files and on change it'll rebuild them, so you don't have to manually build them.
<br>

#
### Deployment with CI \ CD
<br/>

!["CI / CD"](./readme/assets/cicd.png)

<br />

Continues Development / Continues Integration & Deployment steps:
* CI \ CD process first step is of course is development.
* After some time of development when you are ready to integrate and deploy your feature/fix/work you make a commit or pull request to gihub branch.
* That triggers github action which listens to pull requests and commits on development and master branch. Github actions will set up configure project, run unit tests.
* If unit tests fail, you go a head and do some fixing and aftermath try again.
* If unit tests succeed then github actions will deploy your code to development or production server according to the branch you are making commit to.
* After deploying, github actions script will build your code and run migrations all to be up to date.

Then everything should be OK :pray:

#

### Database Design Diagram
<br/>

!["Database Design Diagram"](./readme/uml/drawSQL-export-2022-09-20_12_07.png)

<br />