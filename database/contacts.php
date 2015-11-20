<?php
class contacts extends database{
	protected $_table="tbl_contact";
	public function showAll(){
        $sql="SELECT * FROM $this->_table ";
        $this->query($sql);
        $data=$this->fetchAll();
        return $data;
	}
	public function showOne($id){
         $sql="SELECT * FROM $this->_table WHERE con_id=$id";
         $this->query($sql);
         $data=$this->fetch();
         return $data;
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
	public function delete($id){
         $sql="DELETE FROM $this->_table WHERE con_id=$id";
         return mysql_query($sql);
	}
  public function deleteAll(){
     $sql="DELETE FROM $this->_table";
     return mysql_query($sql);
}
}


 ?>