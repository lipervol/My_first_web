<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>留言板</title>
<style>
body
{
background-image: url("2.jpeg");
style=" background-repeat:no-repeat ;
background-size:100% 100%;
background-attachment: fixed;
}
#liuyan
{
    margin-left: 47%;
    color: aliceblue;
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
    margin-left:24%;
}
#mess
{
    font-size:18px;
    border-radius:5px;
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
<img src="SNC.bmp" width="190" height="60" align="left">
<h1 id=liuyan>留言板</h1>
<div align="center">
<form action="guestbook.php" method="post">
    <textarea id=mess type="text" name="message" cols="85" rows="8"></textarea>
    <br/>
    <br/>
    <input id=annu type="submit" name="submit" value="发表">
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
    <a href="find.php">查找留言</a>
    <a href="index.html">返回登陆</a>
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
            if($_POST["message"])
            {
            $mess=$_POST["message"];
            $sql="insert into mess(id,mess) values('$userid','$mess');";
            mysqli_query($conn,$sql);
            }
        }
        $sql0="select id,mess from mess;";
        $result=mysqli_query($conn,$sql0);
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
    ?>
</div>
</body>
</html>