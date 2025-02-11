<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $username = $_POST['username'];  
    $password = $_POST['password'];

    switch ($role) {
        case 'admin':
            // Admin login logic
            $query = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
            $query->bind_param("ss", $username, $password);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows == 1) {
                // Admin login successful
                $_SESSION['admin'] = $username;
                header("location: ../admin/index.php");
                exit();
            } else {
                $error = "Invalid Admin Login Details";
                echo '<div class="alert alert-danger" style="text-align:center;">' . $error . '</div>';
            }
            break;
        default:
            $error = "Invalid Role Selected";
            echo '<div class="alert alert-danger" style="text-align:center;">' . $error . '</div>';
            break;


case 'doctor':
    // Admin login logic
    $query = $conn->prepare("SELECT * FROM doctors WHERE username=? AND password=?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if ($row['status'] == "pending") {
        $error = "Please wait for admin approval";
    } elseif ($row['status'] == "Rejected") {
        $error = "Please try again later";
    } elseif ($result->num_rows == 1) {
        $_SESSION['doctor'] = $username;
        header("location:../doctor/index.php");
        exit();
    } else {
        $error = "Wait For admin Approval";
    }
    break;

   case 'patient':
    // Admin login logic
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM patient WHERE username=? AND password=?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows == 1) {
        $_SESSION['patient_id'] = $row['id'];
        $_SESSION['patient_username'] = $username;

        if ($row['status'] == "pending") {
            $error = "Please wait for admin approval";
        } elseif ($row['status'] == "Rejected") {
            $error = "Please try again later";
        } else {
            $_SESSION['patient'] = $username;
            header("location:../patient/index.php");
            exit();
        }
    } else {
        $error = "Invalid username or password";
    }
}
    break;



case 'account_branch':
    // Admin login logic
    $query = $conn->prepare("SELECT * FROM account_branch WHERE username=? AND password=?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if ($row['status'] == "pending") {
        $error = "Please wait for admin approval";
    } elseif ($row['status'] == "Rejected") {
        $error = "Please try again later";
    } elseif ($result->num_rows == 1) {
        $_SESSION['account_branch'] = $username;
        header("location: ../account/index.php");
        exit();
    } else {
        $error = "Wait For admin Approval";
    }
    break;

    case 'employee':
            // Admin login logic
            $query = $conn->prepare("SELECT * FROM employee WHERE username=? AND password=?");
            $query->bind_param("ss", $username, $password);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows == 1) {
                // Admin login successful
                $_SESSION['employee'] = $username;
                header("location: ../employee/index.php");
                exit();
            } else {
                $error = "Invalid Admin Login Details";
                echo '<div class="alert alert-danger" style="text-align:center;">' . $error . '</div>';
            }
            break;
        
            $error = "Invalid Role Selected";
            echo '<div class="alert alert-danger" style="text-align:center;">' . $error . '</div>';
            break;
   
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Container for input and icon */
        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        /* Style for the input field */
        .input-container input {
            width: 100%;
            padding: 10px;
            padding-left: 40px; /* Space for the icon */
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
        }

        /* Style for the icon */
        .input-container .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        /* Input focus effect */
        .input-container input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Icon hover effect */
        .input-container .icon:hover {
            color: #007bff;
        }

        .custom-select-container {
            position: relative;
            display: inline-block;
            width: 100%;

        }

        /* Hidden actual select element */
        .custom-select-container select {
            display: none;
        }

        /* Custom dropdown display */
        .custom-select-display {
            width: 100%;
            padding: 10px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius:8px;
            background-color: white;
            cursor: pointer;
            position: relative;
            font-size: 16px;
            color: #333;
        }

        /* Icon in custom dropdown */
        .custom-select-display i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        /* Custom options dropdown */
        .custom-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            z-index: 1000;
        }

        /* Each custom option */
        .custom-option {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        /* Custom option icon */
        .custom-option i {
            margin-right: 10px;
        }

        /* Hover effect for custom options */
        .custom-option:hover {
            background-color: #007bff;
            color: white;

        }
    </style>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form id="loginForm" method="POST" action=""style="margin-top: -20px;">

               
                <div class="icons">
                    <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fab fa-github"></i></a>
                    <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
                </div>  

<div class="custom-select-container" style="width:140px;">
        <div class="custom-select-display" onclick="toggleOptions()">Select Role<i class="fas fa-chevron-down" ></i></div>
        <div class="custom-options">
            <div class="custom-option" onclick="selectOption('admin')"><i class="fas fa-user-shield"></i> Admin</div>
            <div class="custom-option" onclick="selectOption('doctor')"><i class="fas fa-user-md"></i> Doctor</div>
            <div class="custom-option" onclick="selectOption('patient')"><i class="fas fa-procedures"></i> Patient</div>
            <div class="custom-option" onclick="selectOption('account_branch')"><i class="fas fa-hospital-user"></i> IPD/OPD</div>
            <div class="custom-option" onclick="selectOption('employee')"><i class="fas fa-flask"></i> Lab Staff</div>
        </div>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
            <option value="account_branch">IPD/OPD</option>
            <option value="employee">Lab Staff</option>
        </select>
    </div>

        
                <div class="input-container">
        <input type="password" id="username" name="username" placeholder="Enter Your Username">
        <i class="fas fa-user icon"></i> <!-- User icon -->
    </div>
    
    <div class="input-container" style="margin-top: -20px;">
        <input type="password" id="password" name="password" placeholder="Password">
        <i class="fas fa-lock icon"></i> <!-- Lock icon -->
    </div>
    
    <button type="button" class="btn btn-primary" onclick="validateLoginForm()">Sign in</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
               
                <button class="hidden" id="sign-up23" style="margin-left: 150px; margin-top: 200px;"> <a href="../index.php" class="text-white">Home</a></button>
               
                <div class="icons" style="margin-left:170px; margin-top: -90px; ">
                    <a href="../index.php" class="icon"></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:850px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"style="width:500px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body"style="width:500px;">
                    <!-- Content loaded via AJAX will be inserted here -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
 
    </script>
</body>
</html>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:850px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"style="width:500px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body"style="width:500px;">
                    <!-- Content loaded via AJAX will be inserted here -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"> </script>
</body>
</html>
<script>
    function toggleOptions() {
        var options = document.querySelector('.custom-options');
        options.style.display = options.style.display === 'block' ? 'none' : 'block';
    }

    function selectOption(value) {
        var display = document.querySelector('.custom-select-display');
        var select = document.getElementById('role');
        select.value = value;
        display.innerHTML = document.querySelector('.custom-option[onclick="selectOption(\'' + value + '\')"]').innerHTML;
        toggleOptions();
    }

    // Close the custom dropdown if clicked outside
    document.addEventListener('click', function (e) {
        var container = document.querySelector('.custom-select-container');
        if (!container.contains(e.target)) {
            document.querySelector('.custom-options').style.display = 'none';
        }
    });
</script>