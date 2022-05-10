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
    return view('welcome');
});



#病历字段列表
Route::any('ziduan/add','Case_zd\ZiduanIndexController@add');
Route::post('ziduan/update','Case_zd\ZiduanIndexController@update');
Route::post('ziduan/showUpdateYes','Case_zd\ZiduanIndexController@showUpdateYes');
Route::post('ziduan/showUpdateNo','Case_zd\ZiduanIndexController@showUpdateNo');
Route::get('ziduan/index','Case_zd\ZiduanIndexController@index');

#病人处理
Route::get('patient','Patient\IndexController@index');
Route::get('patient/zd_index','Patient\IndexController@zd_index');

Route::post('patient/add','Patient\IndexController@add');
Route::post('patient/edit','Patient\IndexController@edit');
Route::post('patient/delete','Patient\IndexController@delete');
Route::get('patient/time-index','Patient\IndexController@timeIndex');
Route::post('patient/file_edit','IndexController@file_edit');
Route::post('patient/file_edit_stop','Patient\IndexController@file_edit_stop');

/*系统设置*/
Route::get('system','Config\SystemController@index');
Route::get('system/get-key','Config\SystemController@getKey');
Route::post('system/edit','Config\SystemController@edit');

#病人资源处理
Route::post('files/add','Files\IndexController@add');







// Route::get('files','Files\IndexController@index');


Route::get('files-logo','app\Http\Controllers\Files\IndexController@Filesindex');
Route::get('files-web','app\Http\Controllers\Files\IndexController@indexWeb');

Route::post('files/edit','app\Http\Controllers\Files\IndexController@edit');
Route::post('files/delete','app\Http\Controllers\Files\IndexController@delete');
Route::post('files/delete-encode','app\Http\Controllers\Files\IndexController@deleteEncode');
Route::post('files/files-all','app\Http\Controllers\Files\IndexController@read_all');
Route::post('files/files-size','app\Http\Controllers\Files\IndexController@files_size');


#Sql 处理
Route::post('select','app\Http\Controllers\Sql\SqlController@selectSql');
Route::post('insert','app\Http\Controllers\Sql\SqlController@insertSql');
Route::post('update','app\Http\Controllers\Sql\SqlController@updateSql');
Route::post('delete','app\Http\Controllers\Sql\SqlController@deleteSql');


/*病例管理*/
Route::post('case-csv/output-csv','app\Http\Controllers\Patient\CaseCsvController@outputCsv');
Route::post('case-csv/input-csv','app\Http\Controllers\Patient\CaseCsvController@inputCsv');



/*录像设置*/
Route::get('video','app\Http\Controllers\Config\VideoController@index');
Route::post('video/edit','app\Http\Controllers\Config\VideoController@edit');

/*系统设置*/
// Route::get('system','app\Http\Controllers\Config\SystemController@index');
// Route::get('system/get-key','app\Http\Controllers\Config\SystemController@getKey');
// Route::post('system/edit','app\Http\Controllers\Config\SystemController@edit');
Route::post('system/network-edit','app\Http\Controllers\Config\SystemController@networkEdit');
Route::get('/system/get-network-key','app\Http\Controllers\Config\SystemController@getNetworkKey');
Route::get('/system/get-linux-net','app\Http\Controllers\Config\SystemController@getLinuxNet');
Route::get('/system/net-reset','app\Http\Controllers\Config\SystemController@netReset');
Route::get('/system/get-signal','app\Http\Controllers\Config\SystemController@getSignal');
Route::post('system/signal-edit','app\Http\Controllers\Config\SystemController@signalEdit');
Route::post('system/set-time','app\Http\Controllers\Config\SystemController@setTime');
Route::get('system/get-time','app\Http\Controllers\Config\SystemController@getTime');
Route::get('system/get-ntptime','app\Http\Controllers\Config\SystemController@getNTPTime');
Route::get('system/getTimeTo','app\Http\Controllers\Config\SystemController@getTimeTo');
Route::get('switch/reboot','app\Http\Controllers\Config\SwitchController@reboot');
Route::get('switch/shutdown','app\Http\Controllers\Config\SwitchController@shutdown');
Route::post('system/setPowerOnstartup','app\Http\Controllers\Config\SystemController@PowerOnstartup');
Route::get('system/getPowerOnstartup','app\Http\Controllers\Config\SystemController@getPowerOnstartup');
Route::post('system/setcodec','app\Http\Controllers\Config\SystemController@setcodec');
Route::get('system/codec','app\Http\Controllers\Config\SystemController@codec');
Route::post('system/setrelay','app\Http\Controllers\Config\SystemController@setrelay');
Route::get('system/relay','app\Http\Controllers\Config\SystemController@relay');
Route::get('system/getEnOrDe','app\Http\Controllers\Config\SystemController@getEnOrDe');
Route::get('system/getWiFiList','app\Http\Controllers\Config\SystemController@wifi');
Route::post('system/safePop_up','app\Http\Controllers\Config\SystemController@safePop_up');
Route::post('system/diskMount','app\Http\Controllers\Config\SystemController@diskMount');
Route::get('system/getDistOut','app\Http\Controllers\Config\SystemController@getDistOut');
Route::post('system/shell','app\Http\Controllers\Config\SystemController@shell');
Route::post('system/netUpdate','app\Http\Controllers\Config\SystemController@netUpdate');

