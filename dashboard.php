<?php
        session_start();
         if(!isset($_SESSION['userdata'])){
            header("location : ../");
         }
         $userdata=$_SESSION['userdata'];  
         $groupsdata=$_SESSION['groupsdata'];


         if($_SESSION['userdata']['status']==0){
            $status='<b style ="color:red" >Not Voted </b>';
         }
         else{
            $status='<b style ="color:green" > Voted </b>';
         }
          



?>



<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">

    </head>
    <body>
        <style>
            #backbtn{
                padding:5px;
                font-size:15px;
                background-color: #3498db;
                border-radius : 5px;
                color:white;
                float:left;
                margin:10px;

            }
            #logoutbtn{
                padding:5px;
                font-size:15px;
                background-color: #3498db;
                border-radius : 5px;
                color:white;
                float:right;
                margin:10px;

            }
            #Profile{
                float:left;
                background-color:white;
                width:30%;
                padding: 20px;
            }
            #Group{
                float:right;
                background-color:white;
                width:60%;
                padding: 20px;

            }
            #votebtn{
                padding:5px;
                font-size:15px;
                background-color: #3498db;
                border-radius : 5px;
                color:white;
                

            }
            #mainpanel{
                padding:10px;


            }
            #Voted{
                padding:5px;
                font-size:15px;
                background-color: green;
                border-radius : 5px;
                color:white;
                

            }
            



        </style>
        <div id="mainSection">
            <center>
             <div id="headerSection">
                <a href="../"><button id="backbtn">Back</button> </a>
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
             <h1>Online Voting System</h1>
            </div>
             </center>
            <hr>


            <div id="mainpanel">
                  <div id="Profile">
               <center> <img src="../uploads/<?php echo $userdata["photo"]?> height="100" width="150"" ><br><br></center>
                <b>Name:</b> <?php echo $userdata["name"]?><br><br>
                <b>Mobile:</b><?php echo $userdata["mobile"]?><br><br>
                <b>Address:</b><?php echo $userdata["address"]?><br><br>
                <b>Status:</b><?php echo $status?><br><br>
                 </div>
             <div id="Group">
                <?php 
                   if($_SESSION['groupsdata']){
                    for($i=0; $i<count($groupsdata);$i++){
                        ?>
                        <div>
                            <img style="float:right"  src="../uploads/<?php $groupsdata[$i]['photo']?>" height="100" width="100">
                            <b>Group Name : </b><?php echo $groupsdata[$i]['name'] ?> <br><br>
                            <b>Votes :</b> <?php echo $groupsdata[$i]['votes'] ?><br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php 
                                if($_SESSION['userdata']['status']==0){
                                    ?>
                                     <input type="submit" name="votebtn" value="Vote"
                                     id="votebtn">
                                    <?php

                                }else{
                                    ?>
                                     <button disabled type="button" name="votebtn" value="Vote" id="Voted"
                                >Voted</button>
                                      <?php
                                }
                                ?>
                               
                            </form>
                        </div>
                        <hr>
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