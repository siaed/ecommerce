<?php
ob_start();
session_start();
$pageTitle='Home';
if(isset($_SESSION['username'])){
    include "inti.php";
/**
 * start home page
 * 
 */
$thenumber=4;//the number of the latest user you want to show
$re=getLatest('*','users','UserID',$thenumber);//the function that get you the lasest user added

?>

   <div class="container home-stat text-center">
        <h1 class="text-center">Home Page</h1>
        <div class="row">
           <div class="col-md-3"><div class="stat st-members">Total Members <span><a href="members.php"><?php echo itemCount('UserID','users') ?></a></span></div>
        </div>
           <div class="col-md-3 "><div class="stat st-pending">Pending Membe<span><a href="members.php?page=pending"><?php echo itemCountPrivate('RegStatus','users',0) ?></a></span></div></div>
           <div class="col-md-3 "><div class="stat st-items">Total  Items <span><a href="">200</a></span></div></div>
           <div class="col-md-3 "><div class="stat st-comments">Total comments <span><a href="">30</a></span></div></div>
        </div>
   
   </div>
   <div class="container latest" >
       <div class="row">
           <div class="col-sm-6">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <i class="fa fa-user">

                   </i> Last <?php echo $thenumber; ?> Registed user
               </div>
               <div class="panel-body">
               <ul  class="list-unstyled latest-user">
                   <?php
                   foreach($re as $user){
                    if($user["RegStatus"]==0){
                        echo "<a href='members.php?do=Activate&userid=".$user["UserID"]."' class='btn btn-primary' style='margin-left:5px;margin-top:7px; float:right;padding: 3px 5px; '><i class='fas fa-check-circle' style='position: relative;
                        top: 1px;'></i> Activate</a>";
 
                      }
                       echo "<li>".$user['username']."<span class='btn btn-success sp'><i class='fa fa-edit'></i><a href='members.php?do=edit&userid=".$user["UserID"]."' style='color:#fff;text-decoration: none;'>Edit</a></span></li>";
                   }
                   ?>
                   </ul>
               </div>

           </div>
           </div>
           <div class="col-sm-6">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <i class="fa fa-tag">

                   </i> Last Items Added
               </div>
               <div class="panel-body">
                   test
               </div>

           </div>
           </div>
       </div>
   </div>

<?php

 /**
 * end home page
 * 
 */
    include $tmp.'footer.php';
    exit();
    
}else{
    header('Location:index.php');
    exit();
}
ob_end_flush();
?>