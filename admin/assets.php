<?php
        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "civicitam";


        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['addAsset'])) {
                $name = $conn->real_escape_string($_POST['assetName']);
                $category = $conn->real_escape_string($_POST['assetCategory']);
                $status = $conn->real_escape_string($_POST['assetStatus']);
                $location = $conn->real_escape_string($_POST['assetLocation']);
                $description = $conn->real_escape_string($_POST['assetDescription']);

                $sql = "INSERT INTO assetdetails (computername, category, status, location, description) 
                        VALUES ('$name', '$category', '$status', '$location', '$description')";

                if ($conn->query($sql)) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Asset added successfully!'];
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Error: ' . $conn->error];
                }
            }

            if (isset($_POST['deleteAsset'])) {
                $id = $conn->real_escape_string($_POST['assetId']);
                $sql = "DELETE FROM assetdetails WHERE id=$id";
                if ($conn->query($sql)) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Asset deleted successfully!'];
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Error: ' . $conn->error];
                }
            }

            if (isset($_POST['updateAsset'])) {
                $id = $conn->real_escape_string($_POST['assetId']);
                $name = $conn->real_escape_string($_POST['assetName']);
                $category = $conn->real_escape_string($_POST['assetCategory']);
                $status = $conn->real_escape_string($_POST['assetStatus']);
                $location = $conn->real_escape_string($_POST['assetLocation']);
                $description = $conn->real_escape_string($_POST['assetDescription']);

                $sql = "UPDATE assetdetails SET computername='$name', category='$category', status='$status', 
                        location='$location', description='$description' WHERE id=$id";
                if ($conn->query($sql)) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Asset updated successfully!'];
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Error: ' . $conn->error];
                }
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

       
        $assets = $conn->query("SELECT id, computername, category, status, location, description, lastmodifieddate 
                                FROM assetdetails");
?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset Management</title>
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
                        <li><a href="./assets.php" class="nav-link text-white active">Assets</a></li>
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
                <a href="./consignment.php" class="nav-link text-white">
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
                <a class="navbar-brand ms-3" href="#">Asset Management</a>
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

            <?php


$total_assets_query = "SELECT COUNT(*) as total FROM assetdetails";
$total_assets_result = $conn->query($total_assets_query);
$total_assets = $total_assets_result->fetch_assoc()['total'];

$available_assets_query = "SELECT COUNT(*) as available FROM assetdetails WHERE status = 'Available'";
$available_assets_result = $conn->query($available_assets_query);
$available_assets = $available_assets_result->fetch_assoc()['available'];


$assigned_assets_query = "SELECT COUNT(*) as assigned FROM assetdetails WHERE status = 'Assigned'";
$assigned_assets_result = $conn->query($assigned_assets_query);
$assigned_assets = $assigned_assets_result->fetch_assoc()['assigned'];

$disposed_assets_query = "SELECT COUNT(*) as disposed FROM assetdetails WHERE status = 'To Dispose'";
$disposed_assets_result = $conn->query($disposed_assets_query);
$disposed_assets = $disposed_assets_result->fetch_assoc()['disposed'];
?>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-box-seam card-icon text-primary"></i>
                            <div>
                                <h6 class="card-title">Total Assets</h6>
                                <p class="card-value"><?= $total_assets ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success"></i>
                            <div>
                                <h6 class="card-title">Available Assets</h6>
                                <p class="card-value"><?= $available_assets ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-people-fill card-icon text-warning"></i>
                            <div>
                                <h6 class="card-title">Assigned Assets</h6>
                                <p class="card-value"><?= $assigned_assets ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-trash card-icon text-danger"></i>
                            <div>
                                <h6 class="card-title">Asset to Dispose</h6>
                                <p class="card-value"><?= $disposed_assets ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row mt-4">
                <div class="col-12">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                    <!-- <h5 class="mb-3">Asset Inventory</h5>
                    <p class="text-muted mb-3">Review and manage your current asset inventory. Below is the list of all
                        available, assigned, and under maintenance assets.</p> -->
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">Asset ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Assigned To</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $assets->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['computername']) ?></td>
                                <td><?= htmlspecialchars($row['category']) ?></td>
                                <td>
                                    <span
                                        class="badge 
                                <?= $row['status'] === 'Available' ? 'bg-success' : ($row['status'] === 'Assigned' ? 'bg-warning' : 'bg-danger') ?>">
                                        <?= htmlspecialchars($row['status']) ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($row['location'] ?? 'N/A') ?></td>
                                <td><?= htmlspecialchars($row['lastmodifieddate']) ?></td>
                                <td>
                                    <!-- View Button -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#viewAssetModal<?= $row['id'] ?>">View</button>

                                    <!-- Edit and Delete Buttons -->
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="assetId" value="<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editAssetModal<?= $row['id'] ?>">Edit</button>
                                        <button type="submit" name="deleteAsset"
                                            class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#qrModal<?= $row['id'] ?>">Generate QR</button>
                                    <!-- QR Code Modal (Design Only) -->
                                    <div class="modal fade" id="qrModal<?= $row['id'] ?>" tabindex="-1"
                                        aria-labelledby="qrModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="qrModalLabel">QR Code for Asset ID:
                                                        <?= $row['id'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- QR Code Placeholder (Design Only) -->
                                                    <div class="text-center">
                                                        <div class="bg-light p-5"
                                                            style="width: 200px; height: 200px; margin: 0 auto; display: flex; justify-content: center; align-items: center; font-size: 16px;">
                                                            <span>QR Code Placeholder</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>




                                <!-- VIEW ASSET MODAL -->
                                <div class="modal fade" id="viewAssetModal<?= $row['id'] ?>" tabindex="-1"
                                    aria-labelledby="viewAssetModalLabel" aria-hidden="true">

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-orange text-white">
                                                <h5 class="modal-title" id="viewAssetModalLabel">View Asset Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Left Column -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Asset Name</label>
                                                            <p class="form-control-static" id="viewAssetName">
                                                                <?= htmlspecialchars($row['computername']) ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <p class="form-control-static" id="viewAssetCategory">
                                                                <?= htmlspecialchars($row['category']) ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <p class="form-control-static" id="viewAssetStatus">
                                                                <?= htmlspecialchars($row['status']) ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- Right Column -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Assigned To</label>
                                                            <p class="form-control-static" id="viewAssetAssignee">
                                                                <?= htmlspecialchars($row['location'] ?? 'N/A') ?>
                                                            </p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <p class="form-control-static" id="viewAssetRemarks">
                                                                <?= htmlspecialchars($row['description'] ?? 'N/A') ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF VIEW ASSET MODAL -->




                                <!-- EDIT ASSET MODAL -->
                                <div class="modal fade" id="editAssetModal<?= $row['id'] ?>" tabindex="-1"
                                    aria-labelledby="editAssetModalLabel" aria-hidden="true">

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-orange text-white">
                                                <h5 class="modal-title" id="editAssetModalLabel">Edit Asset Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST">
                                                    <input type="hidden" name="assetId" value="<?= $row['id'] ?>">
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="editAssetName" class="form-label">Asset
                                                                    Name</label>
                                                                <input type="text" name="assetName" class="form-control"
                                                                    value="<?= htmlspecialchars($row['computername']) ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editAssetCategory"
                                                                    class="form-label">Category</label>
                                                                <select class="form-select" id="editAssetCategory"
                                                                    required>
                                                                    <option
                                                                        <?= $row['category'] === 'Computers' ? 'selected' : '' ?>>
                                                                        Computers</option>
                                                                    <option
                                                                        <?= $row['category'] === 'Printers' ? 'selected' : '' ?>>
                                                                        Printers</option>
                                                                    <option
                                                                        <?= $row['category'] === 'Monitors' ? 'selected' : '' ?>>
                                                                        Monitors</option>
                                                                    <option
                                                                        <?= $row['category'] === 'Accessories' ? 'selected' : '' ?>>
                                                                        Accessories</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editAssetStatus"
                                                                    class="form-label">Status</label>
                                                                <select class="form-select" id="editAssetStatus"
                                                                    required>
                                                                    <option
                                                                        <?= $row['status'] === 'Available' ? 'selected' : '' ?>>
                                                                        Available</option>
                                                                    <option
                                                                        <?= $row['status'] === 'Assigned' ? 'selected' : '' ?>>
                                                                        Assigned</option>
                                                                    <option
                                                                        <?= $row['status'] === 'Under Maintenance' ? 'selected' : '' ?>>
                                                                        Under Maintenance</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="editAssetAssignee"
                                                                    class="form-label">Assigned To</label>
                                                                <input type="text" name="assetLocation"
                                                                    class="form-control"
                                                                    value="<?= htmlspecialchars($row['location']) ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editAssetRemarks"
                                                                    class="form-label">Description</label>
                                                                <textarea name="assetDescription"
                                                                    class="form-control"><?= htmlspecialchars($row['description']) ?></textarea>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF EDIT ASSET MODAL -->







                                <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addAssetModal">
                        <i class="bi bi-plus-lg"></i> Add New Asset
                    </button>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="addAssetModalLabel">Add New Asset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="assetName" class="form-label">Asset Name</label>
                                        <input type="text" class="form-control" id="assetName" name="assetName"
                                            placeholder="Enter asset name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="assetCategory" class="form-label">Category</label>
                                        <select class="form-select" id="assetCategory" name="assetCategory" required>
                                            <option value="">Select Category</option>
                                            <option value="Computers">Computers</option>
                                            <option value="Printers">Printers</option>
                                            <option value="Monitors">Monitors</option>
                                            <option value="Accessories">Accessories</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="assetStatus" class="form-label">Status</label>
                                        <select class="form-select" id="assetStatus" name="assetStatus" required>
                                            <option value="Available">Available</option>
                                            <option value="Assigned">Assigned</option>
                                            <option value="Under Maintenance">Under Maintenance</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="assetAssignee" class="form-label">Assigned To</label>
                                        <input type="text" class="form-control" id="assetLocation" name="assetLocation"
                                            placeholder="Enter assignee name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="assetRemarks" class="form-label">Description</label>
                                        <textarea class="form-control" id="assetDescription" name="assetDescription"
                                            rows="3" placeholder="Additional information"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addAsset" class="btn btn-orange">Add Asset</button>
                            </div>
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
            <script>
            function searchTable() {
                const input = document.getElementById('searchInput').value.toLowerCase();

                const tableBody = document.getElementById('assetTableBody');
                const rows = tableBody.getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];

                    const cells = row.getElementsByTagName('td');
                    let rowText = "";
                    for (let j = 0; j < cells.length; j++) {
                        rowText += cells[j].textContent || cells[j].innerText;
                    }

                    if (rowText.toLowerCase().includes(input)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                        / Hide row
                    }
                }
            }
            </script>
</body>

</html>