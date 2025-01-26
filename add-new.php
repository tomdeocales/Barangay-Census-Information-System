<?php
include "db_conn.php";

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
   

   $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `middle_name`, `gender`, `family_number`, `suffix`, `civil_status`, `birth_date`, `philhealth_number`, `mothers_maiden_name`, `contact_number`, `blood_type`, `pwd`, `indigenous_people`, `has_consent`, `religion`, `education`, `occupation`, `citizenship`, `family_role`, `region`, `province`, `municipality`, `barangay`, `purok`, `present_address`, `permanent_address`, `facility_number`, `patient_identity_number`, `stage`) VALUES (NULL,'$first_name','$last_name','$middle_name','$gender','$family_number','$suffix','$civil_status','$birth_date','$philhealth_number','$mothers_maiden_name','$contact_number','$blood_type','$pwd','$indigenous_people','$has_consent', '$religion', '$education', '$occupation', '$citizenship', '$family_role', '$region', '$province', '$municipality', '$barangay', '$purok', '$present_address', '$permanent_address', '$facility_number', '$patient_identity_number', '$stage')";


   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
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

   <title>Add Resident</title>
   <style>
      body{
			scroll-behavior: smooth;
		}
		.sidebar a:last-child {
			position: absolute;
			bottom: 15px;
			left: 15px;
		}
      .container{
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
			}#admin h3{
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
                  <h3>Add New Resident</h3>
                  <p class="text-muted">Complete the form below to add a new user</p>
               </div>

      <div class="container d-flex justify-content-center">
         <form name="myForm" onsubmit="return validateForm()" method="post" action="" method="post" style="width:50vw; min-width:300px;">
         <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Family Number:</label>
                  <input required type="text" class="form-control" name="family_number" placeholder="0000" oninput="formatFamilyNumber(this); this.value = this.value.toUpperCase();" />
               </div>
               <div class="col">
                  <label class="form-label">Facility Number:</label>
                  <input type="text" class="form-control" name="facility_number" value="SUCOL - 31141" readonly>
               </div>
               <div class="col">
                  <label class="form-label">Patient Identity Number:</label>
                  <input required type="text" class="form-control" name="patient_identity_number" placeholder="ABCD123" oninput="this.value = this.value.toUpperCase();">
               </div>
         </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input required type="text" class="form-control" name="last_name" placeholder="Einstein">
               </div>
               

               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input required type="text" class="form-control" name="first_name" placeholder="Albert">
               </div>
            </div>
            <div class="row mb-3">
            <div class="col">
               <label class="form-label">Middle Name:</label>
               <input required type="text" class="form-control" name="middle_name" placeholder="De luna">
            </div>

            <div class="col">
               <label class="form-label">Suffix:</label>
                  <select required class="form-select" name="suffix">
                     <option selected disabled>Select suffix</option>
                     <option value="Sr.">Sr.</option>
                     <option value="Jr.">Jr.</option>
                     <option value="I">I</option>
                     <option value="II">II</option>
                     <option value="III">III</option>
                     <option value="Not Applicable">N/A</option>

                  </select>
               </div>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Gender:</label>
                     <select required class="form-select" name="gender">
                        <option selected disabled>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
               </div>

               <div class="col">
               <label class="form-label">Civil Status:</label>
                  <select required class="form-select" name="civil_status">
                     <option selected disabled>Select civil status</option>
                     <option value="Co-habitation">Co-habitation</option>
                     <option value="Married">Married</option>
                     <option value="Single">Single</option>
                     <option value="Separated">Separated</option>
                     <option value="Widowed">Widowed</option>               
                  </select>
            
                  </div>
            </div>

            <div class="row mb-3">
                  <div class="col">
                     <label class="form-label">Date of Birth:</label>
                        <input required class="form-control" type="date" name="birth_date">
                  </div>
                  <div class="col">
                  <label class="form-label">Stage:</label>
                     <select required class="form-select" name="stage">
                        <option selected disabled>Select</option>
                        <option value="Child">Child</option>
                        <option value="Teen">Teen</option>
                        <option value="Adult">Adult</option>
                        <option value="Senior">Senior</option>
                     </select>
               </div>
                  <div class="col">
                  <label class="form-label">Philhealth Number:</label>
                  <input type="text" class="form-control" name="philhealth_number" id="philhealth_number" placeholder="000000000">
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Mother's Maiden Name:</label>
                  <input type="text" class="form-control" name="mothers_maiden_name" placeholder="N/A">
               </div>
               <div class="col">
                  <label class="form-label">Contact Number:</label>
                  <input type="number" class="form-control" name="contact_number" placeholder="00000000000" required maxlength="11" oninput="checkLength()">
                  <div id="contact_number_error" style="display: none; color: red;">Contact Number should be 11 digits</div>
               </div>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Blood Type:</label>
                     <select required class="form-select" name="blood_type">
                        <option selected disabled>Select blood type</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="Not Applicable">N/A</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Person With Disability:</label>
                     <select required class="form-select" name="pwd">
                        <option selected disabled>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Indigenous People:</label>
                     <select required class="form-select" name="indigenous_people">
                        <option selected disabled>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Has Consent:</label>
                     <select required class="form-select" name="has_consent">
                        <option selected disabled>Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Religion:</label>
                     <select required class="form-select" name="religion">
                        <option selected disabled>Select religion</option>
                        <option value="Aglipay">Aglipay</option>
                        <option value="Alliance of Bible Christian Communities">Alliance of Bible Christian Communities</option>
                        <option value="Anglican">Anglican</option>
                        <option value="Baptist">Baptist</option>
                        <option value="Born Again Christian">Born Again Christian</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Church of God">Church of God</option>
                        <option value="Evangelical">Evangelical</option>
                        <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                        <option value="Jehovahs Witness">Jehovahs Witness</option>
                        <option value="Life Renewal Christian Ministry">Life Renewal Christian Ministry</option>
                        <option value="Lutheran">Lutheran</option>
                        <option value="Methodist">Methodist</option>
                        <option value="LDS-Mormons">LDS-Mormons</option>
                        <option value="Islam">Islam</option>
                        <option value="Pentecostal">Pentecostal</option>
                        <option value="Protestant">Protestant</option>
                        <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                        <option value="UCCP">UCCP</option>
                        <option value="Wesleyan">Wesleyan</option>
                        <option value="Unknown">Unknown</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Education:</label>
                     <select required class="form-select" name="education">
                        <option selected disabled>Select education</option>
                        <option value="Elementary Education">Elementary Education</option>
                        <option value="High School Education">High School Education</option>
                        <option value="College">College</option>
                        <option value="Vocational">Vocational</option>
                        <option value="Post Graduate Program">Post Graduate Program</option>
                        <option value="No Formal Education - No Schooling">No Formal Education - No Schooling</option>
                        <option value="Not Applicable">Not Applicable</option>
                        <option value="Others">Others</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Occupation:</label>
                  <input required type="text" class="form-control" name="occupation" placeholder="Software Engineer">
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Citizenship:</label>
                     <select required class="form-select" name="citizenship">
                        <option selected disabled>Select citizenship</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Non-Filipino">Non-Filipino</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Family Role:</label>
                     <select required class="form-select" name="family_role">
                        <option selected disabled>Select family role</option>
                        <option value="Member">Member</option>
                        <option value="Head">Head</option>
                     </select>
               </div>
               
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Region:</label>
                     <select required class="form-select" name="region">
                        <option selected disabled>Select region</option>
                        <option value="Autonomous Region in Muslim Mindanao (ARMM)">Autonomous Region in Muslim Mindanao (ARMM)</option>
                        <option value="Cordillera Administrative Region (CAR)">Cordillera Administrative Region (CAR)</option>
                        <option value="National Capital Region">National Capital Region</option>
                        <option value="Region I (Ilocos Region)">Region I (Ilocos Region)</option>
                        <option value="Region II (Cagayan Valley)">Region II (Cagayan Valley)</option>
                        <option value="Region III (Cenral Luzon)">Region III (Cenral Luzon)</option>
                        <option value="Region IV-A (CALABARZON)">Region IV-A (CALABARZON)</option>
                        <option value="Region IV-B (MIMAROPA)">Region IV-B (MIMAROPA)</option>
                        <option value="Region V (BICOL REGION)">Region V (BICOL REGION)</option>
                        <option value="Region VI (Western Visayas)">Region VI (Western Visayas)</option>
                        <option value="Region VII (Central Visayas)">Region VII (Central Visayas)</option>
                        <option value="Region VIII (Eastern Visayas)">Region VIII (Eastern Visayas)</option>
                        <option value="Region IX (Zamboanga Peninsula)">Region IX (Zamboanga Peninsula)</option>
                        <option value="Region X (Northern Mindanao)">Region X (Northern Mindanao)</option>
                        <option value="Region XI (Davao Region)">Region XI (Davao Region)</option>
                        <option value="Region XII (SOCCSKSARGEN)">Region XII (SOCCSKSARGEN)</option>
                        <option value="Region XIII (CARAGA)">Region XIII (CARAGA)</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Province:</label>
                     <select required class="form-select" name="province">
                        <option selected disabled>Select province</option>
                        <option value="Batangas">Batangas</option>
                        <option value="Cavite">Cavite</option>
                        <option value="Laguna">Laguna</option>
                        <option value="Quezon">Quezon</option>
                        <option value="Rizal">Rizal</option>
                     </select>
               </div>
               <div class="col">
                  <label class="form-label">Municipality:</label>
                     <select required class="form-select" name="municipality">
                        <option selected disabled>Select municipality</option>
                        <option value="Alaminos">Alaminos</option>
                        <option value="Bay">Bay</option>
                        <option value="Biñan">Biñan</option>
                        <option value="Cabuyao">Cabuyao</option>
                        <option value="City of Calamba">City of Calamba</option>
                        <option value="Calauan">Calauan</option>
                        <option value="Cavinti">Cavinti</option>
                        <option value="Famy">Famy</option>
                        <option value="Kalayaan">Kalayaan</option>
                        <option value="Liliw">Liliw</option>
                        <option value="Los Baños">Los Baños</option>
                        <option value="Luisana">Luisana</option>
                        <option value="Lumban">Lumban</option>
                        <option value="Mabitac">Mabitac</option>
                        <option value="Magdalena">Magdalena</option>
                        <option value="Majayjay">Majayjay</option>
                        <option value="Nagcarlan">Nagcarlan</option>
                        <option value="Paete">Paete</option>
                        <option value="Pagsanjan">Pagsanjan</option>
                        <option value="Pakil">Pakil</option>
                        <option value="Pangil">Pangil</option>
                        <option value="Pila">Pila</option>
                        <option value="Rizal">Rizal</option>
                        <option value="San Pablo City">San Pablo City</option>
                        <option value="San Pedro">San Pedro</option>
                        <option value="Santa Cruz (Capital)">Santa Cruz (Capital)</option>
                        <option value="Santa Maria">Santa Maria</option>
                        <option value="Santa Rosa">Santa Rosa</option>
                        <option value="Sinoloan">Sinoloan</option>
                        <option value="Victoria">Victoria</option>
                        

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
                     <option value="Purok 1">Purok 1</option>
                     <option value="Purok 2">Purok 2</option>
                     <option value="Purok 3">Purok 3</option>
                     <option value="Purok 4">Purok 4</option>
                     <option value="Purok 5">Purok 5</option>               
                  </select>
            
                  </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Present Address:</label>
                  <input required type="text" class="form-control" name="present_address" placeholder="St. Village Street 123">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Permanent Address:</label>
                  <input required type="text" class="form-control" name="permanent_address" placeholder="St. Village Street 123">
               </div>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger" onclick="window.history.back(); return false;">Cancel</a>
            </div>
         </form>
      </div>
   </div>
   </div>
   </div>
   </div>

   <!-- Bootstrap -->
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
  document.getElementById("philhealth_number").addEventListener("input", function(event) {
    let value = event.target.value;
    value = value.replace(/[^0-9\-]/g, ''); // remove any non-numeric characters
    event.target.value = value;
  });
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