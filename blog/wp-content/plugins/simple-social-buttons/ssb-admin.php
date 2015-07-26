<div class="wrap">

<style type="text/css">
   div.inside ul li {
      line-height: 16px;
      list-style-type: square;
      margin-left: 15px;
   }
</style>

<h2>Simple Social Buttons - <?php _e('Settings'); ?>:</h2>

<p><?php _e('<strong>Simple Social Buttons</strong> by <strong>Paweł Rabinek</strong>. This plugin adds a social media buttons, such as: <strong>Google +1</strong>, <strong>Facebook Like it</strong>, <strong>Twitter share</strong> and <strong>Pinterest</strong>. The most flexible social buttons plugin ever.', 'simplesocialbuttons'); ?></p>

<?php

if(strtolower(@$_POST['hiddenconfirm']) == 'y') {

	/**
	 * Compile settings array
	 * @see http://codex.wordpress.org/Function_Reference/wp_parse_args
	 */

	$updateSettings = array(
		'googleplus' => $_POST['ssb_googleplus'],
		'fblike' => $_POST['ssb_fblike'],
		'twitter' => $_POST['ssb_twitter'],
		'pinterest' => $_POST['ssb_pinterest'],

		'beforepost' => $_POST['ssb_beforepost'],
		'afterpost' => $_POST['ssb_afterpost'],
		'beforepage' => $_POST['ssb_beforepage'],
		'afterpage' => $_POST['ssb_afterpage'],
		'beforearchive' => $_POST['ssb_beforearchive'],
		'afterarchive' => $_POST['ssb_afterarchive'],

		'showfront' => $_POST['ssb_showfront'],
		'showcategory' => $_POST['ssb_showcategory'],
		'showarchive' => $_POST['ssb_showarchive'],
		'showtag' => $_POST['ssb_showtag'],

		'override_css' => $_POST['ssb_override_css'],
	
		'twitterusername' => str_replace(array("@", " "), "", $_POST['ssb_twitterusername']),
	);

	$this->update_settings( $updateSettings );

} 

/**
 * HACK: Use one big array instead of a bunchload of single options
 * @author Fabian Wolf
 * @link http://usability-idealist.de/
 * @since 1.2.1
 */

// get settings from database
$settings = $this->get_settings();

extract( $settings, EXTR_PREFIX_ALL, 'ssb' );

?>


