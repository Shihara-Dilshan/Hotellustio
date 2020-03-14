<?php
  if(isset($_GET['roomid']))
  {

    require('includes/config.php');
    $rID = $_GET['roomid'];
    $sql2 = "SELECT * FROM RoomType WHERE TypeID='$rID'";

    $result = mysqli_query($conn,$sql2);

    $rooms = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $roomtid = $rooms['TypeID'];
    $roomtype = $rooms['Rtypename'];
    $roomdetails = $rooms['TypeDetails'];
    $price = $rooms['Rtypeprice'];

  }
  
  


    
  if(isset($_POST['submit']))
  {

        
        require('includes/config.php');
        
        $rid = mysqli_real_escape_string($conn ,$_POST['rid']);
        $rname = mysqli_real_escape_string($conn ,$_POST['rname']);
        $rprice = mysqli_real_escape_string($conn ,$_POST['rprice']);
        $rdetails = mysqli_real_escape_string($conn ,$_POST['rdetails']);
        
        $sql = "UPDATE RoomType SET Rtypename='$rname' , Rtypeprice='$rprice' , TypeDetails = '$rdetails' WHERE TypeID='$rid'";
       
        if(mysqli_query($conn,$sql))
        {
            
            echo "<script>alert('Room successfully updated');
                 window.location.href='managerooms.php';
                  </script>";
            


        }else
        {

            echo 'query error : ' .mysqli_error($conn);

        }

    }   


?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Hotel Reservation system</title>
	<link rel="stylesheet" type="text/css" href="assets/css27/style.css">
	<script src="assets/js/scriptw.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<body background="assets/images/prism_abstract-1920x1080.jpg" class="fade" >
 
   	<!--INCLUDING HEADER AND THE NEVIGATION --->
	<header id="header"> <?php include('includes/header.php');?> </header>
	<nev id="neVV"> <?php include('includes/nevigation.php');?> </nev>
   <?php
  
  
        if (empty($_SESSION['aname']))
        {
            // The username session key does not exist or it's empty.
            header('Location: adminlogin.php');
    
        }


    ?>
<!--PAGE WITH FOOTER-FOOTER-POSITIONING-->
<div id="page-container" >
  
   <!--PAGE CONTENT-->

   <div id="content-wrap" style="padding-top:150px; padding-left:20px; ">
   
    
 
   
   <div id="content-wrap" style="padding-top:240px; padding-left:20px; ">

        <!--LOGING-FORM-TRANSPARENT-BACKGROUN-->
        <div class="fade" id="logformbackgr" style="height: 1469px; position: absolute; position:absolute;z-index: 1; ">
            <h1 id="tit" style="color: white;font-family: monospace;font-weight: 0;text-align: center;margin-top: 30px;z-index: 1;"> EDIT ROOM </h1>
   			    <hr>
            <div style="margin-top: 50px;color: black;">
  
          <div class="login-container" style="padding-top: 0px">
            <form name="editpackage" action="editroom.php" method="POST" onsubmit="return basicvalidateForm2();">
                  <!--LOGING-FORM-HEADER-->
                <div class="head-container">
              
                         <h2 style="font-weight: normal;font-family: monospace; font-weight: normal;text-align: center;margin: 30px;padding-top: 20px;color: black;font-size: 25px;"> Room info  </h2>
                       
                </div>

                <!--LOGIN-FORM-CONTENT-->
              <div class="form-container">
             <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;display: none;">ROOM ID </h3>
            <input style="display: none;" type="text" name="rid" value="<?php echo $roomtid; ?> ">
          
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;">ROOM NAME </h3>
            <input type="text" name="rname" value="<?php echo $roomtype; ?> ">
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;"> PRICE </h3>
            <input type="text" name="rprice" value="<?php echo $price; ?> ">
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;"> DETAILS </h3>
            <textarea rows="4" cols="50" name="rdetails" style="width: 97%;border-radius: 5px;"><?php echo $roomdetails; ?> </textarea>
           
            </div>

              <!--LOGIN-FORM-FOOTER-PART-->
                <div class="btn-container" style="overflow: auto;auto">
            <div style="padding-left: 23px; padding-top: 0px;">
            <button tyle="submit" name="submit" style="font-size: 13px; border-radius: 10px; background-color:#1ac6ff;font-family: monospace; font-weight: normal;width: 97%" > update room </button>
              

            </div>


                </div>


          </form>

            </div>


   			</div>
            
                  
     	          

               
     	       

     	 

            </div>

    </div>


   



   
   </div>

  

</div>

 </div>

    
<footer id="footer" style="position: absolute;top: 1479px;background-color: rgb(255,255, 255,0.3);z-index: 1;"> <?php include('includes/footer.php');?> </footer>
</div>
</body>
</html>
