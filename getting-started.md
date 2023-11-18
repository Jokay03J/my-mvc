# Getting Started

## Install dependencies
You must have mysql PDO extension.\
N.B: If you want change to PDO extension(postgreSQL, ect..) you must change connection url on `Database` core class.

## Setup config
You must have a `config.json` for store database credidentials and other configs.
You can use `config.exemple.json` file.\
**You must replace with your own credidential**
```json
{
    "database": {
        "name": "dbname", // database name
        "host": "127.0.0.1", // database host
        "port": 3306, // database post
        "user": "root", // database user
        "password": "" // database password
    },
    "ressources": {
        "hostname": "http://localhost:3000" // url for serve local file using RessourceManager
    },
    "views": {
        "notfound": "notfound" // (optional) view loaded when route is not found
    },
    // directory will be scanned when you use class using spl_autoload
    "autoload": [
        "src/Controllers",
        "src/Core",
        "src/Models"
    ]
}
```

## Run
For run project **it recommanded to use the same hostname for serve a file and project** otherwise you must configure a web server and update _$pathRessources_ on `RessourceManager` core class.
```bash
php -S localhost:3000
```