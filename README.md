# cms-with-z-framework

Admin theme allow just Turkish

create a database
connect your database

// if you do not know how you do, you can read my z-framework document.

use zhelper
``` php
> php zhelper db migrate fresh
```

and add
```sql
INSERT INTO `users` (`id`, `priv`, `username`, `password`, `email`, `api_token`) VALUES (NULL, '1', 'admin', 'Y3h3enpo4ljd5AyZc9', 'admin@admin.com', 'test_api_token')
```
this sql code for users table.

admin access:

> url: http://localhost/admin

> username: admin

> password: 123456