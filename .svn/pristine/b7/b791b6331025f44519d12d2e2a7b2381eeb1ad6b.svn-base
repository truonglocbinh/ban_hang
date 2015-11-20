<?php
class sales extends database{
    protected $_table="tbl_sales";
    function showAll(){
        $sql="SELECT * FROM $this->_table";
        $this->query($sql);
        return $this->fetchAll();
    }
    function insert($pro_id,$sale_percent,$sale_price,$sale_start,$sale_end,$sale_notice){
        $sql="INSERT INTO $this->_table"
                . "(pro_id,sale_percent,sale_price,sale_start,sale_end,sale_notice)"
                . "VALUES('$pro_id',"                
                . "'$sale_percent',"
                . "'$sale_price',"
                . "'$sale_start',"
                . "'$sale_end',"
                . "'$sale_notice'"
                . ")";
        return mysql_query($sql);
    }
    function update($id,$pro_id,$sale_percent,$sale_price,$sale_start,$sale_end,$sale_notice){
       $sql="UPDATE $this->_table SET "
               . "pro_id='$pro_id',"               
               . "sale_percent='$sale_percent',"
               . "sale_price='$sale_price',"
               . "sale_start='$sale_start',"
               . "sale_end='$sale_end',"
               . "sale_notice='$sale_notice' "
               . "WHERE sale_id=$id"; 
       return mysql_query($sql);
    }
    public function showOne($id){
        $sql="SELECT * FROM $this->_table WHERE sale_id=$id";
        $this->query($sql);
        return $this->fetch();
    }
      public function getRecordNumber(){// ham tra ve so luong cac record trong news table
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->numRows();
   }
    function delete($id){
        $sql="DELETE FROM $this->_table WHERE sale_id=$id";
        return   mysql_query($sql);
    }
      public function page($vitri){
       $sql="SELECT * FROM $this->_table LIMIT $vitri,10";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function isExist($pro_id){
       $sql="SELECT * FROM $this->_table WHERE pro_id=$pro_id";       
       $this->query($sql);
       $data=  $this->fetchAll();
       if(!empty($data)){
           return TRUE;
       }else return FALSE;
   }
   public function search($id,$name,$price,$phantram,$date_start,$date_end,$searchtype,$vitri){
    $data=array(
      ",sale_id=,"=>"'$id'",
      ",pro_id=,"=>"'$name'",
      ",sale_percent=,"=>"'$phantram'",
      ",sale_price=,"=>"'$price'",
      ",sale_start=,"=>"'$date_start'",
      ",sale_end=,"=>"'$date_end'"
    );
$sql="SELECT,*,FROM,$this->_table,WHERE,";
$t="";
$keysql="AND";
if($searchtype == 0) {
    $keysql="OR";
}
foreach ($data as $key => $value) {
    if(($value !="''")&&($value !="'0'")){
        $t=$key;
        $sql=$sql.$key.$value.",".$keysql;
         break;
    }   
}
foreach ($data as $key => $value) {
    if(($value !="''")&&($value !="'0'")){
        if($key == $t){
        continue;}
        else{
            $sql=$sql=$sql.$key.$value.",".$keysql;
        }
    }
}
$string=trim($sql);
$data1=explode(",",$string);
$j=  count($data1);
   if($data1[$j-1]==$keysql){
       unset($data1[$j-1]);
   }

$string= implode(" ",$data1);
$this->query($string);
$array1=  $this->fetchAll();
$string=$string." LIMIT $vitri,10";
$this->query($string);
$array=array();
$array= $this->fetchAll();
if(empty($array)){
    $mang=array("",0);
    return $mang;
}else{
    $total=  count($array1);
    $mang=array($array,$total);
    return $mang;
}
}
 function getData($array,$vitri){
    $j=count($array)-1;
    $data=array();
    for($i=$vitri;$i<($vitri+7);$i++){
        $data[]=$array[$i];
        if($i==$j)break;       
    }
    return $data;    
}
    public function getTotalpro(){
        $sql="SELECT * FROM $this->_table a,tbl_products b WHERE a.pro_id= b.pro_id ";
        $this->query($sql);
        $data=  $this->fetchAll();
        $total=0;
        foreach ($data as $value){
            $total=$total+$value['pro_number'];
        }
        return $total;
    }
    public function deleteAll(){
     $sql="DELETE FROM $this->_table";
     return mysql_query($sql);
}
}
