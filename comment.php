<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
  
  background-image: url('1.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: 1000px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons 
button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: green;
  color: white;
  font-size: 45px;
  font:algerian;
  padding: 46px 80px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  font :white;
   box-shadow:inset 0 -0.6em 1em -0.35em rgba(0,0,0,0.17),inset 0 0.6em 2em -0.3em rgba(255,255,255,0.15),inset 0 0 0em 0.05em rgba(255,255,255,0.12);
}*/

button:hover {
  opacity: 31;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2></h2>

  <form class="modal-content animate" action="" method="post">
    

    <div class="container">
      <label for="cname"><b>Name</b></label>
      <input type="text" placeholder="Name" name="cname" required>

      <label for="cname"><b>email</b></label>
      <input type="text" placeholder="Enter Email" name="cemail" required>

      <label for="cname"><b>phone</b></label>
      <input type="text" placeholder="Enter Phone" name="cphone" required>
      
      <label for="cname"><b>comment</b></label>
      <input type="text" placeholder="Enter comment" name="comment" required>
        
      <button type="submit"name="submit"class="button">comment</button> 
  
   </div>
    
   
      </div>
      

  </div>

  
  </div>
  
    </div>
   
    
</form>
</body>

</html>
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['cname']) && !empty($_POST['cemail']) && !empty($_POST['cphone'])&& !empty($_POST['comment'])) {  
    $cname=$_POST['cname'];  
    $cemail=$_POST['cemail'];
    $cphone=$_POST['cphone']; 
    $comment=$_POST['comment']; 
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con,'user') or die("cannot select DB");  
    {  
    $sql="INSERT INTO login(cname,cemail,cphone,comment) VALUES('$cname','$cemail','$cphone','$comment')";  
  
    $result=mysqli_query($con,$sql);  
        if($result){  
    echo "comment Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    }   
}  
}  
?>  
</body>  
</html>   