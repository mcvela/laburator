<?php
/////////////////// SE UTILIZA ESTE
require_once('../php/config.php');
include_once ('../php/init.php');

session_start();
if (!verifyFormToken('form1')) die('Hack-Attempt detected. Got ya!.');


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


// Email address verification

function isEmail($email) {
    return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

if($_POST) {

    // Enter the email where you want to receive the notification when someone subscribes
    $emailTo = 'mcvela@gmail.com';

    $subscriber_email = addslashes(trim($_POST['email']));
	$email=$subscriber_email;

    if(!isEmail($subscriber_email)) {
        $array = array();
        $array['valid'] = 0;
        $array['message'] = 'Email inv&aacute;lido!';
        echo json_encode($array);
    }
    else {
	     $array = array();
	    $mensajerespuesta='Gracias por tu suscripci&oacuten!';
		//Save to Database
		 /**/
		$query  = "SELECT * FROM `" . $conf['db_table_subscribers'] . "` WHERE email_address = '" . $mysql->real_escape_string($email) . "'";
		$result = $mysql->query($query);
		
		if ($result->num_rows > 0){
		    $array['valid'] = 1;
			$query = "UPDATE `".$conf['db_table_subscribers']."` SET `subscribed`=1". " WHERE email_address = '" . $mysql->real_escape_string($email) . "'";
		    $mysql->query($query) or die(vprintf($lang['error_adding_email'], $email));
			$mensajerespuesta= $lang['subscribed_successfully'];//$lang['already_exist'];
		}else {
		   $query = "INSERT INTO `" . $conf['db_table_subscribers'] . "` ( `email_address`, `subscribed`, `language`,`ip`,`reference`) VALUES ( '" . $mysql->real_escape_string($email) . "', 1, '".$mysql->real_escape_string($conf['current_language'])."','".$mysql->real_escape_string(getRealIpAddr())."','".$mysql->real_escape_string(trim($_SESSION['ref']))."')";
		    $mysql->query($query) or die(vprintf($lang['error_adding_email'], $email));
			/*$sent = mail($conf['email_address'], sprintf($lang['newsletter_email_subject_admin'], $conf['website_name']), sprintf($lang['newsletter_email_message_admin'], $email, $conf['website_name']), $headers);
			$usersent = mail($email, sprintf($lang['newsletter_email_subject_user'], $conf['website_name']),
	sprintf($lang['newsletter_email_message_user'], $conf['website_name'], substr($conf['website_url_directory'], 0, (strlen($conf['website_url_directory'])-4))), $headers);
			if ($sent)
				$mensajerespuesta= $lang['subscribed_successfully'];
			else
				$mensajerespuesta= $lang['msg_invalid_send'];
				*/
			$array['valid'] = 1;
		}
		 
       
       
        $array['message'] = $mensajerespuesta; //'Gracias por tu suscripci&oacuten!';
        echo json_encode($array);

        // Send email
	    $subject = 'New Subscriber (seria)!';
	    $body = "You have a new subscriber!\n\nEmail: " . $subscriber_email;
        // uncomment this to set the From and Reply-To emails, then pass the $headers variable to the "mail" function below
	    //$headers = "From: ".$subscriber_email." <" . $subscriber_email . ">" . "\r\n" . "Reply-To: " . $subscriber_email;
	    mail($emailTo, $subject, $body);
    }

}

?>
