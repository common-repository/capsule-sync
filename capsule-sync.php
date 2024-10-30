<?php
/*
Plugin Name: Capsule Sync
Description: Sync WordPress users with Capsule Sync
Author: Stew Heckenberg
Version: 1.1.1
Author URI: http://webcoder.com.au/
*/

if (is_admin()):
  add_action('admin_menu', 'capsule_sync_create_menu');
endif;

function capsule_sync_create_menu() {
	add_menu_page('Capsule Sync Settings', 'Capsule Sync', 'administrator', __FILE__, 'capsule_sync_settings_page',plugins_url('/icon.png', __FILE__));
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

	register_setting( 'capsule-sync-settings-group', 'capsule_sync_subdomain', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_api_key', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_role', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_tag', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_customfield', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_first_name', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_last_name', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_organisation_name', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_email_address', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_web_address', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_phone_number', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_street', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_city', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_state', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_zip', 'validate_custom_field' );
	register_setting( 'capsule-sync-settings-group', 'capsule_sync_country', 'validate_custom_field' );
}

function validate_custom_field($input) {
  if ($input == '') return $input;
  return strtolower(trim($input));
}

function capsule_sync_settings_page() {
?>
<div class="wrap">
<h2>Capsule Sync</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'capsule-sync-settings-group' ); ?>
    <?php //do_settings_fields( 'capsule-sync-settings-group' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Capsule API key</th>
        <td><input type="text" name="capsule_sync_api_key" value="<?php echo get_option('capsule_sync_api_key'); ?>" placeholder="e.g. 123abc123abc123abc123abc123abc12" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Capsule Subdomain</th>
        <td><input type="text" name="capsule_sync_subdomain" value="<?php echo get_option('capsule_sync_subdomain'); ?>" placeholder="e.g. my-company" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">WordPress user role to sync</th>
        <td><input type="text" name="capsule_sync_role" value="<?php echo get_option('capsule_sync_role'); ?>" placeholder="e.g. supplier" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Single tag for Capsule record</th>
        <td><input type="text" name="capsule_sync_tag" value="<?php echo get_option('capsule_sync_tag'); ?>" placeholder="e.g. supplier" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">First Name custom field</th>
        <td><input type="text" name="capsule_sync_first_name" value="<?php echo get_option('capsule_sync_first_name'); ?>" placeholder="e.g. first_name" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Last Name custom field</th>
        <td><input type="text" name="capsule_sync_last_name" value="<?php echo get_option('capsule_sync_last_name'); ?>" placeholder="e.g. last_name" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Organisation Name custom field</th>
        <td><input type="text" name="capsule_sync_organisation_name" value="<?php echo get_option('capsule_sync_organisation_name'); ?>" placeholder="e.g. company" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Email Address custom field</th>
        <td><input type="text" name="capsule_sync_email_address" value="<?php echo get_option('capsule_sync_email_address'); ?>" placeholder="e.g. email" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Web Address custom field</th>
        <td><input type="text" name="capsule_sync_web_address" value="<?php echo get_option('capsule_sync_web_address'); ?>" placeholder="e.g. website" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Phone Number custom field</th>
        <td><input type="text" name="capsule_sync_phone_number" value="<?php echo get_option('capsule_sync_phone_number'); ?>" placeholder="e.g. phone" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Street custom field</th>
        <td><input type="text" name="capsule_sync_street" value="<?php echo get_option('capsule_sync_street'); ?>" placeholder="e.g. street" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">City custom field</th>
        <td><input type="text" name="capsule_sync_city" value="<?php echo get_option('capsule_sync_city'); ?>" placeholder="e.g. city" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">State custom field</th>
        <td><input type="text" name="capsule_sync_state" value="<?php echo get_option('capsule_sync_state'); ?>" placeholder="e.g. state" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Zip custom field</th>
        <td><input type="text" name="capsule_sync_zip" value="<?php echo get_option('capsule_sync_zip'); ?>" placeholder="e.g. zip" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Country custom field</th>
        <td><input type="text" name="capsule_sync_country" value="<?php echo get_option('capsule_sync_country'); ?>" placeholder="e.g. country" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Custom Field custom field</th>
        <td><input type="text" name="capsule_sync_customfield" value="<?php echo get_option('capsule_sync_customfield'); ?>" placeholder="e.g. commission" /></td>
        </tr>
         
    </table>
    
    <?php submit_button(); ?>

</form>
<?php
//--------------------------------------------------
// 
// $meta = get_user_meta($user_id);
//   echo '<pre>';
//   print_r($meta);
//   echo '</pre>';
// 
//-------------------------------------------------- 
?>

</div>
<?php
}

add_action('user_register', 'sync_to_capsule');
add_action('gform_user_registered', 'sync_to_capsule');

function sync_to_capsule($user_id) {

$sync_role = get_option('capsule_sync_role');
$user_has_role = false;

$user = new WP_User( $user_id );
if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
	foreach ( $user->roles as $role ) {
    if ($role == $sync_role) $user_has_role = true;
  }
}

if ($user_has_role):
//$user_last = get_user_meta( $user_id, ', true );


if(get_option('capsule_sync_first_name') && $first_name = get_user_meta($user_id, get_option('capsule_sync_first_name'), true))
  $person_xml .= "<firstName>$first_name</firstName>";

if(get_option('capsule_sync_last_name') && $last_name = get_user_meta($user_id, get_option('capsule_sync_last_name'), true))
  $person_xml .= "<lastName>$last_name</lastName>";

