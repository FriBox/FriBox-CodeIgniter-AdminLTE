<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');  //默认路由/根路由

// 前台根路由
$routes->match(['get','post','put'], '(?i:index)', 'Home::index');  //首页路由/Index
$routes->match(['get','post','put'], '(?i:reset)', 'Home::reset');  //重置路由/Reset
$routes->match(['get','post','put'], '(?i:language)', 'Home::language');  //设置语言路由/Language

// 后台管理控制台路由
$routes->get('(?i:admin)', 'Admin::index');  //设置Admin管理控制台路由/Admin
$routes->match(['get','post'], '(?i:admin/login)', 'Admin::login');  //设置Admin管理控制台登录路由/Admin/Login
$routes->get('(?i:admin/logout)', 'Admin::logout');  //设置Admin管理控制台登出路由/Admin/Logout


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
