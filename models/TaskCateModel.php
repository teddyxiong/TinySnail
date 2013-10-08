<?php
if(!defined('SNAIL')) exit('Illegal Request');

class TaskCateModel extends BaseModel {

	public function allCate() {
		return [
				'10'=>'读书',
				'11'=>'旅行',
				'12'=>'代码',
				'13'=>'码字',
				'14'=>'其它'
			];
	}

	public function getCateNameById($cateid) {
		$allcate = $this->allCate();
		if (isset($allcate[$cateid])) return $allcate[$cateid];
		return null;
	}
}
