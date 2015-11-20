<?php
class user extends database{
   protected $_table = "tbl_users";
   public function insert($name,$pass,$fullname,$gender,$phone,$email,$level){// them 1 record vao bang user
       $sql="INSERT INTO $this->_table(user_name,user_pass,user_fullname,user_gender,user_phone,user_email,user_level)
								VALUES('$name','$pass','$fullname','$gender','$phone','$email','$level')";
		$this->query($sql);
   }
   public function update($id,$user,$pass,$fullname,$gender,$phone,$email,$level){//update thong tin 1 record
    	$sql="UPDATE $this->_table SET 
			user_name='$user',
			user_pass='$pass',
			user_fullname='$fullname',
			user_gender=$gender,
			user_phone='$phone',
			user_email='$email',
			user_level='$level'
			WHERE user_id=$id
			";
		$this->query($sql);	
   }
   public function updateOne($col,$data,$id){// update thong tin 1 cot trong 1 record
	   $sql="UPDATE $this->_table SET $col='$data' Where user_id=$id";
	   $this->query($sql);
	}
   public function delete($id){//xoa 1 user 
    $sql= "DELETE FROM $this->_table WHERE user_id=$id";							  
	 $this->query($sql);
   }
   public function showList($start,$limit){// lay tat ca cac record cua user co phan trang
       $sql="select * from $this->_table limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function showAll(){   //lay ra tat ca cac user
		$sql="select * from $this->_table";
       $this->query($sql);
       return $this->fetchAll(); 
	}
   public function showOne($id){// Lay 1 ban ghi 
       $sql="SELECT *FROM $this->_table WHERE user_id=$id";
	   $this->query($sql);
	   return $this->fetch();
   }
	public function numRow(){// lay ra so record user
		$sql="select * from $this->_table";
       $this->query($sql);
       return $this->numRows(); 
	}
	
	public function checkLogin($user,$pass){// kiem tra user khi dang nhap
		$sql="SELECT *FROM $this->_table WHERE user_name='$user' and user_pass='$pass'";
		$this->query($sql);	
		return $this->fetch();
	}
	public function checkCol($id,$col,$data){//check update với username và email
		$sql="SELECT *FROM $this->_table WHERE $col='$data' AND user_id!=$id";
		$this->query($sql);	
		if($this->numRows())
			return 1;
		else return 0;
	}
	 public function search($suser,$sname,$sgender,$sphone,$semail,$slevel,$start,$limit){// tim kiem voi 1 truong
			$sql="SELECT *FROM $this->_table WHERE ";
			$and=" AND";
			$user=" user_name like '%$suser%'";
			$name=" user_fullname like '%$sname%'";
			$gender=" user_gender like '%$sgender%'";
			$phone=" user_phone like '%$sphone%'";
			$email=" user_email like '%$semail%'";
			$level=" user_level like '%$slevel%'";	
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($sname!=NULL){
				$sql=$sql.$name.$and;
			}
			if($sgender!=NULL&&$sgender!=0){
				$sql=$sql.$gender.$and;
			}
			if($sphone!=NULL){
				$sql=$sql.$phone.$and;
			}
			if($semail!=NULL){
				$sql=$sql.$email.$and;
			}
			if($slevel!=NULL&&$slevel!=0){
				$sql=$sql.$level.$and;
			}
			$sql=rtrim($sql,$and);
			$sql=$sql." limit $start,$limit";
		$this->query($sql);
		return $this->fetchAll();   
	}
	 public function numRowSearch($suser,$sname,$sgender,$sphone,$semail,$slevel){// lay ra so numrow tim kiem voi 1 truong
			$sql="SELECT *FROM $this->_table WHERE ";
			$and=" AND";
			$user=" user_name like '%$suser%'";
			$name=" user_fullname like '%$sname%'";
			$gender=" user_gender like '%$sgender%'";
			$phone=" user_phone like '%$sphone%'";
			$email=" user_email like '%$semail%'";
			$level=" user_level like '%$slevel%'";
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($sname!=NULL){
				$sql=$sql.$name.$and;
			}
			if($sgender!=NULL&&$sgender!=0){
				$sql=$sql.$gender.$and;
			}
			if($sphone!=NULL){
				$sql=$sql.$phone.$and;
			}
			if($semail!=NULL){
				$sql=$sql.$email.$and;
			}
			if($slevel!=NULL&&$slevel!=0){
				$sql=$sql.$level.$and;
			}
			$sql=rtrim($sql,$and);
		$this->query($sql);
		//echo $this->numRows();
		return $this->numRows();   
	} 

}
