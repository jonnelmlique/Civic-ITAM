<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Reports</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/card.css">


</head>

<body>

    <div id="sidebar">
        <div class="sidebar-header text-center">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 30%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="./assetdetails.php"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="./pcassets.php"><i class="fas fa-desktop"></i> PC Assets</a></li>
            <li><a href="./status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="./assetconsignment.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="./tickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="./reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="./maintenance.php" class="active"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
            <li><a href="./diagnostichistory.php"><i class="fas fa-history"></i> Diagnostic History</a>
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
                <a class="navbar-brand ms-3" href="#">Maintenance</a>
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
                    <!-- <h3 class="text-dark">Maintenance Management</h3> -->
                    <!-- <p class="text-muted">Manage and track the status of maintenance requests and updates for all
                        assets.</p> -->
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-primary me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Completed Maintenance</h6>
                                <p class="card-value mb-0">150</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-file-earmark-text card-icon text-success"></i>
                            <div>
                                <h6 class="card-title mb-1">Pending Maintenance</h6>
                                <p class="card-value mb-0">120</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-arrow-clockwise card-icon text-warning"></i>
                            <div>
                                <h6 class="card-title mb-1">In Progress</h6>
                                <p class="card-value mb-0">25</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-exclamation-triangle card-icon text-danger"></i>
                            <div>
                                <h6 class="card-title mb-1">Overdue</h6>
                                <p class="card-value mb-0">5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12 mb-3">

                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                </div>

            </div>
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Asset Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Assigned Technician</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>REQ001</td>
                        <td>HP Printer</td>
                        <td>Printers</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>Son Chaeyoung</td>
                        <td>2024-12-01</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#viewAssetModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editAssetModal">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>REQ002</td>
                        <td>Dell Laptop</td>
                        <td>Computers</td>
                        <td><span class="badge bg-info">In Progress</span></td>
                        <td>Juan Dela</td>
                        <td>2024-11-30</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#viewAssetModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editAssetModal">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>REQ003</td>
                        <td>HP Laptop</td>
                        <td>Computers</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>Rodelie Kristel Mercado</td>
                        <td>2024-11-25</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#viewAssetModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editAssetModal">Edit</button>

                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addAssetModal">
                <i class="bi bi-plus-lg"></i> Add New Maintenance Request
            </button>
        </div>
    </div>
    </div>


    <div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addAssetModalLabel">Add New Maintenance Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="assetName" class="form-label">Maintenance Name</label>
                            <input type="text" class="form-control" id="assetName" placeholder="Enter Maintenance name">
                        </div>
                        <div class="mb-3">
                            <label for="assetCategory" class="form-label">Category</label>
                            <select class="form-select" id="assetCategory">
                                <option value="">Select Category</option>
                                <option value="Computers">Computers</option>
                                <option value="Printers">Printers</option>
                                <option value="Monitors">Monitors</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="assetStatus" class="form-label">Status</label>
                            <select class="form-select" id="assetStatus">
                                <option value="Available">Available</option>
                                <option value="Assigned">Assigned</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="assetAssignee" class="form-label">Assigned To</label>
                            <input type="text" class="form-control" id="assetAssignee"
                                placeholder="Enter assignee name (if applicable)">
                        </div>
                        <div class="mb-3">
                            <label for="assetRemarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="assetRemarks" rows="3"
                                placeholder="Additional information"></textarea>
                        </div>
                        <button type="submit" class="btn btn-orange">Add New Maintenance Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="viewAssetModal" tabindex="-1" aria-labelledby="viewAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewAssetModalLabel">View Maintenance Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viewAssetName" class="form-label">Maintenance Name</label>
                        <input type="text" class="form-control" id="viewAssetName" disabled
                            placeholder="Maintenance name">
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="viewAssetCategory" disabled placeholder="Category">
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="viewAssetStatus" disabled placeholder="Status">
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetAssignee" class="form-label">Assigned To</label>
                        <input type="text" class="form-control" id="viewAssetAssignee" disabled
                            placeholder="Assignee name">
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetRemarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="viewAssetRemarks" rows="3" disabled
                            placeholder="Remarks"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editAssetModalLabel">Edit Maintenance Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editAssetName" class="form-label">Maintenance Name</label>
                            <input type="text" class="form-control" id="editAssetName"
                                placeholder="Enter Maintenance name">
                        </div>
                        <div class="mb-3">
                            <label for="editAssetCategory" class="form-label">Category</label>
                            <select class="form-select" id="editAssetCategory">
                                <option value="Computers">Computers</option>
                                <option value="Printers">Printers</option>
                                <option value="Monitors">Monitors</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editAssetStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAssetStatus">
                                <option value="Available">Available</option>
                                <option value="Assigned">Assigned</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editAssetAssignee" class="form-label">Assigned To</label>
                            <input type="text" class="form-control" id="editAssetAssignee"
                                placeholder="Enter assignee name">
                        </div>
                        <div class="mb-3">
                            <label for="editAssetRemarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="editAssetRemarks" rows="3"
                                placeholder="Additional information"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Save Changes</button>
                    </form>
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