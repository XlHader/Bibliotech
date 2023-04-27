# BIBLIOTECH
## Laravel API

## Installation

### 1. Clone the Git Repository

To get started with the installation of the application, you will first need to clone the Git repository. You can do this by running the following command in your terminal:

```bash
git clone https://github.com/XlHader/Bibliotech
```

#### 2 .ENV

You will need to create a .env file in the root of the project, you can do this by copying the .env.example file and renaming it to .env. You will need to change the following variables:

```bash 
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

### 3. PHP & Composer

You will need to have PHP (8.1 - 8.2) installed on your machine. You can download PHP from the following link: https://www.php.net/downloads

Once you have PHP installed, you can install composer from the following link: https://getcomposer.org/download/

### 4. Install composer dependencies

You will need to install the composer dependencies. You can do this by running the following command in your terminal:

```bash
composer install
```

### 5. Install Sail

If you are using Docker, you will need to install Sail. You can do this by running the following command in your terminal:

```bash
composer require laravel/sail --dev
```

### 6. Run 

To run the application, you will need to run the following command in your terminal:

| Docker | Local |
| :-------- | :------- |
| `./vendor/bin/sail up -d` | `php artisan serve` |

## Process

### 1. Database (Only Local)

You will need to create a database with the name you put in the .env file.

```sql
CREATE DATABASE laravel;
```

### 2. Migrations And Seeders

After the choice, you must run:

| Docker | Local |
| :-------- | :------- |
|`./vendor/bin/sail artisan migrate --seed` | `php artisan migrate --seed` |

## API Documentation

Postman collection is available at the file `postman_collection.json`

### Auth

#### Register

```http
POST /api/register
```

##### Body

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name`    | `string` | **Required**. Name of user |
| `email`   | `string` | **Required**. Email of user|
| `password`| `string` | **Required**. Password of user|
| `admin`   | `boolean`| **Required**. Admin of user|

##### Response

```json
{
    "message": "Usuario creado correctamente",
    "data": {
        "token": "xxxxxxxxxxxxxxxxxxxxxxx",
        "user": {
            "name": "Example",
            "email": "user@example.com",
            "updated_at": "2020-04-27T00:18:08.000000Z",
            "created_at": "2020-04-27T00:18:08.000000Z",
            "id": 1
        }
    }
}
```

#### Login

```http
POST /api/login
```

##### Body

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email`   | `string` | **Required**. Email of user|
| `password`| `string` | **Required**. Password of user|

##### Response

```json
{
    "message": "Sesión iniciada correctamente",
    "data": {
        "token": "xxxxxxxxxxxxxxxxxxxxxxx",
        "user": {
            "id": 1,
            "name": "Exanple",
            "email": "user@example.com",
            "email_verified_at": null,
            "created_at": "2023-04-27T00:18:02.000000Z",
            "updated_at": "2023-04-27T00:18:02.000000Z",
            "admin": false
        }
    }
}
```

#### Logout

```http
POST /api/logout
```

##### Autorization

| Autorization | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Bearer Token`   | `string` | **Required**. Token of user| 

##### Response

```json
{
    "message": "Sesión cerrada correctamente"
}
```

### Document Type

#### Get All Document Types

```http
GET /api/document-types
```

##### Response 

```json
[
    {
        "id": 1,
        "name": "Cédula de Ciudadanía",
        "created_at": "2023-04-27T00:27:04.000000Z",
        "updated_at": "2023-04-27T00:27:04.000000Z"
    },
    {
        "id": 2,
        "name": "Tarjeta de Identidad",
        "created_at": "2023-04-27T00:27:04.000000Z",
        "updated_at": "2023-04-27T00:27:04.000000Z"
    },
    {
        "id": 3,
        "name": "Cédula de Extranjería",
        "created_at": "2023-04-27T00:27:04.000000Z",
        "updated_at": "2023-04-27T00:27:04.000000Z"
    }
]
```

### Autorization

From this point on, you must have a token to access the endpoints.

