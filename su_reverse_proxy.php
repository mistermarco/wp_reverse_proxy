<?php
/* 
Plugin Name: Stanford Reverse Proxy
Description: Turn this on after you set up this blog to work with a reverse proxy.
Version: 1.0 
Author: Marco Wise
Author URI: http://www.stanford.edu/dept/its/
*/

# Disable the Canonical Filter
remove_filter('template_redirect', 'redirect_canonical');

# Strip out extraneous path information from REQUEST_URI
$su_rewritebase = $_SERVER['SCRIPT_NAME'];
$su_rewritebase = preg_replace('/\/(?:wp\-admin\/)?[-\w]*\.php$/', '', $su_rewritebase);
$pattern = preg_replace('/\//', '\/', $su_rewritebase);
$_SERVER['REQUEST_URI'] = preg_replace("/$pattern/", '', $_SERVER['REQUEST_URI']);
?>