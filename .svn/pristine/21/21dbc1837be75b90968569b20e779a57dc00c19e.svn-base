<?php
class database{
	protected $db = "";
	protected $_result = "";
	
	public function __construct(){
		$this->db = mysql_connect(cauhinh::HOST,  cauhinh::USER,  cauhinh::PASS) or die("Can not connect database"); 
		mysql_select_db(cauhinh::DATA,$this->db);
		mysql_query("SET NAMES utf8");
	}
        // ham thuc thi 1 cau lenh sql va tra ve data 
	public function query($sql){
		$this->_result = mysql_query($sql);
	}
        // dem so hang 
	public function num_rows(){
		if($this->_result){ // co ket qua tra ve tu cau truy van
			$rows = mysql_num_rows($this->_result);
		}else{
			$rows = 0;
		}
		return $rows;
	}
        // Lay ra 1 record
	public function fetch(){ // tra ve 1 record 
		$data = array();
		if($this->_result){
			$data = mysql_fetch_assoc($this->_result);
		}
		return $data;
	}
        // lay ra toan bo record tu sql 
	public function fetchall(){
		$data = array();
		if($this->_result){
			while($row = mysql_fetch_assoc($this->_result)){
				$data[] = $row;
			}
		}
		return $data;
	}
}
