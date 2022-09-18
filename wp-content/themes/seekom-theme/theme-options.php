<?php
if (!function_exists('redux_init')) :
	function redux_init() {
	
		/* ReduxFramework Sample Config File
		 For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
	
		 Most of your editing will be done in this section.

		 Here you can override default values, uncomment args and change their values.
		 No $args are required, but they can be overridden if needed.
		
	*/
	$args = array();


	// For use with a tab example below
	$tabs = array();

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','cmswebsite2go-framework' ), $ct->display('Name') );

	?>
	
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<?php if ( $screenshot ) : ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
				<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
			</a>
			<?php endif; ?>
			<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		<?php endif; ?>

		<h4>
			<?php echo $ct->display('Name'); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( __('By %s','cmswebsite2go-framework'), $ct->display('Author') ); ?></li>
				<li><?php printf( __('Version %s','cmswebsite2go-framework'), $ct->display('Version') ); ?></li>
				<li><?php echo '<strong>'.__('Tags', 'cmswebsite2go-framework').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
			</ul>
			<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
					__( 'http://codex.wordpress.org/Child_Themes','cmswebsite2go-framework' ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

	//$sampleHTML = '';
	// if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	// 	/** @global WP_Filesystem_Direct $wp_filesystem  */
	// 	global $wp_filesystem;
	// 	if (empty($wp_filesystem)) {
	// 		require_once(ABSPATH .'/wp-admin/includes/file.php');
	// 		WP_Filesystem();
	// 	}  		
	// 	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
	// }

	// BEGIN Sample Config

	// Setting dev mode to true allows you to view the class settings/info in the panel.
	// Default: true
	$args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['dev_mode_icon_class'] = '';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$args['opt_name'] = 'theme_options';

	// Setting system info to true allows you to view info useful for debugging.
	// Default: false
	//$args['system_info'] = true;


	// Set the icon for the system info tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['system_info_icon'] = 'info-sign';

	// Set the class for the system info tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['system_info_icon_class'] = 'icon-large';

	$theme = wp_get_theme();

	$args['display_name'] = '<span><small>Theme:</small></span> ' . $theme->get('Name'); //customised
	//$args['database'] = "theme_mods_expanded";
	$args['display_version'] = $theme->get('Version');

	// If you want to use Google Webfonts, you MUST define the api key.
	//$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';
	$args['google_api_key'] = 'AIzaSyCmsy0hN_hDGVM7Ns6sgzTLf0TnOZjGpQU'; //project - seekom fonts

	// Define the starting tab for the option panel.
	// Default: '0';
	//$args['last_tab'] = '0';

	// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
	// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
	// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
	// Default: 'standard'
	//$args['admin_stylesheet'] = 'standard';

	// Setup custom links in the footer for share icons
	$args['share_icons']['facebook'] = array(
	    'link' => 'http://facebook.com/seekomibex',
	    'title' => 'Follow Seekom on facebook', 
	    //'img' => ReduxFramework::$_url . 'assets/img/social/Facebook.png'
		'img' => get_template_directory_uri() . '/assets/img/icon/facebook.svg'
	);
	// $args['share_icons']['twitter'] = array(
	//     'link' => 'http://twitter.com/seekom',
	//     'title' => 'Follow Seekom on Twitter', 
	//     //'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
	// 	'img' => get_template_directory_uri() . '/images/icons/24/twitter.png'
	// );
	$args['share_icons']['rss'] = array(
	    'link' => 'http://help.cmswebsite2go.com/category/updates/',
	    'title' => 'Follow CMSwebsite2Go newsfeed', 
	    //'img' => ReduxFramework::$_url . 'assets/img/social/Facebook.png'
		'img' => get_template_directory_uri() . '/assets/img/icon/cloud-arrow-up-fill.svg'
	);
	$args['share_icons']['contact'] = array(
	    'link' => 'http://www.seekom.com/contact/',
	    'title' => 'Contact Seekom', 
	    //'img' => ReduxFramework::$_url . 'assets/img/social/Facebook.png'
		'img' => get_template_directory_uri() . '/assets/img/icon/person-lines-fill.svg'
	);

	// Enable the import/export feature.
	// Default: true
	//$args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['import_icon_class'] = '';

	/**
	 * Set default icon class for all sections and tabs
	 * @since 3.0.9
	 */
	//$args['default_icon_class'] = '';


	// Set a custom menu icon.
	$args['menu_icon'] = get_template_directory_uri() . '/assets/img/icon/chat-square-heart.svg';

	// Set a custom title for the options page.
	// Default: Options
	$args['menu_title'] = __('THEME SETUP*', 'cmswebsite2go-framework'); //customised

	// Set a custom page title for the options page.
	// Default: Options
	$args['page_title'] = __('Theme Options', 'cmswebsite2go-framework'); //customised

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$args['page_slug'] = 'theme_options'; //customised

	$args['default_show'] = true;
	$args['default_mark'] = '*';

	// Set a custom page capability.
	// Default: manage_options
	//$args['page_cap'] = 'manage_options';

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	//$args['page_type'] = 'submenu';

	// Set the parent menu.
	// Default: themes.php
	// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$args['page_parent'] = 'options-general.php';

	// Set a custom page location. This allows you to place your menu where you want in the menu order.
	// Must be unique or it will override other items!
	// Default: null
	$args['page_position'] = 4;

	// Set a custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-tint';

	// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

	// Disable the panel sections showing as submenu items.
	// Default: true
	//$args['allow_sub_menu'] = false;
	    
	// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-1',
	    'title' => __('Theme Information 1', 'cmswebsite2go-framework'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cmswebsite2go-framework')
	);
	$args['help_tabs'][] = array(
	    'id' => 'redux-opts-2',
	    'title' => __('Theme Information 2', 'cmswebsite2go-framework'),
	    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cmswebsite2go-framework')
	);

	// Set the help sidebar for the options page.                                        
	$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'cmswebsite2go-framework');


	// Add HTML before the form.
	if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
		if (!empty($args['global_variable'])) {
			$v = $args['global_variable'];
		} else {
			$v = str_replace("-", "_", $args['opt_name']);
		}
		$args['intro_text'] = sprintf( __('For website help <a title="website help (will open in a new window)" style="cursor:pointer; "target="_blank" href ="http://help.cmswebsite2go.com"> click here.<a/>', 'cmswebsite2go-framework' ), $v );
	} else {
		$args['intro_text'] = __('For website help <a title="website help (will open in a new window)" style="cursor:pointer; "target="_blank" href ="http://help.cmswebsite2go.com"> click here.<a/>', 'cmswebsite2go-framework');
	}

	// Add content after the form.
	$args['footer_text'] = __('', 'cmswebsite2go-framework');

	// Set footer/credit line.
	$args['footer_credit'] = __('<i>A * following a field title indicates default theme settings are applied to the field.</i>', 'cmswebsite2go-framework');


	$sections = array();              

	//Background Patterns Reader
	$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
	$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) :
		
	  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
	  	$sample_patterns = array();

	    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

	      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
	      	$name = explode(".", $sample_patterns_file);
	      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
	      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
	      }
	    }
	  endif;
	endif;
	
	// function addPanelCSS() {
    // wp_register_style(
    //     'redux-custom-css',
    //     get_template_directory_uri() . '/theme-options.min.css',
    //     array( 'redux-css' ), // Be sure to include redux-css so it's appended after the core css is applied
    //     time(),
    //     'all'
    // );  
    // wp_enqueue_style('redux-custom-css');
