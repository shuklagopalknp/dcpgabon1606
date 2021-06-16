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
$route['default_controller'] = 'Login';
$route['404_override'] = 'Error';
$route['translate_uri_dashes'] = FALSE;

$route['AdminDashboard'] = 'Admin_Dashboard';
$route['Dashboard'] = 'SuperAdmin_dashboard';
$route['DashboardBranch'] = 'SubAdmin_dashboard';

$route['DashboardDivision'] = 'Division_Dashboard';
$route['DashboardHeadDCPR'] = 'HeadDCPR_Dashboard';
$route['DashboardRiskAnalyst'] = 'RiskAnalyst_Dashboard';
$route['DashboardRiskManager'] = 'RiskManager_Dashboard';
$route['DashboardCicManagingDirector'] = 'CicManagingDirector_Dashboard';
$route['DashboardDirectorEngagements'] = 'DirectorEngagements_Dashboard';
$route['DashboardCAD'] = 'CADAdministrator_Dashboard';
$route['DashboardCADAgent'] = 'CADAgent_Dashboard';
$route['DashboardOperating'] = 'Operating_Dashboard';

$route['DashboardGlobal'] = 'Global_dashboard';

$route['branch'] = 'Branch';
$route['forget-password'] = 'Login/forgetpassword';

// New update : 18-4-2020
$route['Regions'] = 'target_commune/Regions';
$route['Regions/(:any)'] = 'target_commune/Regions/$1';
$route['Chef_Lieu_Department'] = 'target_commune/Chef_Lieu_Department';
$route['Chef_Lieu_Department/(:any)'] = 'target_commune/Chef_Lieu_Department/$1';
$route['Communes'] = 'target_commune/Communes';
$route['Communes/(:any)'] = 'target_commune/Communes/$1';

// New update : 21-4-2020

$route['Secteurs'] = 'target_companies/Secteurs';
$route['Secteurs/(:any)'] = 'target_companies/Secteurs/$1';
$route['Sous_Secteurs'] = 'target_companies/Sous_Secteurs';
$route['Sous_Secteurs/(:any)'] = 'target_companies/Sous_Secteurs/$1';
$route['Limites'] = 'target_companies/Limites';
$route['Limites/(:any)'] = 'target_companies/Limites/$1';
$route['Categorie_employeurs'] = 'target_companies/Categorie_employeurs';
$route['Categorie_employeurs/(:any)'] = 'target_companies/Categorie_employeurs/$1';

// New update : 22-4-2020
$route['Employeurs'] = 'target_companies/Employers';
$route['Employeurs/(:any)'] = 'target_companies/Employers/$1';

// New update: 28-4-2020
$route['Business_Customer'] = 'customers/Business_Customer';
$route['Business_Customer/(:any)'] = 'customers/Business_Customer/$1';

// New update: 8-05-2020
$route['Gage_Espece'] = 'business_products/Gage_Espece';
$route['Gage_Espece/(:any)'] = 'business_products/Gage_Espece/$1';

// New update : 11-05-2020
$route['Gage_Espece/(:any)/(:any)'] = 'business_products/Gage_Espece/$1/$2';

// New update : 13-05-2020
$route['Business_Product'] = 'business_products/Business_Product';
$route['Business_Product/(:any)'] = 'business_products/Business_Product/$1';
$route['Business_Product/(:any)/(:any)'] = 'business_products/Business_Product/$1/$2';

// New upate : 18-05-2020
$route['Business_Product/(:any)/(:any)/(:any)'] = 'business_products/Business_Product/$1/$2/$3';

// New upate : 19-05-2020
$route['Business_Product/(:any)/(:any)/(:any)/(:any)'] = 'business_products/Business_Product/$1/$2/$3/$4';

