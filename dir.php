<?php
function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return;
    }

    $contents = scandir($dir);
    foreach ($contents as $item) {
        if ($item !== '.' && $item !== '..') {
            $itemPath = $dir . '/' . $item;
            if (is_dir($itemPath)) {
                deleteDirectory($itemPath);
            } else {
                unlink($itemPath);
            }
        }
    }

    rmdir($dir);
    echo "Deleted directory: $dir" . PHP_EOL;
}
$mainDirectory = './dir';
deleteDirectory($mainDirectory);