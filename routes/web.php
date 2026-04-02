<?php

use App\Controllers\BookController;

return [
    ['GET', '/', [BookController::class, 'index']],
    ['GET', '/books', [BookController::class, 'index']],
];