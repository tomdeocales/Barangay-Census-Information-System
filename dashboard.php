<?php 
include "db_conn.php"; 

// Query to get total number of records 
$total_query = "SELECT COUNT(*) as total FROM `crud`"; 
$total_result = mysqli_query($conn, $total_query); 
$total_count = mysqli_fetch_assoc($total_result)['total']; 

// Query to get count of residents per purok 
$purok_query = "SELECT purok, COUNT(*) as count FROM `crud` GROUP BY purok"; 
$purok_result = mysqli_query($conn, $purok_query); 
$purok_counts = array(); 

while ($row = mysqli_fetch_assoc($purok_result)) { 
    $purok_counts[$row['purok']] = $row['count']; 
} 

// Check if a purok has been selected 
if (isset($_GET['purok'])) {
    $selected_purok = $_GET['purok'];
    // Query to get count of residents for the selected purok
    $selected_purok_query = "SELECT COUNT(*) as count FROM `crud` WHERE purok='$selected_purok'";
    $selected_purok_result = mysqli_query($conn, $selected_purok_query);
    $selected_purok_count = mysqli_fetch_assoc($selected_purok_result)['count'];
    // Query toget the residents for the selected purok
    $selected_residents_query = "SELECT * FROM `crud` WHERE purok='$selected_purok'";
    $selected_residents_result = mysqli_query($conn, $selected_residents_query);
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barangay Sucol Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

    <style>
		a:hover {
		text-decoration: none;
		}

		body{
			scroll-behavior: smooth;
		}
		.sidebar a:last-child {
			position: absolute;
			bottom: 15px;
			left: 15px;
		}
		body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0;
        }
        .card-subtitle {
            font-size: 18px;
            color: #6c757d;
            margin-top: 5px;
        }
        .card-icon {
            font-size: 36px;
            color: #007bff;
        }
        .card-icon i {
            margin-right: 10px;
        }
        .card-total {
            background-color: #007bff;
            color: #fff;
        }
        .card-total .card-icon {
            color: #fff;
        }
        .card-total .card-subtitle {
            color: #fff;
        }
        .card-purok {
            background-color: #fff;
            color: #333333;
        }
        .card-purok .card-icon {
            color: #007bff;
        }
        .card-purok .card-subtitle {
            color: #6c757d;
        }
        .selected-purok {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0;
        }
        .selected-purok-count {
            font-size: 18px;
            color: #6c757d;
            margin-top: 5px;
        }

		.sidebar {
			background-color: #343a40;
			color: #fff;
			height: 100%;
			position: fixed;
			left: 0;
			padding: 15px;
			width: 250px;
			z-index: 1;
		}

		.sidebar a {
			color: #fff;
			display: block;
			padding: 10px;
			text-decoration: none;
		}

		.sidebar a:hover {
			background-color: #212529;
		}

		.content {
			margin-left: 250px;
			padding: 0px 15px 15px 15px;

		}
		@media only screen and (max-width: 768px) {
			.sidebar {
				width: 100%;
				height: auto;
				position: relative;
			}

			.content {
				margin-left: 0;
			}
			.sidebar a:last-child {
				position: static;
				margin-top: 15px;
			}
		}
        #admin{
			cursor: pointer;
			border-width: none;
			background-color: #343a40;
		}
        #adminpic{
			margin-top: -5px;
		}
		#dashpic{
		margin-top: -3px;
		}
		#itolang:hover{
			border-color: #007bff;
			cursor: pointer;
			transition: .5s;
		}
		.resident {
			display: flex;
			align-items: center;
		}

		.resident-name {
			flex: 1;
			
		}

	</style>
