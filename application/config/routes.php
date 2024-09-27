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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Rutas para el controlador Admins
$route['admins/listar'] = 'admins/listar';
$route['admins/obtener/(:num)'] = 'admins/obtener/$1';
$route['admins/insertar'] = 'admins/insertar';
$route['admins/actualizar/(:num)'] = 'admins/actualizar/$1';
$route['admins/eliminar/(:num)'] = 'admins/eliminar/$1';

// Rutas para el controlador Ciudad
$route['ciudad/listar'] = 'ciudad/listar';
$route['ciudad/obtener/(:num)'] = 'ciudad/obtener/$1';
$route['ciudad/insertar'] = 'ciudad/insertar';
$route['ciudad/actualizar/(:num)'] = 'ciudad/actualizar/$1';
$route['ciudad/eliminar/(:num)'] = 'ciudad/eliminar/$1';

// Rutas para el controlador ComentariosLocal
$route['comentarios/listar'] = 'comentarioslocal/listar';
$route['comentarios/obtener/(:num)'] = 'comentarioslocal/obtener/$1';
$route['comentarios/insertar'] = 'comentarioslocal/insertar';
$route['comentarios/actualizar/(:num)'] = 'comentarioslocal/actualizar/$1';
$route['comentarios/eliminar/(:num)'] = 'comentarioslocal/eliminar/$1';
$route['comentarios/local/(:num)'] = 'ComentariosLocal/list_comment_local/$1';


// Rutas para el controlador EventoTipo
$route['evento-tipo/listar'] = 'eventoTipo/listar';
$route['evento-tipo/obtener/(:num)'] = 'eventoTipo/obtener/$1';
$route['evento-tipo/insertar'] = 'eventoTipo/insertar';
$route['evento-tipo/actualizar/(:num)'] = 'eventoTipo/actualizar/$1';
$route['evento-tipo/eliminar/(:num)'] = 'eventoTipo/eliminar/$1';

// Rutas para el controlador Local
$route['local/listar'] = 'local/listar';
$route['local/obtener/(:num)'] = 'local/obtener/$1';
$route['local/insertar'] = 'local/insertar';
$route['local/actualizar/(:num)'] = 'local/actualizar/$1';
$route['local/eliminar/(:num)'] = 'local/eliminar/$1';

// Rutas para el controlador LocalArchivos
$route['localarchivos/listar'] = 'localarchivos/listar';
$route['localarchivos/obtener/(:num)'] = 'localarchivos/obtener/$1';
$route['localarchivos/insertar'] = 'localarchivos/insertar';
$route['localarchivos/actualizar/(:num)'] = 'localarchivos/actualizar/$1';
$route['localarchivos/eliminar/(:num)'] = 'localarchivos/eliminar/$1';

// Rutas para el controlador LocalMenu
$route['localmenu/listar'] = 'localmenu/listar';
$route['localmenu/listarMenuLocal/(:num)'] = 'LocalMenu/listarMenuLocal/$1'; 
$route['localmenu/obtener/(:num)'] = 'localmenu/obtener/$1';
$route['localmenu/insertar'] = 'localmenu/insertar';
$route['localmenu/actualizar/(:num)'] = 'localmenu/actualizar/$1';
$route['localmenu/eliminar/(:num)'] = 'localmenu/eliminar/$1';

// Rutas para el controlador LocalTipo
$route['localtipo/listar'] = 'localtipo/listar';
$route['localtipo/obtener/(:num)'] = 'localtipo/obtener/$1';
$route['localtipo/insertar'] = 'localtipo/insertar';
$route['localtipo/actualizar/(:num)'] = 'localtipo/actualizar/$1';
$route['localtipo/eliminar/(:num)'] = 'localtipo/eliminar/$1';

// Rutas para el controlador MenuArchivos
$route['menuarchivos/listar'] = 'menuarchivos/listar';
$route['menuarchivos/obtener/(:num)'] = 'menuarchivos/obtener/$1';
$route['menuarchivos/insertar'] = 'menuarchivos/insertar';
$route['menuarchivos/actualizar/(:num)'] = 'menuarchivos/actualizar/$1';
$route['menuarchivos/eliminar/(:num)'] = 'menuarchivos/eliminar/$1';

// Rutas para el controlador Pais
$route['pais/listar'] = 'pais/listar';
$route['pais/obtener/(:num)'] = 'pais/obtener/$1';
$route['pais/insertar'] = 'pais/insertar';
$route['pais/actualizar/(:num)'] = 'pais/actualizar/$1';
$route['pais/eliminar/(:num)'] = 'pais/eliminar/$1';

// Rutas para el controlador TipoAdmins
$route['tipoadmins/listar'] = 'tipoadmins/listar';
$route['tipoadmins/obtener/(:num)'] = 'tipoadmins/obtener/$1';
$route['tipoadmins/insertar'] = 'tipoadmins/insertar';
$route['tipoadmins/actualizar/(:num)'] = 'tipoadmins/actualizar/$1';
$route['tipoadmins/eliminar/(:num)'] = 'tipoadmins/eliminar/$1';

// Rutas para el controlador TipoMenu
$route['tipomenu/listar'] = 'tipomenu/listar';
$route['tipomenu/obtener/(:num)'] = 'tipomenu/obtener/$1';
$route['tipomenu/insertar'] = 'tipomenu/insertar';
$route['tipomenu/actualizar/(:num)'] = 'tipomenu/actualizar/$1';
$route['tipomenu/eliminar/(:num)'] = 'tipomenu/eliminar/$1';

// Rutas para el controlador Usuarios
$route['usuarios/listar'] = 'usuarios/listar';
$route['usuarios/obtener/(:num)'] = 'usuarios/obtener/$1';
$route['usuarios/insertar'] = 'usuarios/insertar';
$route['usuarios/actualizar/(:num)'] = 'usuarios/actualizar/$1';
$route['usuarios/eliminar/(:num)'] = 'usuarios/eliminar/$1';
$route['usuarios'] = 'Usuarios/login';
