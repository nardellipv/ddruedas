<?php

Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//views
Route::view('/sobre-nosotros', 'web.help.about')->name('about');
Route::view('/terminos-y-condiciones', 'web.help.termAndCondition')->name('term');
Route::view('/preguntas-frecuentes', 'web.help.faqs')->name('faqs');
Route::view('/contacto', 'web.help.contact')->name('contact');
Route::post('/contacto/enviar', 'HomeController@sendContact')->name('home.sendContact');

//items
Route::get('/listado', 'ItemController@index')->name('item.index');
Route::get('/listado/detalle/{id}', 'ItemController@itemDetail')->name('item.detail');
Route::get('/listado/descargar-pdf/{id}', 'ItemController@itemPdfDetail')->name('item.PdfDetail');
Route::get('/comparar', 'ItemController@compare')->name('item.compare');

//search items
Route::get('/filtro', 'ItemController@filter')->name('item.filter');
Route::get('/buscar', 'ItemController@search')->name('item.search');

//shop
Route::get('/shop', 'AccessoryController@index')->name('accessory.index');
Route::get('/shop/detalle/{id}', 'AccessoryController@detail')->name('accessory.detail');
Route::get('/shop/categoria/{slug}', 'AccessoryController@category')->name('accessory.category');

//dealer
Route::get('/agencias', 'DealerController@index')->name('dealer.index');
Route::get('/agencias/detalle/{nameAgencyg}/{id}', 'DealerController@detail')->name('dealer.detail');

//search dealer
Route::get('/buscar-agencia', 'DealerController@search')->name('dealer.search');
Route::get('/buscar-letra', 'DealerController@filterWord')->name('dealer.filterWord');

//envio de mails
Route::get('/enviar-item', 'EmailController@sendItem')->name('email.sendItem');
Route::get('/contactar-vendedor', 'EmailController@contactSeller')->name('email.contactSeller');
Route::get('/contactar-vendedor/accesorio', 'EmailController@contactAccessorySeller')->name('email.contactAccessorySeller');

//blog
Route::get('/listado-noticias', 'BlogController@index')->name('blog.index');
Route::get('/noticia/{slug}', 'BlogController@post')->name('blog.post');
Route::get('/noticia/like/{id}', 'BlogController@like')->name('blog.like');

//newsLetter
Route::post('/newsletter', 'NewsLetterController@add')->name('newsLetter.add');

//usuario
Route::group(['prefix' => 'usuario', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::get('/mis-motos', 'DashboardController@listVehicles')->name('dashboard.listVehicles');
    Route::get('/mis-motos/pausadas', 'DashboardController@listVehiclesPaused')->name('dashboard.listVehiclesPaused');
    Route::get('/mis-motos/vencidas', 'DashboardController@listVehiclesExipire')->name('dashboard.listVehiclesExipire');
    Route::get('/mis-motos/rechazadas', 'DashboardController@listVehiclesRejected')->name('dashboard.listVehiclesRejected');

    Route::get('/perfil', 'ProfileController@viewProfile')->name('profile.viewProfile');
    Route::get('/perfil/actualizar/provincia', 'ProfileController@updateProvince')->name('profile.updateProvince');
    Route::put('/perfil/actualizar/{id}', 'ProfileController@updateProfile')->name('profile.updateProfile');

    Route::get('/pausar-moto/{id}', 'ActionsItemsController@paused')->name('actionItems.paused');
    Route::get('/eliminar-moto/{id}', 'ActionsItemsController@delete')->name('actionItems.delete');
    Route::get('/activar-moto/{id}', 'ActionsItemsController@play')->name('actionItems.play');
    Route::get('/reactivar-moto/{id}', 'ActionsItemsController@reActive')->name('actionItems.reActive');
    Route::get('/descargar-moto/{id}', 'ActionsItemsController@download')->name('actionItems.download');
    Route::get('/editar-moto/seleccionar-modelo', 'ActionsItemsController@selectPattern')->name('actionItems.selectPattern');
    Route::get('/editar-moto/{id}', 'ActionsItemsController@show')->name('actionItems.show');
    Route::put('/editar-moto/actualizar/{id}', 'ActionsItemsController@update')->name('actionItems.update');

    Route::get('/publicar', 'DashboardController@publicMoto')->name('dashboard.publicMoto');
    Route::get('/publicar/modelo', 'DashboardController@selectPattern')->name('dashboard.selectPattern');
    Route::post('/publicar/nuevo-aviso', 'DashboardController@publicNew')->name('dashboard.publicNew');

    Route::get('/mis-accesorios', 'DashboardController@listAccesories')->name('dashboard.listAccesories');

    Route::get('/publicar-accesorio', 'DashboardController@publicAccessory')->name('dashboard.publicAccessory');
    Route::get('/publicar-accesorio/modelo', 'ActionAccessoriesController@selectPattern')->name('action.selectPattern');
    Route::post('/publicar-accesorio/nuevo-aviso', 'ActionAccessoriesController@publicNewAccessory')->name('action.publicNewAccessory');
    Route::get('/eliminar-accesorio/{id}', 'ActionAccessoriesController@deleteAccessory')->name('actionAccessory.deleteAccessory');

    Route::get('/editar-accesorio/seleccionar-modelo', 'ActionAccessoriesController@selectPatternEdit')->name('actionAccessory.selectPatternEdit');
    Route::get('/editar-accesorio/{id}', 'ActionAccessoriesController@show')->name('actionAccessory.show');
    Route::put('/editar-accesorio/actualizar/{id}', 'ActionAccessoriesController@update')->name('actionAccessory.update');
    Route::get('/editar-accesorio/borrar-imagen/{id}', 'ActionAccessoriesController@deleteFile')->name('actionAccessory.deleteFile');

    Route::get('/favorito', 'FavoriteController@index')->name('favorite.index');
    Route::get('/favorito/agregar/{id}', 'FavoriteController@addFavorite')->name('favorite.addFavorite');
    Route::get('/favorito/eliminar/{id}', 'FavoriteController@deleteFavorite')->name('favorite.deleteFavorite');

    Route::get('/registrar', 'RegisterDealerController@dealerRegister')->name('register.dealer');
});

//Admin
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'AdminAuth']], function () {
    Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');

    Route::get('/admin/blog', 'BlogController@listAdmin')->name('blog.listAdmin');
    Route::get('/admin/crear', 'BlogController@create')->name('blog.create');
    Route::post('/admin/crear/post', 'BlogController@store')->name('blog.store');

    Route::get('/admin/item-ok/{id}', 'ItemController@itemOk')->name('item.itemOk');
    Route::get('/admin/item-nook/{id}', 'ItemController@itemNoOk')->name('item.itemNoOk');
});

// Jobs Admin
Route::get('/register-users', 'Admin\JobsController@userRegister')->name('jobUsers.register');
    // Route::get('/increment-visit', 'Admin\JobController@commercesIncrement')->name('jobCommerces.increment');
