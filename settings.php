<?php
// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
   die( 'Nice try, But not here!!! Bye Bye' );
}
// Adding settings menu to admin panel.
add_action( 'admin_menu', 'opsrbt_menu' );

// Settings menu initialization.
function opsrbt_menu()
{ 
 // ob_start();
  add_menu_page ( 
              'On Page SEO Settings',
              'On Page SEO',
              'manage_options',
              'on_page_seo',
              'on_page_seo_settings_page',
              'dashicons-nametag',
              99
          );
// Registering settings option keys.
 //  add_action( 'admin_init', 'register_opsrbt_settings_setup' );

}
if ( ! is_admin() ) {
    remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large' );
   if ( ! function_exists( 'opsrbt_pingback_header' ) ) {
    // whatsapp product image share 
    function opsrbt_pingback_header() {
        ?>
    <!--<meta http-equiv="cache-control" content="max-age=0" />
      <meta http-equiv="cache-control" content="no-cache" />
      <meta http-equiv="expires" content="0" />
      <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
      <meta http-equiv="pragma" content="no-cache" /> -->
      <meta property="og:image" content="url_image">
      <meta property="og:image:width" content="400" />
      <meta property="og:image:height" content="400" />
        <?php
    }
  }
  add_action('wp_head', 'opsrbt_pingback_header');

  if ( ! function_exists( 'opsrbt_pingback_footer' ) ) {
    function opsrbt_pingback_footer() {
      global $wp;
      $getCurrentPageUrl = home_url( $wp->request );
      $whatsappno = get_user_meta( '1', 'whatsapp_no', true );
      $whatsapmsg = get_user_meta( '1', 'whatsapp_msg', true );
      $shopingWebsite = get_user_meta( '1', 'shopingwebsite', true );
      ?>
      <?php if($shopingWebsite == '1' && $whatsappno != ''){
      ?>
       <!-- Whatsapp Button By OPS Plugin Start -->
        <?php if($whatsappno != ''){ ?>
      <div class="whatsapp-icon">
        <a title="Need Help? Chat with us on whatsapp!" href="https://api.whatsapp.com/send?phone=<?php echo esc_html($whatsappno); ?>&amp;text=<?php echo esc_url( $getCurrentPageUrl ); ?> &nbsp; <?php echo esc_textarea($whatsapmsg); ?>"  target="_blank" id="wa-id" data-aos="fade-up" data-aos-delay="500">
           <img class="opsWhatsappIcon" alt="whatsapp button" src="<?php echo plugins_url ("assets/images/whatsapp.png",__FILE__); ?>"/>
        </a> 
      </div> 
      <?php }  ?>
    <!-- Whatsapp Button By OPS Plugin End -->
      
      <?php
      } else {?>
      <!-- Whatsapp Button By OPS Plugin Start -->
        <?php if($whatsappno != ''){ ?>
      <div class="whatsapp-icon">
        <a title="Need Help? Chat with us on whatsapp" href="https://api.whatsapp.com/send?phone=<?php echo esc_html ($whatsappno); ?>&amp;text=<?php echo esc_textarea( $whatsapmsg ); ?>"  target="_blank" id="wa-id" data-aos="fade-up" data-aos-delay="500">
           <img class="opsWhatsappIcon" alt="whatsapp button" src="<?php echo plugins_url ("assets/images/whatsapp.png",__FILE__); ?>"/>
        </a> 
      </div> 
      <?php } } ?>
    <!-- Whatsapp Button By OPS Plugin End -->
      <?php
    }
  }
  add_action( 'wp_footer', 'opsrbt_pingback_footer' );
  
  if ( ! function_exists( 'opsrbt_hook_noindex' ) ) {
    function opsrbt_hook_noindex() {
    $noindex_value = get_user_meta( '1', 'noindex_value', true );
    if ($noindex_value == 'True'){
    ?>
<meta name='robots' content='noindex, nofollow' />
    <?php
        } else {
            // Test top SEO Plugin
            include_once(ABSPATH.'wp-admin/includes/plugin.php');
            if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) || is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php' )  || is_plugin_active( 'seo-by-rank-math/rank-math.php' ) || is_plugin_active( 'all-in-one-seo-pack/all_in_one_seo_pack.php' ) || is_plugin_active( 'wp-seopress/seopress.php' )) {
        } else {
    ?>
<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'>
    <?php
            }
        }
    }
  }
  add_action('wp_head', 'opsrbt_hook_noindex');
}

