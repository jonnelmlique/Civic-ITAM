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
                        <li><a href="./assets.php" class="nav-link text-white">Assets</a></li>
                        <li><a href="./pcassets.php" class="nav-link text-white">PC's</a></li>
                        <li><a href="./assetsrequest.php" class="nav-link text-white">Asset Request</a></li>

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
            <!-- <li>
                <a href="./reports.php" class="nav-link text-white">
                    <i class="bi bi-file-earmark-text"></i> Reports
                </a>
            </li> -->
            <li>
                <a href="./diagnostichistory.php" class="nav-link text-white">
                    <i class="fas fa-history"></i> Diagnostic History
                </a>
            </li>
            <!-- <li>
                <a href="./users.php" class="nav-link text-white">
                    <i class="bi bi-person"></i> Manage Users
                </a>
            </li> -->
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
  <div class="container my-5">
    <div class="card shadow-lg p-4">
        <form method="POST" action="./updatestatus.php">
            <?php
            include '../src/config/config.php';

            if (isset($_GET['requestid'])) {
                $assetId = intval($_GET['requestid']);

                $sql = "SELECT * FROM assetrequests WHERE requestid = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("i", $assetId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result && $result->num_rows > 0) {
                        $asset = $result->fetch_assoc();
                    } else {
                        echo "<p class='text-danger'>Asset not found.</p>";
                    }
                    $stmt->close();
                } else {
                    echo "<p class='text-danger'>Error preparing the SQL statement: " . $conn->error . "</p>";
                }
            } else {
                echo "<p class='text-danger'>No asset ID provided.</p>";
            }
            ?>

            <input type="hidden" name="requestid" value="<?php echo $asset['requestid']; ?>">
            <div class="mb-3">
                <label for="requestedby" class="form-label">Requested by</label>
                <input type="text" class="form-control" id="requestedby" name="requestedby"
                    value="<?php echo htmlspecialchars($asset['requestedby'] ?? ''); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category"
                    value="<?php echo htmlspecialchars($asset['category'] ?? ''); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="assetname" class="form-label">Asset Name</label>
                <input type="text" class="form-control" id="assetname" name="assetname"
                    value="<?php echo htmlspecialchars($asset['assetname'] ?? ''); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" disabled>
                    <option value="Pending" <?php echo $asset['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Received" <?php echo $asset['status'] === 'Received' ? 'selected' : ''; ?>>Received</option>
                    <option value="Cancel" <?php echo $asset['status'] === 'Cancel' ? 'selected' : ''; ?>>Cancel</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="reason" class="form-label">Reason</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" disabled><?php echo htmlspecialchars($asset['reason'] ?? ''); ?></textarea>
            </div>
            <a href="assetsrequest.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>" class="btn btn-danger">Back</a>
            <button type="submit" name="action" value="Approved" class="btn btn-sm btn-success">Approve</button>
            <button type="submit" name="action" value="Declined" class="btn btn-sm btn-warning">Decline</button>
        </form>
    </div>
</div>

</div>


                        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
                            rel="stylesheet">
                        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
                        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
                        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                        document.getElementById('sidebarToggle').addEventListener('click', function() {
                            document.getElementById('sidebar').classList.toggle('collapsed');
                            document.getElementById('content').classList.toggle('collapsed');
                        });
                        </script>



</body>

</html>