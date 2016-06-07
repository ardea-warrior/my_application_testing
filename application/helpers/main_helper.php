<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
if (!function_exists('assets_url')) {
    function assets_url($url) {
        $baseurl = str_replace('index.php/', '', base_url());
        echo $baseurl.'assets/'.$url;
    }
    
}