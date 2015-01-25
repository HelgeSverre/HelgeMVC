# Views

Views are the parts responsible for the presentation of your application or website, you may think of them 
as templates where you display the data that you pass to it via the controllers.

The base view class is instantiated in the base controller constructor, which means you have access to use any 
view functions inside the controller, without the need to create a new view object yourself.

To access the view object, you write ```$this->view```. below are a list of things you can do with the view object.

## Rendering Views

 Rendering a view inside of your controller pretty much means that you
 load a template file, give it some data display and then let it take
 care of how it should look like, in this case I will be showing how you can display a simple template file placed inside your views/ folder called "home"
 To use a view inside of your controller we simply have to render it by
 using the ```$this->view->render()``` function.


 You use this function inside of the controller as such:

```php
<?php
// extend the Controller class.
class Home extends Controller {

    public function Index() {
		// load the viewfile **index.php** in the **about/** directory
		$this->view->render("about.index");
	}
}
?>
```

 in the ```$this->view->render()``` function, the only paramters you need to give it is the view file, this is
 the represented by a string like this: ``` "directory.file" ```, a dot ( . ) is used as a directory separator
 instead of a slash ( / )


## Passing data to views
To pass data to a view, you will be using the ```$this->view->setData("name", $data); ``` function, the first parameter is the identifier for the data, you can think of it like a variable name that you use to access the data, the second paramter is the data, this can be an array, string or object.

This is how you would pass an array of color names to your view:
```php
<?php
// extend the Controller class.
class Home extends Controller {

    public function Index() {

        // Create an array of nice colors
        $colors = array("yellow", "blue", "black", "green", "pink", "purple");

		// Pass our array of colors to the view, by giving it the name "nicecolors".
		$this->view->setData("nicecolors", $colors);

		// load the "index" view inside the home directory.
		$this->view->render("home.index");
	}
}
?>
```


## Accessing data in the view

To access data in your views, you simply call the ```$this->view->getData("name");``` function inside our view, 
the string you pass to the getData function is the identifier for the data you set above, to access the "nicecolors" 
array we set above, you should call the getData function and pass it the string "nicecolors", here is an example:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Website of Colors</title>
</head>
<body>
    <h1>My Favorite Colors!</h1>

    <?php
        // get the "nicecolors" variable and assign it to the $colors variable for ease of use.
        $colors = $this->getData("nicecolors");

        // loop through the color array and display each one.
        foreach ($colors as $color) {

            echo $color;

        }
    ?>

</body>
</html>
```


# Partials
A partial in HelgeMVC is sort of like a "module", that you can insert anywhere in your views, this can be very useful for including elements like comment forms, contact forms or sidebars on multiple pages in your application.

To use a partial from within your view, all you need to do is to call the Helper function called ```Helper::LoadPartial()```.

Partial files are by default stored inside of the **views/partials/** directory, although this can be changed by editing the [System Path Configuration](configuration.md).

## Loading a Partial
Here is an example of loading in a contact form partial inside of a view:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Contact me</title>
</head>
<body>
    <h1>Contact me</h1>
    
    <p>You can send me an email by using the contact form below</p>

    <?php 
    // Parameter 1 (required): The name of the partial file to include, without the ".php" extension.
    Helper::LoadPartial("contactform"); 
    ?>

</body>
</html>

```

This will cause the ```LoadPartial()``` function to go inside the **views/partials/** directory and include a file called "contactform.php", you should not include the .php extension.

As with loading normal views, slashes in filepaths are replaced with dots (.), be sure to use dots if you want to include a partial that is in subdirectory. 


If the partial **file does not exist**, HelgeMVC will display the Error view, you may chose to replace this view with your own custom "error page", or leave the default, since it will display the error to you.