<?php

/*!

 
SCRIPT BY: OwnSMMPanel.in
SCRIPT NAME: OSPKing V2 - SMM Panel Script.
SUPPORT TEAM: ownsmmpanel@gmail.com
WHATSAPP CHAT SUPPORT: +91 8355965199


 
*/

require __DIR__.'/lib/autoload.php';
require __DIR__.'/system/update_funds.php';
 
  	error_reporting(1);
	ini_set("display_errors",1);
    $key = file_get_contents('/recaptcha_key.txt'); //6Le866QcAAAAAO5BquPPc0YLLTiJ7CNaEDX2cL5y
    $secret = file_get_contents('/recaptcha_secret.txt'); // 6Le866QcAAAAAEpSeHwn41-ayfWwmAAvtJD1YuqZ
	echo $key." | ".$secret;
	
    $update = $conn->prepare("UPDATE settings SET recaptcha_key = ?, recaptcha_secret = ? WHERE id = ?");
    $update->execute(array(
        $key,
        $secret,
        1
    ));
    unlink("recaptcha.zip");
    unlink("error_log");
  	header("Location: /admin/");