//}
// This example assumes your opt_name is set to theme_options, replace with your opt_name value
//add_action( 'redux/page/theme_options/enqueue', 'addPanelCSS' );

// GENERAL SETTINGS
	$sections[] = array(
		'title' => __('General / Colour', 'cmswebsite2go-framework'),
		//'desc' => __('enter a descriotion here if desired', 'cmswebsite2go-framework'),
		'icon' => 'el-icon-tint',
	    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(	
			array(
				'id'=>'link-colour-content',
				'type' => 'link_color',
				'title' => __('Link Colour ', 'cmswebsite2go-framework'),
				'subtitle' => __('<i>Adjust the main content links colour if you wish to change standard settings for theme colour selected.</i>', 'cmswebsite2go-framework'),
				//'desc' => __('content here goes below field input', 'cmswebsite2go-framework'),
				//'regular' => false, // Disable Regular Color
				//'hover' => false, // Disable Hover Color
				'active' => false, // Disable Active Color
				//'visited' => true, // Enable Visited Color
        'output'   => array('#main-content a','.landing a'),
				'default' => array(
					'regular' => '#2D61A6',
					'hover' => '#2D61A6',
				)
			),
			),
		);
		
		
// TYPOGRAPHY
	$sections[] = array(
		'icon'    => 'el-icon-fontsize',
		'title'   => __('Typography', 'cmswebsite2go-framework'),
		'heading' => __('Typography / Font Styling'),
		//'desc'    => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'cmswebsite2go-framework'),
		'fields'  => array(
			// body font
			array(
				'id'=>'body-font',
				'type' => 'typography',
				'title' => __('Body Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the body font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('#main-content', '.breadcrumbs','#slideshow','table','.landing'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#666666',
					'font-size'=>'14px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),	
				
			

		
		
			// H1 font
			array(
				'id'=>'h1-font',
				'type' => 'typography',
				'title' => __('Heading H1 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H1 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h1'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#2D61A6',
					'font-size'=>'42px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),	
				
			// H2 font
			array(
				'id'=>'h2-font',
				'type' => 'typography',
				'title' => __('Heading H2 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H2 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h2,.section-header h2'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#2D61A6',
					'font-size'=>'32px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),

			// H3 font
			array(
				'id'=>'h3-font',
				'type' => 'typography',
				'title' => __('Heading H3 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H3 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h3'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#2D61A6',
					'font-size'=>'28px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),

			// H4 font
			array(
				'id'=>'h4-font',
				'type' => 'typography',
				'title' => __('Heading H4 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H4 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h4'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#888888',
					'font-size'=>'24px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),	
			
			// H5 font
			array(
				'id'=>'h5-font',
				'type' => 'typography',
				'title' => __('Heading H5 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H5 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h5'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#888888',
					'font-size'=>'18px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),

			// H6 font
			array(
				'id'=>'h6-font',
				'type' => 'typography',
				'title' => __('Heading H6 Font', 'cmswebsite2go-framework'),
				'subtitle' => __('Specify the H6 font properties if you wish to amend standard settings.', 'cmswebsite2go-framework'),
				'google'=>true,
				'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
				'subsets'=>false, // Only appears if google is true and subsets not set to false
				'line-height'=>false,
				'units'=>'px', // Defaults to px
				'output' => array('h6'), // An array of CSS selectors to apply this font style to dynamically
				//'font-size'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'default' => array(
					'color'=>'#888888',
					'font-size'=>'16px',
					'font-family'=>'Arial, Helvetica, sans-serif',
					'font-style'=>'400',
					),
				),	


			)
		);
	
// end TYPOGRAPHY	


// iBEX CONFIG 
	// $sections[] = array(
	// 	'icon'    => 'el-icon-th-large',
	// 	'title'   => __('iBex Config', 'cmswebsite2go-framework'),
	// 	'heading' => __('iBex Interface Configuration'),
	// 	'desc'    => __('', 'cmswebsite2go-framework'),
	// 	'fields'  => array(
		
	//    	   array(
	// 			'id'=>'OPID',
	// 			'type' => 'text',
	// 			'title' => __('iBex Account Code', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Enter your iBex Account Code.<p><i>When logged into iBex your account code 
    //     shows in the upper right of your screen (<a target="_blank" href="http://cmswebsite2go.com/wp-content/uploads/ibex-op-account-details.png">
    //     click here for an example.</a>)</i></p>', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'default' => 'travaccom'
	// 			),
        
    //      array(
	// 			'id'=>'PID',
	// 			'type' => 'text',
	// 			'title' => __('iBex Property Code', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Enter your iBex Property Code.<p><i>When logged into iBex your property code 
    //     shows towards top of the "Manage Property" screen.</i></p>', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'default' => '2404'
	// 			),
        
    //      array(
	// 			'id'=>'booking-url',
	// 			'type' => 'text',
	// 			'title' => __('Booking Page Address', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Enter booking page web address.<p>IMPORTANT: External address must start with - http:// or https://<br>Internal address must be in slug format (eg. /book-online).', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'default' => get_bloginfo('url') . '/book-online'
	// 			),
				
	// 			array(
	// 			'id'=>'booking-target',
	// 			'type' => 'button_set',
	// 			'title' => __('Booking screen launch', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Set target for booking screen/page launch', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'options' => array('_parent' => 'Same window','_blank' => 'New window'),//Must provide key => value pairs for radio options
	// 			'default' => '_parent'
	// 			),
				
		       
    //      array(
	// 			'id'=>'template-id',
	// 			'type' => 'text',
	// 			'title' => __('Template ID', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Enter required Booking Template ID<p><i>Default Template ID may be altered on individual booking pages.</i></p>', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'default' => '618'
	// 			),			
        
        			
	// 	 array(
	// 			'id'=>'button-bg',
	// 			'type' => 'color',
    //     'transparent' => false, // Disable dislay of transparent selector
	// 			'title' => __('Book Button Background', 'cmswebsite2go-framework'),  
	// 			//'subtitle' => __('Select background colour for book buttons', 'cmswebsite2go-framework'),
	// 			'output'    => array('background' => 'span.button-book-room'),
	// 			//'desc'=> __('', 'cmswebsite2go-framework'),
    //     'default' => '#1d898b',
	// 			'validate' => 'color',
	// 			),
				
	// 		array(
	// 			'id'=>'button-bg-hover',
	// 			'type' => 'color',
    //     'transparent' => false, // Disable dislay of transparent selector
	// 			'title' => __('Book Button Hover Background', 'cmswebsite2go-framework'),  
	// 			//'subtitle' => __('Select background colour for book buttons', 'cmswebsite2go-framework'),
	// 			'output'    => array('background' => 'span.button-book-room:hover'),
	// 			//'desc'=> __('', 'cmswebsite2go-framework'),
    //     'default' => '#2740a5',
	// 			'validate' => 'color',
	// 			),	
				
	// 		array(
	// 			'id'=>'book-button-colour',
	// 			'type' => 'link_color',
	// 			'title' => __('Book Button Text Colour', 'cmswebsite2go-framework'),
	// 			//'subtitle' => __('<i>Adjust the main content links colour if you wish to change standard settings for theme colour selected.</i>', 'cmswebsite2go-framework'),
	// 			//'desc' => __('content here goes below field input', 'cmswebsite2go-framework'),
	// 			//'regular' => false, // Disable Regular Color
	// 			//'hover' => false, // Disable Hover Color
	// 			'active' => false, // Disable Active Color
	// 			//'visited' => true, // Enable Visited Color
    //     'output'   => array('a span.button-book-room','span.button-book-room a'),
	// 			'default' => array(
	// 				'regular' => '#FFFFFF',
	// 				'hover' => '#FFFFFF',
	// 			)
	// 		),	
				
		 
			
        
    //     array(
	// 			'id'=>'agent-code',
	// 			'type' => 'text',
	// 			'title' => __('Agent Code', 'cmswebsite2go-framework'), 
	// 			'subtitle' => __('Enter agent code from Seekom if this is a secondary or fully managed website and you wish to be able to identify which bookings have come from this site.<br>				<i>The agent must first be set up within iBex. Agent ID can be altered on individual booking pages.</i>', 'cmswebsite2go-framework'),
	// 			'desc' => __('', 'cmswebsite2go-framework'),
	// 			'default' => ''
	// 			),

	// 		)
	// 	);
	
// end iBEX CONFIG



// SEO
// 	$sections[] = array(
// 		'icon'    => 'el-icon-search',
// 		'title'   => __('SEO', 'cmswebsite2go-framework'),
// 		'heading' => __('Search Engine Optimisation'),
// 		'desc'    => __('<p class="description">SEO tips are available within our <a title="click here for SEO help (will open in a new window)" <a style="cursor: pointer;"
// 		target="_blank" href"http://help.cmswebsite2go.com/category/optimization-seo/"> help documentation plus links to Googles SEO Starter Guide and AdWords Guide.<a/></p><p><big><b><a class="redux-button" target="_blank" title="view sitemap" href="' . get_bloginfo('url') . '/sitemap.xml">View Sitemap</a></big></p>', 'cmswebsite2go-framework'),
// 		'fields'  => array(
		
// 		array(
// 	            'id'=>'META-title',
// 	            'type' => 'text',
// 	            'title' => __('Site Title', 'cmswebsite2go-framework'), 
// 	            'subtitle' => __('Enter your website META tag title.', 'cmswebsite2go-framework'),
// 				'desc' => __('', 'cmswebsite2go-framework'),
// 				'validate' => 'no_html',
// 				'default' => '' . get_bloginfo( 'name' ) . ''
// 	                        ),

// 		array(
// 				'id'=>'META-description',
// 				'type' => 'textarea',
// 				'title' => __('Site Description', 'cmswebsite2go-framework'), 
// 				'subtitle' => __('Enter a description to appear in search results below your site title.<br><br><i>
// 				Search engines may truncate your entry to a maximum of 160 characters.</i>', 'cmswebsite2go-framework'),
// 				'desc' => __('', 'cmswebsite2go-framework'),
// 				'validate' => 'no_html',
// 				'default' => ''
// 				),	
				
// 		array(
// 				'id'=>'META-keywords',
// 				'type' => 'textarea',
// 				'title' => __('Site Key Words', 'cmswebsite2go-framework'), 
// 				'subtitle' => __('Enter key words for search engines. Search engines will usually restrict this entry to 255 characters.<br>
// 				<br><b>Tip: </b>Omit commas as they waste characters. Do not repeat the same word more than a few times. Entry of common mis-spellings is also recommended.
// ', 'cmswebsite2go-framework'),
// 				'desc' => __('', 'cmswebsite2go-framework'),
// 				'validate' => 'no_html',
// 				'default' => ''
// 				),			
			

// 			)
// 		);
	

			
	
			

	if (function_exists('wp_get_theme')){
	$theme_data = wp_get_theme();
	$theme_uri = $theme_data->get('ThemeURI');
	$description = $theme_data->get('Description');
	$author = $theme_data->get('Author');
	$version = $theme_data->get('Version');
	$tags = $theme_data->get('Tags');
	}else{
	$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
	$theme_uri = $theme_data['URI'];
	$description = $theme_data['Description'];
	$author = $theme_data['Author'];
	$version = $theme_data['Version'];
	$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="redux-framework-section-desc">';
	$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'cmswebsite2go-framework').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'cmswebsite2go-framework').$author.'</p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'cmswebsite2go-framework').$version.'</p>';
	$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
	if ( !empty( $tags ) ) {
		$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'cmswebsite2go-framework').implode(', ', $tags).'</p>';	
	}
	$theme_info .= '</div>';

	if(file_exists(dirname(__FILE__).'/README.md')){
	$sections['theme_docs'] = array(
				'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
				'title' => __('Documentation', 'cmswebsite2go-framework'),
				'fields' => array(
					array(
						'id'=>'17',
						'type' => 'raw',
						'content' => file_get_contents(dirname(__FILE__).'/README.md')
						),				
				),
				
				);
	}//if





	if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
	    $tabs['docs'] = array(
			'icon' => 'el-icon-book',
			    'title' => __('Documentation', 'cmswebsite2go-framework'),
	        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
	    );
	}

	global $ReduxFramework;
	$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

	// END Sample Config
	}
	add_action('init', 'redux_init');
endif;

/*
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 

	Filter hook for filtering the args array given by a theme, good for child themes to override or add to the args array.

*/
if ( !function_exists( 'redux_change_framework_args' ) ):
	function redux_change_framework_args($args){
	    //$args['dev_mode'] = true;
	    
	    return $args;
	}
	add_filter('redux/options/theme_options/args', 'redux_change_framework_args');
	// replace theme_options with your opt_name
endif;
/*

	Filter hook for filtering the default value of any given field. Very useful in development mode.

*/
if ( !function_exists( 'redux_change_option_defaults' ) ):
	function redux_change_option_defaults($defaults){
	    $defaults['str_replace'] = "Testing filter hook!";
	    
	    return $defaults;
	}
	add_filter('redux/options/theme_options/defaults', 'redux_change_option_defaults');
	// replace theme_options with your opt_name
endif;

/*

	Custom function for the callback referenced above

 */
if ( !function_exists( 'redux_my_custom_field' ) ):
	function redux_my_custom_field($field, $value) {
	    print_r($field);
	    print_r($value);
	}
endif;

/*
 
	Custom function for the callback validation referenced above

*/
if ( !function_exists( 'redux_validate_callback_function' ) ):
	function redux_validate_callback_function($field, $value, $existing_value) {
	    $error = false;
	    $value =  'just testing';
	    /*
	    do your validation
	    
	    if(something) {
	        $value = $value;
	    } elseif(something else) {
	        $error = true;
	        $value = $existing_value;
	        $field['msg'] = 'your custom error message';
	    }
	    */
	    
	    $return['value'] = $value;
	    if($error == true) {
	        $return['error'] = $field;
	    }
	    return $return;
	}
endif;
/*

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

*/
if ( !function_exists( 'redux_test_compiler' ) ):
	function redux_test_compiler($options, $css) {
		echo "<h1>The compiler hook has run!";
		//print_r($options); //Option values
		print_r($css); //So you can compile the CSS within your own file to cache
	    $filename = dirname(__FILE__) . '/avada' . '.css';

			    global $wp_filesystem;
			    if( empty( $wp_filesystem ) ) {
			        require_once( ABSPATH .'/wp-admin/includes/file.php' );
			        WP_Filesystem();
			    }

			    if( $wp_filesystem ) {
			        $wp_filesystem->put_contents(
			            $filename,
			            $css,
			            FS_CHMOD_FILE // predefined mode settings for WP files
			        );
			    }

	}
	//add_filter('redux/options/theme_options/compiler', 'redux_test_compiler', 10, 2);
	// replace theme_options with your opt_name
endif;


/*

	Remove all things related to the Redux Demo mode.

*/
// if ( !function_exists( 'redux_remove_demo_options' ) ):
// 	function redux_remove_demo_options() {
		
// 		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
// 		if ( class_exists('ReduxFrameworkPlugin') ) {
// 			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
// 		}

// 		// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
// 		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	

// 	}
// 	//add_action( 'redux/plugin/hooks', 'redux_remove_demo_options' );	
// endif;