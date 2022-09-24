<?php
// function __autoload($class)
// {
//     $class = strtolower($class);
//     $the_path = "includes/{$class}.php";
//     if (file_exists($the_path)) {
//         include($the_path);
//     }
// }
function redirect($location)
{
    header("Location: {$location}");
}
