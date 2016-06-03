# Desire2Learn

[![Build Status](https://travis-ci.org/andela-araimi/desire2learn.svg?branch=staging)](https://travis-ci.org/andela-araimi/desire2learn) [![Coverage Status](https://coveralls.io/repos/github/andela-araimi/desire2learn/badge.svg?branch=staging)](https://coveralls.io/github/andela-araimi/desire2learn?branch=staging) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-araimi/desire2learn/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-araimi/desire2learn/?branch=master)


Welcome to Desire2learn where learning is made available and easier through video tutorials.

http://desire2learn.herokuapp.com/

###Getting started
<hr> 

#### To dive in, You need to register an account 

- Traditional SignUp :  User [Sign Up](http://desire2learn.herokuapp.com/signup) via form
- Oauth : Users can also use social platform to register which is available right on the homepage.



#### To Log In 

- Traditional : User [Log In](http://desire2learn.herokuapp.com/login) via form
- Oauth : Users can also use social platform to login which is available right on the homepage.

#### Video resources

##### A guest user can 

- Only watch videos on the platform

##### An authenticated `Regular Users and Super Admin Users`  can 

- watch videos on the platform
- Add videos to available categories
- Edit videos
- Delete videos

###Video Category

####Regular Users can 

- add videos to categories

#### Super Admin users can 

- create video categories 
- add videos to categories
- Edit video categories



####Reactions and Comments
<hr>
#### A guest user is not priviledge to neither like or comment on a video

##### An authenticated user can 

- Like and  unlike a video
- Add comments to video


##Usage
<hr>

Before diving in, kindly make the following available on your system:

1. [Composer](https://getcomposer.org)
2. [Laravel] (https://laravel.com)
3. [Vagrant] (https://www.vagrantup.com) 
4. [Postgres](http://www.postgresql.org)

Clone the repository into your local environment

```bash
$ https://github.com/andela-araimi/desire2learn
```

```bash
$ cd code
$ cd desire2learn
```

Copy the .env file into your project (use the env.example template) and populate it with your environment data


You can follow the template for your .env
```bash
APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_URL=

DB_HOST=
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=
SESSION_DRIVER=
QUEUE_DRIVER=

REDIS_HOST=
REDIS_PASSWORD=
REDIS_PORT=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

GITHUB_APP_ID=
GITHUB_APP_SECRET=
GITHUB_CALLBACK_URL=

FACEBOOK_APP_ID=
FACEBOOK_APP_SECRET=
FACEBOOK_CALLBACK_URL=

TWITTER_APP_ID=
TWITTER_APP_SECRET=
TWITTER_CALLBACK_URL=

AWS_KEY=
AWS_SECRET=
AWS_REGION=
AWS_BUCKET=

CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_BASE_URL=
CLOUDINARY_SECURE_URL=
CLOUDINARY_API_BASE_URL=
```

Run Composer install to install the vendor packages like so:

```bash
$ composer install
```
To start the server:

If you are using vagrant, simply run

```bash
$ vagrant up
```
If not, simply run

```bash
$ php artisan serve
```


## Tests
<hr>
if you have phpunit installed globally (recommended), run

```bash
$ phpunit
```

Otherwise, run
```bash
$ vendor/bin/phpunit
```
## Contributing
<hr>
Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/andela-araimi/desire2learn).

## Pull Requests
<hr>
- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Security

If you discover any security related issues, please email me at [Raimi Ademola](ademola.raimi@andela.com) or create an issue.

## Credits

[Raimi Ademola](https://github.com/andela-araimi/desire2learn)

## License

### The MIT License (MIT)

Copyright (c) 2016 John Ademola <ademola.raimi@andela.com>

The Desire2Learn is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
