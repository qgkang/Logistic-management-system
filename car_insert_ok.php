<?php 
session_start(); 
include("conn/conn.php");
if($_SESSION['admin_user']==true){
	if($_POST['Submit']==true){
    	if(preg_match("/\d{17}[\d|X]|\d{15}/",$_POST['user_number'],$counts)){ 
             if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['user_tel'],$countes)){ 		  
   				$query=mysql_query("insert into tb_car(username,user_number,tel,address,car_number,car_road,car_content)values('".$_POST['username']."','".$_POST['user_number']."','".$_POST['user_tel']."','".$_POST['address']."','".$_POST['car_number']."','".$_POST['car_road']."','".$_POST['car_content']."')");
   				if($query==true){
	   				echo "<script>alert('车源信息添加成功!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";   }	   
	         	}else{
                	echo "<script>alert('您输入的电话号码格式不正确!!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
             	}
        	}else{
           		echo "<script>alert('您输入的身份证号码的格式不正确!!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
        	}
	} 
	if($_POST['Submit2']=="修改"){
    	if(preg_match("/\d{17}[\d|X]|\d{15}/",$_POST['user_number'],$counts)){ 
        	if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['user_tel'],$countes)){ 
   				$query="update tb_car set username='".$_POST['username']."', user_number='".$_POST['user_number']."', tel='".$_POST['user_tel']."', address='".$_POST['address']."', car_number='".$_POST['car_number']."', car_road='".$_POST['car_road']."', car_content='".$_POST['car_content']."' where car_number='".$_POST['car_number']."'";
   				$result=mysql_query($query);
   				if($result==true){
 	   				echo "<script>alert('车源数据更新成功!!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
   				}
       		}else{
                echo "<script>alert('您输入的电话号码格式不正确!!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
            }
        }else{
           echo "<script>alert('您输入的身份证号码的格式不正确!!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
        }
	}
	if($_POST['Submit4']=="删除"){
   		$query="delete  from tb_car where car_number='".$_POST['car_number']."'";
   		$result=mysql_query($query);
   		if($result==true){
 			echo "<script>alert('车源数据删除成功!');window.location.href='indexs.php?lmbs=车源信息管理';</script>";
   		}
	}
}else{
	echo "<script>alert('请您正确登录！'); window.location.href='index.php';</script>";
}
?>