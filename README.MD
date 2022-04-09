#  Simple PHP No backend frameworks app

# How to start
-$cd public
-$php -S localhost:8080


# Front end

-typescript (simple code)
-javascript
-vue.js (CDN)

# Structure

-controllers will have both the site controller and the Items controller
-core container the main classes (Application, Controller, Model, Request...)
-public contains index.php
-vendor used for autoload.php
-view contains all front-end related stuff (static with CSS, JS, SASS, and TS and HTML)
-migrations.php is used to initialize the migrations forlder which will create the table in the Database (see core/Database.php)

# Migrations
- $php migrations.php