<?php
include "dbconnect.php";
 if(isset($_GET['searchbtn'])){
$searchItem=$_GET['searchInput'];
$searchsql="SELECT * FROM studentdata WHERE sname = '$searchItem'";;
$searchResult=mysqli_query($conn,$searchsql);

// if($searchResult->num_rows>0){
//   while($row=mysqli_fetch_assoc($searchResult)){
//     echo $row['sid'];
//   }
// }
 }


//  table for searched data 
if($searchResult->num_rows>0){
  ?>
  
  <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center" style="margin-top:50px">
    <t>
      <th>ID</th>
      <th>NAME</th>
      <th>CITY</th>
      <th>ATTENDENCE</th>
      <th>CONTACT</th>
      <th>Actions</th>
    </tr>
  <?php
  while($row=mysqli_fetch_assoc($searchResult)){
    // print_r($row);
    ?>
    <tr>
      <td><?php echo $row['sid'] ?></td>
      <td><?php echo $row['sname'] ?></td>
      <td><?php echo $row['scity'] ?></td>
      <td><?php echo $row['sattendence'] ?></td>
      <td><?php echo $row['scontact'] ?></td>
      <td style="display: flex; gap:10px;">
      <form action="./update.php" method="get">
    <button name="updatebtn" value="<?php echo $row['sid']; ?>">Update</button>
      </form>
     <form action="./delete.php" method="get">
     <button name="deletebtn" value="<?php echo $row['sid']; ?>">Delete</button>
     </form>
     </td>
      
    </tr>
   


    <?php }
    ?>
</table>

<?php }

 ?>