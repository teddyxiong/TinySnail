<?php
require_once(PATH_LIBS_VENDORS.DS.'PHP-OAuth2/Client.php');
require_once(PATH_LIBS_VENDORS.DS.'PHP-OAuth2/GrantType/IGrantType.php');
require_once(PATH_LIBS_VENDORS.DS.'PHP-OAuth2/GrantType/AuthorizationCode.php');

class GitHub {

	private $client;

	function __construct() {
		$this->client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET);
	}

	//if (!isset($_GET['code']))
	function requestGitHub(){
		$auth_url = $this->client->getAuthenticationUrl(AUTHORIZATION_ENDPOINT, REDIRECT_URI,             
				array('scope'=>'email,offline_access'));
		header('Location: ' . $auth_url);
		die('Redirect');
	}
    
	function getUserInfo(){
		$params = array('code' => $_GET['code'], 'redirect_uri' => REDIRECT_URI);
		$response = $this->client->getAccessToken(TOKEN_ENDPOINT, 'authorization_code', $params);
		parse_str($response['result'], $info);
		$this->client->setAccessToken($info['access_token']);
		//$response = $client->fetch('https://github.com/api/v2/json/user/show');
		//var_dump($response);
		$graphUrl = USER_API_URI."?".$response['result'];
		$userinfo = json_decode(file_get_contents($graphUrl));
		
		return $userinfo;
	}
}
