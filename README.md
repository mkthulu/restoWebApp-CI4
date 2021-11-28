Resto Web App With CI4
==============================================



Feature
-------

- Pesan dan handle pesanan dari user

Installation
------------


**1** clone atau download file 


```bash

git clone https://github.com/wgnalvian/restoWebApp-CI4.git
```

**1.1** import sql file

import sql file, namaa sql  "iki-database.sql"


**2.** Set CI_ENVIRONMENT, base url, index page, and database config in your `.env` file based on your existing database (If you don't have a `.env` file, you can copy first from `env` file: `cp env .env` first). If the database not exists, create database first.

```bash
# .env file
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080'
app.indexPage = ''

database.default.hostname = localhost
database.default.database = ci4_crud
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

**3.** Run development server:

```bash
php spark serve
```
**4** Test browser
