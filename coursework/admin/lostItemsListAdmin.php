<?php
session_start();
include 'dataConnec.php';
if ($con) {
  //echo "connection success";
}else {
  echo "connection not success";
}

$query = "select * from items ";
$result = mysqli_query($con,$query);
?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Lost Items</title>

     <style media="screen">

     .heading{
      width: 100%;
      line-height:65px;
      font-size: 2.5rem;
      font-family: 'Oswald', sans-serif;

     }

     body{
       background-image: url(../img/night.jpg);


       background-size:cover;
       background-attachment: fixed;
     }
     </style>
     <?php include 'links.php' ?>
   </head>
   <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="adminHome.php">FiLo Systems</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
             <a class="nav-link" href="adminHome.php">Home<span class="sr-only"></span></a>
           </li>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
             <a class="nav-link" href="lostItemsListAdmin.php">Lost Items<span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="create.php">Create</a>
           </li>
                     <li class="nav-item active">
             <a class="nav-link" href="requestAdmin.php">Requests</a>
           </li>

<li class="nav-item active">
             <a class="nav-link" href="registredUsers.php">List Of Registred Users</a>
           </li>

         </ul>


       </div>
     </nav>
     <div style="position:relative;top:60px;left:900x;height:500px;" class="container centre-div shadow"  >
       <div class="heading text-center mb-5 text-uppercase text-white">
        LOST ITEMS

       </div>
  <div style="position:relative;top:100px;" class="container  bg-white" >
       <!-- <div class="heading text-center  text-uppercase text-white">Lost Items</div> -->
     <table   class="table table-striped table-hover table-bordered p-4 text-center ">
       <tr>
         <th scope="col">ID</th>
          <th scope="col">Color</th>
          <th scope="col">Type</th>
          <th scope="col">Location</th>
          <th scope="col">Date</th>
         <th scope="col">Description</th>
         <th scope="col">Image</th>
         <th> Delete </th>
         <th> Edit </th>
       </tr>
       <?php
       while ($rows=mysqli_fetch_assoc($result))
       {
        ?>
         <tr>
           <td> <?php echo $rows['id']; ?></td>
            <td> <?php echo $rows['color']; ?></td>
            <td> <?php echo $rows['type']; ?></td>
            <td> <?php echo $rows['location']; ?></td>
            <td> <?php echo $rows['date']; ?></td>
            <td> <?php echo $rows['description']; ?></td>
            <td> <button class="btn-primary btn"> <a href="images.php?id=<?php echo $rows['id']; ?>" class="text-white"> images </a> </button> </td>
            <td> <button class="btn-danger btn"> <a href="remove.php?id=<?php echo $rows['id']; ?>" class="text-white"> Delete </a>  </button> </td>
            <td> <button class="btn-primary btn"> <a href="editRecord.php?id=<?php echo $rows['id']; ?>" class="text-white"> Edit </a> </button> </td>
        </tr>
        <?php
          }
       ?>
     </table>
   </div>
   </body>
 </html>
