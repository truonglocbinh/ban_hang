<?php

class sales extends database{
    protected $_table = "tbl_sales";
   public function insert(){// them 1 record vao bang user
       
   }
   public function update($id){//update thong tin 1 record
       
   }
   public function delete(){//xoa 1 user 
       
   }
   public function showAll(){// lay tat ca cac record cua user
        $sql="select * from $this->_table ";
       $this->query($sql);
       return $this->fetchAll();
   }
   public function showOne(){// Lay 1 ban ghi 
       
   }
}