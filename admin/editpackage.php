<?php
  
  if(isset($_GET['PID']))
  {
  require('includes/config.php');
  $PackageId = $_GET['PID'];
  $sql = "SELECT * FROM Package WHERE PID='$PackageId'";
  $result = mysqli_query($conn,$sql);
  $pdetails = mysqli_fetch_array($result,MYSQLI_ASSOC);


  $packid = $pdetails['PID'];
  $pname = $pdetails['Pname'];
  $packagePRICE = $pdetails['Pprice'];
  $pdetails = $pdetails['Pdetails'];

  }
 
  if(isset($_POST['submit']))
  {

        require('includes/config.php');
        $npname = mysqli_real_escape_string($conn ,$_POST['npname']);
        $npprice = mysqli_real_escape_string($conn ,$_POST['npprice']);
        $npdetails = mysqli_real_escape_string($conn ,$_POST['npdetails']);
        $pid = mysqli_real_escape_string($conn ,$_POST['pid']);
        
        $sql2 = "UPDATE Package SET Pname='$npname' , Pprice='$npprice' , Pdetails = '$npdetails' WHERE PID='$pid'";
        if(mysqli_query($conn,$sql2))
        {
            
         
            echo "<script>alert('Package successfully updated');
                 window.location.href='managepackages.php';
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
            <h1 id="tit" style="color: white;font-family: monospace;font-weight: 0;text-align: center;margin-top: 30px;z-index: 1;"> EDIT PACKAGE </h1>
   			    <hr>
            <div style="margin-top: 50px;color: black;">
  
          <div class="login-container" style="padding-top: 0px">
            <form name="editpackage" action="editpackage.php" method="POST" onsubmit="return basicvalidateForm2();">
                  <!--LOGING-FORM-HEADER-->
                <div class="head-container">
              
                         <h2 style="font-weight: normal;font-family: monospace; font-weight: normal;text-align: center;margin: 30px;padding-top: 20px;color: black;font-size: 25px;"> Package info  </h2>
                       
                </div>

                <!--LOGIN-FORM-CONTENT-->
              <div class="form-container">
             <!--h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;">CURRUNT PACKAGE NAME </h3>
            <input type="text" name="cpname" value="">
             <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;">CURRUNT PRICE </h3>
            <input type="text" name="cpprice" value=""-->
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;display: none;">PACKAGE ID </h3>
            <input style="display: none;" type="text" name="pid" value="<?php echo $packid; ?>" >

            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;">PACKAGE NAME </h3>
            <input type="text" name="npname" value="<?php echo $pname; ?>">
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;">PACKAGE DETAILS </h3>
            <textarea rows="4" cols="50" name="npdetails" style="width: 97%;border-radius: 5px;" ><?php echo $pdetails; ?></textarea>
            <h3 style="padding-top: 3%;color:black;font-family: monospace; font-weight: normal;"> PRICE </h3>
            <input type="text" name="npprice" value="<?php echo $packagePRICE; ?>">
            </div>

              <!--LOGIN-FORM-FOOTER-PART-->
                <div class="btn-container" style="overflow: auto;auto">
            <div style="padding-left: 23px; padding-top: 0px;">
            <button tyle="submit" name="submit" style="font-size: 13px; border-radius: 10px; background-color:#1ac6ff;font-family: monospace; font-weight: normal;width: 97%" > update package </button>
              
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

    
<footer id="footer" style="position: absolute;top: 1379px;background-color: rgb(255,255, 255,0.3);z-index: 1;"> <?php include('includes/footer.php');?> </footer>
</div>
</body>
</html>
