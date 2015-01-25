# Controllers

## What is a controller?

A controller is a class that matches the URL frament a user is trying
to access, so if a user is trying to access this page on your website:
```
http://helgesverre.com/about
```

HelgeMVC will try to look for a file called "About.php" that contains a
class called, you guessed it: **About**.

This happens automatically within HelgeMVC and requires nothing more than
for you to create a controller class with whatever name you want the page to be named.

### Actions/Functions
Within your controller class, you've got functions, which sometimes are called "actions",
although HelgeMVC have no official name for them other than "a controller function".

If a user were to go to this url:
```
http://helgesverre.com/hello/world
```
We learned from before that this would run the **hello** controller, well action's is
what people commonly call functions within that controller in this case, the **world**
part of the url above is the action, which would map to the ```World()``` function
within the Hello class.

Here is an illustration to make it easier to visualize what I am trying to say.


![alt text](img/mvc-controller-action.png "MVC Controller Actions")



## How do i make a controller?
Creating a controller within HelgeMVC is fairly easy, various other frameworks names
files and classes slightly differently, but in HelgeMVC, you don't need to remember
any fancy names.

If you want to create a controller, you simple name your controller
the same as the url you wish it to map to (http://helgesverre.com/**hello**) and extend the main Controller class.

Here is a simple example that would greet the user visiting http://helgesverre.com/**hello** with a nice message.

```
// name our class Hello and extend the base controller class: "Controller".
class Hello extends Controller {

    // create a function to handle the "default" route.
    public function Index() {
        // echo out a welcome message.
        echo "Welcome to my website!";
    }
}
```

Now, you would not usually output anything inside of your controller,
that is the job of the [view](views.md), but for this simple example, it's ok.



