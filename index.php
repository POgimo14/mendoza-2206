<?php
session_start();
require 'connections1.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Employee Self-service | MANAGEMENT</title>
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <link rel="stylesheet" href="fontawsome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    </head>
  <body>

  <div class="modal fade" id="employeeDELETEModal" tabindex="-1" aria-labelledby="employeeDELETEModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeDELETEModalLabel">DELETE EMPLOYEE</h1>
      </div>
      <form action="code2.php" method="POST">
      <div class="modal-body">
        <div class="form-control">
        <input type="hidden" name="employee_id" id="delete_id">
            <h4>Are you sure you want to delete this information? This action cannot be undone.</h4>
            </div>
        </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="delete_employee" class="btn btn-primary">Confirm</button>
        </div>
        </form>
    </div>
  </div>
</div>

  <div class="modal fade" id="employeeUPDATEModal" tabindex="-1" aria-labelledby="employeeUPDATEModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeUPDATEModalLabel">UPDATE EMPLOYEE</h1>
      </div>
        <form action="code2.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id" id="e_id">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="e_name" class="form-control" placeholder="Enter your name.">
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <input type="text" name="gender" id="e_gender" class="form-control" placeholder="Select your gender (Male, Female, Other).">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" id="e_address" class="form-control" placeholder="Enter your address.">
            </div>
            <div class="form-group">
                <label for="">Contact Information</label>
                <input type="text" name="contact" id="e_contact" class="form-control" placeholder="Enter your contact information (phone number, email address).">
            </div>
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="date" name="dob" id="e_dob" class="form-control" placeholder="Enter your date of birth.">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_employee" class="btn btn-primary">Save Changes</button>
        </div>
        </form>
    </div>
  </div>
  </div>

  <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeModalLabel">NEW EMPLOYEE</h1>
      </div>
        <form action="code2.php" method="POST">
        <div class="modal-body">
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name.">
            </div>
            <div class="mb-2">
                <label for="">Gender</label>
                <input type="text" name="gender" class="form-control" placeholder="Select your gender (Male, Female, Other).">
            </div>
            <div class="mb-2">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter your address.">
            </div>
            <div class="mb-2">
                <label for="">Contact Information</label>
                <input type="text" name="contact" class="form-control" placeholder="Enter your contact information (phone number, email address).">
            </div>
            <div class="mb-2">
                <label for="">Date of Birth</label>
                <input type="date" name="dob" class="form-control" placeholder="Enter your date of birth.">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save_employee" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="employeeVIEWModal" tabindex="-1" aria-labelledby="employeeVIEWModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeVIEWModalLabel">VIEW EMPLOYEE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-control">
            <div class="employee_viewing_data">
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="container">
    
    <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>EMPLOYEE SELF-SERVICE
                            <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#employeeModal">
                            ADD EMPLOYEE</button>
                         <a href="admin.php"></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $query = "SELECT * FROM services";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $employee)
                                        {
                                             
                                            ?>
                                            <tr>
                                                <td class="employee_id"><?= $employee['id']; ?></td>
                                                <td><?php echo $employee['name']; ?></td>
                                                <td><?php echo $employee['gender']; ?></td>
                                                <td><?php echo $employee['address']; ?></td>
                                                <td><?php echo $employee['contact']; ?></td>
                                                <td><?php echo $employee['dob']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm view_btn">View</a>
                                                    <a href="#" class="btn btn-success btn-sm update_btn">Update</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete_btn">Delete</a>
                                                </td>                                           
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h4> No Record Found! </h4>";
                                    }

                                ?>
                            </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

     <script>

        $(document).ready(function () {
            
            $('.delete_btn').click(function (e) {
                e.preventDefault();

                var employee_id = $(this).closest('tr').find('.employee_id').text();
                $('#delete_id').val(employee_id);
                $('#employeeDELETEModal').modal('show');
            });

            $('.update_btn').click(function (e) {
                e.preventDefault();

               var employee_id = $(this).closest('tr').find('.employee_id').text();

               $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'checking_update_btn': true,
                        'employee_id': employee_id,
                    },
                    success: function (response) {
                        $.each(response, function (key, value) {
                            $('#e_id').val(value['id']);
                            $('#e_name').val(value['name']);
                            $('#e_gender').val(value['gender']);
                            $('#e_address').val(value['address']);
                            $('#e_contact').val(value['contact']);
                            $('#e_dob').val(value['dob']);
                        });
                        $('#employeeUPDATEModal').modal('show');
                    }
               });
            });

            $('.view_btn').click(function (e) {
                e.preventDefault();

               var employee_id = $(this).closest('tr').find('.employee_id').text();

               $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'checking_viewbtn': true,
                        'employee_id': employee_id,
                    },
                    success: function (response) {
                        $('.employee_viewing_data').html(response);
                        $('#employeeVIEWModal').modal('show');
                    }
               });
            });
        });
     </script>
     
</body>
</html>

<link rel="stylesheet" href="ariel1.css">
  <div class="sidebar">
    <div class="logo-details">
      <img src="2206logo.jpg" alt="logoImg">
        <div class="logo_name">2206 TNVS</div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='fas fa-search' ></i>
        <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="admin.php">
          <i class='fas fa-qrcode'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="#">
         <i class='fas fa-user' ></i>
         <span class="links_name">Employee</span>
       </a>
       <span class="tooltip">Module1</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module2</span>
       </a>
       <span class="tooltip">Module2</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module3</span>
       </a>
       <span class="tooltip">Module3</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module4</span>
       </a>
       <span class="tooltip">Module4</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module5</span>
       </a>
       <span class="tooltip">Module5</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="" alt="profileImg">
           <div class="name_job">
             <div class="name">Mendoza, Ariel</div>
             <div class="email">arielmendoza@gmail.com</div>
           </div>
         </div>
         <a href="../login.php"><i class='fas fa-right-from-bracket' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">
  </section>
  <script>
 let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");
let body = document.querySelector("body"); 

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{ 
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange(); 
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-arrow-right");
 } else {
   closeBtn.classList.replace("fa-arrow-right", "fa-bars"); 
 }
}


</script>