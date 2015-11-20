<?php
class ic extends database{
	protected $_table = "tbl_documents";
	public function getdata($start,$limit){
		$sql = "select * from $this->_table where doc_type = 'ic' limit $start,$limit ";
		$this->query($sql);
		return $this->fetchall();
	}
        public function numIc(){
		$sql = "select * from $this->_table where doc_type = 'ic'";
		$this->query($sql);
		return $this->numRows();
	}
}
?>
