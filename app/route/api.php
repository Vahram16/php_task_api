<?php

use app\Core\Application;
use app\Http\Controllers\Api\PhoneController;

$app = Application::createInstance();

$app->route->get('/api/phone-books',PhoneController::class,'getAll');
$app->route->get('/api/phone-book',PhoneController::class,'getById');
$app->route->post('/api/create-phone-book',PhoneController::class,'create');
$app->route->post('/api/update-phone-book',PhoneController::class,'update');
$app->route->delete('/api/delete-phone-book',PhoneController::class,'delete');
