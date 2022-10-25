<?php 

	//include header file
	include ('include/header.php');

?>
<?php
	$query="SELECT dept_name from department";
	$result=mysqli_query($conn,$query);
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
					<th colspan="4" style="text-align:center;"><h2 style="color: white;">The List Is Given Below</h2></th>
				</tr>
				<tr>
					
					<th>DEPARTMENT</th>
				</tr>
				<?php
					while($rows=mysqli_fetch_assoc($result)){
				?>	
					<tr>
						<td><?php echo $rows['dept_name'];?></td>
						
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