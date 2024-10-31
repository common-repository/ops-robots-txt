<?php
/**
Plugin Name: On Page SEO + Social Live Chat
Plugin URI:  https://wordpress.org/plugins/ops-robots-txt/
Description: On-Page SEO Social Live Chat (OPS) plugin is help you for boosting your website, to Instantly Index Your New Website and rank on serach engine by adding specific instructions in your robots.txt file. OPS Plugin have also Social Live Chat button feature which added automatically in your website just active this plugin. No need to have coding (tech) skills to use OPS plugin.
Version:     2.0.0
Author:      Rishikesh Singh
Author URI:  https://wa.me/message/SMYFCISLIFGUI1
License:     GPL2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0/
Text Domain: ops-robots-txt
Domain Path: /i18n/

Wordpress On Page SEO & Social Live Chat is free plugin: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 1 of the License, or any later version.
 
On Page SEO is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with SEO. If not, see http://www.gnu.org/licenses/gpl-2.0/.

@since     5.0.0
@author    Rishikesh Singh
@package   OPS\Plugin
@license   GPL-2.0+
@copyright Copyright (c) 2021, OPS Robots Txt
* */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    die("you do not have access to this page!");
}
   // if ( !defined('ABSPATH') )
   //  define('ABSPATH', dirname(__FILE__) . '/');
   
$file = ABSPATH . sanitize_file_name('robots.txt');
if(!file_exists($file)) {
    touch('robots.txt');
    header( 'Content-Type: text/plain; charset=utf-8' );
    $output = "User-agent: *\n";
    $output  .= "Allow: /\n\n";
    $site_url = parse_url( site_url() );
    $path     = ( ! empty( $site_url['path'] ) ) ? $site_url['path'] : '';
    $output  .= "Allow: $path/wp-admin/admin-ajax.php\n\n";
    $output  .= "Allow: /wp-content/plugins/*.css$\n";
    $output  .= "Allow: /wp-content/plugins/*.js$\n";
    $output  .= "Allow: /wp-includes/*.js$\n";
    $output  .= "Allow: */wp-content/uploads/\n\n";
    $output  .= "User-agent: adbeat_bot\n";
    $output  .= "Disallow: /\n\n";
    $output  .= "User-agent: ScoutJet\n";
    $output  .= "Disallow: /\n\n";
    $output  .= "User-agent: Httrack\n";
    $output  .= "Disallow: /\n\n";
    $output  .= "Disallow: /YandexBot/\n";
    $output  .= "Disallow: /MJ12bot/\n";
    $output  .= "Disallow: /Ezooms/\n";
    $output  .= "Disallow: /Baiduspider/\n";
    $output  .= "Disallow: /AhrefsBot/\n";
    $output  .= "Disallow: $path/wp-admin/\n";
    $output  .= "Disallow: $path/wp-includes/\n";
    $output  .= "Disallow: $path/readme/\n";
    $output  .= "Disallow: $path/license.txt\n";
    $output  .= "Disallow: $path/xmlrpc.php\n";
    $output  .= "Disallow: $path/wp-login.php\n";
    $output  .= "Disallow: $path/wp-register.php\n";
    $output  .= "Disallow: $path/*/disclaimer/*\n";
    $output  .= "Disallow: $path/*?attachment_id=\n";
    $output  .= "Disallow: $path/cgi-bin/\n";
    $output  .= "Disallow: $path/feed/\n";
    $output  .= "Disallow: $path/*/feed/\n";
    $output  .= "Disallow: ?elementor-preview=*\n";
    $output  .= "Disallow: $path/*/comments/\n";
    $output  .= "Disallow: $path/*/trackback/\n";
    $output  .= "Disallow: $path/comments/feed/\n";
    $output  .= "Disallow: $path/wp-login.php?*\n";
    $output  .= "Disallow: $path/demo/\n\n\n";
    $output  .= "#robots.txt for {$site_url['scheme']}://{$site_url[ 'host' ]}\n";
    
    $sitemap = get_site_url() . '/' . sanitize_file_name('/sitemap.xml');
    if( !function_exists('is_plugin_active') ) {
        
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) || is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php' )  || is_plugin_active( 'seo-by-rank-math/rank-math.php' ) ) {
        $output  .= "Sitemap: {$site_url['scheme']}://{$site_url[ 'host' ]}/sitemap_index.xml // Sitemap - OPS \n";
        } else if (($sitemap)){
           $output  .= "Sitemap: {$site_url['scheme']}://{$site_url[ 'host' ]}/sitemap.xml // Wordpress Sitemap \n";
        }
    $file_open = fopen($file,"w+");
    fwrite($file_open, $output);
    fclose($file_open);
}

$wpfile = ABSPATH . 'wp-admin/'. sanitize_file_name('robots.txt');
if(file_exists($wpfile)) {
    wp_delete_file( $wpfile );
}
define ( 'OPSRBT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require_once OPSRBT_PLUGIN_PATH . 'settings.php';
//require_once OPSRBT_PLUGIN_PATH . 'uninstall.php';

if ( ! function_exists( 'opsrbt_styles' ) ) {
    function opsrbt_styles ()
    {
        wp_enqueue_style( 'opsrbt_bs_css', plugins_url('assets/css/bootstrap.min.css', __FILE__) );
        wp_enqueue_style( 'opsrbt_custom_css', plugins_url('assets/css/custom.css', __FILE__) );
        wp_enqueue_script( 'opsrbt_bmj_js', plugins_url( 'assets/js/bootstrap.min.js', __FILE__ ));
        wp_enqueue_script( 'opsrbt_bndl_js', plugins_url( 'assets/js/bootstrap.bundle.min.js', __FILE__ ));
    } 
} 
add_action( 'admin_enqueue_scripts', 'opsrbt_styles' ); 

if ( ! function_exists( 'opsrbt_mainstyle' ) ) {
    function opsrbt_mainstyle ()
    {
       if ( ! is_admin() ) {
       wp_enqueue_style( 'opsrbt_frntview_css', plugins_url('assets/css/frontview.css', __FILE__) );
    wp_enqueue_script( 'opsrbt_custom_js', plugins_url( 'assets/js/custom.js', __FILE__ ));
        }
    } 
} 
add_action( 'wp_enqueue_scripts', 'opsrbt_mainstyle' );

// addding a plugin action links to plugin list block.
add_filter( 'plugin_action_links', 'opsrbt_action_links',10,5);
  
if ( ! function_exists( 'opsrbt_action_links' ) ) {
    function opsrbt_action_links( $actions, $plugin_file )
    {
        static $plugin;
        
        if ( ! isset($plugin) ) {
           $plugin = plugin_basename(__FILE__);
          }
        if ( $plugin == $plugin_file ) {
            
             $settings = array( 'settings' => '<a href="options-general.php?page=on_page_seo">Settings</a>' );
              $site_link = array( 'support' => '<a style="font-weight: bold;" href="https://wordpress.org/support/plugin/ops-robots-txt/" target="_blank">Support</a>' );
              $pro = array( 'Get Premium' => '<a href="https://api.whatsapp.com/send?phone=919711425615&text=Hello,%20Rishikesh%20Singh%20I%20Want%20to%20buy%20pro%20version%20of%20OPS%20Plugin." style="color: #389e38;font-weight: bold;" target="_blank">Get Pro</a>' );
              $actions = array_merge($settings, $actions);
              $actions = array_merge($site_link, $actions);
              $actions = array_merge($pro, $actions);
            }
        return $actions;
    }
}
?>