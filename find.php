<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>查找留言</title>
<style>
body
{
background-image: url("2.jpeg");
style=" background-repeat:no-repeat ;
background-size:100% 100%;
background-attachment: fixed;
}
#ll
{
    color:aliceblue;
    margin-top:5%;
}
#chazhao
{
    margin-left: 46%;
    color: aliceblue;
}
#mess
{
    font-size:110%;
    border-radius:5px;
    text-align:center;
    width:200px;
    height:25px;
    
}
#ff
{
    margin-left: 40%;
}
#annu
{
    background-color:aliceblue;
    border: none;
    color:black;
    padding: 6px 20px;
    font-size: 100%;
    font-family:inherit;
    font-weight: bolder;
    margin-left:13%;
}
#sss
{
	border:2px solid #a1a1a1;
	background:#FFFFFF;
	width:800px;
    height:35px;
	border-radius:5px;
    text-align: left;
    font-size:110%;
}
</style>
</head>
<body>
<img src="SNC.bmp" width="190" height="60" align="left"/>
<h1 id=chazhao>查找留言</h1>
<div>
<form id=ff action="find.php" method="post">
    <b>用户名:</b>
    <input id=mess type="text" name="findid">
    <br/>
    <br/>
    <input id=annu type="submit" name="submit" value="查找">
    <a href="guestbook.php">返回留言板</a>
</form>
</div>
<div align="center">
    <?php
        $servername='localhost';
        $username='root';
        $password='1715955442';
        $dbname='users';
        $userid=$_COOKIE['username'];
        $conn=new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error)
        {
            die("连接失败：".$conn->connect_error);
        }
        else
        {
            if($_POST["findid"])
            {
            $messid=$_POST["findid"];
            $sql="select id,mess from mess where id='$messid';";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            for($i=0;$i<$num;$i++)
            {
            $row=mysqli_fetch_array($result,MYSQLI_NUM);
            echo "<br/>";
            echo "<div id=sss>";
            echo "<b>";
            echo "&nbsp;".$row[0];
            echo "</b>";
            echo ":&nbsp;".$row[1];
            echo "</div>";
            }
            }

        }
    ?>
</div>
</body>
</html>