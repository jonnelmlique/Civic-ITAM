<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset Details</title>
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
            <li><a href="./assetdetails.php" class="active"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="./pcassets.php"><i class="fas fa-desktop"></i> PC Assets</a></li>
            <li><a href="./status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="./assetconsignment.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="./tickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="./reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="./maintenance.php"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
            <li><a href="./diagnostichistory.php"><i class="fas fa-history"></i> Diagnostic History</a></li>
            <li><a href="./manageuser.php"><i class="fas fa-users"></i> Manage Users</a></li>
        </ul>

    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Asset Details</a>
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
                    <input type="text" id="searchInput" class="form-control w-50" placeholder="Search assets...">
                    <a href="./add/assetdetails.php">
                        <button class="btn btn-orange" id="addAssetBtn">Add</button>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered  table-hover" id="assetTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asset Code</th>
                            <th>Computer Name</th>
                            <th>Item ID</th>
                            <th>Description</th>
                            <th>Item Type</th>
                            <th>Serial Number</th>
                            <th>Supplier</th>
                            <th>Purchase Date</th>
                            <th>Invoice Number</th>
                            <th>Amount</th>
                            <th>Warranty</th>
                            <th>Category</th>
                            <th>Create Date</th>
                            <th>Created By</th>
                            <th>Last Modified Date</th>
                            <th>Last Modified By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AC-1001</td>
                            <td>Desktop PC</td>
                            <td>Item-001</td>
                            <td>Core i7, 16GB RAM</td>
                            <td>Computer</td>
                            <td>SN12345678</td>
                            <td>Supplier A</td>
                            <td>2022-01-01</td>
                            <td>INV-12345</td>
                            <td>$1200</td>
                            <td>1 year</td>
                            <td>IT</td>
                            <td>2022-01-01</td>
                            <td>Admin</td>
                            <td>2023-01-01</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./edit/assetdetails.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>

                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>AC-1002</td>
                            <td>Laptop</td>
                            <td>Item-002</td>
                            <td>Core i5, 8GB RAM</td>
                            <td>Computer</td>
                            <td>SN23456789</td>
                            <td>Supplier B</td>
                            <td>2022-02-01</td>
                            <td>INV-23456</td>
                            <td>$800</td>
                            <td>2 years</td>
                            <td>IT</td>
                            <td>2022-02-01</td>
                            <td>Admin</td>
                            <td>2023-02-01</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./edit/assetdetails.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>AC-1003</td>
                            <td>Monitor</td>
                            <td>Item-003</td>
                            <td>27-inch, 4K</td>
                            <td>Accessory</td>
                            <td>SN34567890</td>
                            <td>Supplier C</td>
                            <td>2022-03-01</td>
                            <td>INV-34567</td>
                            <td>$500</td>
                            <td>1 year</td>
                            <td>IT</td>
                            <td>2022-03-01</td>
                            <td>Admin</td>
                            <td>2023-03-01</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./edit/assetdetails.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>AC-1004</td>
                            <td>Printer</td>
                            <td>Item-004</td>
                            <td>Laser, Color</td>
                            <td>Accessory</td>
                            <td>SN45678901</td>
                            <td>Supplier D</td>
                            <td>2022-04-01</td>
                            <td>INV-45678</td>
                            <td>$250</td>
                            <td>1 year</td>
                            <td>Office</td>
                            <td>2022-04-01</td>
                            <td>Admin</td>
                            <td>2023-04-01</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./edit/assetdetails.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>AC-1005</td>
                            <td>Router</td>
                            <td>Item-005</td>
                            <td>Wi-Fi 6, Dual Band</td>
                            <td>Network</td>
                            <td>SN56789012</td>
                            <td>Supplier E</td>
                            <td>2022-05-01</td>
                            <td>INV-56789</td>
                            <td>$150</td>
                            <td>3 years</td>
                            <td>Networking</td>
                            <td>2022-05-01</td>
                            <td>Admin</td>
                            <td>2023-05-01</td>
                            <td>Admin</td>
                            <td>
                                <center>
                                    <div class="action-icons">
                                        <a href="./edit/assetdetails.php" style="text-decoration: none;">
                                            <button class="icon-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button class="icon-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </center>
                            </td>
                        </tr>
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