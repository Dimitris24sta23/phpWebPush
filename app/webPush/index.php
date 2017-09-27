<?php

// this is just for the easy bootstrapping of the demo
// adapted from http://stackoverflow.com/a/38926070

chdir(__DIR__);
$filePath = realpath('./src/'.ltrim($_SERVER["REQUEST_URI"], '/'));
if ($filePath && is_dir($filePath)){
    // attempt to find an index file
    foreach (['index.php', 'index.html'] as $indexFile) {
        if ($filePath = realpath($filePath . DIRECTORY_SEPARATOR . $indexFile)){
            break;
        }
    }
}

if ($filePath && is_file($filePath)) {
    // 1. check that file is not outside of this directory for security
    // 2. check for circular reference to router.php
    // 3. don't serve dotfiles
    if (strpos($filePath, __DIR__ . DIRECTORY_SEPARATOR) === 0 &&
        $filePath != __DIR__ . DIRECTORY_SEPARATOR . 'router.php' &&
        substr(basename($filePath), 0, 1) != '.'
    ) {
        if (strtolower(substr($filePath, -4)) == '.php') {
            include DIRECTORY_SEPARATOR . $filePath;
        } else {
            if (strtolower(substr($filePath, -3)) == '.js') {
                Header('Content-Type: text/javascript');
            }
            readfile (DIRECTORY_SEPARATOR . $filePath);
        }
    } else {
        // disallowed file
        header("HTTP/1.1 404 Not Found");
        echo "404 Not Found";
    }
} else {
    // rewrite to our index file
    include  'src' . DIRECTORY_SEPARATOR . 'index.html';
}
