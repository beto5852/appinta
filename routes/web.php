<?php
//
//DB::listen(function($query){
//    echo "<pre>{$query->time}</pre>";
//});


//DB::listen(function($query){
//    echo "<pre>{$query->sql}</pre>";
//});
//


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
Route::get('activate/{token}','ActivationTokenController@activate');
Auth::routes();

// Authentication Routes...
//        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//        Route::post('login', 'Auth\LoginController@login');
//        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//        // Registration Routes...
//        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//        Route::post('register', 'Auth\RegisterController@register');
//
//        // Password Reset Routes...
//        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//

// Route::get('/', 'HomeController@index');

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

    /******************************************************************************************************************************/


    Route::resource('/users','UsersController');
    Route::DELETE('users/{id}','UsersController@destroy')->name("admin.users.destroy");



    /********************************TECNOLOGIA*******************************************************************/
    Route::resource('/tecnologias','TecnologiasController');

    Route::get('tecnologias','TecnologiasController@index')->name("admin.tecnologias.index");
    Route::get('datos_tecnologias','TecnologiasController@datos_tecnologias')->name("admin.tecnologias.datos.index");

    Route::get('tecnologias/create','TecnologiasController@create')->name("admin.tecnologias.create");
    Route::get('tecnologias/edit/{id}','TecnologiasController@edit')->name("admin.tecnologias.edit");
    Route::put('tecnologias/{tecnologia}','TecnologiasController@update')->name("admin.tecnologias.update");
    Route::DELETE('tecnologias/{id}','TecnologiasController@destroy')->name("admin.tecnologias.destroy");

    /**********************************PRACTICAS********************************************************************************************/


    Route::resource('/practicas','PracticasController');

    Route::get('practicas','PracticasController@index')->name("admin.practicas.index");
    Route::get('listado_practicas_data','PracticasController@datos_practicas')->name("admin.practicas.datos.index");


    Route::get('practicas/create','PracticasController@create')->name("admin.practicas.create");
    Route::get('practicas/edit/{practica}','PracticasController@edit')->name("admin.practicas.edit");
    Route::put('practicas/{practica}','PracticasController@update')->name("admin.practicas.update");
    Route::DELETE('practicas/{id}','PracticasController@destroy')->name("admin.practicas.destroy");


    Route::post('practicas/{id}/fotos','FotoController@store')->name("admin.practicas.fotos.store");
    Route::delete('fotos/{foto}','FotoController@destroy')->name("admin.fotos.destroy");

    /***************************************CULTIVOS***************************************************************************************/

    Route::resource('/cultivos','CultivosController');

    Route::get('/cultivos','CultivosController@index')->name('admin.cultivos.index');
    Route::get('cultivos_datos','CultivosController@datos_cultivos')->name("admin.cultivos.datos.index");

    Route::get('/cultivos/create','CultivosController@create')->name("admin.cultivos.create");
    Route::get('/cultivos/edit/{id}','CultivosController@edit')->name("admin.cultivos.edit");
    Route::put('cultivos/{cultivo}','CultivosController@update')->name("admin.cultivos.update");
    Route::DELETE('cultivos/{id}','CultivosController@destroy')->name("admin.cultivos.destroy");

    /************************************VARIEDADES******************************************************************************************/

    Route::resource('/variedades','VariedadesController');

    /********************************************TAGS**********************************************************************************/
    Route::resource('tags','TagsController');

    Route::get('tags','TagsController@index')->name("admin.tags.index");
    Route::get('tags_datos','TagsController@datos_tags')->name("admin.tags.datos.index");

    Route::get('tags/create','TagsController@create')->name("admin.tags.create");
    Route::get('tags/edit/{id}','TagsController@edit')->name("admin.tags.edit");
    Route::DELETE('tags/{id}','TagsController@destroy')->name("admin.tags.destroy");

    /******************************REPORTES************************************************************************************************/

    //Route::get('api','EventosController@api'); //ruta que nos devuelve los eventos en formato json
    Route::get('reportes','FrontController@reportes')->name("admin.reportes.index");

    Route::get('listado_graficas', 'GraficasController@index');
    Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
    Route::get('grafica_publicaciones', 'GraficasController@total_publicaciones')->name("total_publicaciones");



    /*********************************MENSAJES Y NOTIFICACIONES******************************************************************************************/

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

/********************************************************************************************************************/

});

//Route::resource('login','LoginController');
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


Route::get('logout',[
    'uses'  =>  'LoginController@logout',
    'as'    =>  'logout'
] );