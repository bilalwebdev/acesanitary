<?php

use App\Http\Controllers\Backend\AcePriceController;
use App\Http\Controllers\Backend\AccessoriesController;
use App\Http\Controllers\Backend\ApplicationTypeController;
use App\Http\Controllers\Backend\DistributorsController;
use App\Http\Controllers\Backend\MaterialController;
use App\Http\Controllers\Backend\EndStyleController;
use App\Http\Controllers\Backend\HosesController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\ChemicalCompatibilityController;
use App\Http\Controllers\Backend\HoseSizeController;
use App\Http\Controllers\Backend\ModelController;
use App\Http\Controllers\Backend\SeriesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\ToleranceMessagingController;
use App\Http\Controllers\Backend\RegulationsController;
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

// Auth Routes
require __DIR__ . '/auth.php';

// Language Switch
Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('dashboard', 'App\Http\Controllers\Frontend\FrontendController@index')->name('dashboard');
/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('home', 'FrontendController@index')->name('home');
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get('profile/changePassword/{username}', ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch('profile/changePassword/{username}', ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);



    /*
    *
    *  Series Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(SeriesController::class)->group(function () {

        Route::get('series/edit/{id}', 'edit')->name('series.edit');
        Route::post('series/store', 'store')->name('series.store');
        Route::post('series/update/{id}', 'update')->name('series.update');
        Route::get('series/index', 'index')->name('series.index');
        Route::get('series/destroy/{series}', 'destroy')->name('series.destroy');
        Route::get('series/show/{id}', 'show')->name('series.show');
        Route::get('series/create', 'create')->name('series.create');
        Route::get('series/import', 'import')->name('series.import');
        Route::post('series/import-series', 'importSeries')->name('series.data.import');
        Route::get('series/import/download-sample-file', 'downloadFile')->name('series.download');
    });


    /*
    *
    *  Material Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(MaterialController::class)->group(function () {

        Route::get('material/edit/{id}', 'edit')->name('material.edit');
        Route::post('material/store', 'store')->name('material.store');
        Route::post('material/update/{id}', 'update')->name('material.update');
        Route::get('material/index', 'index')->name('material.index');
        Route::get('material/destroy/{material}', 'destroy')->name('material.destroy');
        Route::get('material/show/{id}', 'show')->name('material.show');
        Route::get('material/create', 'create')->name('material.create');
        Route::get('material/import', 'import')->name('material.import');
        Route::post('material/import-material', 'importMaterial')->name('material.data.import');
        Route::get('material/import/download-sample-file', 'downloadFile')->name('material.download');
    });




    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Media Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(MediaController::class)->group(function () {
        Route::get('media/edit/{id}', 'edit')->name('media.edit');
        Route::post('media/store', 'store')->name('media.store');
        Route::post('media/update/{id}', 'update')->name('media.update');
        Route::get('media/index', 'index')->name('media.index');
        Route::get('media/destroy/{media}', 'destroy')->name('media.destroy');
        Route::get('media/show/{id}', 'show')->name('media.show');
        Route::get('media/create', 'create')->name('media.create');
        Route::get('media/import', 'import')->name('media.import');
        Route::post('media/import-media', 'importMedia')->name('media.data.import');
        Route::get('media/import/download-sample-file', 'downloadFile')->name('media.download');
    });


    /*
    *
    *  Distributors Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(DistributorsController::class)->group(function () {
        Route::get('distributor/edit/{id}', 'edit')->name('distributors.edit');
        Route::get('distributor/index', 'index')->name('distributors.index');
        Route::get('distributor/destroy/{distributor}', 'destroy')->name('distributors.destroy');
        Route::get('distributor/show/{id}', 'show')->name('distributors.show');
        Route::get('distributor/create', 'create')->name('distributors.create');
    });

    /*
    *
    *  Hoses Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(HosesController::class)->group(function () {

        Route::get('hose/create', 'create')->name('hoses.create');
        Route::get('hose/index', 'index')->name('hoses.index');
        Route::get('hose/edit/{id}', 'edit')->name('hoses.edit');
        Route::get('hose/show/{id}', 'show')->name('hoses.show');
        Route::get('hose/destroy/{hose}', 'destroy')->name('hoses.destroy');
        Route::get('hose/import', 'import')->name('hoses.import');
        Route::post('hose/import-hose', 'importHoses')->name('hoses.data.import');
        Route::get('hose/import/download-sample-file', 'downloadFile')->name('hose.download');
    });

    /*
    *
    *  accessories Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(AccessoriesController::class)->group(function () {

        Route::get('accessories/create', 'create')->name('accessories.create');
        Route::get('accessories/index', 'index')->name('accessories.index');
        Route::get('accessories/edit/{id}', 'edit')->name('accessories.edit');
        Route::get('accessories/show/{id}', 'show')->name('accessories.show');
        Route::get('accessories/destroy/{accessory}', 'destroy')->name('accessories.destroy');
        Route::get('accessories/import', 'import')->name('accessories.import');
        Route::post('accessories/import-accessories', 'importAccessories')->name('accessories.data.import');
        Route::get('accessories/import/download-sample-file', 'downloadFile')->name('accessories.download');
    });

    /*
    *
    *  End Styles Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(EndStyleController::class)->group(function () {

        Route::get('endstyle/create', 'create')->name('endstyles.create');
        Route::get('endstyle/index', 'index')->name('endstyles.index');
        Route::get('endstyle/edit/{id}', 'edit')->name('endstyles.edit');
        Route::get('endstyle/show/{id}', 'show')->name('endstyles.show');
        Route::get('endstyle/destroy/{endstyle}', 'destroy')->name('endstyles.destroy');
        Route::get('endstyle/import', 'import')->name('endstyle.import');
        Route::post('endstyle/import-endstyle', 'importEndStyle')->name('endstyle.data.import');
        Route::get('endstyle/import/download-sample-file', 'downloadFile')->name('endstyle.download');
    });

    /*
    *
    *  Chemical compatibility
    *
    * ---------------------------------------------------------------------
    */
    Route::controller(ChemicalCompatibilityController::class)->group(function () {
        Route::get('chemical-compatibility/check/{id}', 'check')->name('chemical-compatibility.check');
        Route::get('chemical-compatibility/destroy/{media}/{hose_id}', 'destroy')->name('chemical-compatibility.destroy');
    });


    /*
    *
    *  Ace Price Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::controller(AcePriceController::class)->group(function () {
        Route::get('ace-price/index', 'index')->name('ace-price.index');
        Route::get('ace-price/create', 'create')->name('ace-price.create');
        Route::get('ace-price/edit/{id}', 'edit')->name('ace-price.edit');
        Route::get('ace-price/destroy/{ace_price}', 'destroy')->name('ace-price.destroy');
    });


    /*
    *
    *  Hose Size Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(HoseSizeController::class)->group(function () {
        Route::get('hose-size/edit/{id}', 'edit')->name('hose-size.edit');
        Route::get('hose-size/index', 'index')->name('hose-size.index');
        Route::get('hose-size/destroy/{hose_size}', 'destroy')->name('hose-size.destroy');
        Route::get('hose-size/show/{id}', 'show')->name('hose-size.show');
        Route::get('hose-size/create', 'create')->name('hose-size.create');
        Route::get('hose-size/import', 'import')->name('hose-size.import');
        Route::post('hose-size/import-hose-size', 'importHoseSize')->name('hose-size.data.import');
        Route::get('hose-size/import/download-sample-file', 'downloadFile')->name('hose-size.download');
    });

    /*
    *
    *  Tolerance Messags Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(ToleranceMessagingController::class)->group(function () {

        Route::get('tolerance-messaging/edit/{id}', 'edit')->name('tolerance-messaging.edit');
        Route::get('tolerance-messaging/index', 'index')->name('tolerance-messaging.index');
        Route::get('tolerance-messaging/destroy/{tolerance_message}', 'destroy')->name('tolerance-messaging.destroy');
        Route::get('tolerance-messaging/show/{id}', 'show')->name('tolerance-messaging.show');
        Route::get('tolerance-messaging/create', 'create')->name('tolerance-messaging.create');
        Route::get('tolerance-messaging/import', 'import')->name('tolerance-messaging.import');
        Route::post('tolerance-messaging/import-tolerance-messaging', 'importToleranceMessage')->name('tolerance-messaging.data.import');
        Route::get('tolerance-messaging/import/download-sample-file', 'downloadFile')->name('tolerance-messaging.download');
    });

    /*
    *
    *  Model Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(ModelController::class)->group(function () {

        Route::get('models/edit/{id}', 'edit')->name('models.edit');
        Route::get('models/index', 'index')->name('models.index');
        Route::get('models/destroy/{model}', 'destroy')->name('models.destroy');
        Route::get('models/show/{id}', 'show')->name('models.show');
        Route::get('models/create', 'create')->name('models.create');
        // Route::get('models/import', 'import')->name('models.import');
        // Route::post('models/import-models', 'importToleranceMessage')->name('models.data.import');
    });


    /*
    *
    *  Regulations/Restrictions Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(RegulationsController::class)->group(function () {

        Route::get('regulations/edit/{id}', 'edit')->name('regulations.edit');
        Route::get('regulations/index', 'index')->name('regulations.index');
        Route::get('regulations/destroy/{regulations}', 'destroy')->name('regulations.destroy');
        Route::get('regulations/show/{id}', 'show')->name('regulations.show');
        Route::get('regulations/create', 'create')->name('regulations.create');
        // Route::get('models/import', 'import')->name('models.import');
        // Route::post('models/import-models', 'importToleranceMessage')->name('models.data.import');
    });


    /*
    *
    *  Application Routes
    *
    * ---------------------------------------------------------------------
    */


    Route::controller(ApplicationTypeController::class)->group(function () {

        Route::get('application-types/edit/{id}', 'edit')->name('application-types.edit');
        Route::get('application-types/index', 'index')->name('application-types.index');
        Route::get('application-types/destroy/{application-type}', 'destroy')->name('application-types.destroy');
        Route::get('application-types/show/{id}', 'show')->name('application-types.show');
        Route::get('application-types/create', 'create')->name('application-types.create');
        // Route::get('models/import', 'import')->name('models.import');

    });
    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});
