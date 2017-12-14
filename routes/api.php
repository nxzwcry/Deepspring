<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// v1
$api->version('v1', [
    'namespace' => 'Someline\Api\Controllers',
    'middleware' => ['api']
], function (Router $api) {

    $api->group(['middleware' => ['auth:api']], function (Router $api) {

        // Rate: 100 requests per 5 minutes
        $api->group(['middleware' => ['api.throttle'], 'limit' => 100, 'expires' => 5], function (Router $api) {

            // /users
            $api->group(['prefix' => 'users'], function (Router $api) {
                $api->get('/', 'UsersController@index');
                $api->post('/', 'UsersController@store');
                $api->get('/me', 'UsersController@me');
                $api->get('/{id}', 'UsersController@show');

                $api->group(['middleware' => ['permission:create-user']], function(Router $api) {
                    $api->put('/{id}', 'UsersController@update');
                    $api->delete('/{id}', 'UsersController@destroy');
                });

            });

            // /Roles
            $api->group(['prefix' => 'roles'], function (Router $api) {
                $api->get('/', 'RolesController@index');
                $api->post('/', 'RolesController@store');
                $api->get('/{id}', 'RolesController@show');
                $api->put('/{id}', 'RolesController@update');
                $api->delete('/{id}', 'RolesController@destroy');
            });

            // /Permissions
            $api->group(['prefix' => 'permissions'], function (Router $api) {
                $api->get('/', 'PermissionsController@index');
                $api->post('/', 'PermissionsController@store');
                $api->get('/{id}', 'PermissionsController@show');
                $api->put('/{id}', 'PermissionsController@update');
                $api->delete('/{id}', 'PermissionsController@destroy');
            });

        });

    });

});