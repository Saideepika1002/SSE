<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:request.php");  
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
    width:25%;
position:right;
padding: 16px;
box-shadow: 0px 0px 2px 2px grey;

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
font-size: 15px;

}
.button2 {background-color: #FF0000;
 
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
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
     
    </head>  












<body>  

<p><a href="sendreqtoowner.php"><img border="0" alt="Nextpage" src="right.png" width="100" height="100"></a>Send Request to Owner.. </p>

<h2>Welcome, <?=$_SESSION['sess_user'];?>! </h2>This page is Requests for Files from users to get its details....
<br>
<br><br>
<form class="modal-content animate" action="" method="post">
		<div> REQUESTER USERNAME To PROVIDE ACCESS<br>
			 <label for="password"><b>User:</b></label>
            <input type="name" placeholder="Enter REQUESTER USERNAME To PROVIDE ACCESS" name="name" required>
		</div> 
        <button type="submit" name="search">REQUEST</button>
        </form> 
<br>
<br>
<br>
 <table>
<tr>
<th>REQUESTER USERNAME</th>
<th>KEYWORD-1</th>
<th>KEYWORD-2</th>
<th>KEYWORD-3</th>
<th>
</tr> 

<?php
if(isset($_POST['search']))
{
    if(!empty($_POST['name']))
     { 
$mname=$_POST['name'];         
$uname;
$KEYWORD1;
$KEYWORD2;
$KEYWORD3;
$fileid1;
$fileid3;
$fileid2;

$name=$_SESSION["sess_user"];
$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
mysqli_select_db($con,'sse') or die("cannot select DB");
//fetch_comment.php
$query=mysqli_query($con,"SELECT * FROM temp_keywords");
$numrows=mysqli_num_rows($query);  
    if($numrows!=0)
    {

        while($row=mysqli_fetch_assoc($query))  
        {  
            $uname=$row['uname'];
            $KEYWORD1=$row['keyword1'];
            $KEYWORD2=$row['keyword2'];
            $KEYWORD3=$row['keyword3'];
    /*
            $ciphering = "AES-128-CTR";
            $options = 0;
            $encryption=$row['filedata'];
            $decryption_iv = '1234567891011121'; 
            $filedata="";
            if(isset($_POST['submit'])&&!empty($_POST['pass']))
             {       
                 $decryption_key =$_POST['pass'];   
                $filedata=openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $decryption_iv); 
               
    
    
    
                }
      */  
                 echo "<tr> <td> ".$uname." </td> <td> ".$KEYWORD1." </td> <td> ".$KEYWORD2." </td> <td>".$KEYWORD3."</td></tr>";
                
                 //if()


                   //$query1=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword1='".$KEYWORD1."' OR keyword1='".$KEYWORD2."' OR keyword1='".$KEYWORD3."'");
                    $query9=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword1 IN ('".$KEYWORD1."','".$KEYWORD2."','".$KEYWORD3."')");
                    $numrows1=mysqli_num_rows($query9);

        
                    echo"<br>";
                    if($numrows1!=0 )
                    {
                        while($row1=mysqli_fetch_assoc($query9))
                        {
                            $fileid1=$row1['fileid'];
                            //echo ($fileid1);
                
                

                
            }
            //echo ($fileidd);

 
         }

         $query10=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword2 IN ('".$KEYWORD3."','".$KEYWORD1."','".$KEYWORD2."')");
                    $numrows2=mysqli_num_rows($query10);

        
                    echo"<br>";
                    if($numrows2!=0 )
                    {
                        while($row2=mysqli_fetch_assoc($query10))
                        {
                            $fileid2=$row2['fileid'];
                            //echo ($fileid2);
                
                

                
            }
            //echo ($fileidd);

 
         }

         $query11=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword3 IN ('".$KEYWORD3."','".$KEYWORD1."','".$KEYWORD2."')");
                    $numrows3=mysqli_num_rows($query11);

        
                    echo"<br>";
                    if($numrows3!=0 )
                    {
                        while($row3=mysqli_fetch_assoc($query11))
                        {
                            $fileid3=$row3['fileid'];
                            //echo ($fileid3);
                
                

                
            }
            if($fileid1=$fileid2=$fileid3)
            {
                echo "<br>";
                echo "<br>sss";echo "<br>";
                echo($fileid1);
                echo($mname);



                
            }
            //echo ($fileidd);

 
         }
         

                
                 //$query2=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword2='".$KEYWORD1."' OR keyword2='".$KEYWORD2."' OR keyword2='".$KEYWORD3."'");
                 //$numrows2=mysqli_num_rows($query2);
                 //$query3=mysqli_query($con,"SELECT fileid FROM keywords WHERE keyword3='".$KEYWORD1."' OR keyword3='".$KEYWORD2."' OR keyword3='".$KEYWORD3."'");
                 //$numrows3=mysqli_num_rows($query3);

                 
                 
         
                 }
             
          
    
         
        }


        
        $sql="UPDATE files SET requestuname='".$mname."' WHERE fileid='".$fileid1."'";
        mysqli_query($con,$sql);
       
        echo "</table>";
        echo "<br>";
        echo "<br>";
        
      
    }
    

   
}
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
