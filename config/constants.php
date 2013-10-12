<?php

define('SNAIL', true);

# db config
define('SN_DBNAME', 'snail'); 
define('SN_DBUSER', 'root'); 
define('SN_DBPASS', '');
define('SN_DBHOST', 'localhost');

# github api config
define('CLIENT_ID', '35a0d3fb7b4074be4b87');
define('CLIENT_SECRET', 'bf6bfab8b65ad62ea60f5ff95e49dd4647d85d8d');
define('REDIRECT_URI', 'http://snail.sanrenbang.net/signin');
define('AUTHORIZATION_ENDPOINT', 'https://github.com/login/oauth/authorize');
define('TOKEN_ENDPOINT', 'https://github.com/login/oauth/access_token');
define('USER_API_URI', 'https://api.github.com/user');

define('SN_GITHUB_FLAG', 'github');

#comments set
define('COMMENT_NORMAL', 1);
define('COMMENT_DELETED', -1);
define('COMMENT_MAX_EXTENT', 1); // 多长时间限用户评论1次，防灌水。
define('COMMENT_PAGE_OFFSET', 2); // 每页显示的评论数。

#memcache set
define('MEMCACHE_HOST', '192.168.1.123');
define('MEMCACHE_PORT', 12111);
?>
