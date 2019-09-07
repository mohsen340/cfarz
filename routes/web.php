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

Route::get('/', function () {
  return view('welcome2');
});

Auth::routes();


//panel routes
Route::middleware('admin')->group(function () {
  Route::get('/dashboard', 'MainController@Dashboard');

  Route::get('/addcurrency', 'CurrencyController@AddCurrencyPageShow');
  Route::get('/listcurrency', 'CurrencyController@ListCurrencyShow');

  Route::get('/addscurrency', 'SourceCurrencyController@AddCurrencyPageShow');
  Route::get('/listscurrency', 'SourceCurrencyController@ListCurrencyShow');

  Route::get('/adddcurrency', 'DigitalCurrencyController@AddCurrencyPageShow');
  Route::get('/listdcurrency', 'DigitalCurrencyController@ListCurrencyShow');

  Route::get('/addcoin', 'CoinController@AddCurrencyPageShow');
  Route::get('/listcoin', 'CoinController@ListCurrencyShow');

  Route::get('/addgold', 'GoldController@AddCurrencyPageShow');
  Route::get('/listgold', 'GoldController@ListCurrencyShow');

  Route::get('/addcarco', 'CarsController@AddCurrencyPageShow');
  Route::get('/addcar', 'CarsController@ListCurrencyShow');
  Route::get('/caroptions', 'CarsController@ListOptionCars');

  Route::get('/addnews', 'NewsController@AddNewsPage');
  Route::get('/listnews', 'NewsController@ShowNewsList');
  Route::post('/upload-new-image', 'NewsController@uploadImage');

  Route::get('/addcatenewspaper', 'NewsPapersController@AddNewPaperCategoryPage');
  Route::get('/addnewspaper', 'NewsPapersController@AddNewsPaperPage');
  Route::get('/listnewspaper', 'NewsPapersController@ShowNewsPaperList');


  Route::get('/addmobilebrand', 'MobilesController@AddCurrencyPageShow');
  Route::get('/addmobile', 'MobilesController@ListCurrencyShow');
  Route::get('/listmobile', 'MobilesController@ListDatasetMobiles');
  Route::get('/mobileoptions', 'MobilesController@ListOptionMobiles');


  Route::post('/EditADSINFO', 'MainController@EditAdsInfo');

  Route::post('/InsertNewCurrency', 'CurrencyController@CreateCurrency');
  Route::post('/EditCurrency', 'CurrencyController@EditCurrency');
  Route::post('/InsertNewDataCurrency', 'CurrencyController@CreateDataCurrency');
  Route::post('/EditDataCurrency', 'CurrencyController@EditDataCurrency');

  Route::post('/InsertNewSCurrency', 'SourceCurrencyController@CreateCurrency');
  Route::post('/EditSCurrency', 'SourceCurrencyController@EditCurrency');
  Route::post('/InsertNewDataSCurrency', 'SourceCurrencyController@CreateDataCurrency');
  Route::post('/EditDataSCurrency', 'SourceCurrencyController@EditDataCurrency');

  Route::post('/InsertNewDCurrency', 'DigitalCurrencyController@CreateCurrency');
  Route::post('/EditDCurrency', 'DigitalCurrencyController@EditCurrency');
  Route::post('/InsertNewDataDCurrency', 'DigitalCurrencyController@CreateDataCurrency');
  Route::post('/EditDataDCurrency', 'DigitalCurrencyController@EditDataCurrency');

  Route::post('/InsertNewCoin', 'CoinController@CreateCurrency');
  Route::post('/EditCoin', 'CoinController@EditCurrency');
  Route::post('/InsertNewDataCoin', 'CoinController@CreateDataCurrency');
  Route::post('/EditDataCoin', 'CoinController@EditDataCurrency');

  Route::post('/InsertNewGold', 'GoldController@CreateCurrency');
  Route::post('/EditGold', 'GoldController@EditCurrency');
  Route::post('/InsertNewDataGold', 'GoldController@CreateDataCurrency');
  Route::post('/EditDataGold', 'GoldController@EditDataCurrency');

  Route::post('/InsertNewMobileBrand', 'MobilesController@CreateCurrency');
  Route::post('/EditMobileBrand', 'MobilesController@EditCurrency');
  Route::post('/InsertNewMobilename', 'MobilesController@CreateCurrencyT');
  Route::post('/EditMobilename', 'MobilesController@EditCurrencyT');
  Route::post('/InsertNewDataMobile', 'MobilesController@CreateDataCurrency');
  Route::post('/EditDataMobile', 'MobilesController@EditDataCurrency');
  Route::post('/InsertNewMobileOption', 'MobilesController@CreateDataOptions');
  Route::post('/EditDataMobileOptions', 'MobilesController@EditDataOptions');


  Route::post('/InsertNewCarco', 'CarsController@CreateCurrency');
  Route::post('/EditCarCo', 'CarsController@EditCurrency');
  Route::post('/InsertNewCar', 'CarsController@CreateDataCurrency');
  Route::post('/EditCar', 'CarsController@EditDataCurrency');
  Route::post('/InsertNewCarOption', 'CarsController@CreateDataOptions');
  Route::post('/EditDataCarOptions', 'CarsController@EditDataOptions');

  Route::post('/InsertNewNews', 'NewsController@CreateNews');
  Route::post('/EditNews', 'NewsController@EditNews');

  Route::post('/InsertNewCategoryNewsPaper', 'NewsPapersController@CreateNewsPaperCategory');
  Route::post('/EditNewsPaperCat', 'NewsPapersController@EditNewsPaperCategory');

  Route::post('/InsertNewNewsPaper', 'NewsPapersController@CreateNewsPaper');
  Route::post('/EditNewsPaper', 'NewsPapersController@EditNewsPaper');


  //added file upload
  Route::get('manage-files','MainController@files');
  Route::post('upload-file','MainController@uploadFile');
  Route::post('upload-file-with-link','MainController@uploadFileWithLink');

  //added file upload
  Route::get('manage-videos','MainController@videos');
  Route::post('upload-video','MainController@uploadVideo');
  Route::post('upload-video-with-link','MainController@uploadVideoWithLink');


  //added new apps details
  Route::post('apps-data-update','MainController@appsDetailUpdate');
});




//added shop app panel routes
Route::middleware('admin')->group(function () {
  Route::get('shop-products','Shop\Panel\PanelController@products');
  Route::get('shop-products/detail/{id}','Shop\Panel\PanelController@detail');
  Route::post('shop-products/update','Shop\Panel\PanelController@update');
  Route::get('shop-product-delete/{id}','Shop\Panel\PanelController@productDelete');
  Route::post('shop-product-insert','Shop\Panel\PanelController@productInsert');

  Route::get('shop-orders','Shop\Panel\PanelController@orders');
  Route::get('shop-order-done/{id}','Shop\Panel\PanelController@orderDone');
  Route::get('all-users','Shop\Panel\PanelController@users');
  Route::get('user-detail/{id}','Shop\Panel\PanelController@userDetail');

});






