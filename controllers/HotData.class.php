<?php
if(!defined('SNAIL')) exit('Illegal Request');
class HotData extends Base{

	public function initHotData() {

		$mem_obj         = new Memcached();
		$task_model      = new TaskModel();
		$article_model   = new ArticleModel();

		$key = "hot_data";
		$hot_data = $mem_obj->get($key);
		if (empty($hot_data)) {
			$hot_data = [];
			$hot_data['task'] = $task_model->fetchHotTasks(HOT_TASK_VIEW_NUM);
			$hot_data['article'] = $article_model->fetchHotArticles(HOT_ARTICLE_VIEW_NUM);

			$mem_obj->set($key, $hot_data, MEMCACHE_COMPRESSED,HOTDATA_CACHE_EXPIRE);
		}

		$this->tpl->assign('hot_articles',$hot_data['article']);
		$this->tpl->assign('hot_tasks',$hot_data['task']);
	}
}
