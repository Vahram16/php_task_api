# STEP 1: Install all dependencies
composer install
# STEP 2: Create .env
Copy the .env.example file and rename it to .env. In this file you have to add your database connection information.
# STEP 3:Create schema
Run this command vendor\bin\doctrine-migrations migrate -n
# Step 4: Serve your App
cd public/
php -S localhost:8000

# API ENDPOINTS

* GET: api/phone-book<br> 
parameters: id*<br> 
description: Return phone book by id.

* GET: api/phone-books<br> 
description: Return all phone-books.

* POST: api/create-phone-book<br> 
parameters:<br> 
firstname*<br> 
lastname<br> 
country_code<br> 
phone_number*<br> 
timezone<br> 
description: Create new  phone book.

* POST: api/update-phone-book<br> 
parameters:<br> 
 id*<br> 
 firstname<br> 
 lastname<br> 
 country_code<br> 
 phone_number<br> 
 timezone<br> 
description: Update  phone book by id.

* DELETE: api/delete-phone-book<br> 
parametrs:<br> 
 id*<br> 
description: Delete  phone book by id.








