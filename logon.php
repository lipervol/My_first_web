<?php
$servername='localhost';
$username='root';
$password='1715955442';
$dbname='users';
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("连接失败：".$conn->connect_error);
}
else
{
    $userid=$_POST["userid"];
    $userpwd=$_POST["passwd1"];
    $sql0="select id,passwd from userinfo where id='$userid';";
    $result=mysqli_query($conn,$sql0);
    if(mysqli_num_rows($result))
    {
        echo "该用户已注册！";
        $conn->close();
        Header("HTTP/1.1 303 See Other"); 
        Header("Location: logonFAIL0.html"); 
    }
    else
    {
    if($_POST["passwd1"]==$_POST["passwd2"])
    {
    $sql="insert into userinfo(id,passwd) values('$userid','$userpwd');";
    mysqli_query($conn,$sql);
    $conn->close();
    Header("HTTP/1.1 303 See Other"); 
    Header("Location: logonOK.html"); 
    }
    else
    {
        echo "两次输入的密码不一致！";
        $conn->close();
        Header("HTTP/1.1 303 See Other"); 
        Header("Location: logonFAIL.html");
    }
    }
}
?>