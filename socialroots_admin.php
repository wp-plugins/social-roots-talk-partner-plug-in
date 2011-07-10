<?php 
if($_POST['oscimp_hidden'] == 'Y') {
  //Form data sent
  $apikey = $_POST['socialroots_apikey'];
  update_option('socialroots_apikey', $apikey);
  
  $partnerid = $_POST['socialroots_partnerid'];
  update_option('socialroots_partnerid', $partnerid);
  
  $website_description = $_POST['sr_website_description'];
  update_option('sr_website_description', $website_description);

  $logo_url = $_POST['sr_logo_url'];
  update_option('sr_logo_url', $logo_url);
  ?>
    <div class="updated"><p><strong><?php _e('Social Roots Plug-in Settings Saved.' ); ?></strong></p></div>
								       <?php
								       } else {
  //Normal page display
  $apikey = get_option('socialroots_apikey');
  $partnerid = get_option('socialroots_partnerid');

  $website_description = get_option('sr_website_description');
  $logo_url = get_option('sr_logo_url');
 }


?>

<div class="wrap">
    <?php    echo "<h2>" . __( 'Social Roots Talk Partner Plugin (version 1.0)', 'oscimp_trdom' ) . "</h2>"; ?>

<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="oscimp_hidden" value="Y">
    <?php echo "<h4><u>Description</u>:</h4>Social Roots Talk Plug-In allows excerpts from your blog post to be published on the Social Roots talk page. Social Roots users will get a quick snapshot of your article and be able to click on various parts of the post to return to your site and read the rest.<br><br><hr>"; ?>
    <?php    echo "<h4><u>" . __( 'SocialRoots API  Settings', 'oscimp_trdom' ) . "</u></h4><h5>**Please Enter the API Settings given to you by Social Roots. </h5>"; ?>

<p><?php _e("API Key: " ); ?><input type="text" name="socialroots_apikey" value="<?php echo $apikey; ?>" size="30"><?php _e(" " ); ?></p>

<p><?php _e("Partner ID: " ); ?><input type="text" name="socialroots_partnerid" value="<?php echo $partnerid; ?>" size="30"><?php _e(" " ); ?></p>
<hr />

<?php    echo "<h4><u>" . __( 'SocialRoots Post Settings', 'oscimp_trdom' ) . "</u></h4><h5>**Modify any of the settings below to alter how your blog posts are shown in http://www.socialroots.com/talk<br><br><u>Logo Url:</u> We will display the image provided by in this url at the bottom of every Social Roots Talk post. It will<br> link back to the Homepage of your Blog.<br><br><u>Website Description:</u> We will also include a one sentence website description at the bottom of every blog post. </h5> "; ?>

<p><strong><?php _e("Logo URL: " ); ?></strong><input type="text" name="sr_logo_url" value="<?php echo $logo_url; ?>" size="80"><?php _e(" ex: http://www.yourblog.com/images/logo.png" ); ?></p>

<p><strong><?php _e("One Sentence Website Description: " ); ?></strong><input type="text" name="sr_website_description" value="<?php echo $website_description; ?>" size="80"><?php _e(" " ); ?></p>


<p class="submit">
    <input type="submit" name="Submit" value="<?php _e('Submit Talk Settings', 'oscimp_trdom' ) ?>" />
    </p>
</form>
</div>