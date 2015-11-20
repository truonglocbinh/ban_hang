<?php  echo "b";
		require("../../../functions/config.php");
		require("../../../functions/database.php");
		require("../../../functions/comments.php");
		echo "a";
		$cmt=new comments();
		$id=$_POST['cid'];
		$cmt->delete($id);	
	
?>