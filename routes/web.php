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

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


    Route::get('/', [
        'uses' => 'FrontController@admin',
        'as'    => 'administrador',
    ]);

    Route::get('timeline','FrontController@timeline')->name("admin.home.timeline");

    Route::get('timelinemore/{slug}','FrontController@timelinemore')->name("admin.home.timelinemore");


    Route::resource('/users','UsersController');
    Route::DELETE('users/{id}','UsersController@destroy')->name("admin.users.destroy");


    Route::resource('/tecnologias','TecnologiasController');
    Route::DELETE('tecnologias/{id}','TecnologiasController@destroy')->name("admin.tecnologias.destroy");



    Route::resource('/practicas','PracticasController');
    Route::get('practicas/create','PracticasController@create')->name("admin.practicas.create");
    Route::get('practicas/{id}/edit','PracticasController@edit')->name("admin.practicas.edit");
    Route::put('practicas/{id}','PracticasController@update')->name("admin.practicas.update");
    Route::DELETE('practicas/{id}','PracticasController@destroy')->name("admin.practicas.destroy");


    Route::post('practicas/{id}/fotos','FotoController@store')->name("admin.practicas.fotos.store");



    Route::resource('/cultivos','CultivosController');
    Route::DELETE('cultivos/{id}','CultivosController@destroy')->name("admin.cultivos.destroy");


    Route::resource('/variedades','VariedadesController');


    Route::resource('/tags','TagsController');
    Route::DELETE('tags/{id}','TagsController@destroy')->name("admin.tags.destroy");

    // Route:resource('');

    Route::get('/mensajes', 'MensajesController@index');

    Route::get('/mensajes/create', 'MensajesController@create');


    Route::get('mensajes/{id}',[
        'uses' => 'MensajesController@show',
        'as' => 'mensajes.show',
    ]);

   // Route::get('/mensajes/{id}','MensajesController@show');

    Route::post('mensajes/',[
        'uses' => 'MensajesController@store',
        'as' => 'mensajes.store',
    ]);


    Route::get('notificaciones',[
        'uses' => 'NotificacionesController@index',
        'as' => 'notificaciones.index',
    ]);


    Route::patch('notificaciones/{id}',[
        'uses' => 'NotificacionesController@read',
        'as' => 'notificaciones.read',
    ]);
    Route::delete('notificaciones/{id}',[
        'uses' => 'NotificacionesController@destroy',
        'as' => 'notificaciones.destroy',
    ]);

    //Route::get('api','EventosController@api'); //ruta que nos devuelve los eventos en formato json









    Route::get('tags/{id}',[
        'uses' => "TagsController@destroy",
        'as'   =>  "tags.destroy"
    ]);


  
});

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
//Auth::routes();
//Route::get('/home', 'HomeController@index');

Route::get('logout',[
    'uses'  =>  'LoginController@logout',
    'as'    =>  'logout'
] );