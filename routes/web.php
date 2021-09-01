<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'ProductoController@home')->name('home');

##ProductoXcategoria
Route::get('categoria/{id}', 'ProductoController@productoXCategoria')->name('categoria');
##Buscador
Route::get('buscador-productos', 'ProductoController@buscador')->name('buscador');
/****FIN PRODUCTOS****/

/****CATEGORIAS****/
//Route::get('categorias', 'CategoriaController@index')->name('categorias');
Route::get('categoria/{id}', 'CategoriaController@productoXCategoria')->name('categoria');

/****FIN CATEGORIAS****/

/****ATRIBUTOS****/
Route::post('atributos-producto/{id}', 'Producto_AtributoController@getAtributosXProducto')->name('atributos.producto');
/****FIN ATRIBUTOS****/

/****CARRITO****/
Route::post('cart-add', 'CartController@add')->name('cart.add');
Route::get('cart/checkout', 'CartController@cart')->name('cart.checkout');
Route::post('remove-item', 'CartController@removeItem')->name('cart.remove');
Route::post('completa-envio', 'CartController@guardaEnvio')->name('guarda.envio')->middleware('auth');

/**** PAYMENT *****/
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/payment/processPayment', 'PaymentController@processPayment')->name('processPayment');
/******* TICKET *********/
Route::get('/payment/ticket', 'PaymentController@ticket')->name('payment.ticket');

Route::get('/paypal/pay', 'PaypalController@payWithPayPal');
Route::get('/paypal/status', 'PaypalController@payPalStatus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/******ENVIO MAIL *********/
Route::get('sendMail','UtilsController@EnvioCorreo');

/****CURSOS****/
Route::get('productos', 'ProductoController@index')->name('productos');
Route::get('productos/detalle/{id}', 'ProductoController@productoDescripcion')->name('producto.detalle');

Route::group(['prefix' => 'cursos'], function() {
    Route::get('/view', 'Cursos\CursoController@index')->name('cursos.view');
    Route::get('/detail/{id}', 'Cursos\CursoDetalleController@index')->name('cursos.detail');
    /**Formularios */
    Route::get('/form/createmateriales', 'Cursos\CursoController@create')->name('cursos.form.materialescreate');
    Route::get('/form/createcurso', 'Cursos\CursoController@createcurso')->name('cursos.form.cursoscreate');
    Route::get('/form/createtemario', 'Cursos\CursoController@createtemario')->name('cursos.form.temariocreate');
    Route::get('/form/createlives', 'Lives\LivesController@createlives')->name('cursos.form.livescreate');
    Route::post('/form/saveMateriales','Cursos\CursoController@saveMateriales')->name('cursos.form.saveMateriales');
    Route::post('/form/saveCursos','Cursos\CursoController@saveCursos')->name('cursos.form.saveCursos');
    Route::post('/form/saveTemarios','Cursos\CursoController@saveTemarios')->name('cursos.form.saveTemarios');
    Route::post('/form/saveLives','Lives\LivesController@saveLives')->name('cursos.form.saveLives');

    Route::get('/uploadFile', 'Cursos\CursoController@uploadFile')->name('cursos.uploadFile');
    Route::get('/obtenerCursos', 'Cursos\CursoController@obtenerCursos')->name('cursos.obtenerCursos');
    

    /***CATALÓGOS VISTA***/
    Route::get('/CatalogoTemario', 'Admin\TemarioController@mostrarTemariosView')->name('Catalogo.Temario')->middleware('auth');
    Route::get('/CatalogoCurso', 'Admin\CursoController@mostrarCursosView')->name('Catalogo.Curso')->middleware('auth');
    Route::get('/CatalogoLives', 'Admin\LivesController@mostrarLivesView')->name('Catalogo.Lives')->middleware('auth');
    Route::get('/CatalogoMateriales', 'Admin\MaterialController@mostrarMaterialesView')->name('Materiales.catalogoMateriales')->middleware('auth');
    Route::get('/CatalogoMaterial', 'Admin\MaterialController@mostrarMaterialesView')->name('Catalogo.Material')->middleware('auth');

    /** LIVES **/
    Route::get('/lives', 'Cursos\CursoController@obtenerLives')->name('cursos.lives')->middleware('auth');
});


Route::group(['prefix' => 'categorias'], function() {
    Route::get('/mostrar', 'Categorias\CategoriaController@getCategorias')->name('categorias.getCategorias');
    Route::get('/curso/{id}', 'Categorias\CategoriaController@mostrarCursosByCategoria')->name('categorias.curso.mostrarCursosByCategoria');
});

Route::group(['prefix' => 'Perfil'], function() {
    Route::get('/MostrarPerfil', 'Perfil\PerfilController@miPerfil')->name('perfil.mostrar')->middleware('auth');
});

Route::group(['prefix' => 'Admin'], function() {
    /** Temarios **/
    Route::get('/mostrarTemarios', 'Admin\TemarioController@mostrarTemarios')->name('admin.mostrarTemarios');
    Route::post('/storeTemario/{id}', 'Admin\TemarioController@storeTemario')->name('admin.storeTemario');
    /** Materiales **/
    Route::get('/mostrarMaterial', 'Admin\MaterialController@mostrarMateriales')->name('admin.mostrarMaterial');
    Route::post('/storeMaterial/{id}', 'Admin\MaterialController@storeMaterial')->name('admin.storeMaterial');
    /** Cursos **/
    Route::get('/mostrarCurso', 'Admin\CursoController@mostrarCurso')->name('admin.mostrarCurso');
    Route::post('/storeCurso/{id}', 'Admin\CursoController@storeCurso')->name('admin.storeCurso');
    Route::get('/mostrarLives', 'Admin\LivesController@mostrarLives')->name('admin.mostrarLives');
    Route::post('/storeLives/{id}', 'Admin\LivesController@storeLives')->name('admin.storeLives');
});