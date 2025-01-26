<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Website</title>

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
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
      }
   </style>
</head>
<body>

   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3 col-md-4 sidebar">
            <h2>Menu</h2>
            <a href="#">Barangay Officials</a>
            <a href="records.php">Records</a>
            <a href="#">Clearance</a>
         </div>

         <div class="col-lg-9 col-md-8 content">
            <div class="container">
               <div class="text-center mb-4">
                  <h3>Add New User</h3>
                  <p class="text-muted">Complete the form below to add a new user</p>
               </div>

               <div class="container d-flex justify-content-center">
                  <form action="" method="post" style="width:50vw; min-width:300px;">
                     <div class="row mb-3">
                        <div class="col">
                           <label class="form-label">First Name:</label>
                           <input type="text" class="form-control" name="first_name" placeholder="Albert">
                        </div>

                        <div class="col">
                           <label class="form-label">Last Name:</label>
                           <input type="text" class="form-control" name="last_name" placeholder="Einstein">
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="name@example.com">
                     </div>

                     <div class="form-group mb-3">
                        <label>Gender:</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                        <label for="female" class="form-input-label">Female</label>
                     </div>

                     <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>