<!--
	File Name - CRUD.php
	Database CRUD Operations
-->

<html>
<body>

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
</body>
</html>