  <h5>Website Administration Login</h5>
						<?php
						$args = array(
						'redirect' => site_url('/wp-admin/'),
						); 
						wp_login_form( $args ); 
						?>
						<a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword">Lost your password?</a>
						<p>&nbsp;</p>
						
						<h5 class="spacer" style="padding-top: 30px;">Domain Control Panel</h5>
						<p>						
							<a title="access domain control panel" href="<?php bloginfo('url'); ?>/cpanel" target="_blank"><i>Click here to </i> access domain control panel.</a>
						</p>
	
