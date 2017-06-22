steam_login.php
<!DOCTYPE html>
<html>
<head>
 <title>Steam Login Auth - CSR</title>
</head>
<body>
<?
   require './includes/openid.php'; 
   include_once("db.php");
   $apiKey = "59A4A3DBEAE44FE5A112A86E7E20F7D1";
   try {
    $oid = new LightOpenID('www.google.com');
    if (!$oid->mode) {
     if (isset($_GET['login'])) {
      $oid->identity = 'http://steamcommunity.com/openid/?l=english';
      header('Location: ' . $oid->authUrl());
     }else{
		 echo "<h2>Connect to Steam</h>";
		 echo "<form action="?login" method="post">";
		 echo "<input type="image" src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png">;
	 } 
    } elseif($oid->mode == 'cancel') {
     echo 'User has cancelled authentication!';
    } else {
     if ($oid->validate()) {
      $id = $oid->identity;
      $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id/([0-9]{15,25}+)$/";
      preg_match($ptn, $id, $matches);      
      $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$apiKey&steamids=$matches[1]";
      $json_object= file_get_contents($url);
      $json_decoded = json_decode($json_object);
      foreach ($json_decoded->response->players as $player) {
       
      }
     } else {
      echo "User is not logged in.\n";
     }
    }
   } catch (ErrorException $e) {
    echo $e->getMessage();
   }
?>
</body>
</html>﻿