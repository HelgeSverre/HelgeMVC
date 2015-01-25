# Configuration

If you want to use HelgeMVC in your project, some configuration is required,
but don't worry, it's very straight forward to configure HelgeMVC for your project.


## .htaccess File


The .htaccess file is the file that is responsible for rewriting the URL, there are only 
one setting in that file you should need to modify, and that is the ```RewriteBase``` line.

The ```RewriteBase``` setting specifies which (sub)directory your application is placed in, 
if you place your HelgeMVC application in the **http://website.com/my/app/** directory on your 
web server, you should change the RewriteBase to **/my/app/**, be sure to include the leading slash.

For more details on how htaccess files work and how to configure them, take a look at 
this article from [TutsPlus](https://code.tutsplus.com/tutorials/the-ultimate-guide-to-htaccess-files--net-4757) that goes into more detail on the matter.


```
# Change this setting to whichever directory your app is placed in.
RewriteBase /
```


## Database Configuration 
I've opted to use and extend the functionality of [PDO class](https://php.net/manual/en/class.pdo.php) in this MVC Framework, if you are 
familiar with PDO, that is great, but it is not neccesary, you will find that the abstraction 
functions that I have written will take care of any normal database operation you might want 
to do on a regular basis.


Since **MySQL** is the most popular database management system, 
available on your typical shared host, it is the default database 
that comes configured out of the box with HelgeMVC.
 
If you are going to use another type of database management system, 
please see the advanced Database configuration section.  


### Simple Database Configuration (MySQL)

To configure your hostname, username, password and database, 
you need to edit these values in the **Config.php** file, this 
file is inside of the **libs/** directory. 


#### Example:

```php 
/*
 * DATABASE CONFIGURATION
 */
define('DB_HOST', 'localhost');     // the hostname/ip of your database server.
define('DB_NAME', 'databasename');  // the database name you will be using.
define('DB_USER', 'username');      // the username for your database.
define('DB_PASS', 'password');      // the password for your database.
define('DB_CHARSET', 'utf8');       // the charset, you should just leave this to the default value.

```
These constants are usedby the database class inside **libs/database.php**.
 
Once you've changed these values to whatever is relevant for your environment, 
you should be ready to go.

Easy right? :)


### Advanced Database Configuration (SQLite)

If you want to SQLite(basically a database in a single file) within your 
application, you will need to edit the data source name(DSN) variable that is 
located inside constructor function in the **libs/Database.php** file.


You will have to replace the ```$dns ``` variable like this:

```php
$dsn = "sqlite:database.db" // replace database.db with the PATH to your database file

```
If you are unfamiliar with how PDO works, please consult the 
[PHP.net documentation on the PDO class](https://php.net/manual/en/class.pdo.php).


The built-in [database abstraction functions](database.md) are officially only supported 
on MySQL, althought they should also work on SQLite, although it has not 
been tested nor is it officially supported.

```php
class Database extends PDO {
    
    public function __construct () {
        // Replace the existing $dsn variable with this line:
        $dsn = "sqlite:database.db"
    
        // Initialize the PDO object that we're extending with our dsn string and database Constants
        parent::__construct($dsn, DB_USER, DB_PASS);
        
        // Make PDO return an associative array instead of the default.
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

```


## System Path Configuration

To allow a certain level of flexibility and customizability within HelgeMVC, 
I have made sure to use constants for defining where important system 
directories are located, you may chose to change, rename or move these 
around as you see fit, to do this, all you need to do is to change the 
locations specified in the **libs/Config.php** file.

Scroll down to the section called *SYSTEM PATH CONFIGURATION*:

```php
/*
 * SYSTEM PATH CONFIGURATION
 */
define('CONTROLLERS_PATH', 'controllers/');
define('MODELS_PATH', 'models/');
define('VIEWS_PATH', 'views/');
define('PARTIALS_PATH', VIEWS_PATH . 'partials/');

```

The default configuration is as follows:

- [controllers](controllers.md) are in the **controllers/**
- [models](models.md) are in **models/**
- [views](views.md) are in **views/**
- [partials](views.md#partials) are in in **views/partials/**.

In my humble opinion this is the directory structure that makes the most 
sense, so therefore it is like this by default, but again, you are totally 
free to change this however you like.


## Default Controller

The default controller is the controller that is called when a user have not 
specified which controller to use.

This usually happens whenever someone 
goes to your homepage (http://homepage.com/), by default, this route is 
setup to point to the **Home** controller, this controller is located inside 
the controller directory(default: **controllers/**) and is called **Home.php**.

You can think of this controller as a website's "index.html" file.

To change the default controller you can edit the following line in **libs/Config.php**:

```php
/*
 * DEFAULT CONTROLLER CONFIGURATION
 */
define("DEFAULT_CONTROLLER", "Home");
```
The controller name is the same as the filename **without** the trailing ".php" extension.




### Want more features?
 Send me an [email](mailto:email@helgesverre.com) with your request, or submit a 
 feature request on [GitHub](https://github.com/HelgeSverre/HelgeMVC/issues/new).
