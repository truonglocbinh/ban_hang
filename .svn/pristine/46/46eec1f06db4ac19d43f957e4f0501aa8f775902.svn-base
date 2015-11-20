<?php
class contact extends database{
	protected $_table = "tbl_intro";
	public function getdata(){
		$sql = "select * from $this->_table where intro_id = '2'";
		$this->query($sql);
		return $this->fetch();
	}
}
