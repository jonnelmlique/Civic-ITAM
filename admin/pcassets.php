<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | PC Assets Management</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admin/management.css">
    <link rel="stylesheet" href="../public/css/admin/sidebar.css">
</head>

<body>

<div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
    <div class="sidebar-header text-center py-3">
        <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
    </div>
    <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white active"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
            <li><a href="./assets.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> Asset Management</a></li>
            <li><a href="./maintenance.php" class="nav-link text-white"><i class="bi bi-tools"></i> Maintenance Management</a></li>
            <li><a href="./pcassets.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i> Tickets</a></li>
            <li><a href="./overdue.php" class="nav-link text-white"><i class="bi bi-exclamation-triangle"></i> Overdue</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a></li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i> Diagnostic History</a></li>
            <li><a href="./users.php" class="nav-link text-white"><i class="bi bi-person"></i> Users</a></li>
        </ul>
</div>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-orange" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-3" href="./pcassets.php">Pc's Management</a>
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
                <h3 class="text-dark">PC Assets Management</h3>
                <p class="text-muted">Monitor and manage PC assets, including laptops, desktops, and related peripherals. Ensure all systems are functioning optimally.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-pc-display-horizontal card-icon text-primary"></i>
                        <div>
                            <h6 class="card-title">Total PCs</h6>
                            <p class="card-value">80</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-check-circle card-icon text-success"></i>
                        <div>
                            <h6 class="card-title">Available PCs</h6>
                            <p class="card-value">65</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-people-fill card-icon text-warning"></i>
                        <div>
                            <h6 class="card-title">Assigned PCs</h6>
                            <p class="card-value">12</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-trash card-icon text-danger"></i>
                        <div>
                            <h6 class="card-title">Pcs to Dispose</h6>
                            <p class="card-value">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h5 class="mb-3">PC Inventory</h5>
                <table class="table table-hover table-striped shadow-sm">
                    <thead class="bg-orange text-white">
                        <tr>
                            <th scope="col">PC ID</th>
                            <th scope="col">Model</th>
                            <th scope="col">Specifications</th>
                            <th scope="col">Status</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PC001</td>
                            <td>Dell Inspiron</td>
                            <td>Intel i7, 16GB RAM</td>
                            <td><span class="badge bg-success">Available</span></td>
                            <td>-</td>
                            <td>2024-12-01</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>PC002</td>
                            <td>HP EliteBook</td>
                            <td>Intel i5, 8GB RAM</td>
                            <td><span class="badge bg-warning">Assigned</span></td>
                            <td>Jane Doe</td>
                            <td>2024-11-28</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>PC003</td>
                            <td>Lenovo ThinkPad</td>
                            <td>AMD Ryzen 5, 8GB RAM</td>
                            <td><span class="badge bg-danger">Under Maintenance</span></td>
                            <td>-</td>
                            <td>2024-11-20</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
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
                <i class="bi bi-plus-lg"></i> Add New Pcs
            </button>
        </div>
    </div>
</div>


<div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="addAssetModalLabel">Add New Pcs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="assetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="assetName" placeholder="Enter Pcs name">
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
                        <input type="text" class="form-control" id="assetAssignee" placeholder="Enter assignee name (if applicable)">
                    </div>
                    <div class="mb-3">
                        <label for="assetRemarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="assetRemarks" rows="3" placeholder="Additional information"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Add Pcs</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel" aria-hidden="true">



<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });
</script>

</body>
</html>
