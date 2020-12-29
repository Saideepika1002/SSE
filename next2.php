<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:member.php");  
} else {  
?>  

<!doctype html>  
<html>  
<head>  
<title>Welcome</title>  
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h2 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
h3{
size:100%;
}
              
          
    </style>  
</head>  
<body>  
     
      
<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2>  
<p>  
This is Your Results page...
<br>
<br>
<br>
<br>
<?php
$name=$_SESSION["sess_user"];
$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
mysqli_select_db($con,'user') or die("cannot select DB");
//fetch_comment.php
$query=mysqli_query($con,"SELECT * FROM login WHERE username='".$name."'");
while($row=mysqli_fetch_assoc($query))  
    {  
    $SC=$row['SC'];  
    $NS=$row['NS'];  
    $AP=$row['AP'];
    $P=$row['project'];
    }  

?>
<table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>

            </tr>
        </thead>
</table>
<?php  
echo " SecureCoding-------------------->",$SC; 
echo"</br>";
echo"</br>";
echo " NetworkSecurity----------------->",$NS; 
echo"</br>";echo"</br>";
echo"";
echo " Project--------------------------->",$P; 
echo"</br>";echo"</br>";
echo"";
echo " AppliedCrypto------------------->",$AP; 
echo"</br>";echo"</br>";
echo"";
?> 


</p>  
<p>
<p>  
</p> 
<p>  
</p> 

</p>
<p>
<a href="logout.php">
<img border="0" alt="Logout" src="logout.png" width="100" height="100" align="right">
</a>

</p>
</body>  
</html>  
<?php  
}  
?>  