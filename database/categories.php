<?php
class categories extends database{
   protected $_table = "tbl_categories";
   public function insert($cate_name,$cate_infor,$cate_status){// them 1 record vao bang user
       $sql="INSERT INTO $this->_table (cate_name,cate_info,cate_status)VALUES"
               . "('$cate_name','$cate_infor','$cate_status')";
       return mysql_query($sql);     
   }
   public function update($id,$cate_name,$cate_infor,$cate_status){//update thong tin 1 record
       $sql="UPDATE $this->_table SET cate_name='$cate_name',"
               . "cate_info='$cate_infor',cate_status='$cate_status' WHERE cate_id="
               . "'$id'" ;
       return mysql_query($sql);    
   }
   public function delete($id){//xoa 1 user
       $sql="DELETE FROM $this->_table WHERE cate_id='$id'";
       return mysql_query($sql);      
   }
   public function showAll(){// lay tat ca cac record cua user
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function showOne($id){// Lay 1 ban ghi 
       $sql="SELECT * FROM $this->_table WHERE cate_id='$id' ";
       $this->query($sql);
       return $this->fetch();
   }
   public  function isExistName($name){
        $sql="SELECT * FROM $this->_table WHERE cate_name='$name'";
        $this->query($sql);
        $data=  $this->fetch();
        return $data ;
   }
   public function getRecord(){
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->numRows();
   }
      public function page($vitri){//
       $sql="SELECT * FROM $this->_table LIMIT $vitri,10";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function search($id,$name){
       $sql="SELECT * FROM $this->_table WHERE cate_id='$id' OR cate_name='$name'";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function getName($id){
       $sql="SELECT * FROM $this->_table WHERE cate_id=$id";
       $this->query($sql);
       $data=  $this->fetch();
       if($data!=null)
       return $data['cate_name'];
       else return "Không rõ";
   }
   function getData($array,$vitri){
    $j=count($array)-1;
    $data=array();
    for($i=$vitri;$i<($vitri+2);$i++){
        $data[]=$array[$i];
        if($i==$j)break;       
    }
    return $data;
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