<div class="postbox-container" style="width:69%">
   <div id="poststuff">
      <form name="ssb_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

      <div class="postbox">
         <h3><?php _e('Select buttons', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
            <h4><?php _e('Select social media buttons:', 'simplesocialbuttons'); ?></h4>


			<p><select name="ssb_googleplus" id="ssb_googleplus">
				<option value=""<?php if(empty($ssb_googleplus) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialbuttons'); ?></option>

			<?php for($pos = 1; $pos < 4; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($ssb_googleplus == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="ssb_googleplus"><?php _e('Google plus one (+1)', 'simplesocialbuttons'); ?></label></p>

			<!-- fblike -->
			<p><select name="ssb_fblike" id="ssb_fblike">
				<option value=""<?php if(empty($ssb_fblike) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialbuttons'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($ssb_fblike == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="ssb_fblike"><?php _e('Facebook Like it', 'simplesocialbuttons'); ?></label></p>
			<!-- /fblike -->

			<!-- twitter -->
			<p><select name="ssb_twitter" id="ssb_twitter">
				<option value=""<?php if(empty($ssb_twitter) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialbuttons'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($ssb_twitter == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="ssb_twitter"><?php _e('Twitter share', 'simplesocialbuttons'); ?></label></p>
			<!-- /twitter -->
			
			<!--  pinterest -->
			<p><select name="ssb_pinterest" id="ssb_pinterest">
				<option value=""<?php if(empty($ssb_pinterest) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialbuttons'); ?></option>

			<?php for($pos = 1; $pos < 5; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($ssb_pinterest == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="ssb_pinterest"><?php _e('Pinterest - Pin It', 'simplesocialbuttons'); ?></label> (<?php echo _e('Will be visible only on post with thumbnail', 'simplesocialbuttons');?>)</p>
			<!--  /pinterest -->

			<p><label for="ssb_override_css"><input type="checkbox" name="ssb_override_css" id="ssb_override_css" value="1" <?php if(!empty($ssb_override_css)) { echo 'checked="checked"'; } ?>/> <?php _e('Disable plugin CSS (only advanced users)', 'simplesocialbuttons'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Single posts - display settings', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single post:', 'simplesocialbuttons'); ?></h4>
            <p><input type="checkbox" name="ssb_beforepost" id="ssb_beforepost" value="1" <?php if(!empty($ssb_beforepost)) { ?>checked="checked"<?php } ?> /> <label for="ssb_beforepost"><?php _e('Before the content', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_afterpost" id="ssb_afterpost" value="1" <?php if(!empty($ssb_afterpost)) { ?>checked="checked"<?php } ?> /> <label for="ssb_afterpost"><?php _e('After the content', 'simplesocialbuttons'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Single pages - display settings', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single pages:', 'simplesocialbuttons'); ?></h4>
            <p><input type="checkbox" name="ssb_beforepage" id="ssb_beforepage" value="1" <?php if(!empty($ssb_beforepage)) { ?>checked="checked"<?php } ?> /> <label for="ssb_beforepage"><?php _e('Before the page content', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_afterpage" id="ssb_afterpage" value="1" <?php if(!empty($ssb_afterpage)) { ?>checked="checked"<?php } ?> /> <label for="ssb_afterpage"><?php _e('After the page content', 'simplesocialbuttons'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Archives - display settings', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
            <h4><?php _e('Select additional places to display buttons:', 'simplesocialbuttons'); ?></h4>
            <p><input type="checkbox" name="ssb_showfront" id="ssb_showfront" value="1" <?php if(!empty($ssb_showfront)) { ?>checked="checked"<?php } ?> /> <label for="ssb_showfront"><?php _e('Show at frontpage', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_showcategory" id="ssb_showcategory" value="1" <?php if(!empty($ssb_showcategory)) { ?>checked="checked"<?php } ?> /> <label for="ssb_showcategory"><?php _e('Show at category pages', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_showarchive" id="ssb_showarchive" value="1" <?php if(!empty($ssb_showarchive)) { ?>checked="checked"<?php } ?> /> <label for="ssb_showarchive"><?php _e('Show at archive pages', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_showtag" id="ssb_showtag" value="1" <?php if(!empty($ssb_showtag)) { ?>checked="checked"<?php } ?> /> <label for="ssb_showtag"><?php _e('Show at tag pages', 'simplesocialbuttons'); ?></label></p>

            <h4><?php _e('Place buttons on archives:', 'simplesocialbuttons'); ?></h4>
            <p><input type="checkbox" name="ssb_beforearchive" id="ssb_beforearchive" value="1" <?php if(!empty($ssb_beforearchive)) { ?>checked="checked"<?php } ?> /> <label for="ssb_beforearchive"><?php _e('Before the content', 'simplesocialbuttons'); ?></label></p>
            <p><input type="checkbox" name="ssb_afterarchive" id="ssb_afterarchive" value="1" <?php if(!empty($ssb_afterarchive)) { ?>checked="checked"<?php } ?> /> <label for="ssb_afterarchive"><?php _e('After the content', 'simplesocialbuttons'); ?></label></p>
         </div>
      </div>
      
      <div class="postbox">
         <h3><?php _e('Additional features'); ?></h3>
         <div class="inside">
            <p><label for="ssb_twitterusername"><?php _e('Twitter @username', 'simplesocialbuttons'); ?>: <input type="text" name="ssb_twitterusername" id="ssb_twitterusername" value="<?php echo (isset($ssb_twitterusername)) ? $ssb_twitterusername : "";?>" /></label></p>
         </div>
      </div>

      <div class="submit">
         <input type="hidden" name="hiddenconfirm" value="Y" />
         <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
      </div>

   </form>
</div>
</div>

<div class="postbox-container" style="width:29%">
   <div id="poststuff">
      <div class="postbox">
         <h3><?php _e('About this plugin:', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
            <ul>
				<li><a href="http://wordpress.org/support/plugin/simple-social-buttons" target="_blank"><?php _e('Plugin support', 'simplesocialbuttons'); ?></a></li>
				<li><a href="http://wordpress.org/support/view/plugin-reviews/simple-social-buttons" target="_blank"><?php _e('Review this plugin', 'simplesocialbuttons'); ?></a></li>
            </ul>
			<p><strong><?php _e('Enjoy this plugin?', 'simplesocialbuttons'); ?></strong> <?php _e('Buy me a beer', 'simplesocialbuttons'); ?> :)<br />
 			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="K6MSA43G47G3S">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
			</form>

            </p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('About the author:', 'simplesocialbuttons'); ?></h3>
         <div class="inside">
         <p><?php _e('Hi! My name is Paweł Rabinek (aka xradar). I\'m interesed in SEO and social media, PHP and Wordpress developement.', 'simplesocialbuttons'); ?></p>
         <ul>
            <li><a href="https://plus.google.com/+PawelRabinek/posts" target="_blank"><?php _e('Paweł Rabinek on Google+', 'simplesocialbuttons'); ?></a></li>
			<li><a href="http://www.seoptimer.com/" target="_blank"><?php _e('Free SEO Audit', 'simplesocialbuttons'); ?></a></li>
            <li><a href="http://www.rabinek.pl/" target="_blank"><?php _e('My blog about SEO', 'simplesocialbuttons'); ?></a> <?php _e('[Polish]', 'simplesocialbuttons'); ?></li>
            <li><?php _e('Follow me on Twitter', 'simplesocialbuttons'); ?> <a href="http://www.twitter.com/rabinek" target="_blank">@rabinek</a></li>
            <li><a href="http://www.facebook.com/rabinek" target="_blank"><?php _e('Paweł Rabinek on Facebook', 'simplesocialbuttons'); ?></a></li>           
            <li><a href="http://pl.linkedin.com/in/rabinek" target="_blank"><?php _e('LinkedIn profile', 'simplesocialbuttons'); ?></a></li>
         </ul>
         </div>
      </div>

   </div>
</div>
</div>