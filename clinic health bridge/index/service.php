<?php  
include('db_connect.php');

$sql = "SELECT visible FROM link_visibility WHERE id = 1";
$result = mysqli_query($connect,$sql);

$currentVisibility = null;

if ($result) {

    $row = mysqli_fetch_assoc($result);
    if ($row) {

$currentVisibility = $row['visible'];


        // code...
    }
    // code...
} else{

    echo "Error " .mysqli_error($connect);
}

?>

<style>
    @keyframes blink{
        0%, 100% {
            opacity: 1;
        }
        50%{
            opacity: 0;
        }
    }
.nav-item1{
    animation: blink 2s step-start infinite;
}
</style>


<div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"> <a href="index.php"> <i class="fa-solid fa-staff-snake me-2"></a></i>RSDKH</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>                                    
                        <div class="nav-item dropdown">
                           <a href="#" id="serviceDropdown" class="nav-link dropdown-toggle">Service</a>
    <div class="dropdown-menu m-0" id="serviceDropdownMenu">
        <a href="onlinereport.php" class="dropdown-item">Online Report</a>
        <a href="appointment_status.php" class="dropdown-item">Appointment Status</a>
        <a href="team.html" class="dropdown-item">The Team</a>
        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
        <a href="appointment.html" class="dropdown-item">Appointment</a>
        <a href="search.html" class="dropdown-item">Search</a>
    </div>
                        </div>
                        <a href="

" class="nav-item nav-link">Contact</a>
                        <a href="login/login.php" class="nav-item nav-link " style="color: black;">Login Pannel</a>
                        

                        <?php  if ($currentVisibility):?> 
                          
                       
                        <a id="joblink" href="job_application.php" class="nav-item1 nav-link text-success ">Job Is Open Now <i class="fa-solid fa-envelope" style="color:orange;"></i></a>
                         
        <?php endif;?>


    </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>