<?php
require('Client.php');
require('GrantType/IGrantType.php');
require('GrantType/AuthorizationCode.php');

const CLIENT_ID     = '35a0d3fb7b4074be4b87';
const CLIENT_SECRET = 'bf6bfab8b65ad62ea60f5ff95e49dd4647d85d8d';

const REDIRECT_URI           = 'http://snail.sanrenbang.net/oauth/PHP-OAuth2-master';
const AUTHORIZATION_ENDPOINT = 'https://github.com/login/oauth/authorize';
const TOKEN_ENDPOINT         = 'https://github.com/login/oauth/access_token';

$client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET);
if (!isset($_GET['code']))
{
	$auth_url = $client->getAuthenticationUrl(AUTHORIZATION_ENDPOINT, REDIRECT_URI,array('scope'=>'email,offline_access'));
	header('Location: ' . $auth_url);
	die('Redirect');
}
else
{
	$params = array('code' => $_GET['code'], 'redirect_uri' => REDIRECT_URI);
	$response = $client->getAccessToken(TOKEN_ENDPOINT, 'authorization_code', $params);
	parse_str($response['result'], $info);
	$client->setAccessToken($info['access_token']);
	//$response = $client->fetch('https://github.com/api/v2/json/user/show');
	//var_dump($response);
	$graphUrl = "https://api.github.com/user?" . $response['result'];
			$user = json_decode(file_get_contents($graphUrl));
			var_dump($user);
}
?>
