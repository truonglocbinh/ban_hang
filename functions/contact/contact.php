<?php
class contact extends database{
	protected $_table = "tbl_contact";	
	public function setdata($name, $phone, $email, $content){
		$sql = "INSERT INTO $this->_table(con_name, con_phone, con_email, con_content) VALUES('$name','$phone','$email','$content')";
		$this->query($sql);
	}
}
?>