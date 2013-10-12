TinySnail
=========

任务必达

首页、登录页、退出页rewrite规则

rewrite ^/home/?$ /index.php?controller=index last;

rewrite ^/signin/?$ /index.php?controller=sign_in last;

rewrite ^/signout/?$ /index.php?controller=sign_out last;

rewrite ^/addtask/?$ /index.php?controller=add_task last;

rewrite ^/jump/([a-z-A-Z]+)/([0-9]+)/?$ /index.php?controller=jump&type=$1&callback_id=$2 last;

rewrite ^/task_detail/([0-9]+)/?$ /index.php?controller=task_detail&id=$1 last;

rewrite ^/u/([0-9-a-z-A-Z]+)/?$ /index.php?controller=account&user_name=$1 last; 
