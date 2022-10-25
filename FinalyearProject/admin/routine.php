<?php 

  //include header file
  include ('include/header.php');

?>
<?php
  $query="SELECT schedule from time1";
  $query1="SELECT semester_name from semseter";
  $result=mysqli_query($conn,$query);
  $result1=mysqli_query($conn,$query1);
?>
<style>
table {
  width:100%;
}
table tr:nth-child(even) {
  background-color: #eee;
}
table tr:nth-child(odd) {
 background-color: #fff;
}
table th {
  background-color: red;
  color: white;
}
#tab{
  min-height: 400px;
}
</style>

  <div class="container" style="margin-top:100px">
    <div id="tab">
      <table align="center" border="1px" style="line-height:30px;text-align:center">
        <tr>
          <th colspan="6" style="text-align:center;"><h2 style="color: white;">Class routine</h2></th>
        </tr>
        <tr>
          <th>day</th>
          <th>semester</th>
          <?php
              while($rows=mysqli_fetch_assoc($result)){
            ?> 
            <th><?php  echo $rows['schedule'];?></th>
           
          <?php   
          }
          ?>
          
        </tr>

        
           <?php
              while($rows1=mysqli_fetch_assoc($result1)){
            ?> 
            <tr>
              <td><?php echo $rows1['semester_name'];?></td>
            </tr>
           <?php   
          }
          ?>
        
        
      
      </table>
    </div>
  </div>
  
<?php
  include ('include/footer.php'); 
?>