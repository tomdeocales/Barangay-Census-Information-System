<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barangay Sucol Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link  rel="stylesheet" href="barangay.css">
</head>
<body>
	
	<div class="sidebar">
		
		<a id="admin" href="dashboard.php">
		<h3><img id="adminpic" src="PIC/output-onlinepngtools.png" width="25" height="25"> Admin</h3></a>
		<hr style="border-color: #666666;">
        <a href="dashboard.php"><img id="dashpic" src="PIC/output-onlinepngtools (2).png" width="18" height="18"> Dashboard</a>
        <hr style="border-color: #666666">
		<a href="barangay.php">	Barangay Officials</a>
		<a href="index.php">Records</a>
		<hr style="border-color: #666666">
		<a href="/php-crud-yt-main/sample/index.php" class="text-white" onclick="return confirm('Are you sure you want to log out?')"><i class="fa fa-sign-out"></i> Log Out</a>
		
	</div>

	<div class="content">
		<h2>Barangay Officials</h2>


		<div class="officials-container">
			<div class="official-card">
				<img src="\PIC\perez.jpg" alt="Official 1">
				<h3>HON. EDUARDO F. PEREZ</h3>
				<h4>Barangay Captain</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form1">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="balagtas.jpg" alt="Official 2">
				<h3>ABDIEL C. BALAGTAS</h3>
				<h4>Agriculture</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form2">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 3">
				<h3>JOAN GRACE C. CAPUNO</h3>
				<h4>Women & Family</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form3">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 4">
				<h3>ROSANO F. BALAGTAS</h3>
				<h4>Education</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form4">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 5">
				<h3>RONALDO P. ARUTA</h3>
				<h4>Public Works Peace</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form5">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 6">
				<h3>FELINO A. VICTORIA</h3>
				<h4>Peace & Order</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form6">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 7">
				<h3>DIONICIO P. VIVAS</h3>
				<h4></h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form7">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 8">
				<h3>LILET R. ADISAZ</h3>
				<h4>Health & Sanitation</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form8">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 9">
				<h3>SHIELA MAE A. HERMILLOS</h3>
				<h4>Sports & Development</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form9">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 10">
				<h3>JOY ANNE Z. LAPUZ</h3>
				<h4>Secretary</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form10">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			<div class="official-card">
				<img src="capuno.jpg" alt="Official 11">
				<h3>LYDIA P. AMBROCIO</h3>
				<h4>Treasurer</h4>				
				<button class="update-btn">UPDATE</button>
				<form class="update-form" id="update-form11">
					
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					 
					<label for="title">Position:</label>
					<input type="text" id="title" name="title" required>
					
					<label for="photo">Photo:</label>
					<input type="file" id="photo" name="photo" class="choose" accept="image/*" required>
					
					<button type="submit">Save</button>
					<button type="button" class="cancel-btn">Cancel</button>
				</form>
			</div>
			
			
			
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="officialsscript.js"></script>
	<script>
		// Store the current values of the input boxes in localStorage
$('.update-form').submit(function() {
  var formId = $(this).attr('id');
  localStorage.setItem(formId + '-name', $('#' + formId + ' #name').val());
  localStorage.setItem(formId + '-title', $('#' + formId + ' #title').val());
});

// Retrieve the stored values and set them as the default values for the input boxes
$(document).ready(function() {
  $('.update-form').each(function() {
    var formId = $(this).attr('id');
    var storedName = localStorage.getItem(formId + '-name');
    var storedTitle = localStorage.getItem(formId + '-title');
	var storedPhoto = localStorage.getItem(formId + '-photo');
    if (storedName) {
      $('#' + formId + ' #name').val(storedName);
    }
    if (storedTitle) {
      $('#' + formId + ' #title').val(storedTitle);
    }
  });
});
	</script>
	
	<script>
		$(document).ready(function(){
			$('.update-btn').click(function(){
				// Hide all other forms
				$('.update-form').hide();
				// Show the form under the clicked official
				$(this).siblings('.update-form').show();
				// Align the form with the width of the official card
				var cardWidth = $(this).parent('.official-card').width();
				$(this).siblings('#update-form').css('width', cardWidth - 40);
			});

			$('.cancel-btn').click(function(){
				$(this).parent('.update-form').hide();
			});
		});
	</script>
</body>
</html>