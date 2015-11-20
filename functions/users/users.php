<?php 
class users extends database{
	protected $_table = "tbl_users";
	public function checkLogin($user,$pass){
		$sql="select * from tbl_users where user_name='$user' and user_pass='$pass'";
		$this->query($sql);
		if($this->numRows()>0){
			return $this->fetch();
		}else{
			return FALSE;
		}
	}
	public function checkUser($field,$val,$id=""){
		if($id!=""){
			$sql= "select * from $this->_table where $field='$val' and user_id!='$id'";
		}else{
			$sql= "select * from $this->_table where $field='$val'";
		}
		$this->query($sql);
		if($this->numRows()>0){//exists
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getData($id){
		$sql="select * from $this->_table where user_id='$id'";
		$this->query($sql);
		return $this->fetch();
	}
	public function listUser($start,$limit){
		$sql="select * from $this->_table limit $start,$limit";
		$this->query($sql);
		return $this->fetchAll();
	}
	public function add($name,$pass,$fullname,$gender,$phone,$email,$level="2"){
		$sql="insert into $this->_table(user_name, user_pass, user_fullname, user_gender, user_phone, user_email, user_level) values('$name','$pass','$fullname','$gender','$phone','$email','$level')";
		$this->query($sql);
	}
	public function edit($name,$pass,$fullname,$gender,$email,$phone,$level,$id){
		if($pass!=NULL){//password fix
			$sql="update $this->_table set user_name='$name', user_pass='$pass', user_fullname='$fullname', user_gender='$gender', user_email='$email', user_phone='$phone', user_level='$level' where user_id='$id'";
		}else{
			$sql = "update $this->_table set user_name='$name',user_fullname='$fullname',user_gender='$gender',user_email='$email',user_phone='$phone',user_level='$level' where user_id = '$id'";
		}
		$this->query($sql);
	}
	public function del($id){
		$sql="delete from $this->_table where user_id='$id'";
		$this->query($sql);
	}
	public function totalRecord(){
		$sql="select * from $this->_table";
		$this->query($sql);
		return $this->numRows();
	}
}
?>