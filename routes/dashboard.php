<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
// status
    if($_SESSION['userdata']['status']==0){
        $status = '<b style = "color: red">Not Voted</b>';
    }
    else{
        $status = '<b style = "color: green">Voted</b>';
    }

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online voting system - Dashboars</title>
    <link rel="icon" href="../image/logo.jpg">

    <link rel="stylesheet" href="../css/stylesheet.css">

</head>
<body>
    <style>
        #backbtn{
            float: left;
             margin-left: 20px;
             margin-top: 20px;
             padding: 5px;
             font-size: 15px;
              background-color: #3498db;
             color: white;
              border-radius: 5px
        }
        #logoutbtn{
            float: right;
            margin-left: 20px;
            margin-top: 20px;
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px
        }
        #Profile{
           background-color: white;
           width: 30%;
           padding: 20px;
           float: left;
        }
        #Group{
            background-color: white;
           width: 60%;
           padding: 20px;
           float: right;

        }
        #votebtn{
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;

        }
        #mainpanel{
            padding: 10px;
        }
        #voted{
            padding: 5px;
            font-size: 15px;
            background-color: green;
            color: white;
            border-radius: 5px;


        }


    </style>

    <div id ="mainsection">
        <div id="headersection">
            <a href="../"><button id="backbtn" > Back</button></a>
            <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
          <center>
            <h1>online voting system</h1>
          </center>
         </div>
         <hr color="black">
         <div id="mainpanel">
         <div id="Profile">
           <center> <img src="../uploads/<?php echo $userdata['photo'] ?>"  height="100" width="100"></center><br><br>
            <b>Name:</b> <?php  echo $userdata['name']  ?> <br><br>
            <b>Mobile:</b><?php  echo $userdata['mobile']  ?><br><br>
            <b>Address:</b><?php  echo $userdata['address']  ?><br><br>
            <b>status:</b><?php  echo  $status  ?><br><br>

      </div>
         <div id="Group">
            <?php
                if($_SESSION['groupsdata']){
                   for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                        <b>Group Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                               if($_SESSION['userdata']['status']==0){
                                ?>
                                 <input type="submit" name="votebtn" value="vote" id="votebtn">
                                <?php
                               }
                               else{
                                     ?>
                                     <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                     <?php

                                }

                            ?>
                            
                        </form>
                    </div>
                    <hr line color="black">
                    <?php
                  }
                }
                else{

                }

            ?>

         </div>

         </div>

     

    </div>
   
    
    
</body>
</html>