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
    $userpwd=$_POST["passwd"];
    $sql="select id,passwd from userinfo where id='$userid' and passwd='$userpwd';";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num)
    {
        $row=mysqli_fetch_array($result);
        $conn->close();
        setcookie('username',$userid);
        Header("HTTP/1.1 303 See Other"); 
        Header("Location: guestbook.php"); 
    }
    else
    {
        $conn->close();
        Header("HTTP/1.1 303 See Other"); 
        Header("Location: loginFAIL.html"); 
    }
}
?>