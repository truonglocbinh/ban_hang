<?php
class guide extends database{
	protected $_table = "tbl_customers";
	public function getdata(){
		$sql = "select * from $this->_table where cus_id = '1'";
		$this->query($sql);
		return $this->fetch();
	}
}
