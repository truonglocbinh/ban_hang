<?php
class intro extends database{
   protected $_table = "tbl_intro";
   public function insert($value){// them 1 record vao bang user
       $sql="INSERT INTO $this->_table(intro_content) "
               . "VALUES('$value')";
       return mysql_query($sql);
   }
   public function update($id,$value){//update thong tin 1 record
       $sql="UPDATE $this->_table SET intro_content='$value' WHERE intro_id=$id ";
       return mysql_query($sql);
   }
   public function delete($id){//xoa 1 user 
       $sql="DELETE FROM $this->_table WHERE intro_id=$id";
       return mysql_query($sql);
   }
   public function showAll(){// lay tat ca cac record cua user
        $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function getRecord(){
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->numRows();
   }
   public function showOne($id){// Lay 1 ban ghi 
       $sql="SELECT * FROM $this->_table WHERE intro_id=$id";
       $this->query($sql);
       return $this->fetch();
   }
     public function page($vitri){
       $sql="SELECT * FROM $this->_table LIMIT $vitri,5";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function search($id){
       $sql="SELECT * FROM $this->_table WHERE intro_id='$id'";
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