<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:member.php");  
} else {  
?>  

<!doctype html>  
<html>  
<head>  
<meta charset="utf-8"> 
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0"> 

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
              
table {
border-collapse: collapse;
width: 100%;
color: #233832;
font-family: monospace;
font-size: 25px;
text-align: left;
}
a{
  position: absolute;
  top: -120px;
  right: 16px;
 
}
p{
  position: absolute;
  top: 95px;
  right: 106px;
  font-size: 25px;
 
}
}
b{
font-family: monospace;
font-size: 25px;
top: -120px;
right: 120px;
}
th {
background-color: #024e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
}
form {border: 3px solid #f1f1f1;
    width:68%;
position:right;
padding: 16px;
box-shadow: 0px 0px 20px 20px grey;

}

input[type=text], input[type=password], input[type=date],input[type=select],input[type=radio],input[type=email],input[type=phone] {
  width: 120%%;
  padding: 12px 20px;
  margin: 8px 0;
  font-size: 35px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  align
}
label{
  font-size: 35px;
}
button {
  background-color: #000080;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  font-family: monospace;
font-size: 25px;

}
.button2 {background-color: #FF0000;
 
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
} 
input[type=image]{
  position: absolute;
  top: -120px;
  right: 1250px;
}

button:hover {
  opacity: 0.8;
}
p1{
  position: absolute;
  top: 115px;
  left: 16px;
  font-size: 25px;
 
}

.cancelbtn {
  width: auto;
  padding: 6px 6px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 10px 0 10px 0;
}

img.avatar {
  width: 1%;
  border-radius: 10%;
}

.container {
  padding: 11px;
  width:60%;
position:relative;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 50%;
  }
  <style type="text/css"> 
	div { 
		display: flex; 
		flex-direction: column; 
		align-items: center; 
	} 
	
	input { 
		margin-top: 10px; 
	} 
	
	textarea { 
		margin-top: 15px; 
		width: 70%; 
	} 
         
          
    </style>  
    </style>  
    
</head>  
<body>  

<p><a href="keywords.php"><img border="0" alt="Nextpage" src="right.png" width="100" height="100"></a>Serach with.. </p>
<form class="modal-content animate" action="" method="post">
		<div> 
			 <label for="password"><b>KEY:</b></label>
            <input type="password" placeholder="Enter KEY" name="pass" required>
		</div> 
        <button type="submit"name="submit">Decrypt</button>
        </form>    
      
<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2>This is Your Files page...
<br>

<br>
 <table>
<tr>
<th>FILE-ID</th>
<th>UNAME</th>
<th>ENCRYPTED-DATA</th>
<th>DECRYPTED-DATA</th>
</tr> 

<?php

$name=$_SESSION["sess_user"];
$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
mysqli_select_db($con,'sse') or die("cannot select DB");
//fetch_comment.php
$query=mysqli_query($con,"SELECT * FROM files WHERE uname='".$_SESSION["sess_user"]."'");
while($row=mysqli_fetch_assoc($query))  
    {  
        $uname=$row['uname'];
        
        $id=$row['fileid'];
        $ciphering = "AES-128-CTR";
        $options = 0;
        $encryption=$row['filedata'];
        $decryption_iv = '1234567891011121'; 
        $filedata="";
        if(isset($_POST['submit'])&&!empty($_POST['pass']))
    {       
        $decryption_key =MD5($_POST['pass']);   
        $filedata=openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $decryption_iv); 
           



    }
    
 echo "<tr> <td> ".$id." </td> <td> ".$uname." </td> <td> ".$encryption." </td> <td>".$filedata."</td></tr>";
 
         
      

     
    }


    echo "</table>";

}



?>

</p>  
<p>
<p>  
</p> 
<p>  
</p> 

</p>
<p>
<input type="image" src="logout.png" alt="Logout" onclick="myFunction()" width="100" height="100"></input>
  <script>
function myFunction() {
  location.replace("logout.php")
}
</script>

</body>  
</html>  