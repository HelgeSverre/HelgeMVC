# Models

## What is a model?

A model is usually the data source for your application, you laod a model when you need to fetch information from a database, file or service.


## How to create a Model
To create a model you need to create a new file that has an appropriate name 
suffixed with "_model.php", for example ```Users_model.php``` you then need to 
create a class inside of that file that extend the ```Model``` class, you also need 
to suffix the class with ```_Model```, if you do not follow this naming scheme, 
HelgeMVC will not be able to load your models properly.



## Simple Model
```php
<?php
// extend the Model class.
class Users_Model extends Model {

    public function getUsers() {

        // fetch all the rows from the "users" table, returns an associative array.
        $result = $this->Db->FetchAll("users");

        // returns the associative array to our controller.
        return $result;
    }
}
```


## Loading a model from the controller

To load the model form the controller you use the ```loadModel();``` function.

```php
<?php
// extend the Controller class.
class Home extends Controller {

    public function Index() {

        // load the class "Users_model" inside the "Users_model.php" file
        // that is in the models directory, you don't need to include _model
        $users = $this->loadModel("users");

        // lets use the model to fetch some posts and assign it to $posts
        $posts = $this->model->getUsers();
        
        // $posts now contain the associative array that the model returned in the previous example
        // We could now pass this variable to a view to be displayed.
    }
} 
```
