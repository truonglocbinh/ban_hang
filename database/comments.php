<?php
class comments extends database{
   protected $_table = "tbl_comments";
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
   public function showOne(){// Lay 1 ban ghi 
       
   }
}