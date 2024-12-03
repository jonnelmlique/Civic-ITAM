<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Add User</title>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../../public/css/superadmin/status.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    <div id="sidebar">
        <div class="sidebar-header text-center">
            <img src="../../images/civicph_logo.png" alt="CIVIC" style="max-width: 30%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="../dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="../assetdetails.php"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="../pcassets.php"><i class="fas fa-desktop"></i> PC Assets</a></li>
            <li><a href="../status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="../assetconsignments.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="../tickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="../reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="../maintenance.php"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
            <li><a href="../diagnostichistory.php"><i class="fas fa-history"></i> Diagnostic History</a></li>
            <li><a href="../manageuser.php" class="active"><i class="fas fa-users"></i> Manage Users</a></li>
        </ul>

    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Add User</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between">

                </div>
            </div>
            <!--note: add password hash and salting and try catch for error handling 
            lucking specific notification 
            if email or username already exsist-->

            <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../src/config/config.php';
    try {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $contactNumber = $_POST['contactnumber'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $hireDate = $_POST['hiredate'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkQuery = $conn->prepare("SELECT * FROM employees WHERE email = ? OR username = ?");
    $checkQuery->bind_param("ss", $email, $username);
    $checkQuery->execute();
    $checkResult = $checkQuery->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email or Username already exists!'
            });
        </script>";
    } else {

        $insertQuery = $conn->prepare(
            "INSERT INTO employees (first_name, last_name, username, email, password, contactnumber, department, role, hire_date) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $insertQuery->bind_param(
            "sssssssss",
            $firstName,
            $lastName,
            $username,
            $email,
            $hashedPassword,
            $contactNumber,
            $department,
            $role,
            $hireDate
        );

        if ($insertQuery->execute()) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Employee registered successfully!'
                }).then(() => {
                    window.location = '../manageuser.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to register employee. Please try again.'
                });
            </script>";
        }
    }

    $checkQuery->close();
    $insertQuery->close();
    $conn->close();
} catch (Exception $e) {

    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'An unexpected error occurred: " . addslashes($e->getMessage()) . "'
        });
    </script>";
}
}
?>
            <form action="" method="POST">

                <div class="form-grid">
                    <!-- <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" id="id" class="input-field" placeholder="Enter ID">
                </div> -->
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname" class="input-field"
                            placeholder="Enter First Name" required>

                    </div>
                    <div class="form-group">
                        <label for="firstname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" class="input-field"
                            placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="input-field"
                            placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="input-field" placeholder="Enter Email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="input-field"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="text" name="contactnumber" id="contactNumber" class="input-field"
                            placeholder="Enter Contact Number" required pattern="^\d{11}$" maxlength="11"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="form-group">
                        <label for="hiredate">Hire Date:</label>
                        <input type="date" name="hiredate" id="hiredate" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="role">Department:</label>
                        <select id="role" name="department" class="input-field">
                            <option value="admin">ADMIN</option>
                            <option value="csd">CSD</option>
                            <option value="staff">TOPSPOT</option>
                            <option value="staff">PRIME QUEST</optio>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="input-field">
                            <option value="super-admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-update">Submit</button>
                    <button type="button" class="btn btn-cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>


    <script>
    function toggleDropdown() {
        var menu = document.getElementById("dropdownMenu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
    </script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });
    </script>
</body>

</html>