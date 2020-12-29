<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>Welcome</title>  
    <style>   

<meta charset="utf-8"> 
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0"> 

</head> 
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
Successfully logged in!!!  
</p>  



<p>
<a href="next1.php">
<img border="0" alt="Nextpage" src="right.png" width="100" height="100">
</a>Go to My Files...
</p>
<p>
<p>  
</p>
<p>  
</p> 
<p>  
</p> 

<a href="logout.php">
<img border="0" alt="Logout" src="logout.png" width="100" height="100" align="right">
</a>

</p>

<center> 
		<h1 style="color: green;"> 
		SSE 
		</h1> 
        <form class="modal-content animate" action="" method="post">
		<div> 
			<input type="file" name="file" required> 
			<textarea name="textar"cols="30" rows="20"
					placeholder="text will appear here"> 
			</textarea> 
            <br>
            ENTER KEYWORDS SEPERATED WITH ,
            <br>
            <textarea name="textkey"cols="1" rows="2"
					placeholder="text will appear here">
                     
			</textarea> 
            <label for="password"><b>KEY:</b></label>
    <input type="password" placeholder="Enter KEY" name="pass" required>
		</div> 
        <button type="submit"name="submit">Upload</button>
        </form>
</center> 
	<script src="script.js"></script> 
    <?php  




if(isset($_POST['submit']))
{
    if(!empty($_POST['textar'])&&!empty($_POST['textkey']) &&!empty($_POST['pass']))
    {   
         $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
         mysqli_select_db($con,'sse') or die("cannot select DB");  

 $uname=$_SESSION['sess_user'];
 $fileid = rand(1000,100000);
 $filedata=$_POST['textar'];
 $filekeywords=$_POST['textkey'];
 echo nl2br ("Public KEY for keywords is: secretkey");
 echo "</br>"; 
 echo("\n");

 $myString = $filekeywords;
 $myArray = explode(',', $myString);
 $keyword1=$myArray[0];
 $keyword2=$myArray[1];
 $keyword3=$myArray[2];
 //echo(gettype($keyword1));


 //Encrypt file 
 $ciphering = "AES-128-CTR";
 $iv_length = openssl_cipher_iv_length($ciphering); 
 $options = 0;
 // Non-NULL Initialization Vector for encryption 
 $encryption_iv = '1234567891011121';
 // Store the encryption key 
 $encryption_key = MD5($_POST['pass']);  
 
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($filedata, $ciphering,$encryption_key, $options, $encryption_iv); 
$ciphering1 = "AES-128-CTR";
 $iv_length1 = openssl_cipher_iv_length($ciphering1); 
 $options1 = 0;
 // Non-NULL Initialization Vector for encryption 
 $encryption_iv1 = '1234567891011121';
 // Store the encryption key 
 $encryption_key1 = MD5("secretkey");
 
$key1=openssl_encrypt($keyword1,  $ciphering1,$encryption_key1, $options1, $encryption_iv1);
$key2=openssl_encrypt($keyword2,  $ciphering1,$encryption_key1, $options1, $encryption_iv1);
$key3=openssl_encrypt($keyword3,  $ciphering1,$encryption_key1, $options1, $encryption_iv1);
    
 //insert file hash also
 $query1=mysqli_query($con,"SELECT * FROM files WHERE fileid='".$fileid."'");

     
 $numrows1=mysqli_num_rows($query1);

 if(($numrows1==0))  
 {
  $sql="INSERT INTO files(uname,fileid,filedata) VALUES('$uname','$fileid','$encryption')";
  mysqli_query($con,$sql);
  $sql2="INSERT INTO keywords(fileid,keyword1,keyword2,keyword3) VALUES('$fileid','$key1','$key2','$key3')";
  mysqli_query($con,$sql2);
 
  echo nl2br ("File sucessfully upload");
        
  
 }
 else
 {
    echo nl2br ("File Already Exists..");
 
		
        }
        
    }
    
}
else{
    echo nl2br ("Error.Please try again");
}
?>  

</body>  
</html>
<?php
}  
?>