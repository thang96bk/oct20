<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Traffic Accident Tracking System</title>
	<link rel="stylesheet" type="text/css" href="styleXULY.css"/>
</head>

<body>
	<div id="wrapper">        
        <div id="menu">
        	<div id="menu-bar">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Khu vực</a></li>
                    <li><a href="#">Năm</a></li>
                    <li><a href="#">Thống kê</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                </ul>
             </div>
            <div id="search">Tìm kiếm</div>    
        </div>
        <div id="content">    
            <div id="left">
                <ul>
                	<?php
					$conn = mysql_connect("localhost","root","") or die("Khong the ket noi");
					mysql_query("SET NAMES 'UTF8'");
					mysql_select_db("traffic_accident") or die("Khong tim thay CSDL");
					
					$data = mysql_query("select * from newsheader");
					$newsheader = mysql_fetch_assoc($data);
					include('simple_html_dom.php');
					while($newsheader = mysql_fetch_assoc($data)){
						$html = file_get_html($newsheader['sourceLink']);
						$html->find('.baiviet-bailienquan',0)->outertext='';
						$html->load($html->save());
						$newsContent = $html->find('.text-conent',0);
									
						echo $newsheader['newsTitle'].'<br>';
						echo $newsheader['newsDescription'];
						echo $newsContent;
						echo "<br>"."<br>"."<br>"."<br>";
					}
		
				?>

                </ul>
            </div>
            <!--Left End -->
        
        <!--Right Begin -->
        <div id="right">
        	<table border="1" width="400" height="460"> 
            	<tr>
                	<td colspan="2">Thông tin tóm tắt</td>
                </tr>
                
                <tr>
                	<td>Thời gian</td>
                    <td>20/10/2016</td>
                </tr>
                
                <tr>
                	<td>Địa điểm</td>
                    <td>Hà Nội</td>
                </tr>
                
                <tr>
                	<td>Phương tiện</td>
                    <td>Xe khách mang BKS xyz</td>
                </tr>
                
                <tr>
                	<td>Nguyên nhân</td>
                    <td>Tránh xe máy đi ngược chiều</td>
                </tr>
                
                <tr>
                	<td>Số người chết</td>
                    <td>0</td>
                </tr>
                
                <tr>
                	<td>Số người bị thương</td>
                    <td>8</td>
                </tr>              
            </table>
            
            <table>
            	<tr>Bài viết khác</tr>
                <tr>
                	<ul>
                    	<li>Bài viết 1</li>
                        <li>Bài viết 2</li>
                    </ul>
                </tr>
            </table>
        </div>
        <!-- Right End -->
        </div>
        <div id="footer">Footer</div>
</body>
</html>
