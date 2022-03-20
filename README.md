# Symfony Project
### Apple Store

#### Install symfony :
    curl -sS https://get.symfony.com/cli/installer | bash

### command at the root of the project:
    composer install

## now create your .env.local file !
copy your actual .env and make a new one called .env.local.

#

## Second Step

### Install webpack-encore-bundle :
    composer require symfony/webpack-encore-bundle

### Now Install npm in the project !
    npm install

#

## Third Step

### In your webpack.config.js
uncomment //.enableSassLoader()

### Now Install sass depedency in the project
    npm install sass-loader@^12.0.0 sass --save-dev

### command for compile the project itself :
    npm run watch

#

### Reminder :
#### to get the fixtures of the project
you need to launch the command :

    php bin/console doctrine:fixtures:load

#### you'll get
- users
- products
- towns
- stores
- product categories


## What can you do with this project ?

the principal goal was to recreate the apple website.

you can navigate between homepage, store, bag and pages for every category

- As Admin you can have acces to the easy admin interface and interact with the bag and create orders.
- As User you can interact with the bag page and create orders.
- As Viewer you can see the homepage and go to login | register page and also see every product, but you have to be connected to interact with bag page !