##STEP 1: Install all dependencies 
composer install
STEP 2: Create .env
Copy the .env.example file and rename it to .env. In this file you have to add your database connection information.
STEP 3:Create schema
Run this command vendor\bin\doctrine-migrations migrate -n
Step 4: Serve your App
cd public/
php -S localhost:8000

API ENDPOINTS
* - required

GET: api/phone-book 
parameters: id* 
description: Return phone book by id.

GET: api/phone-books 
description: Return all phone-books.

POST: api/create-phone-book
parameters :
firstname*,
lastname
country_code
phone_number*
timezone
description: Create new  phone book.

POST: api/update-phone-book
parameters :
id*
firstname,
lastname
country_code
phone_number
timezone
description: Update  phone book by id.

DELETE:api/delete-phone-book
parametrs:
id*
description: Delete  phone book by id.









