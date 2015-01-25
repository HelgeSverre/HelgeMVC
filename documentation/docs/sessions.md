# Sessions 


Sessions are an important part of any web application that deals with authentication, HelgeMVC does not have any extensive session wrapper classes other than simply setting and getting a session key.

## Technical Information

In HelgeMVC, a session object is set in the base controller's constructor, therefore sessions are available everywhere in your application, you do not need to initialize the session class yourself.



## Setting a session variable

You can very easily set a session variable by using the static function ```set()```  within the Session class as follows:

```php

// Parameter 1 (Required): the name of the session key to set.
// Parameter 2 (Required): the value to give the session key
Session::set("loggedin", 1);
```

This would be the equivilant of doing this in plain php:

```php
$_SESSION["loggedin"] = 1;
```

## Getting a session variable

To get a session variable, you simply call the static function ```get()``` within the Session class like this:

```php
// Parameter 1 (Required): the name of the session key to get.
$isLoggedIn = Session::set("loggedin");

if (isLoggedIn) {
    echo "Welcome";
} else {
    die("Get out of my lawn!");
}
```

In essence, all this does is this:

```php
return $_SESSION["isLoggedIn"];
```

Pretty basic and straight foreward, you may choose if you want to use these functions or to use native PHP session in your application. 