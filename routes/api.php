<?php

use App\Constants\RouteNames;
use App\Http\Controllers\Api\V1\QuotationController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (Router $route) {
    $route->post('/quotation', [QuotationController::class, 'store'])->name(RouteNames::API_V1_QUOTATION_POST);
});
