## Setting up Slim Framework for REST API

Here is how i do it

### Step 1 - run the root of your new project
`composer require slim/slim "^3.0"`

### Step 2 - Edit composer.json
```markdown
{
    "require": {
        "slim/slim": "^3.7"
    },
    "autoload": {
        "psr-4": {
            "Controllers\\": "src/controllers/"
        }
    },
    "scripts": {
        "start": "php -S 0.0.0.0:8081 -t public public/index.php",
        "test": "phpunit"
    }
}
```

### Step 3 - run in root
`composer install`

### Step 4 - Create Folders/Files (see files in this git)
```markdown
public\
public\index.php
src\
src\controllers\
src\dependencies.php
src\middlewares.php
src\routes.php
src\settings.php
templates\
templates\index.phtml
```

### TOOLS
Run Serve

`composer start`
