<?php
class comments extends database{
   protected $_table = "tbl_comments";
   public function insert(){// them 1 record vao bang user
       
   }
   public function update($id){//update thong tin 1 record
       
   }
   public function delete($id){//xoa 1 comment
    $sql= "DELETE FROM $this->_table WHERE cmt_id=$id";							  
	 $this->query($sql);
   }
   public function showAllOnepro($start,$limit){// lay tat ca cac record cua comments
      $sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
    public function showAllRow(){
		$sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id";
       $this->query($sql);
       return $this->numRows();
   }
   public function showPro($id){// Lay 1 ban ghi 
       $sql="select distinct tbl_products.pro_name,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.pro_id=$id";
	   $this->query($sql);
	   return $this->fetch();
   }
    public function showPronewOnepro($start,$limit){// lấy ra các pro_name có comments mới
	   $sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.cmt_hot=1 limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
 /*  public function showPronew($start,$limit){// lấy ra các comments mới
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.cmt_hot=1 limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }*/
    public function showPronewRow(){// lấy số các comments mới
	   $sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.cmt_hot=1";
       $this->query($sql);
       return $this->numRows();
   }
     public function showOldcmt($id,$start,$limit){// lấy ra tất cả comments
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.pro_id=$id order by $this->_table.cmt_date desc limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
   
   public function showOldcmtRow($id){// lấy ra các comments mới
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.pro_id=$id";
       $this->query($sql);
       return $this->numRows();
   }
   
   public function showNewcmt($id,$start,$limit){// lấy ra các comments mới
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.pro_id=$id and $this->_table.cmt_hot=1 limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function showNewcmtRow($id){// lấy ra các comments mới
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id where $this->_table.pro_id=$id and $this->_table.cmt_hot=1";
       $this->query($sql);
       return $this->numRows();
   }
   public function updateHot($id){// duyet cac comment moi thanh comment cu
		 $sql="UPDATE $this->_table SET cmt_hot='2' Where pro_id=$id";
	   $this->query($sql);   
   }
   public function searchp($lo,$spro,$scate,$start,$limit){// tim kiem san pham co comments
			$sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id WHERE ";
			$and=" AND";
			$pro=" pro_name like '%$spro%'";
			$cate=" cate_name like '%$scate%'";
			if($spro!=NULL){
				$sql=$sql.$pro.$and;
			}
			if($scate!=NULL){
				$sql=$sql.$cate.$and;
			}
		if($lo=="new")
			$sql=$sql." $this->_table.cmt_hot=1 limit $start,$limit";
		else {
			$sql=rtrim($sql,$and);
			$sql=$sql." limit $start,$limit";
		}
		$this->query($sql);
		return $this->fetchAll();   
	}
	 public function searchpNum($lo,$spro,$scate){// so record tim kiem san pham co comments
			$sql="select distinct tbl_products.pro_name,tbl_products.pro_id,tbl_categories.cate_name from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id WHERE ";
			$and=" AND";
			$pro=" pro_name like '%$spro%'";
			$cate=" cate_name like '%$scate%'";
			if($spro!=NULL){
				$sql=$sql.$pro.$and;
			}
			if($scate!=NULL){
				$sql=$sql.$cate.$and;
			}
		if($lo=="new")
			$sql=$sql." $this->_table.cmt_hot=1";
		else {
			$sql=rtrim($sql,$and);
		}
		$this->query($sql);  
		return $this->numRows();   
	}
	  public function searchcmt($lo,$id,$suser,$scmt,$svote,$sdate,$start,$limit){// tim kiem comments
			$sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id WHERE ";
			$and=" AND";
			$user=" cmt_name like '%$suser%'";
			$cmt=" cmt_content like '%$scmt%'";
			$vote=" cmt_vote like '%$svote%'";
			$date=" cmt_date like '%$sdate%'";
			
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($scmt!=NULL){
				$sql=$sql.$cmt.$and;
			}
			if($sdate!=NULL){
				$sql=$sql.$date.$and;
			}
			if($svote!=NULL&&$svote!=0){
				$sql=$sql.$vote.$and;
			}
			if($lo=="new")
				$sql=$sql." $this->_table.pro_id=$id and $this->_table.cmt_hot=1 limit $start,$limit";
			else $sql=$sql." $this->_table.pro_id=$id limit $start,$limit";
		$this->query($sql);
		return $this->fetchAll();   
	}
	  public function searchcmtNum($lo,$id,$suser,$scmt,$svote,$sdate){// tim kiem comments
			$sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_categories on tbl_products.cate_id=tbl_categories.cate_id WHERE  ";
			$and=" AND";
			$user=" cmt_name like '%$suser%'";
			$cmt=" cmt_content like '%$scmt%'";
			$vote=" cmt_vote like '%$svote%'";
			$date=" cmt_date like '%$sdate%'";
			
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($scmt!=NULL){
				$sql=$sql.$cmt.$and;
			}
			if($sdate!=NULL){
				$sql=$sql.$date.$and;
			}
			if($svote!=NULL&&$svote!=0){
				$sql=$sql.$vote.$and;
			}
			if($lo=="new")
				$sql=$sql." $this->_table.pro_id=$id and $this->_table.cmt_hot=1";
			else $sql=$sql." $this->_table.pro_id=$id";
		$this->query($sql);
		return $this->numRows();   
	}
}