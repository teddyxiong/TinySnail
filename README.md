TinySnail
=========

任务必达

首页、登录页、退出页rewrite规则
rewrite ^/home/?$ /index.php?controller=index last;
rewrite ^/signin/?$ /index.php?controller=sign_in last;
rewrite ^/signout/?$ /index.php?controller=sign_out last;

