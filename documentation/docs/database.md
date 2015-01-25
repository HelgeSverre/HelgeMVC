# Database

The database class in HelgeMVC is an extension of PDO, with a few convenient 
abstraction functions added on to it, which means that you can get the most common 
and basic stuff done as quick as possible, speeding up your development process.


The database class is instantiated in the Model constructor, so if you are going to overwrite the model constructor.

# Fetching From the Database

To quickly get data from the database you can either use the native PDO functions to construct your own query, or you can use the built in functions for fetching data.


## FetchAll()

The ```FetchAll()``` function allows you to fetch all columns and rows from a table, it will return an associative array.


```php
// Create new database object.
$db = new Database();

// Parameter 1 (required): the table to fetch data from
// Returns associative array on success, false on failure.
$users = $db->FetchAll("users");

print_r($users);
```

The code above will grab all the data inside of the user table and assign it as an associative array to the ```$users``` variable, 
after that we print it out to the screen to see it's structure.



##  FetchWhere()

```php
// Create new database object.
$db = new Database();

// Parameter 1 (required): the table to fetch data from in the database
// Parameter 2 (required): the field to test against $value
// Parameter 3 (required): the the value to look for
// Returns associative array on success, false on failure.
$my_user = $db->FetchWhere("users", "username", "helgesverre");

print_r($my_user);
```

##  FetchWhereID()

Fast way to grab a record from a table that has a column named "id", the 
following code example will return an associative array of the user with id of 5.

```php
// Create new database object.
$db = new Database();

// Parameter 1 (required): the table to fetch data from in the database
// Parameter 2 (required): the id to test against $value
// Returns associative array on success, false on failure.
$my_user = $db->FetchWhereID("users", 5);
// Will result in a query that looks like this: "SELECT * FROM users WHERE id = 5"

print_r($my_user);
```


# Deleting from the Database


## DeleteWhereID()
Deletes a row from a table where the column named id is equal to the the second parameter.

```php
// Create new database object.
$db = new Database();

// Parameter 1 (required): the table to delete data from.
// Parameter 2 (required): the value of the id column in the row to delete.
// Returns amount of rows affected, if that value is 0 the query failed.
if ($db->DeleteWhereID("users", 5) > 0 ) {
    echo "User with id of 5 deleted";
}

```


# Inserting into the Database 

## Insert()

builds up an SQL statement from an associative array and executes it, the keys in the associative array in the second parameter needs to exist beforehand, the function **does not** alter the table structure to accommodate unknown keys.
    
```php
// Create new database object.
$db = new Database();

// Parameter 1 (required): the table to insert the data to
// Parameter 2 (required): associated array of data to be inserted into $table
// Returns amount of rows affected, if that value is 0 the query (most likely) failed.
$result = $db->Insert("users", array(
    "username" => "helgesverre",
    "password" => "5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8",  
    "email" => "email@helgesverre.com"
);

if ( $result > 0 ) {
    echo "User successfully created.";
} else {
    echo "Ooops, something went wrong...";
}

```
If you were wondering, the value of password is an SHA-256 hash of the word "password".

If anything is unclear, you can always go into the /libs/Database.php and read my comments and read the code yourself, or you can email me at [email@helgesverre.com](mailto:email@helgesverre.com)