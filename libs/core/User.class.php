<?php
class User {

	const COOKIENAME = 'SNAIL_PASSPORT_MEMBER';

	public function getUid() {
		$cookie = isset ($_COOKIE[self::COOKIENAME]) ? $_COOKIE[self::COOKIENAME] : '';
		if (empty ( $cookie ))
			return null;
		$array = explode ("&", $cookie);
		$info = array ();
		foreach ( $array as $v ) {
			list ( $key, $value ) = explode ( '=', $v );
			$info [$key] = $value;
		}

		$sign = md5(substr(md5($info['pwd'] ),0,20).'Snail'.substr(md5($info['uid'].$info ['binduid']), 10, 20));

		if ($info ['uid'] > 0 && (@$sign == @$info ['sign'])) {
			return $info['uid'];
		}
		return null;
	}

	public function getCurrentLoginUser() {

		$cookie_str = $_COOKIE [self::COOKIENAME];
		if (! empty ( $cookie_str )) {

			$array = explode ( "&", $cookie_str );
			$info = array ();
			foreach ( $array as $v ) {
				list ( $key, $value ) = explode ( '=', $v );
				$info [$key] = $value;
			}
			$sign = md5(substr(md5($info['pwd']), 0, 20 ).'Snail'.substr(md5($info['uid'].$info ['binduid'] ), 10, 20 ) );

			if($info['uid'] > 0 && (@$sign == @$info ['sign'])) {
				$user = array('loginuser_uid'=>$info ['uid'], 
						'loginuser_name'=>$info['id'],
						'loginuser_avatar'=>$info ['avatar_url'],
						'email'=>$info['email']
						);
				return $user;
			}
		}

		return null;
	}

	static function setCookie($key, $value, $cookie_time = 0, $cookie_domain = 'snail.sanrenbang.net', $cookie_path = '/', $secure = false, $httponly = false) {

		return setcookie($key,$value,$cookie_time,$cookie_path,$cookie_domain,$securei,$httponly);
	}
}
