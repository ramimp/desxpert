<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '144481493680-pl0t5fm92ultb4qftuvkiuq72ilpljuq.apps.googleusercontent.com';
$config['google']['client_secret']    = 'wL0cA3zMzyKVN5Ks9SwUXR2o';
$config['google']['redirect_uri']     = 'http://localhost/online-consult/user/google';
$config['google']['application_name'] = 'Weblesson Demo';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();

?>