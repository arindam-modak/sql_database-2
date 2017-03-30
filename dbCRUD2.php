<!--
	File Name - dbCRUD2.php
	Database CRUD Operations
-->

<html>
	<form>
		<table border="1" align="center">
			<tr>
				<td>Id</td>
				<td><input type="text" name="txtId"></td>
			</tr>
			<tr>
				<td>pic</td>
				<td><input type="text" name="pic1"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="txtName"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td>
					<select name="lstAge">
						<?php
							for($i=18; $i<=60; $i++)
							{
								echo "<option>$i</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td  colspan='2'>
					<input type="submit" name="btnAdd" value="Add Record">&nbsp;&nbsp;
					<input type="submit" name="btnUpdate" value="Update Password">&nbsp;&nbsp;
					<input type="submit" name="btnDelete" value="Delete Record">&nbsp;&nbsp;
					<input type="submit" name="btnDisplayById" value="Display Record By ID">&nbsp;&nbsp;
					<input type="submit" name="btnDisplayAll" value="Display All Records">&nbsp;&nbsp;
				</td>
			</tr>
	</form>
<div class="container" style="border: 1px solid black;margin: 100px 150px 100px 80px;background-color: lightpink;width:800px;outline-style: dotted;">
	<?php
	require("dbconfig2.php");

	 

	if(isset($_REQUEST['txtName']))
	{
		$name = $_REQUEST['txtName'];
	}
	else
	{
		$name = "";
	}

	if(isset($_REQUEST['pic1']))
	{
		$pic2 = $_REQUEST['pic1'];
	}
	else
	{
		$pic2 = "#";
	}

	//Add button
	if(isset($_REQUEST['btnAdd']))
	{
		$sql = "Insert into register(name1,pic) values('$name', '$pic2')";
		
		if($name=="" or $pic2=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			if(mysqli_query($con, $sql)===true)
			{
				if(mysqli_affected_rows($con)>0)
				{
					echo "Record Add successfully";
				}
				else
				{
					echo "Record could not be addeded!!";
				}
			}
			else
			{
				echo "Error! Query could not be run!!";
			}
		}
	}

	//Display by Id
	if(isset($_REQUEST['btnDisplayById']))
	{
		$sql = "Select * from register where  name1 = '$name'";
		
		if($name=="")
		{
			echo "Error! some of  the required fields are empty!!";
		}
		else
		{
			$rs = mysqli_query($con, $sql);
			
			while($row = mysqli_fetch_array($rs))
			{
				echo $row['name1'].'---'.$row['pic'].'<br>';
				 echo '<img src="'.$row['pic'].'.png" style="height:200px;width:200px;">';
				
			}
		}
	}

	
	mysqli_close($con);
	
	
	?>
	</div>
</html>
