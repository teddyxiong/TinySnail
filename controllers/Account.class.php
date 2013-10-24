<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Account extends Base{

	public function run() {
		$user_model = new UserModel();

		$tabs = ["task", "article", "fans", "follower", "send_message", "message", "settings"];
		$tab = g("tab", true, 'task');
		if (!in_array($tab, $tabs)) {
			$tab = 'task';
		}

		$user_name = g("user_name", true, '');

		$user_info = $user_model->getUserByName($user_name);
		$user_info['extend'] = unserialize($user_info['extend']);
		$user_info['user_registration_timeline'] = date("Y-m-d H:i:s", $user_info['user_registration_timeline']);

		if ('task' == $tab) {
			$this->setTasks($user_info['uid']);
		} elseif ('article' == $tab) {
			$this->setArticles($user_info['uid']);
		}elseif ('fans' == $tab) {
			$this->setFans($user_info['uid']);
		} elseif ('follower' == $tab) {
			$this->setFollower($user_info['uid']);
		}elseif ('settings' == $tab) {
			$this->setSetting($user_info['uid']);
		}



		$this->userRelation($user_info['uid'], $user_name);
		
		$this->tpl->assign('tab',$tab);
		$this->tpl->assign('user_info',$user_info);
		$this->tpl->display('account.html');
	}

	private function userRelation($uid, $user_name) {
		$url = DOMAIN."/u/$user_name/";
		$follower_model = new FollowerModel();
		$action = g('setrelation', true, '');
		if ('set_follower' == $action) {
			$friend_follower = $follower_model->getUserRelation($uid, $this->uid);
			if ($friend_follower['relation'] == SN_FOLLOWER_YES) {
				$follower_model->follower($this->uid, $uid, SN_FOLLOWER_MUTUAL);
				$follower_model->follower($uid, $this->uid, SN_FOLLOWER_MUTUAL);
			} else {
				$follower_model->follower($this->uid, $uid, SN_FOLLOWER_YES);
			}
			redirect($url);
		} elseif ('cancel_follower' == $action) {
			$friend_follower = $follower_model->getUserRelation($uid, $this->uid);
			if ($friend_follower['relation'] == SN_FOLLOWER_MUTUAL) {
				$follower_model->cancelFollower($this->uid, $uid);
				$follower_model->follower($uid, $this->uid, SN_FOLLOWER_YES);
			} else {
				$follower_model->cancelFollower($this->uid, $uid);
			}
			redirect($url);
		}

		if ($this->uid > 0 && $this->uid != $uid) {
			$user_relation = $follower_model->getUserRelation($this->uid, $uid);
			$this->tpl->assign('user_relation',$user_relation);
		} else {
			$this->tpl->assign('user_relation','no');
		}
	}

	private function setFollower($uid) {
		$follower_model = new FollowerModel();
		$follower_list = $follower_model->fetchAllFollowers($uid);
		if (isset($follower_list['fid'])) {
			$tmp = $follower_list;
			$follower_list = [];
			$follower_list[] = $tmp;
		}

		if (true === $follower_list) $follower_list = [];

		$this->tpl->assign('follower_list',(array)$follower_list);
	}

	private function setFans($uid) {
		$follower_model = new FollowerModel();
		$fans_list = $follower_model->fetchAllFans($uid);
		if (isset($fans_list['fid'])) {
			$tmp = $fans_list;
			$fans_list = [];
			$fans_list[] = $tmp;
		}

		if (true === $fans_list) $fans_list = [];

		$this->tpl->assign('fans_list',(array)$fans_list);
	}

	private function setTasks($uid) {
		$task_model = new TaskModel();
		$search_condition = [];
		$search_condition['uid'] = $uid;

		// 任务总数
		$task_total= $task_model->fetchTotal($search_condition);

		// 任务列表
		$p = g("p", true, 1);
		if ($p < 1) $p = 1;

		$pages = ceil(($task_total/TASK_PAGE_OFFSET));

		if ($p > $pages) $p = $pages;

		$page_info = pages_info($task_total, $p, TASK_PAGE_OFFSET);

		$task_list = $task_model->fetchAllTask($search_condition, $p, TASK_PAGE_OFFSET);
		if (!empty($task_list['tid'])) {
			$tmp = $task_list;
			$task_list = array(0=>$tmp);
		}
		foreach($task_list as $k=>$task) {
			$task_list[$k]['create_time'] = fromat_view_date($task['create_time']);                               
			$task_list[$k]['comment_last_time'] = fromat_view_date($task['comment_last_time']);
		}
		$this->tpl->assign('tasks',$task_list);
		$this->tpl->assign('page_info',$page_info);
	}

	private function setArticles($uid) {
		$article_model = new ArticleModel();
		$search_condition = [];
		$search_condition['uid'] = $uid;

		// 任务总数
		$article_total= $article_model->fetchTotal($search_condition);

		// 任务列表
		$p = g("p", true, 1);
		if ($p < 1) $p = 1;

		$pages = ceil(($article_total/TASK_PAGE_OFFSET));

		if ($p > $pages) $p = $pages;

		$page_info = pages_info($article_total, $p, TASK_PAGE_OFFSET);

		$list = $article_model->fetchAllArticle($search_condition, $p, TASK_PAGE_OFFSET);
		if (!empty($list['tid'])) {
			$tmp = $list;
			$list = array(0=>$tmp);
		}

		foreach($list as $k=>$article) {
			$list[$k]['create_time'] = fromat_view_date($article['create_time']);                               
			$list[$k]['comment_last_time'] = fromat_view_date($article['comment_last_time']);
		}
		
		$this->tpl->assign('articles',$list);
		$this->tpl->assign('page_info',$page_info);
	}

	private function setSetting($uid) {
		$user_model = new UserModel();
		$posttype = p('posttype', true, '');
		if ('setting' == $posttype && $this->uid == $uid) {
			$div_id = 'alert_danger';
			$about_me = p('about_me', true, '');
			if (empty($about_me) || mb_strlen($about_me) < 3 || mb_strlen($about_me) > 180) {
				$error = "说明信息必需大于3个字符小于180个字符。";
				$this->veiwNotice($error, $div_id);
			}

			if (!empty($user_model->updateAboutMe($this->uid, $about_me))) {
				$url = DOMAIN."/jump/settings/{$this->user_info['user_name']}";
				$this->pageJump($url);
			}
			$this->veiwNotice("未知错误 [ 数据库写入失败 ] !!!", $div_id);
		}

	}
}
