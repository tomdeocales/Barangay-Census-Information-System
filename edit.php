<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $middle_name = $_POST['middle_name'];
  $gender = $_POST['gender'];
  $family_number = $_POST['family_number'];
  $suffix = $_POST['suffix'];
  $civil_status = $_POST['civil_status'];
  $birth_date = $_POST['birth_date'];
  $philhealth_number = $_POST['philhealth_number'];
  $mothers_maiden_name = $_POST['mothers_maiden_name'];
  $contact_number = $_POST['contact_number'];
  $blood_type = $_POST['blood_type'];
  $pwd = $_POST['pwd'];
  $indigenous_people = $_POST['indigenous_people'];
  $has_consent = $_POST['has_consent'];
  $religion = $_POST['religion'];
  $education = $_POST['education'];
  $occupation = $_POST['occupation'];
  $citizenship = $_POST['citizenship'];
  $family_role = $_POST['family_role'];
  $region = $_POST['region'];
  $province = $_POST['province'];
  $municipality = $_POST['municipality'];
  $barangay = $_POST['barangay'];
  $purok = $_POST['purok'];
  $present_address = $_POST['present_address'];
  $permanent_address = $_POST['permanent_address'];
  $facility_number = $_POST['facility_number'];
  $patient_identity_number = $_POST['patient_identity_number'];
  $stage = $_POST['stage'];


  $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`middle_name`='$middle_name',`gender`='$gender',`family_number`='$family_number',`suffix`='$suffix',`civil_status`='$civil_status',`birth_date`='$birth_date',`philhealth_number`='$philhealth_number',`mothers_maiden_name`='$mothers_maiden_name',`contact_number`='$contact_number',`blood_type`='$blood_type',`pwd`='$pwd',`indigenous_people`='$indigenous_people',`has_consent`='$has_consent',`religion`='$religion',`education`='$education',`occupation`='$occupation',`citizenship`='$citizenship',`family_role`='$family_role',`region`='$region',`province`='$province',`municipality`='$municipality',`barangay`='$barangay',`purok`='$purok',`present_address`='$present_address',`permanent_address`='$permanent_address',`facility_number`='$facility_number',`patient_identity_number`='$patient_identity_number', `stage`='$stage' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  echo "No results found";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Edit Resident</title>
  <style>
   body{
			scroll-behavior: smooth;
		}
		.sidebar a:last-child {
			position: absolute;
			bottom: 15px;
			left: 15px;
		}
    .container {
      margin-top: 45px;
      margin-bottom: 100px;
    }
    body {
         background-color: #f8f9fa;
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
         padding: 15px;
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
         #admin h3{
			font-size: 28px;
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
      .text-center h3{
         margin-top: -20px;
      }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-4 sidebar">
      <a id="admin" href="dashboard.php">
        <h3><img id="adminpic" src="PIC/output-onlinepngtools.png" width="25" height="25"> Admin</h3></a>
        <hr>
        <a href="dashboard.php"><img id="dashpic" src="PIC/output-onlinepngtools (2).png" width="18" height="18"> Dashboard</a>
        <hr>
        <a href="barangay.php">	Barangay Officials</a>
        <a href="index.php">Records</a>
        <hr>
        <a href="/php-crud-yt-main/sample/index.php" class="text-white" onclick="return confirm('Are you sure you want to log out?')"><i class="fa fa-sign-out"></i> Log Out</a>

    </div>
    <div class="col-lg-9 col-md-8 content">
      <div class="container">
        <div class="text-center mb-4">
          <h3 id="edit">Edit Resident</h3>
          <p class="text-muted">Update the details below and click "Save Changes" to update the record.</p>
        </div>

    <div class="container d-flex justify-content-center">
      <form name="myForm" onsubmit="return validateForm()" action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Family Number:</label>
            <input required type="text" class="form-control" name="family_number" placeholder="00000" value="<?php echo $row['family_number']; ?>" oninput="formatFamilyNumber(this); this.value = this.value.toUpperCase();" />
          </div>
          <div class="col">
              <label class="form-label">Facility Number:</label>
              <input type="text" class="form-control" name="facility_number" value="SUCOL - 31141" readonly>
            </div>
          <div class="col">
              <label class="form-label">Patient Identity Number:</label>
              <input required type="text" class="form-control" name="patient_identity_number" placeholder="ABCD123" value="<?php echo $row['patient_identity_number']; ?>" oninput="this.value = this.value.toUpperCase();">
          </div>
        </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Last Name:</label>
              <input required type="text" class="form-control" name="last_name" placeholder="Einstein" value="<?php echo $row['last_name']; ?>">
          </div>
          
          <div class="col">
            <label class="form-label">First Name:</label>
            <input required type="text" class="form-control" name="first_name" placeholder="Albert" value="<?php echo $row['first_name']; ?>">
          </div>
  </div>

        <div class="row mb-3">
        <div class="col">
          <label class="form-label">Middle Name:</label>
          <input required type="text" class="form-control" name="middle_name" placeholder="Isaac" value="<?php echo $row['middle_name']; ?>">
        </div>

        <div class="col">
          <label class="form-label">Suffix:</label>
          <select required class="form-select" name="suffix">
            <option selected disabled>Select suffix</option>
            <option value="Sr." <?php if ($row['suffix'] == 'Sr.') echo 'selected'; ?>>Sr.</option>
            <option value="Jr." <?php if ($row['suffix'] == 'Jr.') echo 'selected'; ?>>Jr.</option>
            <option value="I" <?php if ($row['suffix'] == 'I') echo 'selected'; ?>>I</option>
            <option value="II" <?php if ($row['suffix'] == 'II') echo 'selected'; ?>>II</option>
            <option value="III" <?php if ($row['suffix'] == 'III') echo 'selected'; ?>>III</option>
            <option value="Not Applicable" <?php if ($row['suffix'] == 'Not Applicable') echo 'selected'; ?>>N/A</option>

          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label">Gender:</label>
          <select required class="form-select" name="gender">
            <option selected disabled>Select gender</option>
            <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
          </select>
        </div>
        <div class="col">
               <label class="form-label">Civil Status:</label>
                  <select required class="form-select" name="civil_status">
                     <option selected disabled>Select civil status</option>
                     <option value="Co-habitation" <?php if ($row['civil_status'] == 'Co-habitation') echo 'selected'; ?>>Co-habitation</option>
                     <option value="Married" <?php if ($row['civil_status'] == 'Married') echo 'selected'; ?>>Married</option>
                     <option value="Single" <?php if ($row['civil_status'] == 'Single') echo 'selected'; ?>>Single</option>
                     <option value="Separated" <?php if ($row['civil_status'] == 'Separated') echo 'selected'; ?>>Separated</option>
                     <option value="Widowed" <?php if ($row['civil_status'] == 'Widowed') echo 'selected'; ?>>Widowed</option>               
                  </select>
          </div>
      </div>
      <div class="row mb-3">
                  <div class="col">
                     <label class="form-label">Date of Birth:</label>
                        <input required class="form-control" type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>">
                  </div>
                  <div class="col">
                  <label class="form-label">Stage:</label>
                     <select required class="form-select" name="stage">
                        <option selected disabled>Select</option>
                        <option value="Child" <?php if ($row['stage'] == 'Child') echo 'selected'; ?>>Child</option>
                        <option value="Teen" <?php if ($row['stage'] == 'Teen') echo 'selected'; ?>>Teen</option>
                        <option value="Adult" <?php if ($row['stage'] == 'Adult') echo 'selected'; ?>>Adult</option>
                        <option value="Senior" <?php if ($row['stage'] == 'Senior') echo 'selected'; ?>>Senior</option>
                     </select>
               </div>
                  <div class="col">
                  <label class="form-label">Philhealth Number:</label>
                  <input type="text" class="form-control" name="philhealth_number" id="philhealth_number" placeholder="000000000" value="<?php echo $row['philhealth_number']; ?>">
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Mother's Maiden Name:</label>
                  <input type="text" class="form-control" name="mothers_maiden_name" placeholder="N/A" value="<?php echo $row['mothers_maiden_name']; ?>">
               </div>
               <div class="col">
                <label class="form-label">Contact Number:</label>
                <input type="number" class="form-control" name="contact_number" placeholder="00000000000" required maxlength="11" oninput="checkLength()" value="<?php echo $row['contact_number']; ?>">
                <div id="contact_number_error" style="display: none; color: red;">Contact Number should be 11 digits</div>
              </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Blood Type:</label>
                     <select required class="form-select" name="blood_type">
                        <option selected disabled>Select blood type</option>
                        <option value="A-" <?php if ($row['blood_type'] == 'A-') echo 'selected'; ?>>A-</option>
                        <option value="A+" <?php if ($row['blood_type'] == 'A+') echo 'selected'; ?>>A+</option>
                        <option value="AB-" <?php if ($row['blood_type'] == 'AB-') echo 'selected'; ?>>AB-</option>
                        <option value="AB+" <?php if ($row['blood_type'] == 'AB+') echo 'selected'; ?>>AB+</option>
                        <option value="B-" <?php if ($row['blood_type'] == 'B-') echo 'selected'; ?>>B-</option>
                        <option value="B+" <?php if ($row['blood_type'] == 'A+') echo 'selected'; ?>>B+</option>
                        <option value="O-" <?php if ($row['blood_type'] == 'O-') echo 'selected'; ?>>O-</option>
                        <option value="O+" <?php if ($row['blood_type'] == 'O+') echo 'selected'; ?>>O+</option>
                        <option value="Not Applicable" <?php if ($row['blood_type'] == 'Not Applicable') echo 'selected'; ?>>N/A</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Person With Disability:</label>
                     <select required class="form-select" name="pwd">
                        <option selected disabled>Select</option>
                        <option value="Yes" <?php if ($row['pwd'] == 'Yes') echo 'selected'; ?>>Yes</option>
                        <option value="No" <?php if ($row['pwd'] == 'No') echo 'selected'; ?>>No</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Indigenous People:</label>
                     <select required class="form-select" name="indigenous_people">
                        <option selected disabled>Select</option>
                        <option value="Yes" <?php if ($row['indigenous_people'] == 'Yes') echo 'selected'; ?>>Yes</option>
                        <option value="No" <?php if ($row['indigenous_people'] == 'No') echo 'selected'; ?>>No</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Has Consent:</label>
                     <select required class="form-select" name="has_consent">
                        <option selected disabled>Select</option>
                        <option value="Yes" <?php if ($row['has_consent'] == 'Yes') echo 'selected'; ?>>Yes</option>
                        <option value="No" <?php if ($row['has_consent'] == 'No') echo 'selected'; ?>>No</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Religion:</label>
                     <select required class="form-select" name="religion">
                        <option selected disabled>Select religion</option>
                        <option value="Aglipay" <?php if ($row['religion'] == 'Aglipay') echo 'selected'; ?>>Aglipay</option>
                        <option value="Alliance of Bible Christian Communities" <?php if ($row['religion'] == 'Alliance of Bible Christian Communities') echo 'selected'; ?>>Alliance of Bible Christian Communities</option>
                        <option value="Anglican" <?php if ($row['religion'] == 'Anglican') echo 'selected'; ?>>Anglican</option>
                        <option value="Baptist" <?php if ($row['religion'] == 'Baptist') echo 'selected'; ?>>Baptist</option>
                        <option value="Born Again Christian" <?php if ($row['religion'] == 'Born Again Christian') echo 'selected'; ?>>Born Again Christian</option>
                        <option value="Buddhism" <?php if ($row['religion'] == 'Buddhism') echo 'selected'; ?>>Buddhism</option>
                        <option value="Catholic" <?php if ($row['religion'] == 'Catholic') echo 'selected'; ?>>Catholic</option>
                        <option value="Christian" <?php if ($row['religion'] == 'Christian') echo 'selected'; ?>>Christian</option>
                        <option value="Church of God" <?php if ($row['religion'] == 'Church of God') echo 'selected'; ?>>Church of God</option>
                        <option value="Evangelical" <?php if ($row['religion'] == 'Evangelical') echo 'selected'; ?>>Evangelical</option>
                        <option value="Iglesia Ni Cristo" <?php if ($row['religion'] == 'Iglesia Ni Cristo') echo 'selected'; ?>>Iglesia Ni Cristo</option>
                        <option value="Jehovahs Witness" <?php if ($row['religion'] == 'Jehovahs Witness') echo 'selected'; ?>>Jehovahs Witness</option>
                        <option value="Life Renewal Christian Ministry" <?php if ($row['religion'] == 'Life Renewal Christian Ministry') echo 'selected'; ?>>Life Renewal Christian Ministry</option>
                        <option value="Lutheran" <?php if ($row['religion'] == 'Lutheran') echo 'selected'; ?>>Lutheran</option>
                        <option value="Methodist" <?php if ($row['religion'] == 'Methodist') echo 'selected'; ?>>Methodist</option>
                        <option value="LDS-Mormons" <?php if ($row['religion'] == 'LDS-Mormons') echo 'selected'; ?>>LDS-Mormons</option>
                        <option value="Islam" <?php if ($row['religion'] == 'Islam') echo 'selected'; ?>>Islam</option>
                        <option value="Pentecostal" <?php if ($row['religion'] == 'Pentecostal') echo 'selected'; ?>>Pentecostal</option>
                        <option value="Protestant" <?php if ($row['religion'] == 'Protestant') echo 'selected'; ?>>Protestant</option>
                        <option value="Seventh Day Adventist" <?php if ($row['religion'] == 'Seventh Day Adventist') echo 'selected'; ?>>Seventh Day Adventist</option>
                        <option value="UCCP" <?php if ($row['religion'] == 'UCCP') echo 'selected'; ?>>UCCP</option>
                        <option value="Wesleyan" <?php if ($row['religion'] == 'Wesleyan') echo 'selected'; ?>>Wesleyan</option>
                        <option value="Unknown" <?php if ($row['religion'] == 'Unknown') echo 'selected'; ?>>Unknown</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Education:</label>
                     <select required class="form-select" name="education">
                        <option selected disabled>Select education</option>
                        <option value="Elementary Education" <?php if ($row['education'] == 'Elementary Education') echo 'selected'; ?>>Elementary Education</option>
                        <option value="High School Education" <?php if ($row['education'] == 'High School Education') echo 'selected'; ?>>High School Education</option>
                        <option value="College" <?php if ($row['education'] == 'College') echo 'selected'; ?>>College</option>
                        <option value="Vocational" <?php if ($row['education'] == 'Vocational') echo 'selected'; ?>>Vocational</option>
                        <option value="Post Graduate Program" <?php if ($row['education'] == 'Post Graduate Program') echo 'selected'; ?>>Post Graduate Program</option>
                        <option value="No Formal Education - No Schooling" <?php if ($row['education'] == 'No Formal Education - No Schooling') echo 'selected'; ?>>No Formal Education - No Schooling</option>
                        <option value="Not Applicable" <?php if ($row['education'] == 'Not Applicable') echo 'selected'; ?>>Not Applicable</option>
                        <option value="Others" <?php if ($row['education'] == 'Others') echo 'selected'; ?>>Others</option>
                     </select>
               </div>
               <div class="col">
                  <label required class="form-label">Occupation:</label>
                  <input type="text" class="form-control" name="occupation" placeholder="Software Engineer" value="<?php echo $row['occupation']; ?>">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label required class="form-label">Citizenship:</label>
                     <select class="form-select" name="citizenship">
                        <option selected disabled>Select citizenship</option>
                        <option value="Filipino" <?php if ($row['citizenship'] == 'Filipino') echo 'selected'; ?>>Filipino</option>
                        <option value="Non-Filipino" <?php if ($row['citizenship'] == 'Non-Filipino') echo 'selected'; ?>>Non-Filipino</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Family Role:</label>
                     <select required class="form-select" name="family_role">
                        <option selected disabled>Select family role</option>
                        <option value="Member" <?php if ($row['family_role'] == 'Member') echo 'selected'; ?>>Member</option>
                        <option value="Head" <?php if ($row['family_role'] == 'Head') echo 'selected'; ?>>Head</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Region:</label>
                     <select required class="form-select" name="region">
                        <option selected disabled>Select region</option>
                        <option value="Autonomous Region in Muslim Mindanao (ARMM) <?php if ($row['region'] == 'Autonomous Region in Muslim Mindanao (ARMM)') echo 'selected'; ?>">Autonomous Region in Muslim Mindanao (ARMM)</option>
                        <option value="Cordillera Administrative Region (CAR)" <?php if ($row['region'] == 'Cordillera Administrative Region (CAR)') echo 'selected'; ?>>Cordillera Administrative Region (CAR)</option>
                        <option value="National Capital Region" <?php if ($row['region'] == 'National Capital Region') echo 'selected'; ?>>National Capital Region</option>
                        <option value="Region I (Ilocos Region)" <?php if ($row['region'] == 'Region I (Ilocos Region)') echo 'selected'; ?>>Region I (Ilocos Region)</option>
                        <option value="Region II (Cagayan Valley)" <?php if ($row['region'] == 'Region II (Cagayan Valley)') echo 'selected'; ?>>Region II (Cagayan Valley)</option>
                        <option value="Region III (Cenral Luzon)" <?php if ($row['region'] == 'Region III (Cenral Luzon)') echo 'selected'; ?>>Region III (Cenral Luzon)</option>
                        <option value="Region IV-A (CALABARZON)" <?php if ($row['region'] == 'Region IV-A (CALABARZON)') echo 'selected'; ?>>Region IV-A (CALABARZON)</option>
                        <option value="Region IV-B (MIMAROPA)" <?php if ($row['region'] == 'Region IV-B (MIMAROPA)') echo 'selected'; ?>>Region IV-B (MIMAROPA)</option>
                        <option value="Region V (BICOL REGION)" <?php if ($row['region'] == 'Region V (BICOL REGION)') echo 'selected'; ?>>Region V (BICOL REGION)</option>
                        <option value="Region VI (Western Visayas)" <?php if ($row['region'] == 'Region VI (Western Visayas)') echo 'selected'; ?>>Region VI (Western Visayas)</option>
                        <option value="Region VII (Central Visayas)" <?php if ($row['region'] == 'Region VII (Central Visayas)') echo 'selected'; ?>>Region VII (Central Visayas)</option>
                        <option value="Region VIII (Eastern Visayas)" <?php if ($row['region'] == 'Region VIII (Eastern Visayas)') echo 'selected'; ?>>Region VIII (Eastern Visayas)</option>
                        <option value="Region IX (Zamboanga Peninsula)" <?php if ($row['region'] == 'Region IX (Zamboanga Peninsula)') echo 'selected'; ?>>Region IX (Zamboanga Peninsula)</option>
                        <option value="Region X (Northern Mindanao)" <?php if ($row['region'] == '"Region X (Northern Mindanao)') echo 'selected'; ?>>Region X (Northern Mindanao)</option>
                        <option value="Region XI (Davao Region)" <?php if ($row['region'] == 'Region XI (Davao Region)') echo 'selected'; ?>>Region XI (Davao Region)</option>
                        <option value="Region XII (SOCCSKSARGEN)" <?php if ($row['region'] == 'Region XII (SOCCSKSARGEN)') echo 'selected'; ?>>Region XII (SOCCSKSARGEN)</option>
                        <option value="Region XIII (CARAGA)" <?php if ($row['region'] == 'Region XIII (CARAGA)') echo 'selected'; ?>>Region XIII (CARAGA)</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Province:</label>
                     <select required class="form-select" name="province">
                        <option selected disabled>Select province</option>
                        <option value="Batangas" <?php if ($row['province'] == 'Batangas') echo 'selected'; ?>>Batangas</option>
                        <option value="Cavite" <?php if ($row['province'] == 'Cavite') echo 'selected'; ?>>Cavite</option>
                        <option value="Laguna" <?php if ($row['province'] == 'Laguna') echo 'selected'; ?>>Laguna</option>
                        <option value="Quezon" <?php if ($row['province'] == 'Quezon') echo 'selected'; ?>>Quezon</option>
                        <option value="Rizal" <?php if ($row['province'] == 'Rizal') echo 'selected'; ?>>Rizal</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Municipality:</label>
                     <select required class="form-select" name="municipality">
                        <option selected disabled>Select municipality</option>
                        <option value="Alaminos" <?php if ($row['municipality'] == 'Alaminos') echo 'selected'; ?>>Alaminos</option>
                        <option value="Bay" <?php if ($row['municipality'] == 'Bay') echo 'selected'; ?>>Bay</option>
                        <option value="Biñan" <?php if ($row['municipality'] == 'Biñan') echo 'selected'; ?>>Biñan</option>
                        <option value="Cabuyao" <?php if ($row['municipality'] == 'Cabuyao') echo 'selected'; ?>>Cabuyao</option>
                        <option value="City of Calamba" <?php if ($row['municipality'] == 'City of Calamba') echo 'selected'; ?>>City of Calamba</option>
                        <option value="Calauan" <?php if ($row['municipality'] == 'Calauan') echo 'selected'; ?>>Calauan</option>
                        <option value="Cavinti" <?php if ($row['municipality'] == 'Cavinti') echo 'selected'; ?>>Cavinti</option>
                        <option value="Famy" <?php if ($row['municipality'] == 'Famy') echo 'selected'; ?>>Famy</option>
                        <option value="Kalayaan" <?php if ($row['municipality'] == 'Kalayaan') echo 'selected'; ?>>Kalayaan</option>
                        <option value="Liliw" <?php if ($row['municipality'] == 'Liliw') echo 'selected'; ?>>Liliw</option>
                        <option value="Los Baños" <?php if ($row['municipality'] == 'Los Baños') echo 'selected'; ?>>Los Baños</option>
                        <option value="Luisana" <?php if ($row['municipality'] == 'Luisana') echo 'selected'; ?>>Luisana</option>
                        <option value="Lumban" <?php if ($row['municipality'] == 'Lumban') echo 'selected'; ?>>Lumban</option>
                        <option value="Mabitac" <?php if ($row['municipality'] == 'Mabitac') echo 'selected'; ?>>Mabitac</option>
                        <option value="Magdalena" <?php if ($row['municipality'] == 'Magdalena') echo 'selected'; ?>>Magdalena</option>
                        <option value="Majayjay" <?php if ($row['municipality'] == 'Majayjay') echo 'selected'; ?>>Majayjay</option>
                        <option value="Nagcarlan" <?php if ($row['municipality'] == 'Nagcarlan') echo 'selected'; ?>>Nagcarlan</option>
                        <option value="Paete" <?php if ($row['municipality'] == 'Paete') echo 'selected'; ?>>Paete</option>
                        <option value="Pagsanjan" <?php if ($row['municipality'] == 'Pagsanjan') echo 'selected'; ?>>Pagsanjan</option>
                        <option value="Pakil" <?php if ($row['municipality'] == 'Pakil') echo 'selected'; ?>>Pakil</option>
                        <option value="Pangil" <?php if ($row['municipality'] == 'Pangil') echo 'selected'; ?>>Pangil</option>
                        <option value="Pila" <?php if ($row['municipality'] == 'Pila') echo 'selected'; ?>>Pila</option>
                        <option value="Rizal" <?php if ($row['municipality'] == 'Rizal') echo 'selected'; ?>>Rizal</option>
                        <option value="San Pablo City" <?php if ($row['municipality'] == 'San Pablo City') echo 'selected'; ?>>San Pablo City</option>
                        <option value="San Pedro" <?php if ($row['municipality'] == 'San Pedro') echo 'selected'; ?>>San Pedro</option>
                        <option value="Santa Cruz (Capital)" <?php if ($row['municipality'] == 'Santa Cruz (Capital)') echo 'selected'; ?>>Santa Cruz (Capital)</option>
                        <option value="Santa Maria" <?php if ($row['municipality'] == 'Santa Maria') echo 'selected'; ?>>Santa Maria</option>
                        <option value="Santa Rosa" <?php if ($row['municipality'] == 'Santa Rosa') echo 'selected'; ?>>Santa Rosa</option>
                        <option value="Sinoloan" <?php if ($row['municipality'] == 'Sinoloan') echo 'selected'; ?>>Sinoloan</option>
                        <option value="Victoria" <?php if ($row['municipality'] == 'Victoria') echo 'selected'; ?>>Victoria</option>
                        

                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
            <div class="col">
                  <label class="form-label">Barangay:</label>
                  <input type="text" class="form-control" name="barangay" value="Sucol" readonly>
               </div>

               <div class="col">
               <label class="form-label">Purok:</label>
                  <select required class="form-select" name="purok">
                     <option selected disabled>Select purok</option>
                     <option value="Purok 1" <?php if ($row['purok'] == 'Purok 1') echo 'selected'; ?>>Purok 1</option>
                     <option value="Purok 2" <?php if ($row['purok'] == 'Purok 2') echo 'selected'; ?>>Purok 2</option>
                     <option value="Purok 3" <?php if ($row['purok'] == 'Purok 3') echo 'selected'; ?>>Purok 3</option>
                     <option value="Purok 4" <?php if ($row['purok'] == 'Purok 4') echo 'selected'; ?>>Purok 4</option>
                     <option value="Purok 5" <?php if ($row['purok'] == 'Purok 5') echo 'selected'; ?>>Purok 5</option>               
                  </select>
            
                  </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Present Address:</label>
                  <input required type="text" class="form-control" name="present_address" placeholder="St. Village Street 123" value="<?php echo $row['present_address']; ?>">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Permanent Address:</label>
                  <input required type="text" class="form-control" name="permanent_address" placeholder="St. Village Street 123" value="<?php echo $row['permanent_address']; ?>">
               </div>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger" onclick="window.history.back(); return false;">Cancel</a>
            </div>

    </div>
    
  </form>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
  function checkLength() {
    var input = document.getElementsByName("contact_number")[0];
    var errorDiv = document.getElementById("contact_number_error");
    if (input.value.length != 11) {
        errorDiv.style.display = "block";
    } else {
        errorDiv.style.display = "none";
    }
  }
</script>
<script>
  document.getElementById("philhealth_number").addEventListener("input", function(event) {
    let value = event.target.value;
    value = value.replace(/[^0-9\-]/g, ''); // remove any non-numeric characters
    event.target.value = value;
  });
</script>
<script>
function formatFamilyNumber(input) {
  // Get the input value
  var value = input.value;

  // Separate the digits from the letters
  var match = value.match(/^(\d+)([a-zA-Z]*)$/);
  var digits = match[1];
  var letters = match[2];

  // Remove any leading zeros from the digits
  digits = digits.replace(/^0+/, '');

  // Add leading zeros if necessary
  if (digits.length == 1) {
    digits = '00' + digits;
  } else if (digits.length == 2) {
    digits = '0' + digits;
  }

  // Combine the digits and letters and set the formatted value back to the input
  input.value = digits + letters;
}
</script>
<script>
function validateForm() {
  var a = document.forms["myForm"]["suffix"].value;
  var b = document.forms["myForm"]["gender"].value;
  var c = document.forms["myForm"]["civil_status"].value;
  var d = document.forms["myForm"]["blood_type"].value;
  var e = document.forms["myForm"]["pwd"].value;
  var f = document.forms["myForm"]["indigenous_people"].value;
  var g = document.forms["myForm"]["has_consent"].value;
  var h = document.forms["myForm"]["education"].value;
  var i = document.forms["myForm"]["religion"].value;
  var j = document.forms["myForm"]["citizenship"].value;
  var l = document.forms["myForm"]["region"].value;
  var m = document.forms["myForm"]["province"].value;
  var n = document.forms["myForm"]["municipality"].value;
  var o = document.forms["myForm"]["purok"].value;


  if (a == "Select suffix" || b == "Select gender" ||
   c == "Select civil status" || d == "Select blood type"
   || e == "Select" || f == "Select" || g == "Select"
   || h == "Select education" || i == "Select religion" || j == "Select citizenship"
   || l == "Select region" || m == "Select province" || n == "Select municipality" || o == "Select purok") {
    alert("Please fill out all required fields");
    return false;
  }
}
</script>
<script>
   <script>
  // Get the "Cancel" button element
  var cancelButton = document.querySelector('.btn-danger');

  // Add an onclick event listener to the button
  cancelButton.addEventListener('click', function(event) {
    // Prevent the default action of the link
    event.preventDefault();
    
    // Go back to the previous page in the user's browsing history
    window.history.back();
  });
</script>
</script>
</body>

</html>
