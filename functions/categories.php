<?php

class categories extends database{
   
   protected $_table = "tbl_categories";
   protected $_product="tbl_products";
   protected $_sale="tbl_sales";
   protected $_comment="tbl_comments";
   	
   public function insert(){// them 1 record vao bang user
       
   }
   public function update($id){//update thong tin 1 record
       
   }
   public function delete(){//xoa 1 user 
       
   }
   public function showAll(){// lay tat ca cac record cua user
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchall();
   }
   public function getAll(){// lay tat ca cac record cua categories
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function getOne($id){// Lay 1 ban ghi 
      	$sql = "select * from $this->_table 
		where cate_id = '$id'" 	;
		$this->query($sql);
		return $this->fetch(); 
   }
 
	public function listProduct($cateid,$start,$limit){
		$sql = "select * from $this->_product where cate_id = '$cateid' limit $start,$limit" ;
		$this->query($sql);
		return $this->fetchAll();
	}
	public function getPro($pid){
		mysql_query("SET NAMES 'UTF8'");
		$sql = "select * from $this->_product inner join tbl_categories on tbl_categories.cate_id = tbl_products.cate_id where pro_id = '$pid'
				";
		$this->query($sql);
		return $this->fetch();
		
	}
	public function related($cateid,$id,$limit){
		$sql = "select * from $this->_product where cate_id = '$cateid' and pro_id != '$id' limit $limit" ;
		$this->query($sql);
		return $this->fetchAll();
	}
	public function comment($content,$date,$pid,$name,$vote,$hot)
	{  
		$sql = "insert into $this->_comment(cmt_content,cmt_date,pro_id,cmt_name,cmt_vote,cmt_hot)
values('$content','$date','$pid','$name','$vote','$hot')";
	
		$this->query($sql);
	}
	public function totalRecord($id)
	{
		$sql = "select * from $this->_product where cate_id='$id'";
		$this->query($sql);
		return $this->numRows();
	
	}
}
?>
