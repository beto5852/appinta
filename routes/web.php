<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    'uses' => 'FrontController@index',
    'as'    => 'home',
]);
Route::get('practica/{slug}', [
    'uses' => 'FrontController@practica',
    'as'    => 'practica',
]);
Route::get('index/{nombre_practica}', [
    'uses' => 'FrontController@searchPracticas',
    'as'    => 'front.search.practicas',
]);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

    //Notification::send($user, new PostNewNotification($post));

    Route::resource('/users','UsersController');
    Route::resource('/tecnologias','TecnologiasController');
    Route::resource('/practicas','PracticasController');
    Route::resource('/cultivos','CultivosController');
    Route::resource('/tags','TagsController');

    Route::get('/mensajes', 'MensajesController@index');



    Route::post('/mensajes',[
        'uses' => 'MensajesController@store',
        'as' => 'enviar.store',
    ]);






    //Route::get('api','EventosController@api'); //ruta que nos devuelve los eventos en formato json
    
    Route::get('/', [
        'uses' => 'FrontController@admin',
        'as'    => 'administrador',
    ]);
  
});
Route::get('users/{id}',[
    'uses' => "UsersController@destroy",
    'as'   =>  "users.destroy"
]);
Route::get('tecnologias/{id}',[
    'uses' => "TecnologiasController@destroy",
    'as'   =>  "tecnologias.destroy"
]);
Route::get('practicas/{id}',[
    'uses' => "PracticasController@destroy",
    'as'   =>  "practicas.destroy"
]);
Route::get('cultivos/{id}',[
    'uses' => "CultivosController@destroy",
    'as'   =>  "cultivos.destroy"
]);
Route::get('tags/{id}',[
    'uses' => "TagsController@destroy",
    'as'   =>  "tags.destroy"
]);
Route::get('logout',[
    'uses'  =>  'LoginController@logout',
    'as'    =>  'logout'
] );
Route::resource('login','LoginController');
//Auth::routes();
//controlador de recurso
/* rutas que se generarian
    GET /products => index  muestra coleccion
    POST /products => store  guardaria el producto
    GET /products => create mostraria el formulario para crear
    GET /products/id => el id es dinamico para mostrar un producto con ID
    GET/products/:id/edit =>formulario de edicion
    PUT/PATCH/:id  =>actualiza el producto
    DELETE/products/:id elimina el producto
*/
Auth::routes();
//Route::get('/home', 'HomeController@index');