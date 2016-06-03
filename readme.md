# Desire2Learn

[![Build Status](https://travis-ci.org/andela-araimi/desire2learn.svg?branch=staging)](https://travis-ci.org/andela-araimi/desire2learn)
[![Coverage Status](https://coveralls.io/repos/github/andela-araimi/desire2learn/badge.svg?branch=staging)](https://coveralls.io/github/andela-araimi/desire2learn?branch=staging)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-araimi/desire2learn/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-araimi/desire2learn/?branch=master)


Desire2learn is a platfoam for electronic learning on anything including learning programming.

http://learncast.herokuapp.com


#Features 

#### Login System 

- Traditional :  User login via form
- Oauth : Users use social lazy login

#### Signup System 

- Traditional : Users signup via form
- Oauth : Users leverage on social signup without any hassle.


#### Video Category

##### Admin users can 

- create video categories 
- as well add video to cateories
- Edit video categories
- Restore deleted video categories

#### Video Content

##### An authenticated user can 

- Add videos to category
- Edit videos
- Delete videos
- Restore deleted videos

#### Favourite and Comment

##### An authenticated user can 

- Favourite and unfavourite a video
- Add comments to video
- Edit their comments
- Delete their comments

#### Search Video

- Both guest and authenticated users can search videos 

#### View learning resources

- Both guest and authenticated users can view available videos 

## Installation
You can install the application by forking this repo or cloning it to your desktop. After cloning the application
you have to set your environments variables, the required ones for the application are below:

Clone this repository by typing this on your command line 

` git clone https://github.com/andela-tolotin/Learncast.git  and run composer install `


```

- APP_ENV=local
- APP_DEBUG=true
- APP_KEY=xxxxxxxxxxxxxxxxxxxxx
- APP_URL=http://localhost

- DB_CONNECTION=pgsql
- DB_HOST=192.168.10.10
- DB_PORT=33060
- DB_DATABASE=learnanytime
- DB_USERNAME=xxxxx
- DB_PASSWORD=xxxxx

- GITHUB_CLIENT_ID=xxxxxxxxxxxxxx
- GITHUB_CLIENT_SECRET=xxxxxxxxxx
- GITHUB_CLIENT_REDIRECT=http://localhost

- FACEBOOK_CLIENT_ID=xxxxxxxxxxxx
- FACEBOOK_CLIENT_SECRET=xxxxxxxx
- FACEBOOK_CLIENT_REDIRECT=http://localhost

- TWITTER_CLIENT_ID=xxxxxxx
- TWITTER_CLIENT_SECRET=xxxxxxx
- TWITTER_CLIENT_REDIRECT=http://localhost

- CLOUDINARY_API_KEY=xxxxxx
- CLOUDINARY_API_SECRET=xxxxxxx
- CLOUDINARY_CLOUD_NAME=xxxxxxxxx

```

Run Migration:

```artisan
    php artisan db:migrate
```

and Seed:

```
    php artisan db:seed --class=UsersTableSeeder
```

##Requirements
- PHP
  - 5.5
  - 5.6
  - 7.0
- Composer
- Apache
- Database

#Testing 

` Run phpunit tests ` 


##Contributing

This application is open-source hence you are free to contribute to any part of the project

## Credit

LearnCast is created and maintained by Temitope Olotin.