if(get_option('capsule_sync_organisation_name') && $organisation_name = get_user_meta($user_id, get_option('capsule_sync_organisation_name'), true))
  $person_xml .= "<organisationName>$organisation_name</organisationName>";

$email_address = get_option('capsule_sync_email_address') ? get_user_meta($user_id, get_option('capsule_sync_email_address'), true) : false;
$web_address = get_option('capsule_sync_web_address') ? get_user_meta($user_id, get_option('capsule_sync_web_address'), true) : false;
$phone_number = get_option('capsule_sync_phone_number') ? get_user_meta($user_id, get_option('capsule_sync_phone_number'), true) : false;
$street = get_option('capsule_sync_street') ? get_user_meta($user_id, get_option('capsule_sync_street'), true) : false;
$city = get_option('capsule_sync_city') ? get_user_meta($user_id, get_option('capsule_sync_city'), true) : false;
$state = get_option('capsule_sync_state') ? get_user_meta($user_id, get_option('capsule_sync_state'), true) : false;
$zip = get_option('capsule_sync_zip') ? get_user_meta($user_id, get_option('capsule_sync_zip'), true) : false;
$country = get_option('capsule_sync_country') ? get_user_meta($user_id, get_option('capsule_sync_country'), true) : false;

if($web_address || $email_address || $phone_number || $street || $city || $state || $zip || $country) {
  $person_xml .= "<contacts>";
  if ($web_address) {
    $person_xml .= <<<EOT
<website>
<webAddress>$web_address</webAddress>
<webService>URL</webService>
</website>
EOT;
  }
  if ($email_address) {
    $person_xml .= <<<EOT
<email>
<emailAddress>$email_address</emailAddress>
</email>
EOT;
  }
  if ($phone_number) {
    $person_xml .= <<<EOT
<phone>
<phoneNumber>$phone_number</phoneNumber>
</phone>
EOT;
  }  
  if($street || $city || $state || $zip || $country) {
    $person_xml .= "<address>";
    if ($street) {
      $person_xml .= <<<EOT
<street>$street</street>
EOT;
    }
    if ($city) {
      $person_xml .= <<<EOT
<city>$city</city>
EOT;
    }
    if ($state) {
      $person_xml .= <<<EOT
<state>$state</state>
EOT;
    }
    if ($zip) {
      $person_xml .= <<<EOT
<zip>$zip</zip>
EOT;
    }
    if ($country) {
      $person_xml .= <<<EOT
<country>$country</country>
EOT;
    }
    $person_xml .= "</address>";
  }
  $person_xml .= "</contacts>";
}

if ($person_xml)
  $person_xml = "<person>$person_xml</person>";

//
//--------------------------------------------------
// 
// $person_xml = <<<EOT
// <person>
// <firstName>$first_name</firstName>
// <lastName>$last_name</lastName>
// <organisationName>$organisation_name</organisationName>
// <contacts>
// <email>
// <emailAddress>$email_address</emailAddress>
// </email>
// <phone>
// <phoneNumber>$phone_number</phoneNumber>
// </phone>
// <address>
// <street>$street</street>
// <city>$city</city>
// <state>$state</state>
// <zip>$zip</zip>
// <country>$country</country>
// </address>
// </contacts>
// </person>
// EOT;
// 
//-------------------------------------------------- 
//echo $person_xml;

$subdomain = get_option('capsule_sync_subdomain');
$api_key = get_option('capsule_sync_api_key');
$tag = get_option('capsule_sync_tag');
$customfield = get_option('capsule_sync_customfield');
$customfield_value = get_user_meta($user_id, $customfield, true);

if ($person_xml && $subdomain && $api_key) {

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://".$subdomain.".capsulecrm.com/api/person");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $person_xml);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($curl, CURLOPT_USERPWD, $api_key.":x"); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    
    $output = curl_exec($curl);
    if ($curl_error = curl_errno($curl)) {
        curl_close($curl);     
        error_log($curl_error);
        return false;
    }
    //$object = @simplexml_load_string($output);
    $lines = explode("\n", $output);
    foreach ($lines as $line) {
      $line = explode(':', $line);
      $result[trim(array_shift($line))] = trim(join(':',$line));
    }
    $id = end(explode('/', $result['Location']));

    update_user_meta($user_id, 'capsule_id', $id);
    //POST /api/party/:party-id/tag/:tag-name

    if ($id && $tag) {
      curl_setopt($curl, CURLOPT_URL, "https://".$subdomain.".capsulecrm.com/api/party/$id/tag/$tag");
      curl_setopt($curl, CURLOPT_POSTFIELDS, null);
      curl_setopt($curl, CURLOPT_HEADER, false);

      $output = curl_exec($curl);
      if ($curl_error = curl_errno($curl)) {
          curl_close($curl);     
          error_log($curl_error);
          return false;
      }

    }

    if ($id && $customfield && $customfield_value) {

      $customfield_xml = 
      $customfield_xml = <<<EOT
<customFields>
<customField>
<label>$customfield</label>
<text>$customfield_value</text>
</customField>
</customFields>
EOT;

      curl_setopt($curl, CURLOPT_URL, "https://".$subdomain.".capsulecrm.com/api/party/$id/customfields");
      curl_setopt($curl, CURLOPT_POSTFIELDS, $customfield_xml);
      curl_setopt($curl, CURLOPT_HEADER, false);

      $output = curl_exec($curl);
      if ($curl_error = curl_errno($curl)) {
          curl_close($curl);     
          error_log($curl_error);
          return false;
      }
    }

    curl_close($curl);     
  }
  endif;
}

?>
