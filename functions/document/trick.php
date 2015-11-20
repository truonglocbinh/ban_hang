<?php
class trick extends database{
	protected $_table = "tbl_documents";
	public function getdata($start,$limit){
		$sql = "select * from $this->_table where doc_type = 'trick' limit $start,$limit ";
		$this->query($sql);
		return $this->fetchall();
	}
        public function numTrick(){
		$sql = "select * from $this->_table where doc_type = 'trick'";
		$this->query($sql);
		return $this->numRows();
	}
}
?>
