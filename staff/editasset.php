<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); 
    exit();
}
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
    <link rel="stylesheet" href="../public/css/staff/management.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body>
    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white"><i class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./assets.php" class="nav-link text-white active"><i class="bi bi-ui-checks-grid"></i> Asset
                    Request</a>
            </li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
        </ul>
    </div>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Edit Asset Request</a>
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

                                <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-12">
                </div>
            </div>
            <div class="container my-5">
                <div class="card shadow-lg p-4">
                    <form method="POST">
                                            <?php
                    include '../src/config/config.php';

                    if (isset($_GET['requestid'])) {
                        $assetId = $_GET['requestid'];

                        $sql = "SELECT * FROM assetrequests WHERE requestid = ?";
                        $stmt = $conn->prepare($sql);
                        if ($stmt) {
                            $stmt->bind_param("i", $assetId);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            if ($result && $result->num_rows > 0) {
                                $asset = $result->fetch_assoc();
                            } else {
                                $errorMessage = "Asset not found.";
                            }
                            $stmt->close();
                        } else {
                            $errorMessage = "Error preparing the SQL statement: " . $conn->error;
                        }
                    } else {
                        $errorMessage = "No asset ID provided.";
                    }
                    ?>
                                            <?php
                    $successMessage = "";
                    $errorMessage = "";

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $requestid = isset($_POST['requestid']) ? $_POST['requestid'] : '';
                        $assetname = isset($_POST['assetname']) ? $_POST['assetname'] : '';
                        $category = isset($_POST['category']) ? $_POST['category'] : '';
                        $status = isset($_POST['status']) ? $_POST['status'] : '';
                        $reason = isset($_POST['reason']) ? $_POST['reason'] : '';

                        $sql = "UPDATE assetrequests SET status = ? WHERE requestid = ?";
                        $stmt = $conn->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("si", $status, $requestid);
                            
                            if ($stmt->execute()) {
                                $successMessage = "Asset updated successfully!";
                            } else {
                                $errorMessage = "Error updating asset.";
                            }
                            $stmt->close();
                        } else {
                            $errorMessage = "Error preparing SQL statement: " . $conn->error;
                        }
                    }
                    ?>

                        <form method="POST" action="editasset.php?requestid=<?php echo $asset['requestid']; ?>">
                            <input type="hidden" name="requestid" value="<?php echo $asset['requestid']; ?>">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="<?php echo htmlspecialchars($asset['category']); ?>" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="assetname" class="form-label">Asset Name</label>
                                <input type="text" class="form-control" id="assetname" name="assetname"
                                    value="<?php echo htmlspecialchars($asset['assetname']); ?>" required disabled>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <!-- <option value="Pending"
                                        <?php echo $asset['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option> -->
                                    <option value="Received"
                                        <?php echo $asset['status'] === 'Received' ? 'selected' : ''; ?>>Received
                                    </option>
                                    <!-- <option value="Cancel"
                                        <?php echo $asset['status'] === 'Cancel' ? 'selected' : ''; ?>>Cancel</option> -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason</label>
                                <textarea class="form-control" id="reason" name="reason" disabled
                                    rows="3"><?php echo htmlspecialchars($asset['reason']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange">Save Changes</button>
                            <a href="assets.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>"
                                class="btn btn-danger">Back</a>


                        </form>



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
                        <script>
                        <?php if ($successMessage): ?>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '<?php echo $successMessage; ?>',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const currentPage = new URLSearchParams(window.location.search).get('page') ||
                                    1;
                                window.location.href = 'assets.php?page=' + currentPage;
                            }
                        });
                        <?php endif; ?>

                        <?php if ($errorMessage): ?>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: '<?php echo $errorMessage; ?>',
                            confirmButtonText: 'OK'
                        });
                        <?php endif; ?>
                        </script>


</body>

</html>