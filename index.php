<?php

include "db_conn.php";

if(isset($_GET['entries'])){
    $records_per_page = (int)$_GET['entries'];
    setcookie("entries", $records_per_page, time() + (86400 * 30), "/"); // Set cookie for 30 days
} elseif(isset($_COOKIE['entries'])) {
    $records_per_page = (int)$_COOKIE['entries'];
} else {
    $records_per_page = 10; // Default value
}

// Get current page number if it is set, otherwise set it to 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting record for the current page
$starting_record = ($current_page - 1) * $records_per_page;

// Get total number of records
$total_records_query = "SELECT COUNT(*) FROM `crud`";
$total_records_result = mysqli_query($conn, $total_records_query);
$total_records = mysqli_fetch_array($total_records_result)[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Retrieve records for the current page
$search_term = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
if (strtolower($search_term) == 'pwd') {
  $query = "SELECT * FROM `crud` WHERE `pwd` = 'Yes' ORDER BY CAST(SUBSTRING_INDEX(`family_number`, ' ', 1) AS UNSIGNED), SUBSTRING_INDEX(`family_number`, ' ', -1), `last_name` ASC";
} elseif ($search_term) {
  $query = "SELECT * FROM `crud` WHERE ";
  if (is_numeric($search_term)) {
    $query .= "`family_number` = '$search_term'";
  } else {
    $search_terms = explode(" ", $search_term);
    $query .= "(`family_number` LIKE '%$search_term%' OR `gender` = '$search_term' OR `patient_identity_number` = '$search_term' OR `stage` = '$search_term' OR";
    foreach($search_terms as $term) {
      $query .= "(`last_name` LIKE '%$term%' OR `first_name` LIKE '%$term%' OR `middle_name` LIKE '%$term%') AND ";
    }
    $query = rtrim($query, "AND ");
    $query .= ")";
 }
  $query .= " ORDER BY CAST(SUBSTRING_INDEX(`family_number`, ' ', 1) AS UNSIGNED), SUBSTRING_INDEX(`family_number`, ' ', -1), `last_name` ASC";
} else {
  $query = "SELECT * FROM `crud` ORDER BY CAST(SUBSTRING_INDEX(`family_number`, ' ', 1) AS UNSIGNED), SUBSTRING_INDEX(`family_number`, ' ', -1), `last_name` LIMIT $starting_record, $records_per_page";
}
$result = mysqli_query($conn, $query);

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
  
  <title>Barangay Sucol Admin</title>
  <link rel="stylesheet" href="index.css">
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
      <div id ="res" class="col-lg-9">
  <div class="card-header">
    Resident Chart
    <button type="button" class="close" aria-label="Close" onclick="hideChart()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <canvas id="residentChart"></canvas>
  </div>
</div>

<button type="button" class="btn btn-primary mt-4" onclick="showChart()">Show Chart</button><br>

        <?php
        if (isset($_GET["msg"])) {
          $msg = $_GET["msg"];
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          ' . $msg . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <a href="add-new.php" class="btn btn-dark mb-3">Add New Resident</a>

        <form class="d-flex mb-3">
        <input id="search" type="text" class="form-control me-2" name="search" placeholder="Search by name or family number" oninput="formatFamilyNumber(this);" value="<?php echo $search_term; ?>">

          <button type="submit" class="btn btn-primary">Search</button>
        </form>

        

        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">Family Number</th>
              <th scope="col">Last Name</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
if (strtolower($search_term) == 'male') {
  $male_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`gender`) = 'male'";
  $male_result = mysqli_query($conn, $male_query);
  $male_count = mysqli_fetch_array($male_result)[0];
  echo "<p>Total male residents: $male_count</p>";
} elseif (strtolower($search_term) == 'female') {
  $female_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`gender`) = 'female'";
  $female_result = mysqli_query($conn, $female_query);
  $female_count = mysqli_fetch_array($female_result)[0];
  echo "<p>Total female residents: $female_count</p>";
} elseif (strtolower($search_term) == 'pwd') {
  $pwd_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`pwd`) = 'yes'";
  $pwd_result = mysqli_query($conn, $pwd_query);
  $pwd_count = mysqli_fetch_array($pwd_result)[0];
  echo "<p>Total Person with Disability residents: $pwd_count</p>";
} elseif (strtolower($search_term) == 'child') {
  $child_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`stage`) = 'child'";
  $child_result = mysqli_query($conn, $child_query);
  $child_count = mysqli_fetch_array($child_result)[0];
  echo "<p>Total Child residents: $child_count</p>";
} elseif (strtolower($search_term) == 'teen') {
  $teen_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`stage`) = 'teen'";
  $teen_result = mysqli_query($conn, $teen_query);
  $teen_count = mysqli_fetch_array($teen_result)[0];
  echo "<p>Total Teen residents: $teen_count</p>";
} elseif (strtolower($search_term) == 'adult') {
  $adult_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`stage`) = 'adult'";
  $adult_result = mysqli_query($conn, $adult_query);
  $adult_count = mysqli_fetch_array($adult_result)[0];
  echo "<p>Total Adult residents: $adult_count</p>";
} elseif (strtolower($search_term) == 'senior') {
  $senior_query = "SELECT COUNT(*) FROM `crud` WHERE LOWER(`stage`) = 'senior'";
  $senior_result = mysqli_query($conn, $senior_query);
  $senior_count = mysqli_fetch_array($senior_result)[0];
  echo "<p>Total Senior residents: $senior_count</p>";
} 
while ($row = mysqli_fetch_assoc($result)) {
  // your code for displaying search results

?>
              <tr>
                <td><?php echo $row["family_number"] ?></td>
                <td><?php echo $row["last_name"] ?></td>
                <td><?php echo $row["first_name"] ?></td>
                <td><?php echo $row["middle_name"] ?></td>
                <td><?php echo $row["gender"] ?></td>
                <td>
                  <a href="#showModal" class="link-dark" data-bs-toggle="modal" data-bs-target="#showModal<?php echo $row["id"] ?>"><i class="fa-solid fa-eye fs-5"></i></a>
                  <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 ms-3 me-3"></i></a>
                  <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark" onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fa-solid fa-trash fs-5"></i></a>
                </td>
              </tr>
              <div class="modal fade" id="showModal<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="showModalLabel">Resident Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                      <p><strong>Age:</strong> <?php echo $age ?></p>
                      <p><strong>Stage:</strong> <?php echo $row["stage"] ?></p>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <label for="entries" class="form-label me-2">Show:</label>
    <select id="entries" class="form-select" onchange="location = this.value;">
      <option value="?entries=5" <?php if ($records_per_page == 5) echo 'selected'; ?>>5</option>
      <option value="?entries=10" <?php if ($records_per_page == 10) echo 'selected'; ?>>10</option>
      <option value="?entries=20" <?php if ($records_per_page == 20) echo 'selected'; ?>>20</option>
    </select>
  </div>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php if ($current_page > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&entries=<?php echo $records_per_page; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if ($current_page < $total_pages) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&entries=<?php echo $records_per_page; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>
<center><span>Showing <?php echo $starting_record + 1; ?> to <?php echo min($starting_record + $records_per_page, $total_records); ?> of <?php echo $total_records; ?> entries</span></center>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
  var chartVisible = false;
  var ctx = document.getElementById('residentChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total Residents', 'PWD', 'Child', 'Teen', 'Adult', 'Senior', 'Male', 'Female'],
      datasets: [{
        label: 'Number of Residents',
        data: [
          <?php
            // Total number of residents
            echo $total_records;

            // Total number of residents with PWD selected yes
            $query = "SELECT COUNT(*) FROM `crud` WHERE `pwd` = 'Yes'";
            $result = mysqli_query($conn, $query);
            $total_pwd = mysqli_fetch_array($result)[0];
            echo ',' . $total_pwd;

            // Total number of residents in each stage category
            $query = "SELECT COUNT(*) FROM `crud` WHERE `stage` = 'Child'";
            $result = mysqli_query($conn, $query);
            $total_child = mysqli_fetch_array($result)[0];
            echo ',' . $total_child;

            $query = "SELECT COUNT(*) FROM `crud` WHERE `stage` = 'Teen'";
            $result = mysqli_query($conn, $query);
            $total_teen = mysqli_fetch_array($result)[0];
            echo ',' . $total_teen;

            $query = "SELECT COUNT(*) FROM `crud` WHERE `stage` = 'Adult'";
            $result = mysqli_query($conn, $query);
            $total_adult = mysqli_fetch_array($result)[0];
            echo ',' . $total_adult;

            $query = "SELECT COUNT(*) FROM `crud` WHERE `stage` = 'Senior'";
            $result = mysqli_query($conn, $query);
            $total_senior = mysqli_fetch_array($result)[0];
            echo ',' . $total_senior;

            // Total number of male and female residents
            $query = "SELECT COUNT(*) FROM `crud` WHERE `gender` = 'Male'";
            $result = mysqli_query($conn, $query);
            $total_male = mysqli_fetch_array($result)[0];
            echo ',' . $total_male;

            $query = "SELECT COUNT(*) FROM `crud` WHERE `gender` = 'Female'";
            $result = mysqli_query($conn, $query);
            $total_female = mysqli_fetch_array($result)[0];
            echo ',' . $total_female;
          ?>
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
  document.getElementById('res').style.display = 'none';
  function showChart() {
    if (!chartVisible) {
      document.getElementById('res').style.display = 'block';
      chartVisible = true;
    }
  }

  function hideChart() {
    if (chartVisible) {
      document.getElementById('res').style.display = 'none';
      chartVisible = false;
    }
  }
</script>
</body>

</html>