| Autorization | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Bearer Token`   | `string` | **Required**. Token of user| 

### Client

#### Store Client

```http
POST /api/clients
```

##### Body

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `first_name`    | `string` | **Required**. Name of client |
| `last_name`   | `string` | **Required**. Last name of client|
| `document_type_id`| `integer` | **Required**. Document type of client|
| `document_number`   | `string`| **Required**. Document number of client|
| `birth_date`   | `date`| **Required**. Birth date of client|
| `phone_number`   | `string`| **Optional**. Phone number of client|
| `direction`   | `string`| **Optional**. Direction of client|


##### Response

```json
{
    "message": "El cliente se ha creado correctamente.",
    "data": {
        "first_name": "First Example 3",
        "last_name": "Last Example 3",
        "document_type_id": "1",
        "document_number": "123456781",
        "birth_date": "2002-02-02T00:00:00.000000Z",
        "phone_number": "3131234567",
        "direction": "Calle 85 #32",
        "updated_at": "2023-04-27T00:37:19.000000Z",
        "created_at": "2023-04-27T00:37:19.000000Z",
        "id": 6
    }
}
```

#### Update client

```http
PUT /api/clients/{id}
```

##### Params

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `first_name`    | `string` | **Optional**. Name of client |
| `last_name`   | `string` | **Optional**. Last name of client|
| `document_type_id`| `integer` | **Optional**. Document type of client|
| `document_number`   | `string`| **Optional**. Document number of client|
| `birth_date`   | `date`| **Optional**. Birth date of client|
| `phone_number`   | `string`| **Optional**. Phone number of client|
| `direction`   | `string`| **Optional**. Direction of client|

##### Response

```json
{
    "message": "El cliente se ha actualizado correctamente.",
    "data": {
        "id": 1,
        "first_name": "First Update",
        "last_name": "Last Update",
        "document_type_id": 1,
        "document_number": "123456789",
        "birth_date": "1990-01-01T00:00:00.000000Z",
        "phone_number": "3000000000",
        "direction": "Calle 86 Update",
        "created_at": "2023-04-27T00:40:30.000000Z",
        "updated_at": "2023-04-27T00:40:39.000000Z",
        "deleted_at": null
    }
}
```

#### Delete client

```http
DELETE /api/clients/{id}
```

##### Response

```json
{
    "message": "El cliente se ha eliminado correctamente."
}
```

#### Get All Clients

```http
GET /api/clients
```

```json
{
    "data": [
        {
            "id": 2,
            "full_name": "example 2 example 2",
            "document_type": "Cédula de Ciudadanía",
            "document_number": "123456788",
            "created_at": "2023-04-27T00:40:30.000000Z"
        },
        {
            "id": 3,
            "full_name": "example 3 example 3",
            "document_type": "Cédula de Ciudadanía",
            "document_number": "123456787",
            "created_at": "2023-04-27T00:40:30.000000Z"
        }
    ]
}
```

#### Get Client

```http
GET /api/clients/{id}
```

##### Response

```json
{
    "message": "El cliente se ha obtenido correctamente.",
    "data": {
        "id": 2,
        "first_name": "example 2",
        "last_name": "example 2",
        "document_type_id": 1,
        "document_number": "123456788",
        "birth_date": "1990-01-01T00:00:00.000000Z",
        "phone_number": "3000000000",
        "direction": "example 2",
        "created_at": "2023-04-27T00:44:00.000000Z",
        "updated_at": "2023-04-27T00:44:00.000000Z",
        "deleted_at": null
    }
}
```

### Category

#### Get All Categories

```http
GET /api/categories
```

```json
{
    "data": [
        {
            "id": 1,
            "name": "Ciencía Ficción",
            "icon": "https://cdn-icons-png.flaticon.com/512/3500/3500421.png"
        },
        {
            "id": 2,
            "name": "Terror",
            "icon": "https://cdn-icons-png.flaticon.com/512/2589/2589413.png"
        }
    ]
}
```

### Book

#### Store Book

```http
POST /api/books
```

##### Body

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `title`    | `string` | **Required**. Title of book |
| `author`   | `string` | **Required**. Author of book|
| `number_pages`| `integer` | **Required**. Number pages of book|
| `icon`   | `string`| **Required**. Icon of book|
| `isbn_code`   | `string`| **Required**. ISBN code of book|
| `category_id`   | `integer`| **Required**. Category of book|

##### Response

```json
{
    "message": "El libro se ha creado correctamente.",
    "data": {
        "title": "El imperio final",
        "author": "Brandon Sanderson",
        "number_pages": "720",
        "icon": "https://unlibroparaestanoche.files.wordpress.com/2016/11/img_0301.png",
        "isbn_code": "987654435",
        "category_id": "3",
        "updated_at": "2023-04-27T00:44:07.000000Z",
        "created_at": "2023-04-27T00:44:07.000000Z",
        "id": 27
    }
}
```

#### Update Book State

```http
PUT /api/books/{id}
```

##### Params 

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `is_avaible`    | `boolean` | **Required**. State of book |

##### Response 

```json
{
    "message": "El libro se ha actualizado correctamente.",
    "data": {
        "id": 1,
        "title": "El imperio final",
        "author": "Brandon Sanderson",
        "number_pages": 720,
        "icon": "https://unlibroparaestanoche.files.wordpress.com/2016/11/img_0301.png",
        "isbn_code": "987654435",
        "category_id": 3,
        "is_avaible": false,
        "created_at": "2023-04-27T00:44:07.000000Z",
        "updated_at": "2023-04-27T00:44:07.000000Z",
        "deleted_at": null
    }
}
```

#### Delete Book

```http
DELETE /api/books/{id}
```

##### Response

```json
{
    "message": "El libro se ha eliminado correctamente."
}
```

#### Get All Books

```http
GET /api/books
```

```json
{
    "data": [
        {
            "id": 4,
            "title": "Drácula",
            "author": "Bram Stoker",
            "number_pages": 418,
            "icon": "https://uxwing.com/wp-content/themes/uxwing/download/education-school/read-book-icon.png",
            "isbn_code": "6534123",
            "category_id": 2,
            "is_avaible": true,
            "loans": []
        },
        {
            "id": 5,
            "title": "Harry Potter y la piedra filosofal",
            "author": "J.K. Rowling",
            "number_pages": 223,
            "icon": "https://uxwing.com/wp-content/themes/uxwing/download/education-school/read-book-icon.png",
            "isbn_code": "52132143",
            "category_id": 3,
            "is_avaible": true,
            "loans": []
        }
    ]
}
```

#### Get Book

```http
GET /api/books/{id}
```

##### Response

```json
{
    "message": "El libro se ha obtenido correctamente.",
    "data": {
        "id": 4,
        "title": "Drácula",
        "author": "Bram Stoker",
        "number_pages": 418,
        "icon": "https://uxwing.com/wp-content/themes/uxwing/download/education-school/read-book-icon.png",
        "isbn_code": "6534123",
        "category_id": 2,
        "is_avaible": true,
        "created_at": "2023-04-27T00:44:07.000000Z",
        "updated_at": "2023-04-27T00:44:07.000000Z",
        "deleted_at": null
    }
}
```

### Loan

#### Store Loan

```http
POST /api/loans
```

##### Body

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `client_id`    | `integer` | **Required**. Client id |
| `books_ids`   | `string:array` | **Required**. Books ids|

#### Response

```json
{
    "message": "El préstamo de los libros Drácula, Harry Potter y la piedra filosofal, Harry Potter y la cámara secreta se ha realizado correctamente."
}
```

#### Get All Loans

```http
GET /api/loans
```

```json
{
    "data": [
        {
            "id": 1,
            "client": "Client::Object",
            "book": "Book::Object",
            "loan_date": "2023-04-27T00:00:00.000000Z",
            "return_date": null
        },
        {
            "id": 2,
            "client": "Client::Object",
            "book": "Book::Object",
            "loan_date": "2023-04-27T00:00:00.000000Z",
            "return_date": null
        }
    ]
}
```

#### Get Loan

```http
GET /api/loans/{id}
```

##### Response

```json
{
    "message": "El préstamo se ha obtenido correctamente.",
    "data": {
        "id": 1,
        "client": "Client::Object",
        "book": "Book::Object",
        "loan_date": "2023-04-27T00:00:00.000000Z",
        "return_date": null
    }
}
```

#### Delete Loan

```http
DELETE /api/loans/{id}
```

##### Response

```json
{
    "message": "El préstamo se ha eliminado correctamente."
}
```

#### Update Loan

```http
PUT /api/loans/{id}
```

##### Params
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `return_date_limit`    | `date` | **Optional**. Return date |

### Refund

#### Store Refund

```http
POST /api/loans/{id_loan}/refunds
```

##### Response

```json
{
    "message": "Devolución registrada correctamente para el libro Harry Potter y la piedra filosofal con 4 días de retraso y una penalización de $2000",
    "data": {
        "loan_id": 2,
        "refund_date": "2023-05-17T00:00:00.000000Z",
        "days_of_delay": 4,
        "penalty": 2000,
        "updated_at": "2023-04-27T00:44:10.000000Z",
        "created_at": "2023-04-27T00:44:10.000000Z",
        "id": 1
    }
}
```

#### Get All Refunds

```http
GET /api/refunds
```

```json
{
    "data": [
        {
            "id": 1,
            "loan": "Loan::Object",
            "days_of_delay": 4,
            "penalty": 2000,
            "refund_date": "2023-05-17T00:00:00.000000Z",
            "created_at": "2023-04-27T00:44:10.000000Z"
        }
    ]
}
```

#### Get Refund

```http
GET /api/refunds/{id}
```

##### Response

```json
{
    "message": "Devolución encontrada",
    "data": {
        "id": 1,
        "loan_id": 2,
        "refund_date": "2023-05-17T00:00:00.000000Z",
        "days_of_delay": 4,
        "penalty": 2000,
        "created_at": "2023-04-27T00:44:10.000000Z",
        "updated_at": "2023-04-27T00:44:10.000000Z",
        "deleted_at": null,
        "loan": "Loan::Object"
    }
}
```