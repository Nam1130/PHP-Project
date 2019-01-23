<?php
session_start();
require "../../model/users.php";
$data = new users;  
$google_client_id 		= '752010452937-e58477qt90qtj89jarl601k4iro1spec.apps.googleusercontent.com';
$google_client_secret 	= 'gyNXwJSGODsAUGFFTcP9T4Q9';
$google_redirect_url 	= 'http://localhost/Dang_Phuong_Nam/PHP-Project.git/project_PHP/view/login-with-google/index.php'; //path to your script
$google_developer_key 	= 'AIzaSyBgvOSDcDjOzKSkLdAIA2wwRRgZtQ0Vwf8';
require_once 'Google/Google_Client.php';
require_once 'Google/contrib/Google_Oauth2Service.php';

$gClient = new Google_Client();
$gClient->setApplicationName('Login to demo.trinhtuantai.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{  
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
	  
}
else {
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) //user is not logged in, show login button
{
	header("Location: ".$authUrl);
} 
else // user logged in 
{	
	//list all user details
	echo '<pre>'; 
	print_r($user);
	echo '</pre>';	
	$sql = "SELECT * from customer";
	$emailArr = array();
	$email = $data->view($sql);
	foreach ($email as $key => $value) {
		$emailArr[] = $value['email'];
	}
	if(in_array($user['email'],$emailArr)){
		$email = $user['email'];
		
			echo 1;
			$sql  = "SELECT * from customer where email = '$email'";
			$cus = $data->view($sql);
			foreach ($cus as $key => $value) {
				$_SESSION['id_cus'] =  $value['id'];
				$_SESSION['cus_name'] =  $value['cus_name'];
			}
			$sql  = 'select max(id) from orders';
			$order = $data->view($sql);
			print_r($order);
			foreach ($order as $key => $value) {
				$order_id = $value['max(id)'];
			}
			$_SESSION['id_oder'] = $order_id+1;


			header('Location: ../index.php');
	}else{
		echo 0;
		$cus_name = $user['name'];
		$user_name = $user['name'];
		$password = $user['name'];
		$address = "";
		$email = $user['email'];
		$sdt = "";
		$data->register( $cus_name, $user_name, $password, $address,$email, $sdt);
		$sql1  = "SELECT * from customer where email = '$email'";
		$cus = $data->view($sql1);
		//print_r($cus);
		foreach ($cus as $key => $value) {
				$_SESSION['id_cus'] =  $value['id'];
				$_SESSION['cus_name'] =  $value['cus_name'];
		}
		$sql  = 'select max(id) from orders';
		$order = $data->view($sql);
		foreach ($order as $key => $value) {
			$order_id = $value['max(id)'];
		}
		$_SESSION['id_oder'] = $order_id+1;

		header('Location: ../index.php');

		//header('Location: ../index.php');
	}
	
	



}

?>