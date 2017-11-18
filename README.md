### insert
  _Insert todo_

* **URL**

  _/insert.php_

* **Method:**

  `POST`

* **Data Params**

   **Required:**
 
   `name=[string]`
   `description=[string]`
   `duedate=[string] must follow this format 2017-08-31`

### update
  _Update todo using id_

* **URL**

  _/update.php_

* **Method:**

  `POST`

* **Data Params**

   **Required:**
 
   `name=[string]`
   `description=[string]`
   `duedate=[string] must follow this format 2017-08-31`
   `id=[string]`

### delete
  _Delete todo using id_

* **URL**

  _/delete.php_

* **Method:**

  `POST`

* **Data Params**

   **Required:**
 
   `id=[string]`
   
### select
  _select all todos_

* **URL**

  _/select.php_

* **Method:**

  `GET`

### select
  _Search todo using name_

* **URL**

  _/select.php_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `name=[string]`
 
    
