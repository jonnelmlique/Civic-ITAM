<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Diagnostic History</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/assetdetails.css">
    <style>
    #table .assetTable th {
        white-space: nowrap;
        text-align: center;
    }

    #assetTable tr {
        white-space: nowrap;
        text-align: center;
    }
    </style>
</head>

<body>

    <div id="sidebar">
        <div class="sidebar-header text-center">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 30%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="./assetdetails.php"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="./status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="./assetconsignment.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="#"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="./diagnostichistory.php" class="active"><i class="fas fa-history"></i> Diagnostic History</a>
            </li>
            <li><a href="./manageuser.php"><i class="fas fa-users"></i> Manage Users</a></li>
        </ul>

    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Diagnostic History</a>
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
                    <input type="text" id="searchInput" class="form-control w-50" placeholder="Search">
                    <a href="./adddiagnostic.php">
                        <button class="btn btn-orange" id="addAssetBtn">Add</button>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="assetTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asset Details ID</th>
                            <th>Job</th>
                            <th>Job Type</th>
                            <th>Conducted By</th>
                            <th>Job Date</th>
                            <th>Cost</th>
                            <th>Create Date</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AD123</td>
                            <td>Inspection</td>
                            <td>Routine</td>
                            <td>John Smith</td>
                            <td>2024-11-01</td>
                            <td>$500</td>
                            <td>2024-10-25</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./editdiagnostic.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });
    </script>
</body>

</html>