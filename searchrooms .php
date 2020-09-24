
<?php
  
  require('includes/config.php');
  $search = $_POST['uname'];

  if($search=='rooms' OR $search=='room')
  {

    $sql = "SELECT  * FROM RoomType";    

  }else
  {

    $sql = "SELECT  * FROM RoomType WHERE Rtypename LIKE '%$search%'  ";
  


  }

  
  $result = mysqli_query($conn, $sql);

  $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  mysqli_free_result($result);
 
  mysqli_close($conn);

  //print_r($users);
  

?>
<!DOCTYPE html>
<html>
<head>
  <title>Online Hotel Reservation system</title>
  <link rel="stylesheet" type="text/css" href="assets/css26/style.css">
  <script src="assets/js/script5.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<body background="assets/images/11568168178_tmp_bricks-brickwall-brickwork-276514.jpg" style="background-repeat: repeat-y;">
   
    <!--INCLUDING HEADER AND THE NEVIGATION --->
  <header id="header"> <?php include('includes/header.php');?> </header>
  <nev id="neVV2"> <?php include('includes/nevigation.php');?> </nev>

<!--PAGE WITH FOOTER-FOOTER-POSITIONING-->
<div id="page-container" >
  
   <!--PAGE CONTENT-->
   <div id="content-wrap" style="padding-top:150px; padding-left:20px; ">
    <div class="fade" id="logformbackgr2" style="background-color: rgb(0,0,0,0.6);position:absolute;z-index: 1;color:white;height: 3420px;">
    <h1 style="text-align: center;color:rgb(255,255,255,0.7);font-weight: normal;font-family: monospace;font-size: 35px;margin-top: 20px;margin-bottom: 0px;">SEARCH RESULTS '<?php echo $search;?>'</h1>
            <hr style="width: 86%;">

    <?php  foreach($rooms as $room) { ?>
                <h2 style="font-family: monospace;">
                <div class="dash1" style="margin-left: 50px;border-radius: 5px;background-color: rgb(0,0,0,0.5);height: auto;width: 94%;border-style: ridge;color:white;text-align: center; display: inline-block;float:left;margin-top: 40px;margin-right: 100px;"><h3 style="color:rgb(255,255,255,0.7);font-weight: normal;font-family: monospace;font-size: 35px;margin-top: 0px;"><?php echo htmlspecialchars(strtoupper($room['Rtypename']));?></h3>
                <ul style="list-style: none;text-align: left;color:rgb(255,255,255,0.9);font-weight: normal;font-family: monospace;font-size: 25px;">

                <li>Room id : <?php echo htmlspecialchars($room['TypeID']);?></li>
                <li>Room name : <?php echo htmlspecialchars(ucfirst($room['Rtypename']));?></li>
                <li>Room details : <?php echo htmlspecialchars($room['TypeDetails']);?></li>
                <li>Room price : <?php echo htmlspecialchars($room['Rtypeprice']).' LKR per one night';?></li>
                 
              </ul>
              </div>
               </h2>
            


              <?php } ?>

    </div> 
     
   </div>
    
   <footer id="footer" style="position: absolute;top: 3440px;background-color: rgb(255,255,255,0.9);z-index: 1;"> <?php include('includes/footer.php');?> </footer>
</div>
</body>
</html>
