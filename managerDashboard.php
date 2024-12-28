<?php
  include_once 'connection.php';

?>
<html>
<head>
<title>Manager Page</title>
<link rel="stylesheet" href="managerdashboard.css">



</head>
<body>


<div style="margin-left:38%">
<div style = "font-size:36px;text-align:right;" id="time-display"></div>
<h1 style="color:black;">Genesis Builders (PVT) Ltd</h1>
</div>
<div class="logo-container">
        <img src="images/genisis_logo.png" alt="Logo" class="logo">
    </div>
	

<br><br><br><br><br>
 <button><a style="color:black; text-decoration:none;font-size:18px" href="Projectadd.php">Projects</a></button>
<br>

<h2 style="color:black;text-align:center;font-size:28px;"> Project Report </h2>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 2px solid #000; /* Border color */
  }

  th, td {
    border: 2px solid #000; /* Border color */
    padding: 8px;
    text-align: left;
	
  }

  th {
    background-color: #f0f0f0; /* Header background color */
  }


  tr:hover {
    background-color: #e0e0e0; /* Hover row color */
  }
</style>

<br>
<table border="2" width="100%">
	  <thead >
		<tr>
		  <th>Project ID</th>
		  <th>Project Name</th>
		  <th>Project Details</th>
		  <th>Start_Date</th>
		  <th>Due_Date</th>
	
    	</tr>
	  </thead>
	  <tbody>
		<?php 
			$query="SELECT * FROM addproject";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr>
					  <td><?php echo $row['Project_ID'] ?></td>
					  <td><?php echo $row['Project_Name'] ?></td>
					  <td><?php echo $row['Details'] ?></td>
					  <td><?php echo $row['Start_Date'] ?></td>
					  <td><?php echo $row['Due_Date'] ?></td>
					 
				</tr>
				<?php
			}
		?>
  </tbody>
</table>
</div>
  <br>
  <br>
  <br>
  <br>
  <h2 style="color:black;text-align:center;font-size:28px;"> Most Success Projects </h2>
  


  <style>
  .photo-container {
    display: flex;
    justify-content: space-between; /* Adjust the alignment as needed */
  }

  .photo {
    width: 30%; /* Adjust the width of each photo as needed */
    max-width: 100%;
  }
</style>

  <div class="photo-container">
  <img src="images/shangrilla_mostsuccess.jpg" alt="Photo 1" class="photo">
  <img src="images/highway_mostSuccess.jpg" alt="Photo 2" class="photo">
  <img src="images/central_expressway.jpg" alt="Photo 3" class="photo">
 
</div><br>

<button style = "margin-right:300px; margin-left :20px; " onclick = "myFunction('Shangrilla-Colombo')" id = "shangrilla">Shangrilla-Colombo</button>
<button style = "margin-right:;" onclick = "myFunction('Matara Highway')" id = "highway">Matara Highway</button>



<script>
function myFunction(data){

	if(data ==="Shangrilla-Colombo"){

		document.getElementById("shangrilla").innerHTML="Shangri-La Colombo is a 5-star hotel"+'<br>'+ 'in Colombo'+'<br>'+ 'The property has 500 rooms' + '<br>' + 'and has room to accommodate up to' + '<br>' + '2,000 conference guests';
	}else
	{
		document.getElementById("highway").innerHTML="Construction of the highway began in 2003"+'<br>'+ 'and' +'<br>'+ 'completion up to Galle was achieved by November 2011';

	}
}

	</script>

<script>
  function displayTime() {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');
  
  const timeString = `${hours}:${minutes}:${seconds}`;
  
  document.getElementById('time-display').innerText = timeString;
}

// Call the displayTime function every second to update the time
setInterval(displayTime, 1000);
</script>

<script>
  function displayTime() {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');
  
  const timeString = `${hours}:${minutes}:${seconds}`;
  
  document.getElementById('time-display').innerText = timeString;
}

// Call the displayTime function every second to update the time
setInterval(displayTime, 1000);
</script>

<br><br><br><br><br><br>

<footer>
<hr>

        <div><h4 style="color:black;text-align:center">Genesis Builders <br>28,18/Budgamuwa Road/Welikada/Rajagiriya|Tel:0556643321|Fax:0338889000|Email:sachinigaya@gmail.com</h4></div>
    </footer>

</body>
</html>