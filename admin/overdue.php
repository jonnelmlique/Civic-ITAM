<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Overdue Asset Management</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a class="navbar-brand ms-3" href="#">Overdue Asset Management</a>
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
                <h3 class="text-dark">Overdue Assets</h3>
                <p class="text-muted">Track overdue assets and ensure timely resolution. Monitor overdue returns, maintenance, or updates to keep your inventory up-to-date.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-box-seam card-icon text-danger"></i>
                        <div>
                            <h6 class="card-title">Total Overdue Assets</h6>
                            <p class="card-value">10</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-tools card-icon text-warning"></i>
                        <div>
                            <h6 class="card-title">Under Maintenance</h6>
                            <p class="card-value">5</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-person-check card-icon text-info"></i>
                        <div>
                            <h6 class="card-title">Awaiting Return</h6>
                            <p class="card-value">3</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-exclamation-circle card-icon text-secondary"></i>
                        <div>
                            <h6 class="card-title">Other Issues</h6>
                            <p class="card-value">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h5 class="mb-3">Overdue Asset List</h5>
                <table class="table table-hover table-striped shadow-sm">
                    <thead class="bg-orange text-white">
                        <tr>
                            <th scope="col">Asset ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ASSET010</td>
                            <td>HP Laptop</td>
                            <td>Computers</td>
                            <td><span class="badge bg-danger">Overdue</span></td>
                            <td>Im Nayeon</td>
                            <td>2024-11-30</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Resolve</button>
                            </td>
                        </tr>
                        <tr>
                            <td>ASSET011</td>
                            <td>Canon Printer</td>
                            <td>Printers</td>
                            <td><span class="badge bg-warning">Under Maintenance</span></td>
                            <td>Hirai Momo</td>
                            <td>2024-12-01</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Resolve</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-end">
                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addOverdueAssetModal">
                    <i class="bi bi-plus-lg"></i> Add New Overdue Asset
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addOverdueAssetModal" tabindex="-1" aria-labelledby="addOverdueAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="addOverdueAssetModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="assetName" class="form-label">Overdue Name</label>
                            <input type="text" class="form-control" id="assetName" placeholder="Enter asset name">
                        </div>
                        <div class="mb-3">
                            <label for="assetCategory" class="form-label">Category</label>
                            <select class="form-select" id="assetCategory">
                                <option selected>Choose category</option>
                                <option value="computers">Computers</option>
                                <option value="printers">Printers</option>
                                <option value="monitors">Monitors</option>
                                <option value="furniture">Furniture</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="assignedTo" class="form-label">Assigned To</label>
                            <input type="text" class="form-control" id="assignedTo" placeholder="Enter assignee's name">
                        </div>
                        <div class="mb-3">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="dueDate">
                        </div>
                        <div class="mb-3">
                            <label for="assetStatus" class="form-label">Status</label>
                            <select class="form-select" id="assetStatus">
                                <option value="overdue">Overdue</option>
                                <option value="maintenance">Under Maintenance</option>
                                <option value="returned">Returned</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
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