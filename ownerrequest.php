<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:keywords.php");  
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
    width:38%;
position:right;
padding: 16px;box-shadow: 0px 0px 2px 2px grey;

}

input[type=text], input[type=password], input[type=date],input[type=select],input[type=radio],input[type=email],input[type=phone] {
  width: 50%%;
  padding: 12px 20px;
  margin: 8px 0;
  font-size: 25px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  align
}
label{
  font-size: 25px;
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

<p><a href="decryptsharedfile.php"><img border="0" alt="Nextpage" src="right.png" width="100" height="100"></a>DECRYPT REQUESTED FILE.. </p>

<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2>This is Your Files page...
<br>

<br>
 <table>
<tr>
<th>FILE-ID</th>
<th>UNAME</th>
<th>ENCRYPTED-DATA</th>
<th>DECRYPTED-DATA</th>
<th>REQUESTS-FROM</th>
</tr> 

<?php
$sharringtext;
$filedata;
$name=$_SESSION["sess_user"];
$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
mysqli_select_db($con,'sse') or die("cannot select DB");
//fetch_comment.php

$query=mysqli_query($con,"SELECT * FROM files WHERE uname='".$_SESSION["sess_user"]."'");
while($row=mysqli_fetch_assoc($query))
{
  $usname=$row['uname'];
  $flid=$row['fileid'];
  $fldata=$row['filedata'];
  $rqname=$row['requestuname'];
     
  $ciphering = "AES-128-CTR";
  $options = 0;

  $decryption_iv = '1234567891011121'; 
  $filedata="";
  if(1)
  {       
      $decryption_key =MD5($decryp);   
      $filedata=openssl_decrypt ($fldata, $ciphering,$decryption_key, $options, $decryption_iv); 
 



  }



}


echo "<tr> <td> ".$usname." </td> <td> ".$flid." </td> <td> ".$fldata." </td><td>".$filedata."</td> <td>".$rqname."</td></tr>";




    echo "</table>";
    


    
    if(isset($_POST['share'])&&!empty($_POST['id'])&&!empty($_POST['dp'])&&!empty($_POST['ak']))
    {
        

        $fileid=$_POST['id'];
        $decryp=$_POST['dp'];
        $aggreg=$_POST['ak'];
        $query=mysqli_query($con,"SELECT * FROM files WHERE fileid='".$fileid."'");
        
        while($row=mysqli_fetch_assoc($query))  
        {  
               
            
          $ciphering = "AES-128-CTR";
          $options = 0;
          $encryption=$row['filedata'];
          $decryption_iv = '1234567891011121'; 
          $filedata="";
          if(1)
          {       
              $decryption_key =MD5($decryp);   
              $filedata=openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $decryption_iv); 
         
  
  
  
          }
  
        //echo "<tr> ".$filedata." </td></tr>";

                
        //Encrypt file 
         $ciphering = "AES-128-CTR";
         $iv_length = openssl_cipher_iv_length($ciphering); 
         $options = 0;
         // Non-NULL Initialization Vector for encryption 
        $encryption_iv = '1234567891011121';
        // Store the encryption key 
        $encryption_key = MD5($_POST['ak']);  
 
        // Use openssl_encrypt() function to encrypt the data 
        $sharringtext = openssl_encrypt($filedata, $ciphering,$encryption_key, $options, $encryption_iv); 
        //echo" $sharringtext";


 
        }

        //echo" $sharringtext";


       $sql="INSERT INTO sharedfiles(fileid,uname,sharedfile) VALUES('".$fileid."','".$_SESSION["sess_user"]."','".$sharringtext."')";  
  
       $result=mysqli_query($con,$sql);  
        if($result){  
            $email;
            $query=mysqli_query($con,"SELECT * FROM files WHERE fileid='".$fileid."'");
        
            while($row=mysqli_fetch_assoc($query))  
            {  
              
                       
                    $name=$row['requestuname'];
                    $query=mysqli_query($con,"SELECT * FROM user WHERE uname='".$name."'");
                    while($row=mysqli_fetch_assoc($query))  
                    {  
                        
                    //echo($mail);
                    $to_email =$row['umail'];
                    $subject = "Simple Email Test via PHP";
                    $body = "$fileid $aggreg";
                    $headers = "From: yathu003@gmail.com";
                    
                    if (mail($to_email, $subject, $body, $headers)) {
                        echo "Email successfully sent to $to_email...";
                    } else {
                        echo "Email sending failed...";
                    }


                    }


            }




            } else {  
                    echo "Failure!";  
                   }  



    }

}



?>

</p>  
<br>
<br>
<br>
<br>

<form class="modal-content animate" action="" method="post">
    <div> 
        <label for="text"><b>ID:</b></label>
        <input type="text" placeholder="Enter id" name="id" required><br>
        <label for="text"><b>Decryption-key:</b></label>
        <input type="password" placeholder="Enter decryption password" name="dp" required><br>
        <label for="text"><b>Aggregate-key:</b></label>
        <input type="password" placeholder="Enter Aggregate-key" name="ak" required>
    </div> 
    <button type="submit"name="share">Share</button>
    </form>
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