<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Ediit User</title>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../../public/css/superadmin/status.css">

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
            <li><a href="#"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="#"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
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


            <div class="form-grid">
                <!-- <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" id="id" class="input-field" placeholder="Enter ID">
                </div> -->
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" class="input-field" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="firstname">Last Name:</label>
                    <input type="text" id="lastname" class="input-field" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="input-field" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="input-field" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="input-field" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="text" id="contactNumber" class="input-field" placeholder="Enter Contact Number">
                </div>
                <div class="form-group">
                    <label for="role">Department:</label>
                    <select id="role" class="input-field">
                        <option value="super-admin">CMI</option>
                        <option value="admin">FINANCE</option>
                        <option value="staff">TOPSPOT</option>
                        <option value="staff">PRIME QUEST</optio>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" class="input-field">
                        <option value="super-admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-update">Update</button>
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