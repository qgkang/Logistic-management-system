<?php include("conn/conn.php");
if($_POST['Submit']==true and $_POST['customer_user']==true){
	if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['customer_tel'],$countes)){ 
$query=mysql_query("insert into tb_customer(customer_user,customer_tel,customer_address)values('".$_POST['customer_user']."','".$_POST['customer_tel']."','".$_POST['customer_address']."')");
		if($query==true){
			echo "<script> alert('客户信息添加成功');window.location.href='indexs.php?lmbs=客户信息管理';</script>";
		}
	}else{
		echo "<script>alert('您输入的电话号码格式不正确!!');history.back()</script>";
	}
}
?>