<?php
class customers extends database{
    protected $_table="tbl_customers";
    public function showAll(){
        $sql="SELECT * FROM $this->_table ";
        $this->query($sql);
        return $this->fetchAll();
    }
    public function showOne($id){
        $sql="SELECT * FROM $this->_table WHERE cus_id=$id";
        $this->query($sql);
        return $this->fetch();
    }
    public function insert($cus_content){
        $sql="INSERT INTO $this->_table(cus_content) VALUES('$cus_content')";
        return mysql_query($sql);
    }
    public function update($id,$cus_content){
        $sql="UPDATE $this->_table SET cus_content='$cus_content' WHERE cus_id=$id";
        return mysql_query($sql);
    }
    public function delete($id){
        $sql="DELETE FROM $this->_table WHERE cus_id=$id";
        return mysql_query($sql);       
    }
     public function getRecord(){// tra ve so record
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->numRows();
   }
      public function page($vitri){// dung de phan trang 
       $sql="SELECT * FROM $this->_table LIMIT $vitri,7";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function search($id){
       $sql="SELECT * FROM $this->_table WHERE cus_id='$id'";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function  getTotal(){
    $sql="SELECT * FROM $this->_table";
    $this->query($sql);
    $data=  $this->fetchAll();
    if(empty($data)){
        return 0;
    }else{
       $total=0;
       foreach ($data as $value){
           $total=$total +1;
       }
       return $total;
    }        
}
  public function deleteAll(){
     $sql="DELETE FROM $this->_table";
     return mysql_query($sql);
}
}