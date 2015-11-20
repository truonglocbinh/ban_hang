<?php
class database{
	protected $db = "";
	protected $_result = "";
	public function __construct(){
		$this->db = mysql_connect(config::HOST,  config::USER,  config::PASS) or die("Can not connect database"); 
		mysql_select_db(config::DATA,$this->db);
		mysql_query("SET NAMES utf8");
	}
        // ham thuc thi 1 cau lenh sql va tra ve data 
	public function query($sql){
		$this->_result = mysql_query($sql);
	}
        // dem so hang 
	public function numRows(){
		if($this->_result){ // co ket qua tra ve tu cau truy van
			$rows = mysql_num_rows($this->_result);
		}else{
			$rows = 0;
		}
		return $rows;
	}
        // Lay ra 1 record
	public function fetch(){
		$data = array();
		if($this->_result){
			$data = mysql_fetch_assoc($this->_result);
		}
		return $data;
	}
        // lay ra toan bo record tu sql 
	public function fetchAll(){
		$data = array();
		if($this->_result){
			while($row = mysql_fetch_assoc($this->_result)){
				$data[] = $row;
			}
		}
		return $data;
	}
}
