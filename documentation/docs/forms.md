# Form Builder

Being the lazy person that I am, I decided I would create some sort of system for myself to be able to quickly 
"generate" HTML forms instead of going through the process of writing them out in plain HTML by myself.


The form builder in HelgeMVC is still in it's infancy, but It's continuously being updated and improved.


## Generating a new form.

To generate a new form you first have to instantiate a new object from the Form class, you do this by doing this:
```php
// Parameter 1 (required): form action attribute
// Parameter 2 (optional): form method attribute
// Parameter 3 (optional): id attribute to the form tag
// Parameter 4 (optional): class attribute to the form tag
$form = new Form(Helper::URL() . "form/submit", "POST". "loginform", "loginformstyle");
```

## Displaying the form
To actually display the form you've created, you run the ```display()``` function within the Form class like so:
```
// Build the form
$form = new Form(Helper::URL() . "form/submit", "POST". "loginform", "loginformstyle");

// Display the form
echo $form->display();

```


This will generate the following html, an empty form:
```
<form action="http://website.com/form/submit" method="POST" id="loginform" class="loginformstyle">
</form>
```


## Adding labels and input fields.

### Labels
If you wish to generate labels for your form inputs, you can use the ```addLabel()``` function within the Form class, we are going to add a label tag to the form we created above.

```php
// Form from above.
$form = new Form(Helper::URL() . "form/submit", "POST". "loginform", "loginformstyle");

// Parameter 1 (Required): text to display inside the label tag
// Parameter 2 (Optional): add a FOR attribute to the label tag.
// Parameter 3 (Optional): add an ID attribute to the label tag.
// Parameter 4 (Optional): add a CLASS attribute to the label tag.
$form->addLabel("Username");
echo $form->display();
```

Which will generate the following HTML:

```html
<form action="http://website.com/form/submit" method="POST" id="loginform" class="loginformstyle">
    <label>Username</label>
</form>
```


### Text and Password Fields
To generate a generic input field like a text, email or password field, you simply call the ```addInput()``` function within the Form class, we are going to add a text input and a password input field to the form we created above.

```php

// Gemerate our form object
$form = new Form(Helper::URL() . "form/submit", "POST", "loginform", "loginformstyle");

// Add a label to the username input field
$form->addLabel("Username", "username");

// Parameter 1 (Required): Type of input field you want to add (text, email, password)
// Parameter 2 (Required): The name attribute for the input field
// Parameter 3 (Optional): Add a placeholder attribute to the input fields
// Parameter 4 (Optional): Add a value attribute to the input field
// Parameter 5 (Optional): Add an id attribute to the input field
// Parameter 6 (Optional): Add a class attribute to the input field
// Add a text input field, note that if you want to omit a parameter you give it a null value.
$form->addInput("text", "username", "Your username...", null, "userfield", "form-field" );

// Add another label for the password input field
$form->addLabel("password", "Password");

// Add a password input field with no placeholder or value.
$form->addInput("password", "Password", null, null, "pwfield", "form-field" );

// Display the generated form.
echo $form->display();
```

This will generate the following HTML:

```html

<form action="http://website.com/form/submit" method="POST" id="loginform" class="loginformstyle">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Your username..." id="userfield" class="form-field" />
    <label for="password">Password</label>
    <input type="password" name="username" id="pwfield" class="form-field" />
</form>

```

### Submit button

You can also add a submit button by using the ```addSubmit()``` function inside the Form class like this:

```php

// Gemerate our form object
$form = new Form(Helper::URL() . "form/submit", "POST". "loginform", "loginformstyle");

// Add a label to the username input field
$form->addLabel("Username", "username");

// Add a text input field with a placeholder, id and class
$form->addInput("text", "username", "Your username...", null, "userfield", "form-field" );

// Add another label for the password input field
$form->addLabel("password", "Password");

// Add a password input field with no placeholder or value.
$form->addInput("password", "Password", null, null, "pwfield", "form-field" );

// Parameter 1 (Optional): the name of the submit button
// Parameter 1 (Optional): The value of the submit button
// Parameter 1 (Optional): Add an id to the submit button
// Parameter 1 (Optional): Add a class to the submit button
$form->addSubmit("login", "Login to your account", "loginbutton", "form-button");

// Display the generated form.
echo $form->display();

```

This will generate the following HTML:

```html

<form action="http://website.com/form/submit" method="POST" id="loginform" class="loginformstyle">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Your username..." id="userfield" class="form-field" />
    <label for="password">Password</label>
    <input type="password" name="username" id="pwfield" class="form-field" />
    <input type="submit" name="login" value="Login to your account" id="loginbutton" class="form-button" />
</form>

```