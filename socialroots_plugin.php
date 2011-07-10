<?php
  /*
Plugin Name: Social Roots Auto Post
Plugin URI: http://www.socialroots.com/talk
Description: Sends Excerpts of Posts To Social Roots Desi Talk www.socialroots/talk
Author: Social Roots
Version: 1.0
Author URI: http://www.socialroots.com/
  */
 


function make_readable($message)
{
  $messagesize = strlen($message);
  if($messagesize > 2000)
    {
      $message = substr($message, 0, 2000);
      $message = $message."<strong>...(continued on blog)</strong>";
    }

  $message = preg_replace('/\s/','_',$message);
  $message = preg_replace('/(\-)/','_081591', $message);
  $message = preg_replace('/(\.)/','_060880',$message);
  $message = preg_replace('/(\')/','_060881',$message);
  $message = preg_replace('/(\<)/','_060882', $message);
  $message = preg_replace('/(\>)/','_060883', $message);
  $message = preg_replace('/(\#)/','_081586', $message);
  $message = preg_replace('/(\/)/','_081587', $message);
  $message = preg_replace('/(\@)/','_081588', $message);
  $message = preg_replace('/(\!)/','_081589', $message);
  $message = preg_replace('/(\")/','_081590', $message);
  $message = preg_replace('/(\:)/','_081592', $message);
  $message = preg_replace('/(\&)/','_081593', $message);
  $message = preg_replace('/(\?)/','_081594', $message);
  return $message;
}

function do_stuff_on_publish($post_id) {
  $post= get_post($post_id);
  if ($post->post_type == 'post'
      && $post->post_status == 'publish') {
    // do your stuff here, post just got published
    // $post_id contains the id of the post

    $message = $post->post_content;
    //$message = $post->post_excerpt;
    $subject = $post->post_title;

    //$url = $post_id;

     $website_description = get_option('sr_website_description');
     $logo_url = get_option('sr_logo_url');


     

    //Makes Subject Text sendable 
     $subject = make_readable($subject);

    //Makes Message Text sendable
     $message = make_readable($message);


     $message = stripslashes($message);
    

     $apikey = get_option('socialroots_apikey');
     $partnerid = get_option('socialroots_partnerid');
     $website_description = get_option('sr_website_description');
     $logo_url = get_option('sr_logo_url');
     
     $website_description = make_readable($website_description);
     $logo_url = make_readable($logo_url);
     
     
     $url= "http://www.socialroots.com/talk/partner/subject/".$subject."/content/".$message."/partnerid/".$partnerid."/apikey/".$apikey."/webdescription/".$website_description."/logourl/".$logo_url."/postid/".$post_id;
    
     $success = file_get_contents($url);





  } // end if
} // end function

//add_action('save_post','do_stuff_on_publish');


//*************** Admin function ***************
function socialroots_admin() {
  include('socialroots_admin.php');
}

function socialroots_actions() {
  add_menu_page("Social Roots Plugin", "Social Roots Plugin Settings", 'administrator', "Social Roots Plugin Settings", "socialroots_admin");
}

add_action('admin_menu', 'socialroots_actions');

//*************** End Admin *********************
 
 
add_action('save_post','do_stuff_on_publish');

 
?>

