<?php
require('../class/connect.php');
require('../class/db_sql.php');
require('../data/dbcache/class.php');
require('../member/class/user.php');
require('../data/dbcache/MemberLevel.php');
require LoadLang('pub/fun.php');
$link=db_connect();
$empire=new mysqlquery();
eCheckCloseMods('pl');//�ر�ģ��
$enews=$_POST['enews'];
if(empty($enews))
{
	$enews=$_GET['enews'];
}
//�����ļ�
if($enews=='AddPl'||$enews=='DoForPl')
{
	include('plfun.php');
}
if($enews=="AddPl")//��������
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$saytext=$_POST['saytext'];
	$id=$_POST['id'];
	$classid=$_POST['classid'];
	$repid=$_POST['repid'];
	$nomember=$_POST['nomember'];
	$key=$_POST['key'];
	AddPl($username,$password,$nomember,$key,$saytext,$id,$classid,$repid,$_POST);
}
elseif($enews=='DoForPl')//�������
{
	DoForPl($_GET);
}
else
{printerror("ErrorUrl","history.go(-1)",1);}
db_close();
$empire=null;
?>