<?php
if ( ! defined( 'ABSPATH' ) ) { 
    die("you do not have access to this page!");
}
// plugin uninstall function. 
if ( ! function_exists( 'on_page_seo_uninstaller' ) ) {
    function on_page_seo_uninstaller()
    {
    	if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');
        
    	$robfile = ABSPATH . sanitize_file_name('robots.txt');
    	if(file_exists($robfile)) {
           wp_delete_file( $robfile ); 
        }
        
        $sitemapfile = ABSPATH . sanitize_file_name('sitemap.xml');
    	if(file_exists($sitemapfile)) {
           wp_delete_file( $sitemapfile ); 
        }
    }
}
// Calling function for uninstallation.
on_page_seo_uninstaller();
?>
 