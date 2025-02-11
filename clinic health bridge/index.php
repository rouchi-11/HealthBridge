<head>
    <?php
include("index/socialmedia.php");
include("index/service.php");
   ?>
    <link href="img/team-1.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
    <script src="chatscript.js"></script>
 <style>
        .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
   
    <div class="container-fluid bg-primary py-5 mb-5 hero-header" style="z-index: -1;">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To HMSC</h5>
                    <h6 class="display-1 text-white mb-md-3" style="font-size: 60px;">RSDKH Supper Specialized<br>Medical College Hospital</h6>
                    <div class="pt-2">
                        <a href="appointment_status.php" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Check Appointment</a>                     
                         <a href="#" id="open-appointment" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
                         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="appointment-popup" class="modal fade" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Close Icon -->
            <span class="close-icon" data-dismiss="modal" aria-label="Close"></span>
            <!-- AJAX content will be loaded here -->
            <div id="appointment-content"></div>
        </div>
    </div>
</div>
 
    <?php
include("index/about.php");
include("index/team.php"); 
include("index/testomonial.php");
include("include/footer.php");
   ?>
<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Your existing styles */
        .modal-dialog {
            margin-top: 100px; /* Adjust as needed */
        }
    </style>
<body class="container1 ">
    <div id="chat-container" class="card" style="display: none;">
    </div>
    <script src="script/chatscript.js">
        // Your existing script content
    </script>
</body>
</html>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="js/main.js"></script>
</body>
</html> 
</body>
  <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inline Scripts -->
    <script>
        $(document).ready(function(){
            // Open appointment popup on button click
            $("#open-appointment").click(function(){
                // Load content from appointment.php using AJAX
                $("#appointment-content").load("appointment.php");
                // Show the appointment popup
                $("#appointment-popup").modal('show');
            });

            // Close appointment popup on close icon click
            $(".close-icon").click(function(){
                // Hide the appointment popup
                $("#appointment-popup").modal('hide');
            });
        });
    </script>
<script>
    $(document).ready(function(){
        // Open appointment popup on button click
        $("#open-appointment").click(function(){
            // Load content from appointall.php using AJAX
            $("#appointment-content").load("appointment.php");
            // Show the appointment popup
            $("#appointment-popup").modal('show');
        });

        // Close appointment popup on close icon click
        $(".close-icon").click(function(){
            // Hide the appointment popup
            $("#appointment-popup").modal('hide');
        });
    });


</script>
</html>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var serviceDropdown = document.getElementById('serviceDropdown');
    var serviceDropdownMenu = document.getElementById('serviceDropdownMenu');

    // Add click event listener to the service dropdown link
    serviceDropdown.addEventListener('click', function() {
        // Toggle the 'show' class on the dropdown menu
        serviceDropdownMenu.classList.toggle('show');
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!serviceDropdownMenu.contains(event.target) && !serviceDropdown.contains(event.target)) {
            serviceDropdownMenu.classList.remove('show');
        }
    });
});

    </script>
</html>


    
