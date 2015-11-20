
<?php

class online extends database {

    protected $_table = "tbl_online";
    protected $_users = "tbl_users";
    protected $_product = "tbl_products";

    public function getTotal() {
        if (empty($counter)) {
            $counter = 0;
            $sql1 = "INSERT INTO $tbl_name(counter) VALUES('$counter')";
            $result1 = mysql_query($sql1);
            return $result1;
        } else {
// tăng giá trị khi có người truy cập 
            $addcounter = $counter + 1;
            $sql2 = "update $tbl_name set counter='$addcounter'";
            $result2 = mysql_query($sql2);
            return $result2;
        }
    }

    public function getOnline() {
        $tg = time();
        $tgout = 60;
        $tgnew = $tg - $tgout;
        $sql = "insert into tbl_online(tgtmp,ip,local) values('$tg','$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')";
        $query = mysql_query($sql);
        $sql = "delete from tbl_online where tgtmp < $tgnew";
        $query = mysql_query($sql);
        $sql = "SELECT DISTINCT ip FROM tbl_online WHERE local='$_SERVER[PHP_SELF]'";
        $query = mysql_query($sql);
        $user = mysql_num_rows($query);
        return $user;
    }

    public function totalUser() {
        $sql = "select * from $this->_users";
        $this->query($sql);
        return $this->numRows();
    }

    public function totalPro() {
        $sql = "select * from $this->_product";
        $this->query($sql);
        return $this->numRows();
    }

}

?>