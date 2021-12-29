Resto Anyar - Restaurant Web App With CI4
==============================================


Feature
-------

Fitur guest / tamu :
- Fitur login dengan metode 'guest'
- Fitur daftar makanan
- Fitur detil makanan
- Fitur pemesanan makanan
- Fitur "check-out"

Fitur admin :
- Fitur login admin
- Fitur daftar pesanan
- Fitur detil pesanan
- Fitur penyajian pesanan
- Fitur daftar makanan
- Fitur detil makanan
- Fitur ubah detil makanan
- Fitur daftar tamu
- Fitur pembayaran tamu
- Fitur ubah kata sandi


Installation
------------

**1** clone atau download file 

```bash
git clone https://github.com/wgnalvian/restoWebApp-CI4.git
```

**1.1** import sql file

SQL file berada pada folder "### DATABASE ###"



**2.** Set CI_ENVIRONMENT, base url, index page, and database config in your `.env` file based on your existing database (If you don't have a `.env` file, you can copy first from `env` file: `cp env .env` first).

**2.1** copy file `.env.copy`  menjadi `.env` lalu setting sesuai database server kamu


```bash
# .env file
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080'

database.default.hostname = localhost
database.default.database = ci4_crud
database.default.username = root
database.default.password = <root_password>
```

**3.** Run development server:

```bash
php spark serve
```

**4** Test pada browser
