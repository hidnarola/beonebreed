<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "dashboard";
$route['404_override'] = '';
//$route['mondou'] = "client_login";
require_once( BASEPATH .'database/DB.php' );
$db =& DB();
$query = $db->get( 'users' );
$result = $query->result();

foreach( $result as $row )
{
    $route[ $row->username ] = 'login/index/'.$row->username;
	$route[ $row->username.'/login/logout' ] = 'login/logout';
	$route[ $row->username.'/suggestion' ] = 'suggestion';
}
$route['(:any)/quality/(:any)/(:any)'] = 'quality/$2/$3';



/*
$route['mondou/news'] = "client_news";
$route['mondou/suggestion'] = "suggestion";
$route['mondou/suggestion/add'] = "suggestion/add";
$route['mondou/quality'] = "quality";
$route['mondou/quality/add'] = "quality/add";
$route['mondou/quality/add_next/(:any)'] = "quality/add_next/$1";
$route['mondou/quality/edit/(:any)'] = "quality/edit/$1";
$route['mondou/suggestion/edit/(:any)'] = "suggestion/edit/$1";
$route['mondou/quality/delete/(:any)'] = "quality/delete/$1";
$route['mondou/suggestion/delete/(:any)'] = "suggestion/delete/$1";
$route['mondou/suggestion/add_next/(:any)'] = "suggestion/add_next/$1";
 * /
 */

/* End of file routes.php */
/* Location: ./application/config/routes.php */