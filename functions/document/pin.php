<?php
class pin extends database{
	protected $_table = "tbl_documents";
	public function getdata($start,$limit){
		$sql = "select * from $this->_table where doc_type = 'pin' limit $start,$limit ";
		$this->query($sql);
		return $this->fetchall();
	}
        public function numPin(){
		$sql = "select * from $this->_table where doc_type = 'pin'";
		$this->query($sql);
		return $this->numRows();
	}
}
?>
