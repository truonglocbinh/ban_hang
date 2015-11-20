<?php
class products extends database{
    protected $_table = "tbl_products";
	protected $_sale="tbl_sales";
	protected $_comment="tbl_comments";
	protected $_categories="tbl_categories";
        
    public function getCate($cid){// Lay 1 ban ghi 
      	$sql = "select * from $this->_categories 
		where cate_id = '$cid'" 	;
		$this->query($sql);
		return $this->fetch(); 
   }
    public function getOne($pid){// Lay 1 ban ghi 
      	$sql = "select * from $this->_table
		where pro_id = '$pid'" 	;
		$this->query($sql);
		return $this->fetch(); 
   }
  public function showAll(){// lay tat ca cac record cua products
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   		public function getSale(){
		mysql_query("SET NAMES 'UTF8'");
		$sql = "select * from $this->_table inner join tbl_sales on tbl_sales.pro_id = tbl_products.pro_id" ;
		$this->query($sql);
		return $this->fetchAll();
		
	}   
		public function getView($pid,$start,$limit){
		mysql_query("SET NAMES 'UTF8'");
		$sql = "select * from $this->_comment where tbl_comments.pro_id='$pid' ORDER BY tbl_comments.cmt_date DESC limit $start,$limit ";
		$this->query($sql);
		return $this->fetchAll();
		
	}
	   public function numCom($pid)
	   {
		  $sql="select * from $this->_comment where tbl_comments.pro_id='$pid'";
		  $this->query($sql);
		  return $this->numRows();
	   }
		public function getSp($pid){
		mysql_query("SET NAMES 'UTF8'");
		$sql = "select * from $this->_table inner join tbl_sales on tbl_sales.pro_id = tbl_products.pro_id where tbl_products.pro_id='$pid'" ;
		$this->query($sql);
		return $this->fetch();
	}
   public function productHot($limit){ // đứa ra số lượng sản phẩm hot
		$sql = "select * from $this->_table where pro_hot = '1' limit $limit";
		$this->query($sql);
		return $this->fetchAll();
		
   }
   public function productNew($limit){ // đứa ra số lượng sản phẩm hot
		$sql = "select * from $this->_table where pro_new = '1' limit $limit";
		$this->query($sql);
		return $this->fetchAll();
		
		
   }
   public function findKey($keyword,$start,$limit){ // tìm theo từ khóa
		$sql = "select * from $this->_table where pro_name like '%$keyword%' limit $start,$limit";
		$this->query($sql);
		return $this->fetchAll();
	}
	 public function numKey($keyword){ // tìm theo từ khóa
		$sql = "select * from $this->_table where pro_name like '%$keyword%'";
		$this->query($sql);
		return $this->numRows();
	}
	public function findall($type,$price,$start,$limit){// tìm kiến nhanh
		switch($price){
			case 1 : $periods = "pro_price < 5000"; break;
			case 2 : $periods = "pro_price between 5000 and 20000"; break;
			case 3 : $periods = "pro_price between 20000 and 50000"; break;
			case 4 : $periods = "pro_price between 50000 and 100000"; break;
			case 5 : $periods = "pro_price between 100000 and 500000"; break;
			case 6 : $periods = "pro_price > 500000"; break;
			default : $periods = "pro_price > 0"; break;
		}
		if($type == 0){
			$sql = "select * from $this->_table where $periods limit $start,$limit";	
		}elseif($price == 0){
			$sql = "select * from $this->_table where cate_id = '$type' limit $start,$limit";	
		}else{
			$sql = "select * from $this->_table where $periods and cate_id = '$type' limit $start,$limit";
		}
		$this->query($sql);
		return $this->fetchAll();
	}
	public function numAll($type,$price){// tìm kiến nhanh
		switch($price){
			case 1 : $periods = "pro_price < 5000"; break;
			case 2 : $periods = "pro_price between 5000 and 20000"; break;
			case 3 : $periods = "pro_price between 20000 and 50000"; break;
			case 4 : $periods = "pro_price between 50000 and 100000"; break;
			case 5 : $periods = "pro_price between 100000 and 500000"; break;
			case 6 : $periods = "pro_price > 500000"; break;
			default : $periods = "pro_price > 0"; break;
		}
		if($type == 0){
			$sql = "select * from $this->_table where $periods ";	
		}elseif($price == 0){
			$sql = "select * from $this->_table where cate_id = '$type' ";	
		}else{
			$sql = "select * from $this->_table where $periods and cate_id = '$type' ";
		}
		$this->query($sql);
		return $this->numRows();
	}
}