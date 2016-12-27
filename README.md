# Setting up Slim Framework for REST API and Google App Engine + Cloud SQL + memcached

Slim is the 2nd fastest api server in the planet, next to Phalcon.  

## Main specs
- Uses syslog for Google compatible logging. syslog(LOG_INFO, 'Authorized access'); / syslog(LOG_WARNING, "Unauthorized access");
- Specially oriented to develop Restful APIs using JSON
- Reusable generic Controller and Database access with common CRUD operations
- No need to define models, database columns for simple database access
- Supports ordering the resource list /books?order=price
- Table name given by the resource name / user defined
- Best practices in HTTP return codes
- API Rate limiter middleware, for throttling excesive requests
- oAuth2 from https://github.com/bshaffer/oauth2-server-php

Here is how i do it:

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
            "Controllers\\": "src/controllers/"
        }
    }
}
```

## Step 3 - run in root
`composer install`

## Step 4 - Create Folders/Files (see files in this git)
```sh
api\src\
api\src\controllers\
api\src\dependencies.php
api\src\middlewares.php
api\src\routes.php
api\src\settings.php
```

## TOOLS
`dev_appserver.py ./app.yaml`

`gcloud source repos clone default --project={{YOUR PROJECT ID}}`

`gcloud app deploy ./app.yaml --project {{YOUR PROJECT ID}}`
