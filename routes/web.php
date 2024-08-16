<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TellerController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoyalGroupController;
use App\Http\Controllers\ClientspaceController;
use App\Http\Controllers\ClasseurController;
use App\Http\Controllers\LaveurController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\InOutController;
use App\Http\Controllers\RoleController as RoleController;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\PromoController as PromoController;
use App\Http\Controllers\StatsController as StatsController;
use App\Http\Controllers\AgenceController as AgenceController;
use App\Http\Controllers\ClientController as ClientController;
use App\Http\Controllers\StatusController as StatusController;
use App\Http\Controllers\ArticleController as ArticleController;
use App\Http\Controllers\DepositController as DepositController;
use App\Http\Controllers\ReceiptController as ReceiptController;
use App\Http\Controllers\CustomerController as CustomerController;
use App\Http\Controllers\PressingController as PressingController;
use App\Http\Controllers\RetrieveController as RetrieveController;
use App\Http\Controllers\CodeSuffixController as CodeSuffixController;
use App\Http\Controllers\PermissionController as PermissionController;
use App\Http\Controllers\ClientGroupController as ClientGroupController;
use App\Http\Controllers\DepositUnitController as DepositUnitController;
use App\Http\Controllers\MakeDepositController as MakeDepositController;
use App\Http\Controllers\DeliveryHourController as DeliveryHourController;
use App\Http\Controllers\PrintActionController as PrintActionController;
use App\Http\Controllers\Auth\Admin\DashboardAdmin as DashboardAdmin;

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
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

// DASHBOARD
Route::get('/superadmin/dashboard', [DashboardAdmin::class, 'dashboard'])->name('admin-dashboard');

Route::prefix('superadmin/')->group(function () {
    // PRESSINGS
    Route::get('pressings', [DashboardAdmin::class, 'pressing_index'])->name('superadmin.pressings.index');
    Route::get('pressing/create', [DashboardAdmin::class, 'pressing_create'])->name('superadmin.pressings.create');
    Route::get('pressing/edit/{id}', [DashboardAdmin::class, 'pressing_edit'])->name('superadmin.pressings.edit');
    Route::post('pressing/store', [DashboardAdmin::class, 'pressing_store'])->name('superadmin.pressings.store');
    Route::put('pressing/update/{id}', [DashboardAdmin::class, 'pressing_update'])->name('superadmin.pressings.update');
    Route::delete('pressing/delete/{id}', [DashboardAdmin::class, 'pressing_destroy'])->name('superadmin.pressings.delete');

    // USERS
    Route::get('users', [DashboardAdmin::class, 'user_index'])->name('superadmin.users.index');
    Route::get('user/create', [DashboardAdmin::class, 'user_create'])->name('superadmin.users.create');
    Route::get('user/edit/{id}', [DashboardAdmin::class, 'user_edit'])->name('superadmin.users.edit');
    Route::post('user/store', [DashboardAdmin::class, 'user_store'])->name('superadmin.users.store');
    Route::put('user/update/{id}', [DashboardAdmin::class, 'user_update'])->name('superadmin.users.update');
    Route::delete('user/delete/{id}', [DashboardAdmin::class, 'user_destroy'])->name('superadmin.users.delete');


    // AGENCES
    Route::get('agences', [DashboardAdmin::class, 'agence_index'])->name('superadmin.agences.index');
    Route::get('agence/create', [DashboardAdmin::class, 'agence_create'])->name('superadmin.agences.create');
    Route::get('agence/edit/{id}', [DashboardAdmin::class, 'agence_edit'])->name('superadmin.agences.edit');
    Route::post('agence/store', [DashboardAdmin::class, 'agence_store'])->name('superadmin.agences.store');
    Route::put('agence/update/{id}', [DashboardAdmin::class, 'agence_update'])->name('superadmin.agences.update');
    Route::delete('agence/delete/{id}', [DashboardAdmin::class, 'agence_destroy'])->name('superadmin.agences.delete');

    // PROFIL
    Route::post('/updatepassword', [DashboardAdmin::class, 'profil_change_password'])->name('superadmin.updatepassword');
    Route::get('/setting', [DashboardAdmin::class, 'profil_setting'])->name('superadmin.setting');
    Route::get('/profils/index', [DashboardAdmin::class, 'profil_index'])->name('superadmin.profil.index');

});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/client/profil', [ProfilController::class, 'index2'])->name('index2');
Route::get('/setting2', [ProfilController::class, 'setting2'])->name('setting2');




