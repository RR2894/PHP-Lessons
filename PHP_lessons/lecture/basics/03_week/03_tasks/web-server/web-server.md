# PHP on a web server

## Description

In this task, you will generate your first dynamic web page with PHP. It reads information from an array variable (in a real application this would be a database) and adds its contents to the page.

You will also need a basic understanding of HTML (although you will be given the HTML template).

## About adding PHP to an HTML page

This far you have only used PHP to print things to a console. Having PHP generate the HTML code is a valid approach, but a far more common one is to add PHP to an HTML page only where it’s needed. You really can put PHP tags literally anywhere, and that part is rendered as PHP.

For example,

```
<h1><?php print $page_title; ?></h1>
```

Control structures (e.g. conditionals and loops) require a bit more attention, since the braces must be opened and closed properly, but still within PHP tags. But you don’t need to “print” everything inside the block – you can just close the PHP tag and use plain HTML. For example, this adds `<p>There be HTML here.</p>`` to the page 5 times.

```php
<?php
$i = 0;
while($i < 5) {
?>
<p>There be HTML here.</p>
<?php
$i++;
}    // make sure to add the closing brace here to end the while loop
?>
```

The files that are a mix of HTML and PHP need to be saved with extension .php. They can also only be opened through a web server – double-clicking the file to open it in a browser won’t render the PHP.
