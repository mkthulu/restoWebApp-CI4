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


**2.** copy file `.env.copy`  menjadi `.env` lalu setting sesuai database server kamu

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
