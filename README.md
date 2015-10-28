# HelgeMVC Framework

**Don't use this, it is not secure and it uses old practices that are outdated today.**

## Download and Manual

* Download: [https://helgesverre.com/mvcframework/download/](https://helgesverre.com/mvcframework/download/)
* Documentation:  [https://helgesverre.com/mvcframework](https://helgesverre.com/mvcframework)



### What is HelgeMVC?
HelgeMVC is an MVC Framework, which pretty much is just a collection of classes and libraries that is 
meant to separate the business logic from the presentation of your web applications.


My focus with this framework is for it to be very beginner friendly and simple. 
 

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


##### Simple Controller calling a model and loading a view.

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

		// Load the view and set the $posts variable
		// to the name "posts" to be used inside the view
		$this->view->render("about.index", array("posts", $posts);
	}
} 

?>
```



##### Simple model returning data from the Database

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



##### Simple view displaying variables passed to it from the controller.

```php
<!DOCTYPE html>
<html>
<head>
	<title>My Blog</title>
</head>
<body>
	<h1>Hello Blog!</h1>
	
	<?php   
		// The $posts variable is passed to the view by the controller
		// loop through the posts array and display our posts
		foreach ($posts as $post) {

			// Display the post title inside h2 tags.
			echo "<h2>" . $post["title"] . "</h2>";

			// Display our post content inside <p> tags.
			echo "<p>" . $post["content"] . "</p> <hr />";

		}
	?>

</body>
</html>
```




