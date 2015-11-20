<?php
	class doc extends database{
		protected $_table = "tbl_documents";
		public function listdocvip($limit){
			$sql = "select * from $this->_table where doc_vip='1' limit $limit";
			$this -> query($sql);
			return $this->fetchall();
		}
		public function getdata($id){
			$sql = "select * from $this->_table where doc_id = '$id'";
			$this->query($sql);
			return $this->fetch();
		}
	}