<?php
/*
Plugin Name: CMS Admin Menu
Description: Removes non CMS menu items
Version: 1.0
Author: Seekom
Author URI: http://seekom.com

This is a WordPress plugin (http://wordpress.org). WordPress is
free software; you can redistribute it and/or modify it under the
terms of the GNU General Public License as published by the Free
Software Foundation; either version 2 of the License, or (at your
option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
General Public License for more details.

For a copy of the GNU General Public License, write to:

Free Software Foundation, Inc.
59 Temple Place, Suite 330
Boston, MA  02111-1307
USA

You can also view a copy of the HTML version of the GNU General
Public License at http://www.gnu.org/copyleft/gpl.html
*/

function my_remove_menu_pages() {
//remove_menu_page('link-manager.php'); //Links Menu
remove_menu_page('edit-comments.php');  //Posts menu
//remove_menu_page('index.php');  //Dashboard
remove_menu_page('edit.php'); //Posts menu
//remove_menu_page('upload.php');  //Media Menu
//remove_menu_page('themes.php');  //Appearance Menu
//remove_menu_page('plugins.php'); //Plugins Menu
//remove_menu_page('users.php'); // Users Menu
//remove_menu_page('tools.php'); //Tools Menu
//remove_menu_page('options-general.php'); //Settings Menu
remove_menu_page('edit.php?post_type=wp-help'); //Help Documents Menu
}
add_action( 'admin_menu', 'my_remove_menu_pages' );

function remove_submenus() {
global $submenu;
// *** DASHBOARD menu ***
unset($submenu['index.php'][10]); // Removes Updates

//*** POSTS menu ***
unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
unset($submenu['edit.php'][10]); // Add new post
unset($submenu['edit.php'][15]); // Remove categories
unset($submenu['edit.php'][16]); // Removes Post Tags

// *** MEDIA Menu ***
//unset($submenu['upload.php'][5]); // View the Media library
//unset($submenu['upload.php'][10]); // Add to Media library

//*** LINKS Menu ***
//unset($submenu['link-manager.php'][5]); // Link manager
//unset($submenu['link-manager.php'][10]); // Add new link
//unset($submenu['link-manager.php'][15]); // Link Categories

// *** PAGES Menu ***
unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
unset($submenu['edit.php?post_type=page'][10]); // Add New page

//*** APPEARANCE Menu ***
//unset($submenu['themes.php'][5]); // Removes 'Themes'
//unset($submenu['themes.php'][7]); // Widgets
unset($submenu['themes.php'][15]); // Removes Theme Installer tab

// *** Plugins Menu ***
unset($submenu['plugins.php'][5]); // Plugin Manager
unset($submenu['plugins.php'][10]); // Add New Plugins
unset($submenu['plugins.php'][15]); // Plugin Editor

// *** USERS Menu ***
//unset($submenu['users.php'][5]); // Users list
//unset($submenu['users.php'][10]); // Add new user
//unset($submenu['users.php'][15]); // Edit your profile

// *** TOOLS Menu ***
unset($submenu['tools.php'][5]); // Tools area
//unset($submenu['tools.php'][10]); // Import
//unset($submenu['tools.php'][15]); // Export
//unset($submenu['tools.php'][20]); // Upgrade plugins and core files

// *** SETTINGS Menu ***
//unset($submenu['options-general.php'][10]); // General Options
unset($submenu['options-general.php'][15]); // Writing
//unset($submenu['options-general.php'][20]); // Reading
unset($submenu['options-general.php'][25]); // Discussion
//unset($submenu['options-general.php'][30]); // Media
unset($submenu['options-general.php'][35]); // Privacy
//unset($submenu['options-general.php'][40]); // Permalinks
//unset($submenu['options-general.php'][45]); // Misc
}
add_action('admin_menu', 'remove_submenus');


// Add submenu page
add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
add_submenu_page('upload.php', 'Upload & Crop Slides', 'Add & Crop Slides', 'manage_options', 'themes.php?page=custom-header', '');

add_submenu_page('upload.php', 'Manage slides', 'Manage slides', 'manage_options', 'admin.php?page=slidedeck2.php', '');
// SETTINGS MENU
add_submenu_page('options-general.php', 'Site Title / URL', 'Site Title / URL', 'manage_options', 'options-general.php', '');
add_submenu_page('options-general.php', 'Set Home Page', 'Set Home Page', 'manage_options', 'options-general.php', '');
add_submenu_page('options-general.php', 'Site Colours', 'Site Colours', 'manage_options', 'themes.php?page=functions.php', '');
add_submenu_page('options-general.php', 'Header / Footer Script', 'Header / Footer Script', 'manage_options', 'themes.php?page=functions.php', '');
add_submenu_page('options-general.php', 'Customise CSS', 'Customise CSS', 'manage_options', 'themes.php?page=functions.php', '');
add_submenu_page('options-general.php', 'View Master CSS', 'View Master CSS', 'manage_options', 'theme-editor.php', '');
}


// *** RENAME MENU ITEMS ***

add_filter('gettext', 'rename_admin_menu_items');
add_filter('ngettext', 'rename_admin_menu_items');

function rename_admin_menu_items( $menu ) {
	
	// $menu = str_ireplace( 'original name', 'new name', $menu );
	$menu = str_ireplace( 'Media', 'Media / Images', $menu );
  $menu = str_ireplace( 'Library', 'Media Libary', $menu );
  $menu = str_ireplace( 'Settings', 'General Settings', $menu );
  $menu = str_ireplace( 'Tools', 'Backup / Maintenance', $menu );
  $menu = str_ireplace( 'Appearance', 'Menu Builder', $menu );

	
	// return $menu array
	return $menu;
}

// *** remove admin bar items ***


?>