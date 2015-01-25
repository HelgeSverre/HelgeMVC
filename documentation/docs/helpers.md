# Helpers

In HelgeMVC there are a few static functions inside of a class called Helper, these functions are meant to be used 
for convenience and readability in your entire application, from the controller, model and even in the view.

## Complete list of helpers
Below are a complete list of all he helpers included in HelgeMVC, I will explain all of them in detail.

- ```Helper::URL();```
- ```Helper::LoadScript();```
- ```Helper::Anchor();```
- ```Helper::Redirect();```
- ```Helper::LoadStylesheet();```
- ```Helper::LoadPartial();```
- ```Helper::Title();```
- ```Helper::isSecure();```



## Helper::URL()
#### Returns the base URL of your website

The ```URL()``` helper will simply return the base url of your website, this function is also SSL aware and will return the HTTPS version of the domain if the script is being run under HTTPS.

If I were to run that script on this page right now it would return **https://helgesverre.com/**, this function does **NOT** include the base path of the application itself if it is inside of a sub directory. 

#### Example:
```php
echo Helper::URL();
```  

#### Output:
```
https://helgesverre.com/
```  


## Helper::LoadScript()
#### Includes a javascript file via the script tags.

The ```LoadScript()``` function takes 1 parameter, which is a filename to a file inside of the javascript directory of your application, by default this is inside of **public/js/**, but this can be changed in the [Configuration](configuration.md).

#### Example:
```php
Helper::LoadScript("script.js");
Helper::LoadScript("thirdparty/jquery.js");
```

#### Output:
```html
<script src="https://helgesverre.com/public/js/script.js"></script>;
<script src="https://helgesverre.com/public/js/thirdparty/jquery.js"></script>;
```


## Helper::Anchor()
#### Generates an anchor tag.

The ```anchor()``` function is a convenience function to generate a anchor tag, 
it has 5 parameters, 3 of which is optional.

Parameters:

1. $href (Required): The location in which the anchor tag will lead.
2. $text (Required): The text to display inside the anchor tag.
3. $class (Optional): give the anchor tag an optional class attribute
4. $id (Optional): give the anchor tag an optional id attribute
5. $rel (Optional): give the anchor tag an optional rel attribute


#### Example:

```php
Helper::Anchor("https://google.com", "Look a google!");
Helper::Anchor("https://helgesverre.com", "Helge Sverre", "btn", "awesome-link", "nofollow");
```

#### Output:

```html
<a href="https://google.com">Look a google!</a>
<a href="https://helgesverre.com" class="btn" id="awesome-link" rel="nofollow">Helge Sverre</a>
``` 

## Helper::Redirect()
#### Simply redirects the user to a location

The redirect function will simply redirect a user via the ```Header("Location: http://example.com")``` function.

#### Example:
```php
Helper::Redirect("http://google.com");
Helper::Redirect("about/me");
```

## Helper::LoadStylesheet()
#### Includes a CSS stylesheet file.

The ```LoadStylesheet()``` function takes 1 parameter, which is a filename to a file inside of the stylesheet directory of your application, by default this is inside of **public/css/**, but this can be changed in the [Configuration](configuration.md).

#### Example:
```php
Helper::LoadStylesheet("style.css");
Helper::LoadStylesheet("thirdparty/bootstrap.css");
```

#### Output:
```html
<link rel='stylesheet' href='https://helgesverre.com/public/css/style.css'>";
<link rel='stylesheet' href='https://helgesverre.com/public/css/thirdparty/bootstrap.css'>";
```

## Helper::LoadPartial()
Please see this page [Views - Partials](views.md#partials).

## Helper::Title()
#### Wraps whatever string you pass to it inside of a &lt;title&gt; tag

#### Example:
```php
Helper::Title("This is my website");
```

#### Output:
 
```html
<title>This is my website</title>
```


## Helper::isSecure()
#### Returns whether or not the website is running under HTTPS or not.

This function returns true if the website is running under HTTPS, false if it is not.

#### Example:
```php
if (Helper::isSecure()) {
    echo "Website has HTTPS";
} else {
    echo "Website has not HTTPS";
}
```

#### Output(in my case):

```html
Website has HTTPS
```