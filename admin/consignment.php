<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset Consignment</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/management.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
</head>

<body>

    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li>
                <a href="./dashboard.php" class="nav-link text-white">
                    <i class="bi bi-layout-text-window-reverse"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white dropdown-toggle" href="#" id="assetDropdown" data-bs-toggle="collapse"
                    data-bs-target="#assetMenu" aria-expanded="false" aria-controls="assetMenu">
                    <i class="bi bi-ui-checks-grid"></i> Asset Management
                </a>
                <div class="collapse" id="assetMenu">
                    <ul class="nav flex-column ps-3">
                        <li><a href="./assets.php" class="nav-link text-white">Assets</a></li>
                        <li><a href="./pcassets.php" class="nav-link text-white">PC's</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="./maintenance.php" class="nav-link text-white">
                    <i class="bi bi-tools"></i> Maintenance
                </a>
            </li>
            <li>
                <a href="./consignment.php" class="nav-link text-white active">
                    <i class="fas fa-truck"></i> Consignment
                </a>
            </li>
            <li>
                <a href="./tickets.php" class="nav-link text-white">
                    <i class="bi bi-ticket-perforated"></i> Tickets
                </a>
            </li>
            <li>
                <a href="./overdue.php" class="nav-link text-white">
                    <i class="bi bi-exclamation-triangle"></i> Overdue
                </a>
            </li>
            <li>
                <a href="./reports.php" class="nav-link text-white">
                    <i class="bi bi-file-earmark-text"></i> Reports
                </a>
            </li>
            <li>
                <a href="./diagnostichistory.php" class="nav-link text-white">
                    <i class="fas fa-history"></i> Diagnostic History
                </a>
            </li>
            <li>
                <a href="./users.php" class="nav-link text-white">
                    <i class="bi bi-person"></i> Manage Users
                </a>
            </li>
        </ul>
    </div>


    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Asset Consignment</a>
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
                <div class="col-12">
                    <!-- <h3 class="text-dark">Assets Management</h3>
                    <p class="text-muted">Manage and monitor your assets effectively. Here, you can track the status,
                        location, and assignment of all assets in your inventory.</p>
                    <p class="text-muted">Use the options below to review asset status, assign new assets, and ensure
                        the assets are always in good condition.</p> -->

                </div>
            </div>


            <div class="row g-3">
                <!-- Total Consignments -->
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-box-seam card-icon text-primary me-3"></i>
                            <div>
                                <h6 class="card-title">Total Consignments</h6>
                                <p class="card-value">350</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Consignments -->
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success me-3"></i>
                            <div>
                                <h6 class="card-title">Active Consignments</h6>
                                <p class="card-value">290</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Consignments -->
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-clock card-icon text-warning me-3"></i>
                            <div>
                                <h6 class="card-title">Pending Consignments</h6>
                                <p class="card-value">45</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Consignments -->
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-lg card-icon text-info me-3"></i>
                            <div>
                                <h6 class="card-title">Completed Consignments</h6>
                                <p class="card-value">15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                    <!-- <h5 class="mb-3">Consigned Asset Inventory</h5> -->
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">Consignment ID</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Consignee</th>
                                <th scope="col">Date Consigned</th>
                                <th scope="col">Return Due</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CON001</td>
                                <td>Dell Laptop</td>
                                <td>Computers</td>
                                <td>ABC Corp</td>
                                <td>2024-11-15</td>
                                <td>2024-12-15</td>
                                <td><span class="badge bg-warning">Pending Return</span></td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#viewConsignmentModal">View</button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editConsignmentModal">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addConsignmentModal">
                        <i class="bi bi-plus-lg"></i> Add New Consignment
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addConsignmentModal" tabindex="-1" aria-labelledby="addConsignmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addConsignmentModalLabel">Add New Consignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="consignmentAssetName" class="form-label">Asset Name</label>
                                    <input type="text" class="form-control" id="consignmentAssetName"
                                        placeholder="Enter asset name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="consignmentCategory" class="form-label">Category</label>
                                    <select class="form-select" id="consignmentCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="Computers">Computers</option>
                                        <option value="Printers">Printers</option>
                                        <option value="Monitors">Monitors</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="consigneeName" class="form-label">Consignee</label>
                                    <input type="text" class="form-control" id="consigneeName"
                                        placeholder="Enter consignee name" required>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dateConsigned" class="form-label">Date Consigned</label>
                                    <input type="date" class="form-control" id="dateConsigned" required>
                                </div>
                                <div class="mb-3">
                                    <label for="returnDue" class="form-label">Return Due Date</label>
                                    <input type="date" class="form-control" id="returnDue" required>
                                </div>
                                <div class="mb-3">
                                    <label for="consignmentStatus" class="form-label">Status</label>
                                    <select class="form-select" id="consignmentStatus" required>
                                        <option value="Pending Return">Pending Return</option>
                                        <option value="Returned">Returned</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-orange">Add Consignment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editConsignmentModal" tabindex="-1" aria-labelledby="editConsignmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="editConsignmentModalLabel">Edit Consignment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editConsignmentAssetName" class="form-label">Asset Name</label>
                                    <input type="text" class="form-control" id="editConsignmentAssetName" value="Laptop"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="editConsignmentCategory" class="form-label">Category</label>
                                    <select class="form-select" id="editConsignmentCategory" required>
                                        <option value="Computers" selected>Computers</option>
                                        <option value="Printers">Printers</option>
                                        <option value="Monitors">Monitors</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editConsigneeName" class="form-label">Consignee</label>
                                    <input type="text" class="form-control" id="editConsigneeName" value="John Doe"
                                        required>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editDateConsigned" class="form-label">Date Consigned</label>
                                    <input type="date" class="form-control" id="editDateConsigned" value="2023-12-01"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="editReturnDue" class="form-label">Return Due Date</label>
                                    <input type="date" class="form-control" id="editReturnDue" value="2023-12-31"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="editConsignmentStatus" class="form-label">Status</label>
                                    <select class="form-select" id="editConsignmentStatus" required>
                                        <option value="Pending Return" selected>Pending Return</option>
                                        <option value="Returned">Returned</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewConsignmentModal" tabindex="-1" aria-labelledby="viewConsignmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="viewConsignmentModalLabel">View Consignment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Asset Name</label>
                                <p class="form-control-static" id="viewConsignmentAssetName">Laptop</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <p class="form-control-static" id="viewConsignmentCategory">Computers</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Consignee</label>
                                <p class="form-control-static" id="viewConsigneeName">John Doe</p>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date Consigned</label>
                                <p class="form-control-static" id="viewDateConsigned">2023-12-01</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Return Due Date</label>
                                <p class="form-control-static" id="viewReturnDue">2023-12-31</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <p class="form-control-static" id="viewConsignmentStatus">Pending Return</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel"
        aria-hidden="true">


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