</head>
<body>
	<div class="container-fluid">
            <div class="row">
            <div class="col-lg-3 col-md-4 sidebar">
			<a id="admin" href="dashboard.php">
			<h3><img id="adminpic" src="PIC/output-onlinepngtools.png" width="25" height="25"> Admin</h3></a>
			<hr style="border-color: #666666">
			<a href="dashboard.php"><img id="dashpic" src="PIC/output-onlinepngtools (2).png" width="18" height="18"> Dashboard</a>
			<hr style="border-color: #666666">
			<a href="barangay.php">	Barangay Officials</a>
			<a href="index.php">Records</a>
			<hr style="border-color: #666666">
			<a href="/php-crud-yt-main/sample/index.php" class="text-white" onclick="return confirm('Are you sure you want to log out?')"><i class="fa fa-sign-out"></i> Log Out</a>

            </div>
			<div class="col-lg-9 col-md-8 content">
				<div class="container mt-5">
					<div class="row">
						<div class="col-md-4 mb-4">
							<div class="card card-total">
								<div class="card-body text-center">
									<h3 class="card-title">Total Residents</h3>
									<h4 class="card-subtitle mb-2"><?php echo $total_count; ?></h4>
									<i class="fas fa-users card-icon"></i>
								</div>
							</div>
						</div>
						<div class="col-md-8 mb-4">
							<div class="card card-purok">
								<div class="card-body">
									<h3 class="card-title">Residents Per Purok</h3>
									<div class="row">
										<?php foreach (array_slice($purok_counts, 1) as $purok => $count) { ?>
											<div class="col-sm-4 mb-3">
											<a href="?purok=<?php echo $purok; ?>">
												<div id ="itolang" class="card">
													<div class="card-body text-center">
														<h5 class="card-title"><?php echo $purok; ?></h5>
														<h6 class="card-subtitle mb-2"><?php echo $count; ?> residents</h6>
														<i class="fas fa-home card-icon"></i>
													</div>
												</div>
											</a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					
					<div class="mb-4">
					<?php 
					// Check if a purok has been selected
					if (isset($_GET['purok'])) {
						$selected_purok = $_GET['purok'];
						
						// Query to get names of residents for the selected purok
						$selected_purok_query = "SELECT * FROM `crud` WHERE purok='$selected_purok'";
						$selected_purok_result = mysqli_query($conn, $selected_purok_query);
						
						// Display the names of residents in the selected purok
						?>
						<div class="card">
							<div class="card-body">
								<h3 class="selected-purok"><?php echo $selected_purok; ?></h3>
								<?php
								$selected_purok_count_query = "SELECT COUNT(*) as count FROM `crud` WHERE purok='$selected_purok'";
								$selected_purok_count_result = mysqli_query($conn, $selected_purok_count_query);
								$selected_purok_count = mysqli_fetch_assoc($selected_purok_count_result)['count'];
								?>
								<h4 class="selected-purok-count"><?php echo $selected_purok_count; ?> Residents</h4>
								<?php
								while ($row = mysqli_fetch_assoc($selected_purok_result)) {
									$resident_id = $row['id'];
									$resident_name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
									
									?>
									<div class="resident">
										<div class="resident-name"><?php echo $resident_name; ?><br><br></div>
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#residentModal<?php echo $resident_id; ?>">Show Details</button>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="residentModal<?php echo $resident_id; ?>" tabindex="-1" role="dialog" aria-labelledby="residentModalLabel<?php echo $resident_id; ?>" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<!-- Modal header -->
												<div class="modal-header">
													<h5 class="modal-title" id="residentModalLabel<?php echo $resident_id; ?>">Information</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
                                <!--Modal body -->
								
                                <div class="modal-body">
                                    <form action="edit_resident.php" method="POST">
									<p><strong>Family Number:</strong> <?php echo $row["family_number"] ?></p>
									<p><strong>Facility Number:</strong> <?php echo $row["facility_number"] ?></p>
									<p><strong>Patient Identity Number:</strong> <?php echo $row["patient_identity_number"] ?></p>
									<p><strong>Last Name:</strong> <?php echo $row["last_name"] ?></p>
									<p><strong>First Name:</strong> <?php echo $row["first_name"] ?></p>
									<p><strong>Middle Name:</strong> <?php echo $row["middle_name"] ?></p>
									<p><strong>Suffix:</strong> <?php echo $row["suffix"] ?></p>
									<p><strong>Gender:</strong> <?php echo $row["gender"] ?></p>
									<p><strong>Civil Status:</strong> <?php echo $row["civil_status"] ?></p>
									<p><strong>Birth Date:</strong> <?php echo $row["birth_date"] ?></p>
									<?php
									$birthdate = new DateTime($row["birth_date"]);
									$today = new DateTime();
									$age = $birthdate->diff($today)->y;
									?>
									<p><strong>Stage:</strong> <?php echo $row["stage"] ?></p>
									<p><strong>Age:</strong> <?php echo $age ?></p>
									<p><strong>Philhealth Number:</strong> <?php echo $row["philhealth_number"] ?></p>
									<p><strong>Mother's Maiden Name:</strong> <?php echo $row["mothers_maiden_name"] ?></p>
									<p><strong>Contact Number:</strong> <?php echo $row["contact_number"] ?></p>
									<p><strong>Blood Type:</strong> <?php echo $row["blood_type"] ?></p>
									<p><strong>Person With Disability:</strong> <?php echo $row["pwd"] ?></p>
									<p><strong>Indigenous People:</strong> <?php echo $row["indigenous_people"] ?></p>
									<p><strong>Has Consent:</strong> <?php echo $row["has_consent"] ?></p>
									<p><strong>Religion:</strong> <?php echo $row["religion"] ?></p>
									<p><strong>Education:</strong> <?php echo $row["education"] ?></p>
									<p><strong>Occupation:</strong> <?php echo $row["occupation"] ?></p>
									<p><strong>Citizenship:</strong> <?php echo $row["citizenship"] ?></p>
									<p><strong>Family Role:</strong> <?php echo $row["family_role"] ?></p>
									<p><strong>Region:</strong> <?php echo $row["region"] ?></p>
									<p><strong>Province:</strong> <?php echo $row["province"] ?></p>
									<p><strong>Municipality:</strong> <?php echo $row["municipality"] ?></p>
									<p><strong>Barangay:</strong> <?php echo $row["barangay"] ?></p>
									<p><strong>Purok:</strong> <?php echo $row["purok"] ?></p>
									<p><strong>Present Address:</strong> <?php echo $row["present_address"] ?></p>
									<p><strong>Permanent Address:</strong> <?php echo $row["permanent_address"] ?></p>
									
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        // If no purok has been selected, display a message prompting the user to select one
        ?>
        <div class="alert alert-info" role="alert">
            Please select a purok to view its residents.
        </div>
        <?php
    }
    ?>
</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>