# Cookies and sessions

Things about cookies

## Why use cookies and/or sessions?

The HTTP (and HTTPS) protocol used in requesting and sending web pages between browser and server is a **stateless** protocol. In other words, it doesn’t keep track if requests for different pages belong to the same visitor. The server simply receives a request and sends the corresponding page.

As such, “remembering” any information across multiple pages is impossible. With basic HTTP, we could not implement logging in to any services or anything that requires multiple steps, like buying things online or doing transactions in an online bank.

That’s where cookies and sessions come in.

## What is a cookie?

A cookie is a small piece of data stored in the user’s web browser (user’s computer). In file system, these appear as text files. Cookies can be used to store information like user preferences. Cookies can be set to expire when the user closes the browser or at the time of the server programmer’s choosing.

When a user visits a website, the server can send a cookie to the user's browser. When the same user visits the same domain (for example, bc.fi) again, the browser automatically sends all the cookies belonging to the same domain to the server.

## What is a session?

Unlike with cookies, the information stored in a session is saved in the server. Only the session identifier (session ID) is sent to the browser as a cookie. This makes sessions more secure since the possibly sensitive user information doesn’t leave the server. When the browser sends the cookie containing the session ID back to the server, the server retrieves the session variables from its own storage.

Sessions are useful for storing data that’s connected to a certain visit of a certain user. A session can’t persist across multiple visits (unlike cookies). A session expires either when the browser is closed or it’s explicitly destroyed in PHP code. Sessions are the most common way to implement logging in to a web service.

_If the session does persist across multiple visits or the same session ID gets used over and over again, there’s something wrong with your server. The repeating session ID was a common problem at least with XAMPP at one point in time._

**NOTE:** Session id cookie is also a cookie. Therefore it can be stolen, although taking advantage of it is considerably more difficult than with a regular cookie (where all that sensitive information could be stored on user’s device). When working as a developer, you will most likely need to implement extra security measures that are outside the scope of this course. These include (but are not limited to) encryption, tying the cookie or session ID to specific device (requires server-side code) and multifactor authentication. For now, it’s enough to know that sessions are more secure than cookies.

## Summary: Sessions vs cookies

|                 | **Sessions**                                                                                            | **Cookies**                                                                                                             |
| --------------- | ------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| **Scope**       | Only accessible within the PHP script that created them                                                 | Can be accessed by any script on the domain that created them                                                           |
| **Persistence** | Stored in memory on the server and deleted when the user closes their browser                           | Stored as files on the user’s computer and can remain there for a specified length of time unless the user deletes them |
| **Size**        | Can store as much data as can be stored in the user’s session storage space (usually several megabytes) | Limited in size, typically to 4KB or less                                                                               |
| **Security**    | More secure because they are stored on the server and not accessible to the user                        | Less secure because they are stored on the user’s computer and can be accessed or modified by the user                  |
| **Use cases**   | Storing temporary data that is specific to a single user and a single browser session                   | Storing longer-term data that needs to be persisted across multiple sessions                                            |

## [Source](https://www.geeksforgeeks.org/what-are-the-difference-between-session-and-cookies-in-php/)

## Using cookies

All cookies are saved in the `$_COOKIE` array. They are read just like with any other array (`array_name[key]`), but setting them requires a separate function. Like `$_GET` and `$_POST`, `$_COOKIE` is more or less a read-only array – although technically adding values the “traditional way” may not throw errors, the results are unpredictable at best.

**Note:** Cookies are sent in the HTTP message headers, so if you want to set a cookie, this must be done **before any HTML (or other output) is written on the page**. If there is any output, you will get the error “headers already sent”. Doing whatever else with PHP first is fine. (If you’re certain you’re not outputting anything before setting the cookie and it’s still giving errors, make sure there’s no blank lines before the `<?php` tag. Other error messages generated by PHP are also output.)

### Setting a cookie

A cookie is created and modified (overwritten) with `setcookie` function. It can be given a total of seven parameters, but most of them are optional. Only the first three are used in most situations. The rest are related to scope (where the cookie may be accessed) and extra security (see e.g. [W3Schools](https://www.w3schools.com/php/func_network_setcookie.asp)).

```php
setcookie(name, value, expire, path, domain, secure, httponly);
```

- ”`name`”: is the name of the cookie, in other words the key in the `$_COOKIE` array. (mandatory)
- “`value`”: is the value of the cookie, i.e. the contents of the array slot. It can only be a string. Arrays and objects must be turned into strings before they can be used as cookie values.
- “`expire`”: tells when the cookie expires. The default is 0, i.e. the cookie expires as soon as the browser is closed. Note that this is the time, not duration. You need to use the current time in the calculation. E.g. time()+86400*30, will set the cookie to expire in 30 days (86400 * 30 seconds).

```php
setcookie("favorite_programming_language", "PHP", time()+86400);   // expires in one day
```

Setting the “expire” time to the past (e.g. time() – 60) causes the cookie to expire immediately. It doesn’t matter what value you give it ("" is just fine), but there must be a value since the parameters are read from first to last.

```php
setcookie("favorite_programming_language", "", time() - 60);
```

### Reading cookies

First, it’s not guaranteed that the cookie exists when you want to read it. The user can delete any files, including cookies, in their device at any time. **Always check first**. This can be done with `isset` function. The function returns true if the parameter variable exists – in this case if the `$_COOKIE` array contains the key “favorite_programming_language”.

```php
if(isset($_COOKIE["favorite_programming_language"])) {
    // do something with the cookie
}
```

Once it’s confirmed that the cookie exists, reading it is a simple matter. When it comes to reading values, `$_COOKIE` is just an associative array.

```php
if(isset($_COOKIE["favorite_programming_language"])) {
    $language = $_COOKIE["favorite_programming_language"];
    print "Your favorite programming language is $language.";
} else {
    print "You haven't chosen a favorite programming language.";
}
```

## Using sessions

Sessions must always be first opened with session_start(). If there already is a session for this visit (i.e. same user and the browser has not been closed or the session destroyed), the current session is opened. If there isn’t, then a new session is created. Without this function call, the $\_SESSION array – the way to access session variables – is not in use.

Compared to `$_GET`, `$_POST` and `$_COOKIE`, using `$_SESSION` is really straightforward. As long you remember to start the session before trying to use `$_SESSION`, it’s a completely regular array. You can set values and read values exactly like with any associative array. Note: Setting a new value with the same key overwrites the old value.

### Setting a session variable

```php
session_start();

$_SESSION['favorite_programming_language'] = "PHP";

print "Favorite programming language set.";
```

### Reading a session variable

```php
session_start();

print "Your favorite programming language is: " . $_SESSION['favorite_programming_language'];
```

However, like with cookies (and get/post parameters), it’s not guaranteed that the session variable exists. Better check first.

```php
session_start();

if(isset($_SESSION["favorite_programming_language"])) {
print "Your favorite programming language is: " . $_SESSION['favorite_programming_language'];
}
```

This is also a handy way to check if the current user has permission to access certain content – if there’s the corresponding session variable (possibly with specific value), we’re good to go.

```php
session_start();

if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "admin") { // first check the variable is set or you may get an error
// let’s show admin stuff here
}
```

### Destroying the session

If you want to destroy the session (e.g. when the user logs out), it requires two function calls. Note that you must have opened the session first with session_start(). If it’s not open, destroying it will silently fail. Calling session_start() after the session has been destroyed creates a new session.

```php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
```

A long time ago, session_destroy() used to be enough, but nowadays the variables may continue to exist in the next session without session_unset(). Better safe than sorry.
