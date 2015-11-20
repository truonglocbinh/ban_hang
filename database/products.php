<?php
class products extends database{
    protected $_table = "tbl_products";
    public function insert($pro_name,$pro_price,
    $pro_info,$pro_full,$pro_image,$pro_number,$pro_import,$pro_cateId,$pro_hot,$pro_new){// them 1 record vao bang user
       $sql="INSERT INTO $this->_table(pro_name,pro_price,pro_info,pro_full,pro_image,pro_number,pro_import,cate_id,"
               . "pro_hot,pro_new"
               . ")VALUES('$pro_name','$pro_price','$pro_info','$pro_full','$pro_image',"
               . "'$pro_number','$pro_import','$pro_cateId','$pro_hot','$pro_new')";
       return mysql_query($sql);
   }
   public function update($id,$pro_name,$pro_price,
    $pro_info,$pro_full,$pro_image,$pro_number,$pro_import,$pro_cateId,$pro_hot,$pro_new){//update thong tin 1 record
       $dulieu=$this->showOne($id);
       $old_image=$dulieu['pro_image'];
       
       if($pro_image == ""){
           $sql="UPDATE $this->_table SET "
               . "pro_name='$pro_name',"
               . "pro_price='$pro_price',"
               . "pro_info='$pro_info',"
               . "pro_full='$pro_full',"
               . "pro_number='$pro_number',"
               . "pro_import='$pro_import',"
               . "cate_id=$pro_cateId, "
               . "pro_hot=$pro_hot,"
               . "pro_new='$pro_new'"
               . "WHERE pro_id=$id";
           return mysql_query($sql);
           
           }  else {
           if(unlink("../images/products/".$old_image)){
              $x=1;
           }else{
               $x=0;
           }
           $sql="UPDATE $this->_table SET "
               . "pro_name='$pro_name',"
               . "pro_price='$pro_price',"
               . "pro_info='$pro_info',"
               . "pro_full='$pro_full',"
               . "pro_image='$pro_image',"
               . "pro_number='$pro_number',"
               . "pro_import='$pro_import',"
               . "cate_id=$pro_cateId,"  
               . "pro_hot=$pro_hot,"
               . "pro_new='$pro_new' "
               . "WHERE pro_id=$id;";
           return mysql_query($sql);              
     }       
   }
   public function delete($id){//xoa 1 san pham 
       $sql1="SELECT * FROM $this->_table WHERE pro_id=$id";
       $this->query($sql1);
       $data=  $this->fetch();
   if( unlink("../../../images/products/".$data['pro_image'])){
       $sql="DELETE FROM $this->_table WHERE pro_id=$id";
       return mysql_query($sql);
   }else{
       $sql="DELETE FROM $this->_table WHERE pro_id=$id";
       return mysql_query($sql);
   }
   }
   public function showAll(){// lay tat ca cac record cua user
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function number_Record(){
       $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->numRows();
   }
   public function showOne($id){// Lay 1 ban ghi 
       $sql="SELECT * FROM $this->_table WHERE pro_id=$id";
       $this->query($sql);
       return $this->fetch();
   }
   public function page($vitri){
       $sql="SELECT * FROM $this->_table LIMIT $vitri,10";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function isExist($id){
       $sql="SELECT * FROM $this->_table WHERE pro_id=$id";
       $this->query($sql);
       return $this->fetch();
   }
public function getName($id){
    $sql="SELECT * FROM $this->_table WHERE pro_id=$id";
    $this->query($sql);
    $data=  $this->fetch();
    if($data!=null)return $data['pro_id']."-".$data['pro_name'];
else  return "Không rõ";
}
public function isImage($nameImage){
    if(file_exists("../images/products/".$nameImage)){
        return "../images/products/".$nameImage;
    }else{
        return "images/noimage.jpg";
    }
}
public function getId($name){
    $sql="SELECT * FROM $this->_table  WHERE pro_name='$name'";
    $this->query($sql);
    $data=  $this->fetch();
    return $data['pro_id'];
}
public function search($id,$name,$price,$number,$date,$type,$hot,$new,$searchtype){
    $data=array(",pro_id =,"=>"'$id'",",pro_name LIKE,"=>"'$name'",",pro_price=,"=>"'$price'",",pro_number=,"=>"'$number'",
      ",pro_import LIKE,"=>"'$date'",",cate_id=,"=>"'$type'",",pro_hot =,"=>"'$hot'",",pro_new =,"=>"'$new'"
    );
$sql="SELECT,*,FROM,tbl_products,WHERE,";
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
//echo $string;
$this->query($string);
return $this->fetchAll();
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
function  TotalProducts(){
    $sql="SELECT * FROM $this->_table";
    $this->query($sql);
    $data=  $this->fetchAll();
    if(empty($data)){
        return 0;
    }else{
       $total=0;
       foreach ($data as $value){
           $total=$total + $value['pro_number'];
       }
       return $total;
    }        
}
public function getTotalHot(){
  $sql="SELECT * FROM $this->_table WHERE pro_hot=1";
  $this->query($sql);
  $data=$this->fetchAll();
  if(empty($data)){
    return 0;
  }else{
    $total=0;
    foreach ($data as $value) {
      $total=$total+$value['pro_number'];
    }
    return $total;
  }
}
public function getTotalNew(){
  $sql="SELECT * FROM $this->_table WHERE pro_new=1";
  $this->query($sql);
  $data=$this->fetchAll();
  if(empty($data)){
    return 0;
  }else{
    $total=0;
    foreach ($data as $value) {
      $total=$total+$value['pro_number'];
    }
    return $total;
  }
}
public function getTotalCategory($category){
        $result=array();      
        foreach ($category as $value) {
          $name=$value['cate_id'];
          $cate_name=$value['cate_name'];
          $sql="SELECT * FROM $this->_table a WHERE a.cate_id=$name";
          $this->query($sql);
          $mang=$this->fetchAll();
          if(empty($mang)){
            $result[$cate_name]=0;
          }else{
            $total=0;
            foreach ($mang as $value) {
                $total=$total +$value['pro_number'];
            }
            $result[$cate_name]=$total;
          }
        }
        return $result;
}
public function getDatetime(){
      $sql="SELECT *  FROM $this->_table";
      $this->query($sql);
      $data=$this->fetchAll();
      $thoigian=array();
      foreach ($data as  $value) {
        $thoigian[]=$value['pro_import'];
      }
      return $thoigian;
}
public function getYear(){
      $sql="SELECT *  FROM $this->_table";
      $this->query($sql);
      $data=$this->fetchAll();
      $year=array();
      $total=count($data);
      for($i=0;$i<$total;$i++){
      if($i==0){
       $mang=  explode("-", $data[$i]['pro_import']);
       $year[]=$mang[0];
       continue;
    }
       $mang=  explode("-", $data[$i]['pro_import']);
       if(in_array($mang[0], $year)){
           continue;
       }else{
           $year[]=$mang[0];
       }
      
}
   return $year;
}
 public function getMonth($year){
  $data=$this->getDatetime();
  $total=count($data);
  $totalYear=count($year);
  $month=array();
  for($j=0;$j<$totalYear;$j++){
     foreach ($data as $value) {
         $mang=explode("-",$value);
         if ($mang[0] == $year[$j]) {
            $ym=$mang[0]."-".$mang[1];
            if(empty($month[$year[$j]])){
              $month[$year[$j]][]=$ym;
            }else{
              if(in_array($ym,$month[$year[$j]])){
               continue;
            }else{
               $month[$year[$j]][]=$ym;
            }
            }
            
         }
        
     }
  }
return $month;
 }
public function getProductsInYear($year){
    $sql="SELECT * FROM $this->_table WHERE pro_import LIKE '%$year%'";
    $this->query($sql);
    $data=$this->fetchAll();
    $total=0;
    foreach ($data as $value) {
      # code...
      $total=$total+$value['pro_number'];
    }
    return $total;
}
public function getProductsInMonth($month){
    $sql="SELECT * FROM $this->_table WHERE pro_import LIKE '%$month%'";
    $this->query($sql);
    $data=$this->fetchAll();
    $total=0;
    foreach ($data as $value) {
      $total=$total+$value['pro_number'];
    }
    return $total;
}
public function deleteAll(){
     //delete images
     $data=$this->showAll();
     $j=count($data);
     $i=0;
     foreach ($data as $value) {
         if($this->delete($value['pro_id'])){
                    $i++;
         }else{
          break;
         }
     }
     if($i==$j){
      return true;
     }else return false;
}
public function getInforYear($year,$cate){
  //tinh tong so tien cua nam
  $dulieu=array();
  $sql="SELECT * FROM $this->_table WHERE pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $totalproducts=0;
  $totalmoney=0;
  foreach ($data as $value) {
    # code...
    $totalproducts= $totalproducts + $value['pro_number'];
    $totalmoney= $totalmoney + $value['pro_number'] * $value['pro_price']; 
  }
  $dulieu['tongquan']['sanpham']=$totalproducts;
  $dulieu['tongquan']['money']=$totalmoney;
 foreach ($cate as  $value) {
   # code...
  $catename=$value['cate_name'];
  $cateid=$value['cate_id'];
  $sql="SELECT * FROM $this->_table WHERE pro_import like '%$year%' and cate_id=$cateid";
  $this->query($sql);
  $data=$this->fetchAll();
  $totalproducts=0;
  $totalmoney=0;
  foreach ($data as  $value) {
    # code...
    $totalproducts= $totalproducts + $value['pro_number'];
    $totalmoney= $totalmoney + $value['pro_number'] * $value['pro_price']; 
  }
  $dulieu['cate'][$catename]['sanpham']=$totalproducts;
  $dulieu['cate'][$catename]['money']=$totalmoney;
 }
 return $dulieu;
}
public function getInforMonth($year,$cate){
   $dulieu=array();
  $sql="SELECT * FROM $this->_table WHERE pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $totalproducts=0;
  $totalmoney=0;
  foreach ($data as $value) {
    # code...
    $totalproducts= $totalproducts + $value['pro_number'];
    $totalmoney= $totalmoney + $value['pro_number'] * $value['pro_price']; 
  }
  $dulieu['tongquan']['sanpham']=$totalproducts;
  $dulieu['tongquan']['money']=$totalmoney;
 foreach ($cate as  $value) {
   # code...
  $catename=$value['cate_name'];
  $cateid=$value['cate_id'];
  $sql="SELECT * FROM $this->_table WHERE pro_import like '%$year%' and cate_id=$cateid";
  $this->query($sql);
  $data=$this->fetchAll();
  $totalproducts=0;
  $totalmoney=0;
  foreach ($data as  $value) {
    # code...
    $totalproducts= $totalproducts + $value['pro_number'];
    $totalmoney= $totalmoney + $value['pro_number'] * $value['pro_price']; 
  }
  $dulieu['cate'][$catename]['sanpham']=$totalproducts;
  $dulieu['cate'][$catename]['money']=$totalmoney;
 }
 return $dulieu;
}
public function totalMoney($cate){
  $data=$this->showAll();
  $money=array();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'] *$value['pro_price'];
  }
 $money['total']=$total;
 //tinh tien cho tung category 
 $cate_money=array();
 foreach ($cate as $value) {
   # code...
  $cateid=$value['cate_id'];
  $catename=$value['cate_name'];
    $sql="SELECT * FROM $this->_table WHERE cate_id=$cateid";
    $this->query($sql);
    $data=$this->fetchAll();
    $r=0;
    foreach ($data as $value) {
      # code...
           $r=$r+$value['pro_number']*$value['pro_price'];
    }
    $cate_money[$catename]=$r;
 }
 $money['cate']=$cate_money;
 return $money;
}
public function getHotNew(){
  $sql="select * from $this->_table where pro_hot=1";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  $dulieu=array();
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $hot=$total;
  //echo $hot;
  $dulieu['hot']=$hot;
  $sql="select * from $this->_table where pro_new=1";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['new']=$total;
  $sql="select * from $this->_table a, tbl_sales b where a.pro_id=b.pro_id";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['sale']=$total;
  return $dulieu;
}
function getHotNewInYear($year){
  $sql="select * from $this->_table where pro_hot=1 AND pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  $dulieu=array();
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $hot=$total;
  //echo $hot;
  $dulieu['hot']=$hot;
  $sql="select * from $this->_table where pro_new=1 AND pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['new']=$total;
  $sql="select * from $this->_table a, tbl_sales b where a.pro_id=b.pro_id AND a.pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['sale']=$total;
  return $dulieu;
}
function getHotNewInMonth($year){
  $sql="select * from $this->_table where pro_hot=1 AND pro_import like '%$year%'";
  //echo $sql;
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  $dulieu=array();
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $hot=$total;
  //echo $hot;
  $dulieu['hot']=$hot;
  $sql="select * from $this->_table where pro_new=1 AND pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['new']=$total;
  $sql="select * from $this->_table a, tbl_sales b where a.pro_id=b.pro_id AND a.pro_import like '%$year%'";
  $this->query($sql);
  $data=$this->fetchAll();
  $total=0;
  foreach ($data as $value) {
    $total=$total+$value['pro_number'];
  }
  $dulieu['sale']=$total;
  return $dulieu;
}
}