<?php

// add the admin page and such
add_action('admin_init', 'ud_admin_init');
function ud_admin_init() {
    register_setting( 'ud_options', 'ud_options', 'ud_options_validate' );
    add_settings_section('ud_main', 'Favicon', 'ud_section_text', 'ud');
    add_settings_field('ud_filename', 'or upload new favicon file here >>', 'ud_setting_filename', 'ud', 'ud_main');
}

// add the admin options page
add_action('admin_menu', 'ud_admin_add_page');
function ud_admin_add_page() {
    $mypage = add_theme_page('Favicon', 'Favicon Manager', 'manage_options', 'ud', 'ud_options_page');
}

// display the admin options page
function ud_options_page() {
?>
    <div class="wrap">
    <h2>Upload Website Favicon</h2>
    <p>Upload an 'ico', 'png', or 'gif' file (16 x 16px) to use as the favicon on your website pages.<br>
    <i> Note: Only the ico file type is gauranteed to be visible in all browsers.</i><br><br>
    <a target="_blank" href="http://en.wikipedia.org/wiki/Favicon">Click here</a> for information on favicons and browser compatibility.<br>
    <a target="_blank" href="http://www.favicon.co.uk/">Click here</a> to access an online favicon generator/converter.</p>
    <form method="post" enctype="multipart/form-data" action="options.php">
    <?php settings_fields('ud_options'); ?>
    <?php do_settings_sections('ud'); ?>
    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
    </form>

    </div>
    
<?php
}

function ud_section_text() {
    $options = get_option('ud_options');
    echo '<p>Current favicon:</p>';
    if ($file = $options['file']) {
        // var_dump($file);
        echo "<img src='{$file['url']}' />";
    }
}

function ud_setting_filename() {
    echo '<input type="file" name="ud_filename" size="40" />';
}

function ud_options_validate($input) {
    $newinput = array();
    if ($_FILES['ud_filename']) {
        $overrides = array('test_form' => false); 
        $file = wp_handle_upload($_FILES['ud_filename'], $overrides);
        $newinput['file'] = $file;
    }
    return $newinput;
}

?>
