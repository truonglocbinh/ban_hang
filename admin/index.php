﻿<?php session_start();
	  if(!isset($_SESSION['ses_userid']) || $_SESSION['ses_userlevel'] != 1){
		header("location:login.php");
		exit();
	}
      require ("../functions/config.php");
      require ("../functions/database.php");
      ob_start();
?>
<html>
    <head>
        <title>
            <?php 
             if(isset($_GET['page'])){
                        switch ($_GET['page']){
                            case "category":{
                              if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "list":echo "Danh sách danh mục sản phẩm";break;
                                    case "add":echo "Thêm danh mục sản phẩm mới";break;
                                    case "edit":echo "Chỉnh sửa danh mục sản phẩm";break;
                                    case "detail":echo "Chi tiết danh mục sản phẩm";break;      
                                }
                                }else{
                                  echo "Quản lý danh mục sản phẩm";
                                
                                }

                            };break;
                            case "products":{
                                if(isset($_GET['act'])){
                                    switch ($_GET['act']){
                                    case "add": echo "Thêm sản phẩm mới";break;
                                    case "list":echo "Danh sách sản phẩm"; break;
                                    case "edit":echo "Chỉnh sửa thông tin sản phẩm"; break;    
                                    case "detail":echo "Chi tiết sản phẩm";  break;
                                    case "search":echo "Tìm kiếm sản phẩm";
                                                break;
                                    
                                    }
                                }
                            };break;
                            case "documents":{
                                if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "add":echo "Thêm tài liệu";break;
                                    case "list":echo"Danh sách tài liệu";break;
                                    case "edit":echo "Chỉnh sửa tài liệu";break;  
                                    case "detail":echo "Chi tiết tài liệu";break;
                                    case "search":echo "Tìm kiếm tài liệu";break;   
                                }
                                }
                            };break;
                            case "sales":{
                            if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                case "add": echo "Thêm sản phẩm khuyến mãi";break;
                                case "list":echo "Danh sách sản phẩm khuyến mãi"; break;
                                case "edit":echo "Chỉnh sửa sản phẩm khuyến mãi"; break; 
                                case "detail":echo "Chi tiết sản phẩm khuyến mãi";break;
                                case "search":echo "Tìm kiếm sản phẩm khuyễn mãi";
                                            break;
                                
                                }
                            }
                            };break;                        
                            case "intro":{
                            if(isset($_GET['act']))
                            {
                                switch ($_GET['act']) {
                                    case "list": echo "Danh sách phần giới thiệu";
                                    break;
                                    case "add":echo "Thêm danh mục phần giới thiệu";
                                    break;
                                    case "edit": echo "Chỉnh sửa phần giới thiệu";
                                    break;
                                    case "detail":echo "Chi tiết giới thiệu";break;
                            
                                   
                                }
                            }else{
                                echo "Quản lý mục giới thiệu";
                            }
                            };break;                                                               
                            case "customers" :{
                                 if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "add":echo "Thêm tài liệu khách hàng";break;
                                    case "list":echo"Danh sách tài liệu khách hàng";break;
                                    case "edit":echo "Chỉnh sửa tài liệu khách hàng";break;  
                                    case "detail":echo "Chi tiết tài liệu khách hàng";break;
                                    case "search":echo "Tìm kiếm tài liệu khách hàng";break;   
                                }
                                }
                            };break;
                            
                            case "comments"  :
							{
                              if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "list":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Sản phẩm có comments mới";
													else echo "Sản phẩm có comments";
												break;
                                    case "listcmt":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Danh sách comments mới";
													else echo "Danh sách comments";
												break;
                                    case "searchp":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Tìm kiếm sản phẩm có comments mới";
													else echo "Tìm kiếm sản phẩm có comments";
												break;
                                    case "searchcmt":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Tìm kiếm comments mới";
													else echo "Tìm kiếm comments";
												break;
                                }
                                }else{
                                  echo "Quản lí comments";
                                
                                }

                            } break;
                            case "user"      :{
                                 if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "search":echo "Tìm kiếm khách hàng";break;
                                    case "list":echo"Danh sách khách hàng";break;
                                    case "edit":echo "Cập nhật thông tin khách hàng";break;  
                                    case "updateadmin":echo "Thông tin Admin";break;  
                                }
                                }
                            };break;

                            case "orders"    :{
                              if(isset($_GET['act'])){
                                switch ($_GET['act']){
                                    case "list":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Đơn hàng mới";
													else echo "Đơn hàng";
												break;
                                    case "listorder":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Sản phẩm đơn hàng mới";
													else echo "Sản phẩm đơn hàng";
												break;
                                    case "search":if(isset($_GET['lo'])) 
													if($_GET['lo']=="new")
														echo "Tìm kiếm đơn hàng mới";
													else echo "Tìm kiếm đơn hàng";
												break;
                                    case "statistics":
													 echo "Thống kê đơn hàng";
												break;
                                }
                                }else{
                                  echo "Quản lí đơn hàng";
                                
                                }

                            } break;
                        }
                    }else{
                        echo "Trang chủ";
                    }          
            ?>

        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/styles.css" type="text/css" rel="stylesheet">
        <script src="scripts/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="libraries/fancybox/jquery.fancybox-1.3.1.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">     
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script>
          $(document).ready(function(){
              $("#menu ul li.sub").hover(function(){
                  $(this).find("ul").slideDown();
              },function(){
                  $("#menu ul li ul").hide();
              });
          });
        </script>     
        
    </head>
    <a name="top"></a>
    <body>       
        <div id="wrapper">
            <div id="header">
                <img src="images/logo/bksun.png" width="1000" height="99"/>
            </div>
            <div class="menu">
                <ul>
                     <li class="sub"><a href="javascript:void(0)">User</a>
                    <ul>
                        <li><a href="<?php echo baseurl."admin/index.php?page=user&act=list";?>">Danh sách</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=user&act=updateadmin";?>">Cá nhân</a></li>      
                    </ul>
                    </li>
                    <li class="sub"><a href="javascript:void(0)">Sản phẩm</a>
                        <ul>
                        <li><a href="<?php echo baseurl."admin/index.php?page=category&act=add";?>">Thêm Loại</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=category&act=list";?>">Danh mục sản phẩm</a></li> 
                        <li><a href="<?php echo baseurl."admin/index.php?page=products&act=list";?>">Chi tiết sản phẩm</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=products&act=add";?>">Thêm sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="sub"><a href="javascript:void(0)">Tài liệu</a>
                        <ul>
                        <li><a href="<?php echo baseurl."admin/index.php?page=documents&act=add";?>">Tài liệu kỹ thuật</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=documents&act=list";?>">Danh Sách</a></li> 
                        <li><a href="<?php echo baseurl."admin/index.php?page=customers&act=add";?>">Tài liệu khách hàng</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=customers&act=list";?>">Danh Sách</a></li>
                        
                        </ul>
                    </li>
                    <li class="sub"><a href="javascript:void(0)">Comments</a>
                        <ul>
                    	<li><a href="<?php echo baseurl."admin/index.php?page=comments&act=list&lo=new";?>">Comments new</a></li>
                    	<li><a href="<?php echo baseurl."admin/index.php?page=comments&act=list&lo=old";?>">Comments</a></li>
                    	</ul>
                      </li>
                    <li class="sub"><a href="javascript:void(0)">Sản phẩm khuyến mại</a>
                        <ul>
                        <li><a href="<?php echo baseurl."admin/index.php?page=sales&act=add";?>">Thêm sản phẩm</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=sales&act=list";?>">Xem danh sách</a></li>  
                        </ul>
                    </li>
                      <li class="sub"><a href="javascript:void(0)">Đơn hàng</a>
                        <ul>
                    	<li><a href="<?php echo baseurl."admin/index.php?page=orders&act=list&lo=new";?>">Đơn hàng mới</a></li>
                    	<li><a href="<?php echo baseurl."admin/index.php?page=orders&act=list&lo=old";?>">Đơn hàng</a></li>
                    	</ul>
                      </li> 
                   
                    <li class="sub"><a href="javascript:void(0)">Khác</a>
                        <ul>
                        
                        <li><a href="<?php echo baseurl."admin/index.php?page=intro&act=list";?>">Xem danh sách</a></li>
                        <li><a href="<?php echo baseurl."admin/index.php?page=contacts&act=list";?>">Xem phản hồi</a></li>  
                        </ul>
                    </li>
                    
                </ul>
              
            </div>
            <div id="content">
                <?php 
                    if(isset($_GET['page'])){
                        switch ($_GET['page']){
                            case "category":require 'modules/category/controller.php';break;
                            case "products":require 'modules/products/controller.php';break;
                            case "data" :require "modules/database/data.php";break;
                            case "documents":require 'modules/documents/controller.php';break;
                            case "sales":require 'modules/sales/controller.php';break;                        
                            case "intro":require 'modules/intro/controller.php';                                                               break;
                            case "customers" :require 'modules/customers/controller.php';break;
                            case "search":require 'layout/search.php';break;
							case "comments"  :require 'modules/comments/controller.php'; break;
							case "user" 	 :require 'modules/user/controller.php';break;
							case "orders"	 :require 'modules/orders/controller.php';break;
                            case "contacts":require "modules/contacts/controller.php";break;
                            default : require 'layout/home.php';
                                                                break;
                        }
                    }else{
                        require 'layout/home.php';
                    }                
                ?>
            </div>
            <div id="footer">
                <div id="logo">
                    <img src="images/bk.png" width="100" height="100"/>
                </div>
                <div id="quydinh">
                    <h2 style="color: #FF8000;">Sản phẩm của group BKSUN</h2>
                </div>
            </div>
        </div>
        <div id="right">
            <ul>
                <li><a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home_alt.png" width="80" height="80"></a></li>
                <li><a href="<?php echo baseurl."admin/index.php?page=data";?>"><img src="images/database.png" width="80" height="80"></a></li>
                <li><a href="logout.php"><img src="images/logout.png" width="80" height="80" alt="Thoát" title="Thoát"></li>  
            </ul> 
        </div>
        <div id="backtop">
            <a href="#top"><img src="images/home/top.png" width="50" height="50" alt="Top" title="top"></a>
        </div>
    </body>
</html>

