<?php 
class orders extends database{
	protected $_table = "tbl_orders";
	public function showNewoderName($start,$limit){// lay tat ca nhung username co don hang moi
      $sql="select distinct $this->_table.order_name,$this->_table.order_notice, $this->_table.order_date,tbl_users.user_name,tbl_users.user_id
	  from $this->_table inner join tbl_products 
	 	 on $this->_table.pro_id=tbl_products.pro_id 
	  inner join tbl_users
	  	 on $this->_table.user_id=tbl_users.user_id
	  where $this->_table.order_status=0 limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
    public function showNewoderRow(){// lay so record user co don hang moi
      $sql="select distinct $this->_table.order_name,$this->_table.order_notice, $this->_table.order_date,tbl_users.user_name,tbl_users.user_id	
	  from $this->_table inner join tbl_products 
	 	 on $this->_table.pro_id=tbl_products.pro_id 
	  inner join tbl_users
	  	 on $this->_table.user_id=tbl_users.user_id
	  where $this->_table.order_status=0 ";
       $this->query($sql);
       return $this->numRows();
   }
   
     public function showNeworder($id,$p,$start,$limit){// lấy ra các order moi
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_users on tbl_users.user_id=$this->_table.user_id where tbl_users.user_id=$id and $this->_table.order_status=0 and $this->_table.order_notice=$p limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function showNeworderRow($id,$p){// lấy ra số record của order mới
	    $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_users on tbl_users.user_id=$this->_table.user_id where tbl_users.user_id=$id and $this->_table.order_status=0 and $this->_table.order_notice=$p";
       $this->query($sql);
       return $this->numRows();
   }
   
   
   public function showOldoderName($start,$limit){// lay tat ca nhung username co don hang moi
      $sql="select distinct $this->_table.order_name,$this->_table.order_notice,$this->_table.order_date,tbl_users.user_name,tbl_users.user_id
	  from $this->_table inner join tbl_products 
	 	 on $this->_table.pro_id=tbl_products.pro_id 
	  inner join tbl_users
	  	 on $this->_table.user_id=tbl_users.user_id  limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
      public function showOldoderRow(){// lay so record user co don hang moi
      $sql="select distinct $this->_table.order_name,$this->_table.order_notice,$this->_table.order_date,tbl_users.user_name,tbl_users.user_id
	  from $this->_table inner join tbl_products 
	 	 on $this->_table.pro_id=tbl_products.pro_id 
	  inner join tbl_users
	  	 on $this->_table.user_id=tbl_users.user_id";
       $this->query($sql);
       return $this->numRows();
   }
    public function showOldorder($id,$p,$start,$limit){// lấy ra các order moi
	   $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_users on tbl_users.user_id=$this->_table.user_id where tbl_users.user_id=$id and $this->_table.order_notice=$p limit $start,$limit";
       $this->query($sql);
       return $this->fetchAll();
   }
    public function showOldorderRow($id,$p){// lấy ra số record của order mới
	    $sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_users on tbl_users.user_id=$this->_table.user_id where tbl_users.user_id=$id and $this->_table.order_notice=$p";
       $this->query($sql);
       return $this->numRows();
   }
   public function sales($id,$date){// kiem tra san pham co khuyen mai khong
	   $sql="select *from $this->_table inner join tbl_sales on $this->_table.pro_id=tbl_sales.pro_id where tbl_sales.pro_id=$id and sale_start<'$date' and '$date'< sale_end";
	   $this->query($sql);
	   return $this->fetch();
	}
	public function tongtien($id,$p){// tinh tong 1 don hang
		$sql="select * from $this->_table inner join tbl_products on $this->_table.pro_id=tbl_products.pro_id inner join tbl_users on tbl_users.user_id=$this->_table.user_id where tbl_users.user_id=$id and $this->_table.order_notice=$p";
		$this->query($sql);
		$data=array();
		$m=array();
		$tong="";
		$data=$this->fetchAll();
		foreach ($data as $item){
			$m=$this->sales($item['pro_id'],$item['order_date']);
			if($m!=NULL)
				$tong=$tong+$item['pro_price']*$item['order_number']*(100-$m['sale_percent'])/100;
			else $tong=$tong+$item['pro_price']*$item['order_number'];
		}
		return $tong;
	}
	public function thongketien($datestart,$dateend){// tinh tong nhiều don hang
		$sql="select distinct order_name,order_notice,user_id from $this->_table where '$datestart' < order_date and order_date < '$dateend' limit 0,10";
		$this->query($sql);
		$data=array();
		$m=array();
		$tong="";
		$data=$this->fetchAll();
		foreach ($data as $item){
			$tong=$tong+ $this->tongtien($item['user_id'],$item['order_notice']);
		}
		return $tong;
	}
	public function updateNum($id,$num){
		$sql="update tbl_products set pro_number=$num where pro_id=$id";
		$this->query($sql);
	}
	public function showProduct($id,$p){
		$sql="select *from tbl_products inner join tbl_orders on tbl_products.pro_id=tbl_orders.pro_id where $this->_table.order_notice=$p and $this->_table.user_id=$id";
		$this->query($sql);
		echo $sql;
		$data=array();
		$data= $this->fetchAll();
		foreach($data as $item){
			$num=$item['pro_number']-$item['order_number'];
			$this->updateNum($item['pro_id'],$num);
		}
	}
	  
	 public function updateHot($id,$p){// duyet cac comment moi thanh comment cu
		 $sql="UPDATE $this->_table SET order_status='1' Where user_id=$id and order_notice=$p";
	   $this->query($sql);   
   }  
    public function search($lo,$suser,$sms,$sdate,$start,$limit){// tim kiem san pham co comments
			$sql="select distinct $this->_table.order_name,$this->_table.order_notice,$this->_table.order_date,tbl_users.user_name,tbl_users.user_id from $this->_table inner join tbl_users on $this->_table.user_id=tbl_users.user_id WHERE ";
			$and=" AND";
			$user=" user_name like '%$suser%'";
			$date=" order_date like '%$sdate%'";
			$ms="order_name like'%$sms%'";
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($sdate!=NULL){
				$sql=$sql.$date.$and;
			}
			if($sms!=NULL){
				$sql=$sql.$ms.$and;	
			}
		if($lo=="new")
			$sql=$sql." $this->_table.order_status=0 limit $start,$limit";
		else {
			$sql=rtrim($sql,$and);
			$sql=$sql." limit $start,$limit";
		}
		$this->query($sql);
		return $this->fetchAll();   
	}
	public function searchRow($lo,$suser,$sms,$sdate){// tim kiem san pham co comments
			$sql="select distinct $this->_table.order_name,$this->_table.order_notice,$this->_table.order_date,tbl_users.user_name,tbl_users.user_id from $this->_table inner join tbl_users on $this->_table.user_id=tbl_users.user_id WHERE ";
			$and=" AND";
			$user=" user_name like '%$suser%'";
			$date=" order_date like '%$sdate%'";
			$ms="order_name like'%$sms%'";
			if($suser!=NULL){
				$sql=$sql.$user.$and;
			}
			if($sdate!=NULL){
				$sql=$sql.$date.$and;
			}
			if($sms!=NULL){
				$sql=$sql.$ms.$and;	
			}
			if($lo=="new")
				$sql=$sql." $this->_table.order_status=0";
			else {
				$sql=rtrim($sql,$and);
			}
			$this->query($sql);
			return $this->numRows();   
	}
	 public function delete($id){//xoa 1 order
    $sql= "DELETE FROM $this->_table WHERE order_id=$id";							  
	 $this->query($sql);
   }
   public function orderNum($id){// tong so don hang cua 1 nguoi
	   $sql="select distinct $this->_table.order_notice
	  from $this->_table where $this->_table.user_id=$id";
	  $this->query($sql);
	  return $this->numRows();
	}
	public function statisOrder($datestart,$dateend){//tìm số order trong khoang time
		$sql="select distinct $this->_table.order_name from $this->_table where '$datestart 00:00:00' and '$dateend 23:59:59'";
		$this->query($sql);
		return $this->numRows();
	}
	public function delorder($id,$p){// xoa 1 order
		$sql= "DELETE FROM $this->_table WHERE user_id=$id AND order_notice=$p";
		$this->query($sql);
	}
}