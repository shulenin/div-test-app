# Система отправки и приемки заявок

1. Для входа в учетную запись администратора необходимо зарегистрироваться и данные профиля вписать в файле .env

```php
##ADMIN DATA
ADMIN_LOGIN=yourlogin@mail.ru
ADMIN_PASSWORD=
```
2. Ответы на заявки хранятся в файле
```structure
/storage/mails/mail.plain
```

3. Перед использованием системы необходимо произвести миграцию таблиц и внести изменения .env в
```structure
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db
DB_USERNAME=username
DB_PASSWORD=
```

## Система имеет следующую структуру:

```structure
# Главная сайта
route: '/'
method: GET;
    response: /welcome;

# Вход
route: /user/login;
method: GET;
    response: user/login;

# Аутенфикация
route: /user/login;
method: POST;
    request_parameter: [
        _token,
	email,
	password
    ];
    response: [
	    /user/auth,
	    /user/dashboard
	]

# Выход
route: /user/logout;
method: GET;
    response: user/login;


# Страница регистрации
route: /user/register;
method: GET;
    response: user/register;

# Регистрация
route: /user/register;
method: POST;
    request_parameter: [
	   _token,
	   name,
	   email,
	   password        
    ];
    response: /user/login;

# Главная клиента
route: /user/dashboard;
method: GET;
    response: /user/dashboard;

# Отправить запрос
route: /user/request;
method: POST;
    request: [
        _token,
	   user_id,
	   title,
	   description
    ];

# Удаление заявки
route: /user/delete;
method: POST;
    request: [
	    request_id
    ];
	
# Главная админа
route: /admin/requests;
method: GET;
    request: [
	    filterByIndex,
	    filterByDate
    ];


# Страница с запросом пользователя
route: /admin/user;
method: GET;
    request: [
	request_id
];


# Отправить ответ на запрос клиента
route: /admin/request;
method: PUT;
    request: [
	request_id,
	    user_id,
	    answer
    ];
```

## Возможности клиента
- регистрация
- вход в учетную запись
- просмотр оставленных заявок
- отправка заявок
- удаление заявок

## Возможности администратора
- вход в учетную запись
- просмотр всех заявок
- отправка ответа на почту клиента
- фильтровать заявки по статусу и времени отправки