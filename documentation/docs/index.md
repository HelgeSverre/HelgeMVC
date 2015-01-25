# Welcome to HelgeMVC Framework
## A Simple MVC Framework written in PHP.






### What is HelgeMVC?
HelgeMVC is an MVC Framework, which pretty much is just a collection of classes and libraries that is 
meant to separate the business logic from the presentation of your web applications.


My focus with this framework is for it to be very beginner friendly and simple to customize. 
 

I look at it as a starting point for your journey throughout all the MVC Frameworks out there.


### Is HelgeMVC suitable for my project?

That really depends on what you are building, if it is a small to medium size app for yourself, then sure, go ahead and use my framework.

But if you are going to be building a large scale application that needs to be 100% reliable, then probably not...
If that is what you are looking for, go and check out major frameworks such as Symfony 2, CodeIgniter, Zend Framework or Laravel.



### Who is behind HelgeMVC?
[Helge Sverre](https://helgesverre.com), a young web developer that you've probably never heard of, is the developer of 
HelgeMVC (hence the name), I write this framework in my spare time as a hobby, and I use it for my own projects and as 
a learning tool, but anyone is free to contribute code, bug reports and feature requests!


### Quick Example


#### Simple Controller calling a model and loading a view.

```php
<?php
// extend the Controller class.
class Home extends Controller {

    public function Index() {

    	// load the class "About_model" inside the "About_model.php" file
    	// that is in the models directory, you don't need to include _model
		$this->loadModel("about");

		// lets use the model to fetch some posts and assign it to $posts
		$posts = $this->model->getPosts();

		// set the $posts variable to the name "posts" to be used inside the view
		$this->view->setData("posts", $posts);

		// load the view
		$this->view->render("about.index");
	}
} 

?>
```



#### Simple model returning data from the Database

```php
<?php
// extend the Model class.
class About_Model extends Model {

    public function getPosts() {

    	// fetch all the rows from the "posts" table, returns an associative array.
        $result = $this->Db->FetchAll("posts");

        // returns the associative array to our controller.
        return $result;
    }
}

?>

```



#### Simple view displaying variables passed to it from the controller.

```php
<!DOCTYPE html>
<html>
<head>
	<title>My Blog</title>
</head>
<body>
	<h1>Hello Blog!</h1>
	
	<?php   
		// get the "posts" variable and assign it to a variable for ease of use.
		$posts = $this->getData("posts");

		// loop through the posts array and display our posts
		foreach ($posts as $post) {

			// Display the post title inside h2 tags.
			echo "<h2>" . $post["title"] . "</h2>";

			// Display our post content inside <p> tags.
			echo "<p>" . $post["content"] . "</p>";

		}
	?>

</body>
</html>
```


#### Help make HelgeMVC better!
If you spot anything that is either wrong or doesn't make any sense in this manual, 
be sure to let me know either by sending me and [email](mailto:email@helgesverre.com) or via [GitHub Issues](https://github.com/HelgeSverre/HelgeMVC/issues).
