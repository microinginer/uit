Yii 2 my app bootstrap4
============================
Configure
-----
```bash
cp env.dist .env
```

Install
-----
```bash
composer install
php yii migrate
```

Updating DB schema
----
```bash
php yii cache/flush-schema
```

Create User
---
```
php yii user/create admin@email.com username password1234
```
