<?php
// TODO make these helper methods
function findexts($filename) // find extensions of files
{
$filename = strtolower($filename) ;
$exts = split("[/\\.]", $filename) ;
$n = count($exts)-1;
$exts = $exts[$n];
return $exts;
}

function googleMapLink($to, $from) { // make a google maps link from standard address format
$destinationAddy = '&daddr='.urlencode($to->getAddress().' '.$to->getCity().' '.$to->getState());
if($from) {
  $startAddy = '&saddr='.urlencode($from->getAddress().' '.$from->getCity().' '.$from->getState());
} else {
  $startAddy = '&saddr=';
}
return htmlentities("http://maps.google.com/maps?f=q&amp;hl=en&amp;{$startAddy}{$destinationAddy}");
}

function formatPhone($phone) // standard phone number
{
    $phone = preg_replace("/[^0-9]/", "", $phone);

    if(strlen($phone) == 7)
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
    elseif(strlen($phone) == 10)
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
    else
        return $phone;
}

function directoryToArray($directory, $recursive) {
    $array_items = array();
    if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                if (is_dir($directory. "/" . $file)) {
                    if($recursive) {
                        $array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive));
                    }
                    $file = $directory . "/" . $file;
                    $array_items[] = preg_replace("/\/\//si", "/", $file);
                } else {
                    $file = $directory . "/" . $file;
                    $array_items[] = preg_replace("/\/\//si", "/", $file);
                }
            }
        }
        closedir($handle);
    }
    return $array_items;
}



function formatMoney($amount,$separator=true,$simple=false){ // nice money maker yall
    return
        (true===$separator?
            (false===$simple?
                number_format($amount,2,'.',','):
                str_replace('.00','',formatMoney($amount))
            ):
            (false===$simple?
                number_format($amount,2,'.',''):
                str_replace('.00','',formatMoney($amount,false))
            )
        );
}

function curPageURL() {
   $pageURL = $_SERVER["REQUEST_URI"];

 return $pageURL;
}
function generatePassword ($length = 8)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
  
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }

function smtpmailer($to, $subject, $body) { 
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true; 
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT; 
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASSWORD;  
    $mail->AddReplyTo(REPLYTO_ADDRESS, REPLYTO_NAME);      
    $mail->SetFrom(FROM_ADDRESS, FROM_NAME);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
   $mail->AddBCC('info@finaddix.com.com', 'Dev');
    $mail->AddBCC('matthew@e11group.com', 'Dev');
    $mail->AddBCC('jon@e11group.com', 'Dev');
    $mail->AddAddress($to);
    $mail->MsgHTML($body);

    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}

function implyDecimal($amount_total) { 
        
        $amount_total = str_replace('.','',$amount_total);
        $amount_total = str_replace(',','',$amount_total);
        
    $amount_total_length = strlen($amount_total);
    
    if ($amount_total_length == 1) {
        
        $amount_total = '0' . $amount_total . '00';
    }
    
    if ($amount_total_length == 2) { 
        
        $amount_total = $amount_total . '00';
        
    }
    if ($amount_total_length == 3) { 
        
        $amount_total = '0'.$amount_total;
        
    }
    if ($amount_total_length == 4) { 
        
        
        
        }
    
    return  $amount_total;

    
    }

	function rand_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str = '';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}

		return $str;
	}

    function time_stamp($session_time)
{
$time_difference = time() - $session_time ;

$seconds = $time_difference ;
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 );
$days = round($time_difference / 86400 );
$weeks = round($time_difference / 604800 );
$months = round($time_difference / 2419200 );
$years = round($time_difference / 29030400 );
// Seconds
if($seconds <= 60)
{
return "$seconds seconds ago";
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   return "one minute ago";
   }
   else
   {
    return "$minutes minutes ago";
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   return "one hour ago";
  }
  else
  {
   return "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   return "one day ago";
  }
  else
  {
   return "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   return "one week ago";
   }
  else
  {
   return "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   return "one month ago";
   }
  else
  {
   return "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    return "one year ago";
   }
   else
  {
    return "$years years ago";
   }

}

}

function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
{
    $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if ($passKey !== null)
    {
        /* Although this function's purpose is to just make the
        * ID short - and not so much secure,
        * with this patch by Simon Franz (http://blog.snaky.org/)
        * you can optionally supply a password to make it harder
        * to calculate the corresponding numeric ID */

        for ($n = 0; $n<strlen($index); $n++)
        {
            $i[] = substr( $index,$n ,1);
        }

        $passhash = hash('sha256',$passKey);

        $passhash = (strlen($passhash) < strlen($index)) ? hash('sha512',$passKey) : $passhash;

        for ($n=0; $n < strlen($index); $n++)
        {
            $p[] =  substr($passhash, $n ,1);
        }

        array_multisort($p,  SORT_DESC, $i);
        $index = implode($i);
    }

    $base  = strlen($index);

    if ($to_num)
    {
        // Digital number  <<--  alphabet letter code
        $in  = strrev($in);
        $out = 0;
        $len = strlen($in) - 1;

        for ($t = 0; $t <= $len; $t++)
        {
            $bcpow = bcpow($base, $len - $t);
            $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
        }

        if (is_numeric($pad_up))
        {
            $pad_up--;
            if ($pad_up > 0)
            {
                $out -= pow($base, $pad_up);
            }
        }
        $out = sprintf('%F', $out);
        $out = substr($out, 0, strpos($out, '.'));
    }
    else
    {
        // Digital number  -->>  alphabet letter code
        if (is_numeric($pad_up))
        {
            $pad_up--;
            if ($pad_up > 0)
            {
                $in += pow($base, $pad_up);
            }
        }

        $out = "";
        for ($t = floor(log($in, $base)); $t >= 0; $t--)
        {
            $bcp = bcpow($base, $t);
            $a   = floor($in / $bcp) % $base;
            $out = $out . substr($index, $a, 1);
            $in  = $in - ($a * $bcp);
        }
        $out = strrev($out); // reverse
    }
    return $out;
}


  function formatForURL($string) {

    $string = strtolower(urlencode($string));
    $string = str_replace('+', '-', $string);
    return $string;


  } 

  function formatFromURL($string) {

    $string = ucwords(str_replace('-', ' ', $string));
    return $string;

  }

?>
