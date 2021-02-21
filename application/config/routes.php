<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//Authentication
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['registadmin'] = 'secret/registrasi';

// Admin Blog's
$route['artikel'] = 'blog';
$route['detail_artikel/(:any)'] = 'blog/detailBlog/$1';
$route['tambah_artikel'] = 'blog/addBlog';
$route['proses_artikel'] = 'blog/insertBlog';
$route['edit_artikel/(:any)'] = 'blog/editBlog/$1';
$route['update_artikel'] = 'blog/updateBlog';
$route['delete_artikel'] = 'blog/deleteBlog';

//Admin Categories
$route['kategori'] = 'kategori';
$route['tambah_kategori'] = 'kategori/add_kategori';
$route['update_kategori'] = 'kategori/updateKategori';
$route['delete_kategori'] = 'kategori/deleteKategori';

//Admin Manage Member
$route['anggota'] = 'member';
$route['tambah_anggota'] = 'member/addMember';
$route['proses_anggota'] = 'member/insertMember';
$route['edit_anggota/(:any)'] = 'member/editMember/$1';
$route['delete_anggota'] = 'member/deleteMember';


//Admin Privilages
$route['settings'] = 'admin/profile';

//User Web Blog
$route['blog'] = 'user';
$route['blog/(:any)'] = 'user/index/$1';
$route['tentang'] = 'user/about';
$route['kategoriblog/(:any)'] = 'user/kategoriSearch/$1';
$route['viewblog/(:any)'] = 'user/detailBlog/$1';
$route['kirim_komen'] = 'user/kirimKomentar';
$route['balas_komen'] = 'user/balasKomentar';
$route['dukung'] = 'user/dukungan';

//Default Settings
$route['default_controller'] = 'user';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;
