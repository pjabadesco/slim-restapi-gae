# Setting up Slim Framework for REST API and Google App Engine + Cloud SQL + memcached

Slim is the 2nd fastest api server in the planet, next to Phalcon.  

This is a simple skeleton project for Slim 3 that implements a simple REST API. 


## Main specs
- Uses syslog for Google compatible logging. syslog(LOG_INFO, 'Authorized access'); / syslog(LOG_WARNING, "Unauthorized access");
- Specially oriented to develop Restful APIs using JSON
- API Rate limiter middleware, for throttling excesive requests. [https://github.com/akirk/php-ratelimiter]

Here is how i did it:

## Step 1 - run the root of your new project
`composer require slim/slim "^3.0"`

## Step 2 - Edit composer.json
```sh
{
    "require": {
        "slim/slim": "^3.7"
    },
    "autoload": {
        "psr-4": {
            "Controllers\\": "src/controllers/",
            "Libs\\": "src/libs/"
        }
    }
}
```

## Step 3 - run in root
`composer.phar install --no-dev -o`

## Step 4 - Create Folders/Files (see files in this git)
```sh
api\src\
api\src\controllers\
api\src\libs\
api\src\libs\main.php
api\src\libs\ratelimiter.php
api\src\dependencies.php
api\src\middlewares.php
api\src\routes.php
api\src\settings.php
```

## Quick Install Guide
1. download and extract [https://github.com/pjabadesco/slim-restapi-gae/archive/master.zip]
2. cd api
3. composer dump-autoload --no-dev -o
4. cd ..
5. edit & save app.yaml (put correct environment values)
5. dev_appserver.py ./app.yaml

## TOOLS
`dev_appserver.py ./app.yaml`

`gcloud source repos clone default --project={{YOUR PROJECT ID}}`

`gcloud app deploy ./app.yaml --project {{YOUR PROJECT ID}}`

every time you make changes in SLIM's routes.php, you must run:
`composer dump-autoload --no-dev -o`