Route::post('system/WiFiConnect','app\Http\Controllers\Config\SystemController@WiFiConnect');
Route::get('system/restore_factory_settings','app\Http\Controllers\Config\SystemController@restore_factory_settings');
Route::post('system/getMachineNumber','app\Http\Controllers\Config\SystemController@getMachineNumber');
Route::get('system/get-mac','app\Http\Controllers\Config\SystemController@getMAC');
Route::get('system/set-mac','app\Http\Controllers\Config\SystemController@setMAC');
Route::get('system/getInfo','app\Http\Controllers\Config\SystemController@getInfo');


/*文件夹处理*/
// Route::post('folder/add','Files\FolderController@add');
Route::get('folder/get','app\Http\Controllers\Files\FolderController@get');
Route::post('folder/del','app\Http\Controllers\Files\FolderController@del');
Route::post('folder/copy','app\Http\Controllers\Files\FolderController@copy');
Route::get('folder/get-disk','app\Http\Controllers\Files\FolderController@getDisk');
Route::get('folder/download','app\Http\Controllers\Files\FolderController@download');
Route::get('folder/get-file-size','app\Http\Controllers\Files\FolderController@getFileSize');
Route::get('folder/get-file-size-in','app\Http\Controllers\Files\FolderController@getFileSizeIn');
Route::get('folder/clear-disk','app\Http\Controllers\Files\FolderController@clearDisk');
Route::get('folder/file-out','app\Http\Controllers\Files\FolderController@fileOut');
Route::get('folder/file-in','app\Controllers\Files\FolderController@fileIn');
Route::get('folder/patientfile-out','app\Controllers\Files\FolderController@fileCreatPathOut');
Route::post('folder/patientfile-out','app\Controllers\Files\FolderController@fileCreatPathOut');
Route::post('folder/umount','app\Controllers\Files\FolderController@umount');
Route::post('folder/fileList','app\Controllers\Files\FolderController@fileList');
Route::post('folder/fileOutNew','app\Controllers\Files\FolderController@fileOutNew');
Route::post('folder/video-time','app\Controllers\Files\FolderController@video_path');
Route::post('folder/del-logo','app\Controllers\Files\FolderController@delLogo');
Route::post('folder/clear_cp','app\Controllers\Files\FolderController@clear_cp');

/*文件上传*/
Route::post('folder/upload-file','app\Controllers\Files\FolderController@uploadFile');
Route::post('folder/upload-file-video','app\Controllers\Files\FolderController@uploadFileVideo');


/*模板*/
Route::get('templete','app\Controllers\Report\TemplateController@index');
Route::post('templete/templ-Form','app\Controllers\Report\TemplateController@templForm');
Route::post('templete/templ-upload','app\Controllers\Report\TemplateController@templUpload');

/*报告*/
Route::get('report','app\Controllers\Report\ReportController@index');
Route::get('report/detail','app\Controllers\Report\ReportController@detail');
Route::post('report/add','app\Controllers\Report\ReportController@add');
Route::post('report/edit','app\Controllers\Report\ReportController@edit');
Route::post('report/del','app\Controllers\Report\ReportController@del');
Route::get('report/view','app\Controllers\Report\ReportController@view');
Route::get('report/timeIndex','app\Controllers\Report\ReportController@timeIndex');



/*系统设置-管理员*/
Route::get('admin','app\Controllers\Config\AdminController@index');
Route::post('admin/add','app\Controllers\Config\AdminController@add');
Route::post('admin/edit','app\Controllers\Config\AdminController@edit');
Route::post('admin/del','app\Controllers\Config\AdminController@del');

/*扫描相关*/
Route::get('scan','app\Controllers\Config\ScanController@index');
Route::get('scan/verify','app\Controllers\Config\ScanController@verify');

/*初始化*/
Route::get('init','app\Controllers\Init\IndexController@index');
Route::get('init/reset','app\Controllers\Init\IndexController@reset');

/*日志处理*/
Route::get('log','app\Controllers\Log\IndexController@index');
Route::post('log/add','app\Controllers\Log\IndexController@add');
Route::post('log/del','app\Controllers\Log\IndexController@del');

/*登录退出*/
Route::post('/user/login','app\Controllers\Common\UserController@login');
Route::get('/user/login-sign','app\Controllers\Common\UserController@loginSign');
Route::post('/user/login-info','app\Controllers\Common\UserController@loginInfo');
Route::post('/user/logout','app\Controllers\Common\UserController@logout');
Route::post('/user/reset-root','app\Controllers\Common\UserController@resetRoot');


/*专用于测试的控制器*/
Route::get('testbyzyb','app\Controllers\Test\TestController@test');

Route::get('testq','app\Controllers\Test\TestController@testt');

Route::get('test','app\Controllers\Files\FolderController@getDisk');
