# Coding Style Guide 

## Tabs vs Spaces
For your own project you may choose whichever you like, 
but if you are going to contribute to the development 
of HelgeMVC you have to use tabs, or at the very least, 
translate your spaces into tab characters before commiting.


I personally develop using tabs that are configured to be 4 spaces long.

## Curly Braces

You shall use Use **K&R Style** where the starting curly brace in a class or function declaration 
shall be on the same line as the declaration as such:

```
class HelgeClass {
    function HelgeFunction() {
        // code...    
    }
}
```

This is not acceptable(Allman style):

```
class HelgeClass 
{
    function HelgeFunction() 
    {
        // code...    
    }
}
```

Furthermore, when nesting if statements or loops, the ending 
curly braces shall be neatly indented without any blank lines as such:
```
if(condition) {
    while(anotherCondition) {
        if(anotherAnotherCondition) {
            // code...
        }
    }
}

```

This is not acceptable:

```
if(condition) {
    if(anotherCondition) {
        if(anotherAnotherCondition) {
            // code..
        }
        
        
    }
    
}
```


## Whitespace

There shall be 1 space between a function, if statement a loop and it's 
corresponding starting curly brace, this improves readability
and keeps everything consistent.

There shall not be any whitespace inside of a function declaration:

```
function($noSpaceAtEitherSideOfThisParam) {
    // code...
}
```

There shall always be **2 empty lines** between every function.


## Function, Class and Variable naming

Class names shall always have a capital first letter as such:
```
class Classname extends Controller {
    // code...
}
```

Functions inside controllers shall also have a capital first letter:
```
class Classname extends Controller {
    function Home() {
        // code...
    }
}
```

Functions in models should follow headlessCamelCase 
styling where the first letter is lowercase and the next words are capitalized as such:

```
class Classname extends Model {
    function getPostsFromRow() {
        // code...
    }
    
    
    function setRowInactive() {
        // code...
    }
}
```


Variable names should also follow headlessCamelCase styling.