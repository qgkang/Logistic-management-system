<?php
session_start(); 
if($_SESSION['admin_user']==true){
include("conn/conn.php");
$fahuo_time=date("Y-m-d H:i:s");
    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['car_tel'],$countes)){ 
	    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['fahuo_tel'],$countes)){ 
            if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['shouhuo_tel'],$countes)){ 

  $query="insert into tb_shopping (car_number,car_tel,fahuo_id,fahuo_user, fahuo_tel,fahuo_address,fahuo_content,fahuo_time,fahuo_fk,shouhuo_user,shouhuo_address,shouhuo_tel)values('".$_POST['car_number']."','".$_POST['car_tel']."','".$_POST['fahuo_id']."','".$_POST['fahuo_user']."','".$_POST['fahuo_tel']."','".$_POST['fahuo_address']."','".$_POST['fahuo_content']."','".$_POST['fahuo_time']."','".$_POST['fahuo_fk']."','".$_POST['shouhuo_user']."','".$_POST['shouhuo_address']."','".$_POST['shouhuo_tel']."')";
$result=mysql_query($query);

  $querys="insert into tb_car_log(car_log,car_number,log_date,fahuo_id)values('".$_POST['car_log']."','".$_POST['car_number']."','".$_POST['fahuo_time']."','".$_POST['fahuo_id']."')";
  $results=mysql_query($querys);
  $queryss="insert into tb_customer (customer_user,customer_tel,customer_address)values('".$_POST['fahuo_user']."','".$_POST['fahuo_tel']."','".$_POST['fahuo_address']."')";
  $resultss=mysql_query($queryss);

  echo "<script>alert('发货单添加成功!');history.back();</script>"; 

      }else{
                echo "<script>alert('您输入的收货人的电话号码格式不正确!!');history.back()</script>";
             }
        }else{
           echo "<script>alert('您输入的发货人的电话号码格式不正确!!');history.back()</script>";
        }
    }else{
         echo "<script>alert('您输入的车主的电话号码格式不正确!!');history.back()</script>";
    }
}else{
echo "<script>alert('请您正确登录！'); window.location.href='index.php';</script>";
}

?>