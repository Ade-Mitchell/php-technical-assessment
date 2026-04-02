<?php

return [
    ['GET', '/', function () {
        echo 'root route works';
    }],
    ['GET', '/books', function () {
        echo 'books route works';
    }],
];