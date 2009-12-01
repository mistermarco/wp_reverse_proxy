<?php
/* 
Plugin Name: Stanford Reverse Proxy
Description: Turn this on after you set up this blog to work with a reverse proxy.
Version: 1.0 
Author: Marco Wise
Author URI: http://www.stanford.edu/dept/its/

Copyright (c) 2007, 2008, 2009, Board of Trustees, Leland Stanford Jr. University.
All rights reserved.
 
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 
    Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    
    Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
    
    Neither the name of Stanford University nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
 
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/


# Disable the Canonical Filter
remove_filter('template_redirect', 'redirect_canonical');

# Strip out extraneous path information from REQUEST_URI
$su_rewritebase = $_SERVER['SCRIPT_NAME'];
$su_rewritebase = preg_replace('/\/(?:wp\-admin\/)?[-\w]*\.php$/', '', $su_rewritebase);
$pattern = preg_replace('/\//', '\/', $su_rewritebase);
$_SERVER['REQUEST_URI'] = preg_replace("/$pattern/", '', $_SERVER['REQUEST_URI']);
?>