Route::resource('articles', ArticleController::class);
Route::resource('deposits', DepositController::class);
Route::get('/deposits/facture/{id}', [MakeDepositController::class, 'facture'])->name('deposits.facture');
Route::get('/deposits/retrieve/{id}', [MakeDepositController::class, 'retrieve'])->name('deposits.partial');
Route::resource('users', UserController::class);
Route::resource('clients', ClientController::class);
Route::resource('agences', AgenceController::class);
// Route::resource('pressings', PressingController::class);
Route::resource('profils', ProfilController::class)->except(
    ['create', 'destroy', 'show', 'update']
);
Route::post('/updateprofileimage', [ProfilController::class, 'change_profile_image'])->name('change_profile_image');

Route::resource('status', StatusController::class);
Route::resource('licences', LicenceController::class);
Route::resource('loyalgroups', LoyalGroupController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('tellers', TellerController::class);
// Route::resource('deposits', DepositController::class);
// Route::resource('depositedarticle', DepositUnitController::class);
Route::resource('codesuffixes', CodeSuffixController::class);
Route::resource('client', CodeSuffixController::class);
Route::resource('clientgroups', ClientGroupController::class);
Route::resource('deliveryhours', DeliveryHourController::class);
Route::resource('promos', PromoController::class);
Route::resource('deliveries', RetrieveController::class);
Route::get('/delivery/onday', [RetrieveController::class, 'onday'])->name('onday');
Route::get('/retrieve/search', [RetrieveController::class, 'search'])->name('search_retrieve');
Route::post('/retrieve/search', [RetrieveController::class, 'postSearch'])->name('search_retrieve');


Route::post('/updatepassword', [ProfilController::class, 'change_password'])->name('updatepassword');
Route::get('/setting', [ProfilController::class, 'setting'])->name('setting');
Route::get('/checkcustomer', [DashboardController::class, 'getCustomer'])->name('checkcustomer');
Route::post('/depositedarticle/delete', [DepositUnitController::class, 'delete'])->name('depositedarticle.delete');
Route::post('/depositedarticle/add_command', [DepositUnitController::class, 'add_command'])->name('add_command');
Route::get('/findPrice', ['as' => 'findPrice', 'uses' => [DepositController::class, 'findPrice']]);

// Recettes
Route::get('/searchReceipt', [ReceiptController::class, 'searchReceipt'])->name('searchReceipt');
Route::post('/searchReceipt', [ReceiptController::class, 'postReceipt'])->name('searchReceipt');
Route::get('/resultsReceipt', [ReceiptController::class, 'getReceipt'])->name('resultsReceipt');
Route::get('/searchLeftpay', [ReceiptController::class, 'searchLeftpay'])->name('searchLeftpay');
Route::get('/resultsLeftpay', [ReceiptController::class, 'getLeftpay'])->name('resultsLeftpay');
Route::post('/searchLeftpay', [ReceiptController::class, 'postLeftpay'])->name('searchLeftpay');
Route::get('/receipeNewToDay', [ReceiptController::class, 'receipeNewToDay'])->name('receipeNewToDay');
Route::get('/receipeAllToDay', [ReceiptController::class, 'receipeAllToDay'])->name('receipeAllToDay');


// Statistiques - Bilan
Route::get('/range', [StatsController::class, 'range'])->name('range');
Route::post('/sendData', [StatsController::class, 'sendData'])->name('sendData');
Route::post('/ratio/client', [StatsController::class, 'request_client'])->name('ratio_client');
Route::get('/search', [StatsController::class, 'index'])->name('search');
Route::get('/results', [StatsController::class, 'getSearch'])->name('getSearch');
Route::post('/sendDataDiscount', [StatsController::class, 'sendDataDiscount'])->name('sendDataDiscount');
Route::get('/searchDiscount', [StatsController::class, 'indexSearchDiscount'])->name('searchDiscount');
Route::get('/resultsDiscount', [StatsController::class, 'getSearchDiscount'])->name('getSearchDiscount');
Route::post('/sendDataDaily', [StatsController::class, 'sendDataDaily'])->name('sendDataDaily');
Route::get('/searchDaily', [StatsController::class, 'indexSearchDaily'])->name('searchDaily');
Route::get('/resultsDaily', [StatsController::class, 'getSearchDaily'])->name('getSearchDaily');
Route::get('/casheers-stats/{beginDate}/{endDate}', [StatsController::class, 'getCasheer'])->name('getCasheer');


Route::get('/totake', [StatsController::class, 'totake'])->name('totake');
Route::get('/answers', [StatsController::class, 'getTotake'])->name('getTotake');
Route::post('/totake', [StatsController::class, 'postTotake'])->name('totake');
Route::post('/search', [StatsController::class, 'postSearch'])->name('search');
Route::post('/searchDiscount', [StatsController::class, 'postSearchDiscount'])->name('searchDiscount');
Route::post('/searchDaily', [StatsController::class, 'postSearchDaily'])->name('searchDaily');
Route::get('/getCustomerDeposit', [StatsController::class, 'getCustomerDeposit'])->name('getCustomerDeposit');
Route::get('/ratio/client', [StatsController::class, 'getRatioClient'])->name('getRatioClient');
Route::get('/client/deposits/{client_id}/{date_debut}/{date_fin}', [StatsController::class, 'show_deposits'])->name('show_deposits');
Route::post('/postCustomerDeposit', [StatsController::class, 'postCustomerDeposit'])->name('searchdeposit');
Route::get('/getCustomer', [StatsController::class, 'search'])->name('getCustomer');
Route::get('/getsaleDay', [StatsController::class, 'getSaleDay'])->name('saleDay');
Route::get('/getsaleDay/{id}', [StatsController::class, 'getSaleByCasheer'])->name('saleDayCasheer');


Route::get('/mydeposits', [CustomerController::class, 'mydeposits'])->name('mydeposits');
Route::get('/mydeliveries', [CustomerController::class, 'mydeliveries'])->name('mydeliveries');
Route::post('/mydeliveries', [CustomerController::class, 'destroy'])->name('destroy');


// Deposit Process
Route::get('/deposits', [MakeDepositController::class, 'get_list_deposits'])->name('get_list_deposits');
Route::get('/deposit/create/{id}', [MakeDepositController::class, 'create_deposit'])->name('create_deposit');
Route::post('/deposit/create/', [MakeDepositController::class, 'doDeposit'])->name('doDeposit');
Route::post('/deposit/addMoney', [MakeDepositController::class, 'add_money'])->name('addMoney');
Route::delete('/deposit/delete/{id}', [MakeDepositController::class, 'delete_deposit'])->name('delete_deposit');
Route::put('/deposit/validate/{id}', [MakeDepositController::class, 'validate_deposit'])->name('validate_deposit');
Route::get('/deposit/edit/{id}', [MakeDepositController::class, 'editDeposit'])->name('editDeposit');
Route::get('/deposits-articles/{id}', [MakeDepositController::class, 'list_deposit_articles'])->name('list_deposit_articles');
Route::get('/deposit/ticket/{id}', [MakeDepositController::class, 'ticket_casheer'])->name('ticket_casheer');
Route::get('/deposit/admin/{id}', [MakeDepositController::class, 'show_deposit'])->name('show_deposit');
Route::get('/deposit/search', [MakeDepositController::class, 'deposit_search'])->name('deposit_search');
Route::post('/deposit/onwaiting', [MakeDepositController::class, 'onwaiting'])->name('onwaiting');

Route::post('/deposit/unit/add', [MakeDepositController::class, 'create_deposit_line'])->name('create_deposit_line');
Route::post('/deposit/unit/{id}', [MakeDepositController::class, 'delete_deposit_line'])->name('delete_deposit_line');
Route::get('/findPrice', [DepositController::class, 'findPrice'])->name('findPrice');
Route::get('/customer_search/action', [DashboardController::class, 'action'])->name('customer_search.action');
Route::get('/customer_search/clientgroups', [DashboardController::class, 'actionClientGroup'])->name('customer_search.client-group');

Route::post('/postDateLivraison', [MakeDepositController::class, 'postdatelivraison'])->name('postdatelivraison');

Route::get('/range', [StatsController::class, 'range'])->name('range');
Route::post('/sendData', [StatsController::class, 'sendData'])->name('sendData');
Route::get('/search', [StatsController::class, 'index'])->name('search');
Route::get('/results', [StatsController::class, 'getSearch'])->name('getSearch');
Route::get('/totake', [StatsController::class, 'totake'])->name('totake');
Route::get('/answers', [StatsController::class, 'getTotake'])->name('getTotake');
Route::post('/totake', [StatsController::class, 'postTotake'])->name('totake');
Route::post('/search', [StatsController::class, 'postSearch'])->name('search');
Route::get('/getCustomerDeposit', [StatsController::class, 'getCustomerDeposit'])->name('getCustomerDeposit');
Route::get('/getCustomerDeposit', [StatsController::class, 'getCustomerDeposit'])->name('getCustomerDeposit');
Route::post('/postCustomerDeposit', [StatsController::class, 'postCustomerDeposit'])->name('searchdeposit');
Route::get('/getCustomer', [StatsController::class, 'getCustomerDeposit'])->name('getCustomer');
// Route::get('/getsaleDay', [StatsController::class, 'getSaleDay'])->name('saleDay');
Route::get('/getUserList', [StatsController::class, 'getUserList'])->name('getUserList');

// client Area
Route::get('/area/client', [ClientspaceController::class, 'index'])->name('clientarea');
Route::post('/client/change/password', [ClientspaceController::class, 'change_password'])->name('change_password');
Route::post('/client/edit/password', [ClientspaceController::class, 'index'])->name('set-password-client');
Route::get('/client/profil', [ClientspaceController::class, 'profile'])->name('profil-client');
Route::get('/client/change/password', [ClientspaceController::class, 'setting'])->name('setting-client');
Route::get('/entries', [ClientspaceController::class, 'list_deposits'])->name('clientdeposit');
Route::get('/outers', [ClientspaceController::class, 'list_withdraws'])->name('clientwithdraw');
Route::get('/deposit/show/client/{id}', [ClientspaceController::class, 'show'])->name('client-show');
Route::get('/clientgroups/add/{id}', [ClientGroupController::class, 'add'])->name('clientgroups.add');



require __DIR__.'/auth.php';

Route::post('/log-print-action', [PrintActionController::class, 'logPrintAction']);
Route::get('/logs', [PrintActionController::class, 'index'])->name('logs.index');
Route::delete('/logs/delete/{id}', [PrintActionController::class, 'destroy'])->name('logs.destroy');


Route::resource('classeurs', ClasseurController::class);
Route::resource('laveurs', LaveurController::class);

Route::get('/waiting', [TraitementController::class, 'list_new_deposits'])->name('traitements.waiting');
Route::get('/in_progress', [TraitementController::class, 'list_deposits_in_progress'])->name('traitements.in_progress');
Route::get('/treated', [TraitementController::class, 'list_deposits_treated'])->name('traitements.treated');
Route::get('/treated/all', [TraitementController::class, 'list_deposits_treated_all'])->name('traitements.treated_all');
Route::get('/classed', [TraitementController::class, 'list_deposits_classed'])->name('traitements.classed');

Route::put('/make/in_progress/{id}', [TraitementController::class, 'make_in_progress'])->name('make_in_progress');
Route::put('/make/treated/{id}', [TraitementController::class, 'make_treated'])->name('make_treated');
Route::put('/make/classed/{id}', [TraitementController::class, 'make_classed'])->name('make_classed');

Route::get('/logs/detail/{id}', [PrintActionController::class, 'print_per_deposit'])->name('print_per_deposit');
Route::get('/logs/search', [PrintActionController::class, 'search'])->name('log.search');
Route::post('/logs/make/search', [PrintActionController::class, 'search_log'])->name('search_log');

Route::resource('in_out', InOutController::class);
Route::get('/inout/search', [InOutController::class, 'search'])->name('in_out.search');
Route::post('/inout/search', [InOutController::class, 'make_search'])->name('in_out.make_search');


Route::get('/deposits/bon/{id}', [DepositController::class, 'bon'])->name('deposits.bon');
Route::put('/inout/validate/{id}', [InOutController::class, 'validateInOut'])->name('in_out.validate');