if ( ! function_exists( 'on_page_seo_settings_page' ) ) {

  function  on_page_seo_settings_page() {
      // ob_start();
    ?>
    <div class="mainblock">
    <div class="wrap pt-4 clearfix">
      <div class="row">
        <div class="col-lg-2 col-md-2">
        <img src="<?php echo plugins_url ("assets/images/logo-seo.png",__FILE__); ?>" style="display:inline-block;margin-right:8px;border:2px solid #fbfbfb;border-radius:5px;box-shadow:0px 0px 5px rgba(0,0,0,.5);padding:2px;clear:both:" />
       </div>
       <div class="col-lg-10 col-md-10">
       <h1>Boots Your Ranking With OPS Plugin.</h1>
       <hr>
        <div class="alert alert-success  mt-2" role="alert">
       👍 Did you know that when you optimize your Robots.txt, you maximize your site’s crawlability (& your ranking on search engines). Hassle Free for Indexing Website.

      Don't do things by halves!. 🥇 If you want to Hire SEO Executive for Manual Seo Services <strong><a target="_blank" href="https://wa.me/919711425615">📱 Contact Us</a></strong>.
      </div>
      </div>
    </div>
    <div class="container-fluid mt-3 jumbotron">
      <div class="row">
       <div class="col-lg-9 col-md-12 col-12 borderright">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link border border-info active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">✔️ Settings</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link border border-info" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">📞 Support</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link border border-info" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">💛 Contact</button>
    </li>
  </ul>
  <div class="tab-content mt-4" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <hr>
      <div class="row">
          <div class="rt-column col-2">
              <span class="rt-label">Custom rules (for experts)</span>
          </div>
          <div class="rt-column col-10">
            <?php 
            $file =  ABSPATH . sanitize_file_name('robots.txt');
            $checked = '';
            if (isset($_POST['Submit']) && isset($_POST['noindex']) &&  sanitize_text_field($_POST['noindex']) == 'noindex' && $_POST['Submit'] != '' && !isset($_POST['Reset']) ){
                    $output = "User-agent: * Disallow: /\n";
                    $file_open = fopen($file,"w+");
                    fwrite($file_open, $output);
                    fclose($file_open);
                    $user_id = '1';
                    $noindex = 'True';
                    update_user_meta( $user_id, 'noindex_value', $noindex );
                    
                    _e( '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              <strong>Thank you! 😋 </strong>Blocking all web crawlers from all content!.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>' );
               $checked = 'checked'; 
              } else if (isset($_POST['Reset']) && $_POST['Reset'] != '' && $_POST['Reset'] = 'Restore Robots.txt file by OPS'){
                //wp_delete_file( $file );
                $user_id = '1';
                $noindex = 'False';
                update_user_meta( $user_id, 'noindex_value', $noindex );

                $output = "User-agent: *\n";
                $output  .= "Allow: /\n\n";
                $site_url = parse_url( site_url() );
                $path     = ( ! empty( $site_url['path'] ) ) ? $site_url['path'] : '';
                $output  .= "Allow: $path/wp-admin/admin-ajax.php\n";
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
               if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) || is_plugin_active( 'wordpress-seo-premium/wp-seo-premium.php' )  || is_plugin_active( 'seo-by-rank-math/rank-math.php' ) ) {
                  $output  .= "Sitemap: {$site_url['scheme']}://{$site_url[ 'host' ]}/sitemap_index.xml // Sitemap - OPS \n";
                } else if (($sitemap)){
                      $output  .= "Sitemap: {$site_url['scheme']}://{$site_url[ 'host' ]}/sitemap.xml // Wordpress Sitemap \n";
                }
                $file_open = fopen($file,"w+");
                fwrite($file_open, $output);
                fclose($file_open);
                _e( '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg> <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"></use></svg> <strong>Rollback Done! 😋 </strong> Now Robots.txt is awasome 😋!. 
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>' );
              }
            else if (isset($_POST['Submit']) &&  isset($_POST['noindex']) && $_POST['Submit'] != '' && sanitize_text_field($_POST['noindex']) != 'noindex'  && !isset($_POST['Reset']) ){
                   $rbt = sanitize_textarea_field($_POST['user_agents']);
                  echo  $file_open = fopen( ABSPATH . sanitize_file_name("robots.txt"), 'w+' );
                    fwrite($file_open, $rbt);
                    fclose($file_open);
                    _e( '<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
              <strong>Thank you! 😋 </strong> Robots.txt file updated sucessfully!. 
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>' );
              }
              _e( '<form  action="'. esc_url( admin_url('admin.php?page=on_page_seo') ) .'" method="POST"> 
              <label for="file" class="form-label">Live: <a href="'.get_site_url().'/robots.txt" target="_blank">'.get_site_url().'</a> Website Robots.txt Preview:</label>
              <textarea name="user_agents" rows="6" class="rt-area form-control" id="user_agents">');
               $datalines = file ($file);
              foreach ($datalines as $rt) {
                  _e( esc_html($rt));
              }     
              _e( '</textarea>
              <hr><h4>Block Search Indexing with noindex</h4>
            <div class="sorm-switch">
              <label class="switch">
              <input type="checkbox" name="noindex" value="noindex" '.$checked.'>
              <span class="slider round"></span>
              </label>
              <label>Note: Click toggle active for noindex (& Hit Submit Button)</label>
              </div><input type="submit" class="btn btn-info mt-3" name="Submit" value="Submit"> <input type="submit" class="btn btn-primary mt-3" name="Reset" value="Restore Robots.txt file by OPS"></form> <h4><br /></h4>' );
              _e(  '<h5 class="mt-2 mb-2"><a href="'.get_site_url().'/robots.txt" target="_blank"> View Live Robots.txt </a></h5>' );
             ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg> <strong>Note!</strong> Add more custom rules if you need them, otherwise, leave it with default rules.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>   
        </div>  
        </div>
    </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><!--DC content-->
            <div id="dpl-gtm-scroll">
              <hr>
               <div id="gtmDC-scroll-unlogged">
                  <div id="s1-download-mdb-free" class="alert alert-success" role="alert" data-color="success">
                  <h6>I have team of more then 20+ SEO Expert to work On Page SEO and Of Page SEO. Our Team To implement all factors as suggest in FAQ. We are also Expert in Website Development and Designing.
                  Contact us today to learn more about our on-page SEO services!</h6>
                  Need <strong>Manual</strong> On Page SEO! <strong> OR </strong> Are you need SEO Services? <br /><a data-bs-toggle="tooltip" data-bs-placement="top" title="Online" href="https://api.whatsapp.com/send?phone=+919711425615&amp;text=I have a few questions. Can you help regarding SEO support?" class="btn btn-success btn-sm mt-2 mb-0 btn-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg> Contact Us</a> </div>
               </div>
            </div> 
            <!--/DC content-->
          </div>
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <hr>
        🥇 <a href="mailto:imrishi6@gmail.com" Title="Live Suppoer" target="_blank">Read More</a></div>
      </div>
      <hr>
      <h3 class="ops-heading">ON Page SEO Important Tips</h3>
        <div class="accordion mt-4" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Why is on-page SEO important?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>On Page SEO</strong> helps your site be optimized for both human eyes and search engine bots and earn organic traffic.OPS to build a site’s reputation and rankings on SERPs. <b>On-Page SEO Elements: </b><code>High-Quality Page (Unique) Content </code>, <code>Unique and Relevant Meta Descriptions for Every Page</code>, <code>Headers H1 to H6</code> ,<code>Wrap Titles and Subtitles in H1 and H2 Tags</code> ,<code>Optimize Title and Description Tags</code>, <code>Image Alt-text</code>, <code>Structured Markup</code>, <code>Page URLs</code>
            , <code>Internal Linking</code>, <code>Mobile Responsiveness</code>, <code>Site Speed</code>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            What is On-page SEO techniques?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>On-page SEO techniques</strong> describes the manipulations you make directly to a web page to facilitate higher ranking.Check website is indexed,  Just use this (site:websitename.com) search operator in Google:<code>Include Your Keyword In Your URL</code>, <code>Use Short URLs</code> ,<code>Use Your Keyword Once In The First 150 Words.</code>, <code>Use Your Keyword in H1, H2 or H3 Tags</code>, <code>Optimize Images</code>, <code>Update Your Content Regularly</code>, <code>Don't keyword stuff</code>, <code>Crawl your website By Robots.txt</code>, <code>Use XML Sitemap</code>, <code>Readability and UX</code>, <code>Build a perfect site structure</code>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            What is ON PAGE SEO Ranking Factors?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>On-page SEO</strong> (or on-site SEO) is the practice of optimizing web pages for specific keywords in order to improve search visibility and traffic. SEO is the process of optimizing your website to rank as high as possible in organic search (unpaid) engine results. It involves aligning page-specific elements like title tags, headings, content, and internal links with keywords. <code>Social Signals</code>, <code>Real Business Information</code>, <code>high-quality content</code>, <code>Consistent Business Listings</code>, <code>User Engagement</code>, <code>The Right Target Keywords</code>, <code>Domain Age</code>, <code>Remove Broken Links</code> ,<code>Schema.org Usage</code>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            What is On-page SEO pillars?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>On-page SEO</strong> will assist you with streamlining your site to arrive at more important traffic. Here are ten hints to assist you with streamlining your on-page SEO. <code>1. Pick the correct keywords</code> <code>2. Place your keyword towards the front of your title tag</code> <code>3. Enhance meta descriptions</code> <code>4. Add visual components</code> <code>5. Streamline pictures</code> <code>6. Improve page speed</code> <code>7. Make responsive design</code> <code>8. Make quality content</code> <code>9. Do Internal Links</code> <code>10. Check for crawl mistakes</code> 
            </div>
          </div>
        </div>
      </div>

      <div class="text-center ninjablock">
      <img class="" alt="ninja" src="<?php echo plugins_url ("assets/images/ninja.png",__FILE__); ?>" title="Ninja" />
      <marquee><h4>Thank You For Using On Page SEO (Formerly OPS) Plugin.</h4></marquee>
      </div>
      </div>
      <div class="col-lg-3 col-12 d-none d-lg-block">
        <?php if (isset($_POST['submit']) && sanitize_text_field($_POST['submit']) == 'Update Whatsapp No'){
        $user_id = '1';
        $user_data = get_userdata( $user_id );
        if ( $user_data === false && empty( $user_data )) {
            _e( '<div class="notice notice-warning"><h4><strong>Warning:</strong> Something Wrong! Please contact to OPS Plugin developer.</h4></div>', 'codemaster' );
            //user id does not exist
        } else {
          $whatsappno = sanitize_text_field($_POST['whatsappno']);
          $whatsappmsg = sanitize_textarea_field($_POST['whatsappmsg']);
          $shopingwebsite = sanitize_text_field($_POST['shopingwebsite']);
          
         update_user_meta( $user_id, 'whatsapp_no', $whatsappno );
         update_user_meta( $user_id, 'whatsapp_msg', $whatsappmsg );
         update_user_meta( $user_id, 'shopingwebsite',$shopingwebsite );

          // global $wpdb;
          // $table_name = $wpdb->prefix . "usermeta";

          // $sql_query = "INSERT INTO {$table_name} (user_id, meta_key, meta_value) VALUES ('1', 'whatsappNo', '3464365478')";
          //   $result = $wpdb->query( $sql_query );
          }
        }
        ?>
         <div id="scrollspy" class="sticky-top" style="top: 80px;">
          <form method="POST" class="mb-4">
            <div class="form-group" action="<?php echo esc_url( admin_url('admin.php?page=on_page_seo') ); ?>">
              <img class="opsWhatsappIcon wa-hide" alt="whatsapp-image" src="<?php echo plugins_url ("assets/images/whatsapp.png",__FILE__); ?>" title="whatsapp chat icon">
              <label><strong data-toggle="tooltip" data-placement="top" title="WhatsApp">Enter Your Whatsapp No </strong></label>
              <input type="text" class="form-control"  value="<?php echo get_user_meta( '1', 'whatsapp_no', true ); ?>"  name="whatsappno" placeholder="Your Whatsapp No" size="15" minlength="10" />
              <span>Example: +911234567890</span>
              <label>WhatsApp or WhatsApp business number with country code

            ( E.g. 919711425615 - herein e.g. 91 is country code, 9711425615 is the mobile number )</label>
            </div>
            <div class="form-group">
              <label><strong>Whatsapp Message</strong></label>
              <textarea class="form-control" name="whatsappmsg"  placeholder="Enter Message here!"><?php echo get_user_meta( '1', 'whatsapp_msg', true ); ?></textarea>
              <span>Text that appears in the WhatsApp Chat window.</span><br>
              <i>Example:  I'm interested in this product and I have a few questions. Can you help?</i>
            </div>
              <div class="alert alert-primary">
                <label><strong>Is Your Website is Shoping Website?</strong> <i>Not Required</i></label>
                  <select class="form-select" name="shopingwebsite" aria-label="Default select example" style="width: 100%;">
                    <option selected>Select Your Option</option>
                    <option value="1" <?= get_user_meta( '1', 'shopingwebsite', true ) == '1' ? ' selected="selected"' : '';?> > Yes</option>
                    <option value="0" <?= get_user_meta( '1', 'shopingwebsite', true ) == '0' ? ' selected="selected"' : '';?> >No</option>
                  </select>
              </div>
          <input type="submit" name="submit" value="Update Whatsapp No" class="btn btn-primary">
          </form>
          <div>Tips: <em>Just empty whatsapp no box if you don't want to use whatsap feature on your website.</em></div>
         </div>
       </div>
      </div>
      </div>
    </div>
    </div>
  <?php } 
  //  ob_end_flush();
  } 
?>