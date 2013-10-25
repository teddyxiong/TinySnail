DROP TABLE IF EXISTS `bind_users`;
CREATE TABLE `bind_users` (
  `binduid` bigint(20) NOT NULL AUTO_INCREMENT,
  `source_uid` int(11) NOT NULL DEFAULT '0',
  `user_source` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'weibo github qq google',
  `login_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `extend` text COLLATE utf8_unicode_ci,
  `bind_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `bind_dateline` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`binduid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `followers`;
CREATE TABLE `followers` (
  `fid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `follower_uid` bigint(20) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `last_time` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `relation` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-未关注,1-关注,2-相互关注',
  PRIMARY KEY (`fid`),
  KEY `uid` (`uid`),
  KEY `follower_uid` (`follower_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `task_article`;
CREATE TABLE `task_article` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cate_id` int(10) NOT NULL DEFAULT '0',
  `tid` bigint(20) NOT NULL DEFAULT '0',
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `article` text COLLATE utf8_unicode_ci NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `last_time` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `cate_id` (`cate_id`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `task_attach_info`;
CREATE TABLE `task_attach_info` (
  `aiid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `tid` bigint(20) NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`aiid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `task_comments`;
CREATE TABLE `task_comments` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-正常-1-已删除',
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `task_comments_reply`;
CREATE TABLE `task_comments_reply` (
  `rid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cid` bigint(20) NOT NULL DEFAULT '0',
  `uid` bigint(20) NOT NULL,
  `reply_uid` bigint(20) NOT NULL,
  `reply_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `reply` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-正常-1-已删除',
  PRIMARY KEY (`rid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `task_complete_details`;
CREATE TABLE `task_complete_details` (
  `did` bigint(20) NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`did`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `task_votes`;
CREATE TABLE `task_votes` (
  `vid` bigint(20) NOT NULL AUTO_INCREMENT,
  `tid` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '投票类型:1-确认;-1-质疑',
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`),
  KEY `uid` (`uid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT '0',
  `task_cate_id` int(10) NOT NULL DEFAULT '0',
  `article_id` int(10) NOT NULL DEFAULT '0',
  `begin_time` int(10) NOT NULL DEFAULT '0',
  `finish_time` int(10) NOT NULL DEFAULT '0',
  `point` tinyint(3) NOT NULL DEFAULT '0' COMMENT '任务级别:0-普通;1-一般；2-重要；3-紧急',
  `subject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '进行中，未完成，已完成',
  `comments` tinyint(5) NOT NULL DEFAULT '1' COMMENT '评论量',
  `hits` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `confirmation_number` int(10) NOT NULL DEFAULT '0' COMMENT '确认人数',
  `questioned_number` int(10) NOT NULL DEFAULT '0' COMMENT '质疑人数',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `last_time` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `comment_last_time` int(11) NOT NULL,
  `comment_last_user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `last_time` (`last_time`),
  KEY `status` (`status`),
  KEY `task_cate_id` (`task_cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `user_score_log`;
CREATE TABLE `user_score_log` (
  `slid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0',
  `reason` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'register',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`slid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `binduid` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_password_hash` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮件验证',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password_reset_timeline` int(11) DEFAULT NULL,
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cookie中的token',
  `user_registration_timeline` int(11) NOT NULL DEFAULT '0',
  `user_registration_ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `user_last_timeline` int(11) NOT NULL DEFAULT '0',
  `user_last_ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `total_score` int(10) NOT NULL DEFAULT '0',
  `about_me` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

