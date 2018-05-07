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
Route::get('activate/{token}','ActivationTokenController@activate')->name('activation');
Auth::routes();

Route::get('login/{redesSociales}','SocialLoginController@redirectToredesSociales')->name('login.social');
Route::get('login/{redesSociales}/callback','SocialLoginController@handleredesSocialesCallback');



 Route::get('/', 'HomeController@index');
Route::get('busqueda','HomeController@busqueda')->name("buscar");


Route::get('practica/{slug}', [
    'uses' => 'HomeController@practica',
    'as'    => 'practica',
]);


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

//    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


    Route::get('/', [
        'uses' => 'FrontController@admin',
        'as'    => 'administrador',
    ]);


    Route::get('busqueda','FrontController@busqueda')->name("admin.home.busqueda");


    Route::get('timeline','FrontController@timeline')->name("admin.home.timeline");

    Route::get('timelinemore/{slug}','FrontController@timelinemore')->name("admin.home.timelinemore");

    /******************************************************************************************************************************/


    Route::resource('/users','UsersController');
    Route::DELETE('users/{id}','UsersController@destroy')->name("admin.users.destroy");
    Route::get('users/create','UsersController@create')->name("admin.users.create");
    Route::get('users/edit/{id}','UsersController@edit')->name("admin.users.edit");
    Route::put('users/{user}','UsersController@update')->name("admin.users.update");
    Route::DELETE('users/{id}','UsersController@destroy')->name("admin.users.destroy");
    Route::get('users/{user}','UsersController@show')->name("admin.users.show");




    /********************************TECNOLOGIA*******************************************************************/

    Route::resource('/tecnologias','TecnologiasController');

    Route::get('tecnologias','TecnologiasController@index')->name("admin.tecnologias.index");
    Route::get('datos_tecnologias','TecnologiasController@datos_tecnologias')->name("admin.tecnologias.datos.index");

    Route::get('tecnologias/create','TecnologiasController@create')->name("admin.tecnologias.create");
    Route::get('tecnologias/edit/{id}','TecnologiasController@edit')->name("admin.tecnologias.edit");
    Route::put('tecnologias/{tecnologia}','TecnologiasController@update')->name("admin.tecnologias.update");
    Route::DELETE('tecnologias/{id}','TecnologiasController@destroy')->name("admin.tecnologias.destroy");
    Route::get('tecnologias/{tecnologia}','TecnologiasController@show')->name("admin.tecnologias.show");


    /**********************************PRACTICAS********************************************************************************************/


    Route::resource('/practicas','PracticasController');

    Route::get('practicas','PracticasController@index')->name("admin.practicas.index");
    Route::get('listado_practicas_data','PracticasController@datos_practicas')->name("admin.practicas.datos.index");


    Route::get('practicas/create','PracticasController@create')->name("admin.practicas.create");
    Route::get('practicas/edit/{id}','PracticasController@edit')->name("admin.practicas.edit");
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

    Route::get('variedades','VariedadesController@index')->name("admin.variedades.index");
    Route::get('variedades_datos','VariedadesController@datos_variedades')->name("admin.variedades.datos.index");

    Route::get('variedades/create','VariedadesController@create')->name("admin.variedades.create");
    Route::get('variedades/edit/{id}','VariedadesController@edit')->name("admin.variedades.edit");
    Route::DELETE('variedades/{id}','VariedadesController@destroy')->name("admin.variedades.destroy");

    /************************************ETAPAS******************************************************************************************/

    Route::resource('/etapas','EtapasController');

    Route::get('etapas','EtapasController@index')->name("admin.etapas.index");
    Route::get('etapas_datos','EtapasController@datos_etapas')->name("admin.etapas.datos.index");

    Route::get('etapas/create','EtapasController@create')->name("admin.etapas.create");
    Route::get('etapas/edit/{id}','EtapasController@edit')->name("admin.etapas.edit");
    Route::DELETE('etapas/{id}','EtapasController@destroy')->name("admin.etapas.destroy");


    /******************************REPORTES de graficas************************************************************************************************/

    Route::get('reportes','GraficasController@reportes')->name("admin.reportes.index");
    Route::get('sexo','GraficasController@reportes_sexo')->name("admin.reportes.sexo");
    Route::get('edad','GraficasController@reportes_edad')->name("admin.reportes.edad");
    Route::get('online','GraficasController@reportes_online')->name("admin.reportes.online");
    Route::get('reportes_practicas','GraficasController@reportes_practicas')->name("admin.reportes.practicas");



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