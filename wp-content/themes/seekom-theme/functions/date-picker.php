<?php
/*
Plugin Name: iBex Date Picker
Plugin URI: 
Description: Adds date picker for iBex Accommodation Single Property CMS/XML websites hosted by Seekom
Author: Nicky Casey - Seekom
Version: 4.0
Author URI: http://seekom.com
*/
global $theme_options;

function vdatepicker_widget_scripts() {
    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery-ui-widget");
	wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js', array(), '4.0.0', false);
    wp_enqueue_script('jtsage-j', get_stylesheet_directory_uri() . '/functions/datebox/jtsage-datebox-4.0.0.jqueryui.min.js', array('jquery-ui-widget'), '4.0.0', false);
    wp_enqueue_script('jtsage-b', get_stylesheet_directory_uri() . '/functions/datebox/jtsage-datebox-4.0.0.bootstrap.min.js', array('bootstrap'), '4.0.0', false);
    wp_enqueue_script('jtsage-i', get_stylesheet_directory_uri() . '/functions/datebox/jtsage-datebox.i18n.en.utf8.min.js', array(), '4.0.0', false);
	
	wp_enqueue_style('jtsage-j3', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
	wp_enqueue_style('jtsage-j4', '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css');
	wp_enqueue_style('jtsage-j4', '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.theme.min.css');
    wp_enqueue_style('jtsage-j1', get_stylesheet_directory_uri() . '/functions/datebox/jtsage-datebox-4.0.0.bootstrap.min.css');
    wp_enqueue_style('jtsage-j2', get_stylesheet_directory_uri() . '/functions/datebox/jtsage-datebox-4.0.0.jqueryui.min.css'); 
    
}


class vdatepicker_widget extends WP_Widget
{

    /** constructor -- name this the same as the class above */
    public function vdatepicker_widget()
    {
        parent::WP_Widget(false, $name = 'iBex Date Picker');

        add_action( 'wp_enqueue_scripts', 'vdatepicker_widget_scripts' );
    }

    /** @see WP_Widget::widget -- do not rename this */
    public function widget($args, $instance)
    {
        global $theme_options;
        
        extract($args);
		//widget options
        $title = apply_filters('widget_title', $instance['title']);
		$titlecolour = $instance['titlecolour'];
		$titlefontsize = $instance['titlefontsize'];
		$layout = $instance['layout'];
		$pickerbg = $instance['pickerbg'];
		$pickerbcolour = $instance['pickerbcolour'];
		$pickerbwidth = $instance['pickerbwidth'];
		$pickerbradius = $instance['pickerbradius'];
		$calyears = $instance['calyears'];
		$placeholder = $instance['placeholder'];
		$displayout = $instance['displayout'];
		$placeholderout = $instance['placeholderout'];
		$fontsize = $instance['fontsize'];
		$buttonlabel = $instance['buttonlabel'];
		$buttontextcolour = $instance['buttontextcolour'];
		$buttonhovertext = $instance['buttonhovertext'];
		$buttonbg = $instance['buttonbg'];
		$buttonhoverbg = $instance['buttonhoverbg'];
		$buttonbcolour = $instance['buttonbcolour'];
		$buttonbhover = $instance['buttonbhover'];
		$buttonbwidth = $instance['buttonbwidth'];
		$buttonbradius = $instance['buttonbradius'];
		$booklaunch = $instance['booklaunch'];
		$booktarget = $instance['booktarget'];
		$datepickercss = $instance['datepickercss'];
		$datepickerclass = $instance['datepickerclass'];
		//echo $before_widget; 
        
        $printTitle = $title;
            if(!empty($printTitle)){
                $printTitle = (isset($before_title) ? $before_title : '') . $printTitle . (isset($after_title) ? $after_title : '');
            }
			
        ?>
         <style type="text/css">
			.avail-search {text-align: center; margin: 0 auto; }
			.avail-search ul {text-align: left;}
			.avail-search  form{width: auto;}
			.avail-search input {border: #ececec solid 1px; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px; padding: 6px 12px; margin: 8px 10px 8px 0;}
			.avail-search .btn.search-button {margin: 8px 0;}
			.avail-search .form-group, .avail-search  .ui-datebox-container h4, .avail-search  .ui-datebox-container, .avail-search  .ui-datebox-container a {color: #000!important;}
			.avail-search div.input-group-addon {display: none;}
			.avail-search .input-group .form-control:first-child {border-top-right-radius: 4px; border-bottom-right-radius: 4px;}
			.avail-search .dropdown-menu-right { right: auto;  left: 0;}
			.avail-search label.titlefontsize {padding: 0 15px 8px 0; margin: 0 0;}
			.avail-search .form-group ul {margin-bottom: 0;}
			.ui-datebox-griddate {-webkit-border-radius: 0!important; -moz-border-radius: 0!important; border-radius: 0!important; border-width: 0!important;}
			<?php
			if (!empty($datepickerclass)) {
			$availclass = '.' . $datepickerclass;
			}
				echo $availclass . '.avail-search ul li {display:' .  $layout. ';}';
				if (isset($pickerbg)) {
				echo  $availclass . '.avail-search {background: ' . $pickerbg . ';}';
				}
				if (isset($pickerbcolour)) {
				echo  $availclass . '.avail-search {border-color: ' . $pickerbcolour . ';border-style: solid;}';
				}
				if (isset($pickerbwidth)) {
				echo  $availclass . '.avail-search {border-width: ' . $pickerbwidth . ';}';
				}
				if (isset($pickerbradius)) {
				echo  $availclass . '.avail-search {border-radius: ' . $pickerbradius . '; -webkit-border-radius: ' . $pickerbradius . '; -moz-border-radius: ' . $pickerbradius . ';}';
				}
				if (isset($titlefontsize)) {
				echo  $availclass . ' label.titlefontsize {font-size: ' . $titlefontsize . ';}';
						}
				if (isset($titlecolour)) {
				echo  $availclass . '.avail-search label.titlefontsize {color: ' . $titlecolour . ';}';
						}		
				if (isset($fontsize)) {
				echo  $availclass . ' input.datein, ' . $availclass . '.avail-search .btn.search-button {font-size: ' . $fontsize . ';}';
						}
				if (isset($fontsize)) {
				echo  $availclass . ' input.dateout {font-size: ' . $fontsize . ';}';
						}		
				if (isset($buttontextcolour)) {
				echo  $availclass . '.avail-search .btn.search-button {color: ' . $buttontextcolour . ';}';
						}
				if (isset($buttonhovertext)) {
				echo  $availclass . '.avail-search .btn.search-button:hover {color: ' . $buttonhovertext . ';}';
						}
				if (isset($buttonbg)) {
				echo  $availclass . '.avail-search .btn.search-button {background: ' . $buttonbg . ';}';
						}
				if (isset($buttonbcolour)) {
				echo  $availclass . '.avail-search .btn.search-button {border-color: ' . $buttonbcolour . ';border-style: solid;}';
				}
				if (isset($buttonbwidth)) {
				echo  $availclass . '.avail-search .btn.search-button {border-width: ' . $buttonbwidth . ';}';
				}
				if (isset($buttonbradius)) {
				echo  $availclass . '.avail-search .btn.search-button {border-radius: ' . $buttonbradius . '; -webkit-border-radius: ' . $buttonbradius . '; -moz-border-radius: ' . $buttonbradius . ';}';
				}	
				if (isset($buttonhoverbg)) {
				echo  $availclass . '.avail-search .btn.search-button:hover {background: ' . $buttonhoverbg . ';}';
						}
				if (isset($buttonbhover)) {
				echo  $availclass . '.avail-search .btn.search-button:hover {border-color: ' . $buttonbhover . ';border-style: solid;}';
				}		
				echo $datepickercss;		
				?>
			
        </style>
		 <div class="<?php
		 if (isset($datepickerclass)) {
		 echo $datepickerclass . ' ';}  ?>avail-search">

        	<?php
					if(!empty($booklaunch)) {
					$BookLaunch = $booklaunch;
					}
					else {
					$BookLaunch = $theme_options['booking-url'];
					}
					?>
			<div class="formwrapper">
				<form class="form-inline" action="<?=$BookLaunch?>" target="<?=$booktarget?>" method="get" onsubmit="return">
					<input type="hidden" name="reset" value="true"/>
					<div class="form-group jj">
					
						<ul>
						<li><label class="titlefontsize"> <?=$instance['title'];?></label></li>
						<li><input type="text" name="datein" class="datein" class="form-control" placeholder="<?php echo $placeholder ?>"></li>
						<?php
					if($displayout == 'block') {
					?>
						<li><input type="text" name="dateout" class="dateout show-<?php echo $displayout ?>" class="form-control" placeholder="<?php echo $placeholderout ?>"></li>
					<?php
					}
					?>	
						<li><button type="submit" name="submit" title="Search" id="submit" class="btn search-button"><?php echo $buttonlabel ?></button></li>
						</ul>
					</div>
					
					
				</form>
			</div>

        </div><!-- end avail search -->

        

       <script type="text/javascript">
		jQuery(document).ready(function( $ ) {
            $('.datein').datebox({
                    mode: "calbox",
                    afterToday: true,
                    dateFieldOrder: ["d", "m", "y"],
                    overrideDateFormat: "%d-%b-%Y",
					calUsePickers: <?php echo $calyears ?>,
					calYearPickMax: 2,
					calYearPickMin: 'NOW',
					maxDays: 730,
					highDays: [0,6],
                    useCancelButton: false,
                    useCollapsedButton: true,
                    useSetButton: true,
                    useTodayButton: true,
                    themeDate: 'default',
                    themeDatePick: 'success',
                    themeDateToday: 'info',
                    useFocus: true
            });
			$('.dateout').datebox({
                    mode: "calbox",
                    afterToday: true,
                    dateFieldOrder: ["d", "m", "y"],
                    overrideDateFormat: "%d-%b-%Y",
					calUsePickers: <?php echo $calyears ?>,
					calYearPickMax: 2,
					calYearPickMin: 'NOW',
					maxDays: 730,
					highDays: [0,6],
                    useCancelButton: false,
                    useCollapsedButton: true,
                    useSetButton: true,
                    useTodayButton: true,
                    themeDate: 'default',
                    themeDatePick: 'success',
                    themeDateToday: 'info',
                    useFocus: true
            });
			/* Check in and check out placeholder Code Start */				
			$(".datein").attr("placeholder", "Check In");
			$(".dateout").attr("placeholder", "Check Out");
			$( ".datein" ).click(function() {
				$("this").text("Check In");
			});
			$( ".dateout" ).click(function() {
				$("this").text("Check In");
			});
			/* Check in and check out placeholder Code End */							  
        });
        </script> 
		

        <?php //echo $after_widget; 
    }

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance)
    {
         $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['titlecolour'] = $new_instance['titlecolour'];
		$instance['titlefontsize'] = $new_instance['titlefontsize'];
		$instance['layout'] = $new_instance['layout'];
		$instance['pickerbg'] = $new_instance['pickerbg'];
		$instance['pickerbcolour'] = $new_instance['pickerbcolour'];
		$instance['pickerbwidth'] = $new_instance['pickerbwidth'];
		$instance['pickerbradius'] = $new_instance['pickerbradius'];
		$instance['calyears'] = $new_instance['calyears'];
		$instance['placeholder'] = $new_instance['placeholder'];
		$instance['placeholderout'] = $new_instance['placeholderout'];
		$instance['displayout'] = $new_instance['displayout'];
		$instance['fontsize'] = $new_instance['fontsize'];
		$instance['buttonlabel'] = $new_instance['buttonlabel'];
		$instance['buttontextcolour'] = $new_instance['buttontextcolour'];
		$instance['buttonhovertext'] = $new_instance['buttonhovertext'];
		$instance['buttonbg'] = $new_instance['buttonbg'];
		$instance['buttonhoverbg'] = $new_instance['buttonhoverbg'];
		$instance['buttonbcolour'] = $new_instance['buttonbcolour'];
		$instance['buttonbhover'] = $new_instance['buttonbhover'];
		$instance['buttonbwidth'] = $new_instance['buttonbwidth'];
		$instance['buttonbradius'] = $new_instance['buttonbradius'];
		$instance['booklaunch'] = $new_instance['booklaunch'];
		$instance['booktarget'] = $new_instance['booktarget'];
		$instance['datepickercss'] = $new_instance['datepickercss'];
		$instance['datepickerclass'] = $new_instance['datepickerclass'];
        return $instance;
    }

	
    /** @see WP_Widget::form -- do not rename this */
    function form($instance)
    {

        $title = esc_attr($instance['title']);
		$titlecolour = esc_attr($instance['titlecolour']);
		$titlefontsize = esc_attr($instance['titlefontsize']);
		$layout = esc_attr($instance['layout']);
		$pickerbg = esc_attr($instance['pickerbg']);
		$pickerbcolour = esc_attr($instance['pickerbcolour']);
		$pickerbwidth = esc_attr($instance['pickerbwidth']);
		$pickerbradius = esc_attr($instance['pickerbradius']);
		$calyears = esc_attr($instance['calyears']);
		$placeholder = esc_attr($instance['placeholder']);
		$placeholderout = esc_attr($instance['placeholderout']);
		$displayout = esc_attr($instance['displayout']);
		$fontsize = esc_attr($instance['fontsize']);
		$buttonlabel = esc_attr($instance['buttonlabel']);
		$buttontextcolour = esc_attr($instance['buttontextcolour']);
		$buttonhovertext = esc_attr($instance['buttonhovertext']);
		$buttonbg = esc_attr($instance['buttonbg']);
		$buttonhoverbg = esc_attr($instance['buttonhoverbg']);
		$buttonbcolour = esc_attr($instance['buttonbcolour']);
		$buttonbhover = esc_attr($instance['buttonbhover']);
		$buttonbwidth = esc_attr($instance['buttonbwidth']);
		$buttonbradius = esc_attr($instance['buttonbradius']);
		$booklaunch = esc_attr($instance['booklaunch']);
		$booktarget = esc_attr($instance['booktarget']);
		$datepickercss = esc_attr($instance['datepickercss']);
		$datepickerclass = esc_attr($instance['datepickerclass']);
		
        ?>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/functions/tiny-color-picker/jqColorPicker.min.js"></script>
			
		<style>
		table.datepicker {width: 100%;}
		table.datepicker td {}
		input.color {width: 95%;}
		.datepicker th {background: #ececec; text-align: left; padding: 8px; width: 100%; border-top: 10px #fff solid;}
		</style>
		<a href="http://hslpicker.com/" target="_blank">RGBA Colour picker</a>
		<table class="datepicker">
		<tr>
		<th>Title Options</th>
		</tr>
		<tr>
		<td> <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
				   </td>
		</tr>
		<tr><td><label for="<?php echo $this->get_field_id('titlecolour'); ?>"><?php _e('Title Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('titlecolour'); ?>" name="<?php echo $this->get_field_name('titlecolour'); ?>" type="text" class="color no-sliders" value="<?php echo $titlecolour; ?>">
   </td>
		</tr>
		<tr>
		<td> <label for="<?php echo $this->get_field_id('titlefontsize'); ?>"><?php _e('Title Font Size (px, em or vw):'); ?></label>
            <input id="<?php echo $this->get_field_id('titlefontsize'); ?>"
                   name="<?php echo $this->get_field_name('titlefontsize'); ?>" type="text" value="<?php echo $titlefontsize; ?>"/>
		</td>
		</tr>
		</table>
		<tr>
		<table class="datepicker">
		<th width="100%"colspan="2">Display Options</th>
		</tr>
		<tr>
		<td colspan="2"><label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('Display Format:'); ?></label>
            <select name="<?php echo $this->get_field_name('layout'); ?>" id="<?php echo $this->get_field_id('layout'); ?>">
			<?php
			$options = array('inline', 'block');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $layout == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
		</td>
		</tr>
		<tr>
		<td width="50%"><label for="<?php echo $this->get_field_id('pickerbg'); ?>"><?php _e('Background Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('pickerbg'); ?>" name="<?php echo $this->get_field_name('pickerbg'); ?>" type="text" class="color no-sliders" value="<?php echo $pickerbg; ?>">
   </td>
   <td width="50%"><label for="<?php echo $this->get_field_id('pickerbcolour'); ?>"><?php _e('Border Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('pickerbcolour'); ?>" name="<?php echo $this->get_field_name('pickerbcolour'); ?>" type="text" class="color no-sliders" value="<?php echo $pickerbcolour; ?>">
   </td>
		</tr>
		<tr>
		 <td width="50%"><label for="<?php echo $this->get_field_id('pickerbwidth'); ?>"><?php _e('Border Width:'); ?></label>
            <select name="<?php echo $this->get_field_name('pickerbwidth'); ?>" id="<?php echo $this->get_field_id('pickerbwidth'); ?>">
			<?php
			$options = array('0', '1px', '2px', '3px', '4px', '5px');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $pickerbwidth == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
			</td>
		  <td width="50%"><label for="<?php echo $this->get_field_id('pickerbradius'); ?>"><?php _e('Border Radius:'); ?></label>
            <select name="<?php echo $this->get_field_name('pickerbradius'); ?>" id="<?php echo $this->get_field_id('pickerbradius'); ?>">
			<?php
			$options = array('0', '5px', '10px', '15px', '20px');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $pickerbradius == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
			</td>
		</tr>
		</table>
		<table class="datepicker">
		<tr>
		<th colspan="2">Date Select/Search Options</th>
		</tr>
		<tr>
		<td colspan="2">
		<label for="<?php echo $this->get_field_id('calyears'); ?>"><?php _e('Show Month/Year Selectors:'); ?></label>
            <select name="<?php echo $this->get_field_name('calyears'); ?>" id="<?php echo $this->get_field_id('calyears'); ?>">
			<?php
			$options = array('false', 'true');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $calyears == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
			</td></tr>
			<tr>
			<td colspan="2"> <label for="<?php echo $this->get_field_id('placeholder'); ?>"><?php _e('Date Select Placeholder Text:'); ?></label>
            <input id="<?php echo $this->get_field_id('placeholder'); ?>"
                   name="<?php echo $this->get_field_name('placeholder'); ?>" type="text" value="<?php echo $placeholder; ?>"/>
			</td>
		</tr>
		<tr>
		<td colspan="2"><label for="<?php echo $this->get_field_id('displayout'); ?>"><?php _e('Date Out Display:'); ?></label>
            <select name="<?php echo $this->get_field_name('displayout'); ?>" id="<?php echo $this->get_field_id('displayout'); ?>">
			<?php
			$options = array('none', 'block');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $displayout == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
		</td>
		</tr>
		<tr>
			<td colspan="2"> <label for="<?php echo $this->get_field_id('placeholderout'); ?>"><?php _e('Date Out Placeholder Text:'); ?></label>
            <input id="<?php echo $this->get_field_id('placeholderout'); ?>"
                   name="<?php echo $this->get_field_name('placeholderout'); ?>" type="text" value="<?php echo $placeholderout; ?>"/>
			</td>
		</tr>
		<tr>
		 <td colspan="2"><label for="<?php echo $this->get_field_id('buttonlabel'); ?>"><?php _e('Button Label:'); ?></label>
            <input id="<?php echo $this->get_field_id('buttonlabel'); ?>"
                   name="<?php echo $this->get_field_name('buttonlabel'); ?>" type="text" placeholder="Search" value="<?php echo $buttonlabel; ?>"/></td>
		</tr>
		<tr>
		<td colspan="2"> <label for="<?php echo $this->get_field_id('fontsize'); ?>"><?php _e('Font Size (px, em or vw):'); ?></label>
            <input id="<?php echo $this->get_field_id('fontsize'); ?>"
                   name="<?php echo $this->get_field_name('fontsize'); ?>" type="text" value="<?php echo $fontsize; ?>"/>
		</td>
		</tr>
		
		<tr>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttontextcolour'); ?>"><?php _e('Btn Text Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('buttontextcolour'); ?>" name="<?php echo $this->get_field_name('buttontextcolour'); ?>" type="text" class="color no-sliders" value="<?php echo $buttontextcolour; ?>">
   </td>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonhovertext'); ?>"><?php _e('Btn Hover Text Colr:'); ?></label><br><input id="<?php echo $this->get_field_id('buttonhovertext'); ?>" name="<?php echo $this->get_field_name('buttonhovertext'); ?>" type="text" class="color no-sliders" value="<?php echo $buttonhovertext; ?>">
   </td>
		</tr>
		<tr>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonbg'); ?>"><?php _e('Btn Bg Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('buttonbg'); ?>" name="<?php echo $this->get_field_name('buttonbg'); ?>" type="text" class="color no-sliders" value="<?php echo $buttonbg; ?>">
   </td>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonhoverbg'); ?>"><?php _e('Btn Hover Bg Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('buttonhoverbg'); ?>" name="<?php echo $this->get_field_name('buttonhoverbg'); ?>" type="text" class="color no-sliders" value="<?php echo $buttonhoverbg; ?>">
   </td>
		</tr>
		<tr>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonbcolour'); ?>"><?php _e('Btn Border Colour:'); ?></label><br><input id="<?php echo $this->get_field_id('buttonbcolour'); ?>" name="<?php echo $this->get_field_name('buttonbcolour'); ?>" type="text" class="color no-sliders" value="<?php echo $buttonbcolour; ?>">
   </td>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonbhover'); ?>"><?php _e('Btn Brdr Hover Colr:'); ?></label><br><input id="<?php echo $this->get_field_id('buttonbhover'); ?>" name="<?php echo $this->get_field_name('buttonbhover'); ?>" type="text" class="color no-sliders" value="<?php echo $buttonbhover; ?>">
   </td>
		</tr>
		
		<tr>
		 <td width="50%"><label for="<?php echo $this->get_field_id('buttonbwidth'); ?>"><?php _e('Btn Border Width:'); ?></label>
            <select name="<?php echo $this->get_field_name('buttonbwidth'); ?>" id="<?php echo $this->get_field_id('buttonbwidth'); ?>">
			<?php
			$options = array('0', '1px', '2px', '3px', '4px', '5px');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $buttonbwidth == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
			</td>
		  <td width="50%"><label for="<?php echo $this->get_field_id('buttonbradius'); ?>"><?php _e('Btn Border Radius:'); ?></label>
            <select name="<?php echo $this->get_field_name('buttonbradius'); ?>" id="<?php echo $this->get_field_id('buttonbradius'); ?>">
			<?php
			$options = array('0', '5px', '10px', '15px', '20px');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $buttonbradius == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
			</td>
		</tr>
		</table>
	
	<table class="datepicker">
		<tr>
		<th>Launch Settings</th>
		</tr>
		
		<tr>
			<td> <label for="<?php echo $this->get_field_id('booklaunch'); ?>"><?php _e('Launch slug or URL:'); ?></label>
            <input style="width: 70%" id="<?php echo $this->get_field_id('booklaunch'); ?>"
                   name="<?php echo $this->get_field_name('booklaunch'); ?>" type="text" value="<?php echo $booklaunch; ?>"/>
			</td>
		</tr>
		<tr><td><i>Completion is optional - leave blank to use iBex config settings</i></td></tr>
		<tr>
		<td colspan="2"><label for="<?php echo $this->get_field_id('booktarget'); ?>"><?php _e('Launch Target:'); ?></label>
            <select name="<?php echo $this->get_field_name('booktarget'); ?>" id="<?php echo $this->get_field_id('booktarget'); ?>">
			<?php
			$options = array('_self', '_blank');
			foreach ($options as $option) {
			echo '<option value="' . $option . '" id="' . $option . '"', $booktarget == $option ? ' selected="selected"' : '', '>', $option, '</option>';
			}
			 ?>
			</select>
		</td>
		</tr>
		</table>
	
	<table class="datepicker">
		<tr>
		<th>Custom Styling</th>
		</tr>
		<tr>
			<td> <label for="<?php echo $this->get_field_id('datepickerclass'); ?>"><?php _e('Custom Class:'); ?></label>
            <input id="<?php echo $this->get_field_id('datepickerclass'); ?>"
                   placeholder="one" name="<?php echo $this->get_field_name('datepickerclass'); ?>" type="text" value="<?php echo $datepickerclass; ?>"/>
			</td>
		</tr>
		<tr>
		<td><label for="<?php echo $this->get_field_id('datepickercss'); ?>"><?php _e('Custom CSS:'); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id('datepickercss'); ?>" name="<?php echo $this->get_field_name('datepickercss'); ?>"><?php echo $datepickercss; ?></textarea>
				   </td>
		</tr>
		
		</table>
		<script type="text/javascript">
		jQuery.noConflict();
 
		(function( $ ) {
			$('.color').colorPicker(); // that's it
		})( jQuery );	
		</script>
	
		
		

        <?php
    }


} // end class vdatepicker_widget
add_action('widgets_init', create_function('', 'return register_widget("vdatepicker_widget");'));
