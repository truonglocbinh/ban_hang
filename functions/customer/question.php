<?php
class question extends database{
	protected $_table = "tbl_customers";
	public function getdata(){
		$sql = "select * from $this->_table where cus_id = '3'";
		$this->query($sql);
		return $this->fetch();
	}
}
