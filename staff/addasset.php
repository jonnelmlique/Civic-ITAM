<?php
include '../src/config/config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); 
    exit();
}

$category = '';
$assets = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['requestCategory']) && !empty($_POST['requestCategory'])) {
        $category = $_POST['requestCategory'];

        $sql = "SELECT assetname FROM assetdetails WHERE category = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            error_log('Error preparing statement: ' . $conn->error);
        } else {
            $stmt->bind_param("s", $category);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result === false) {
                error_log('Error executing query: ' . $stmt->error);
            } else {
                while ($row = $result->fetch_assoc()) {
                    $assets[] = $row['assetname'];
                }
            }
        }
    }
}
?>
<?php


$assets = [];
$successMessage = '';
$errorMessage = '';

$category = 'Uncategorized';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['assetName']) && !empty($_POST['requestReason']) && !empty($_POST['requestCategory'])) {
        $assetId = $_POST['assetName']; 
        $reason = $_POST['requestReason'];
        $category = $_POST['requestCategory'];
        $requestedBy = $_SESSION['username'];

        $sql = "INSERT INTO assetrequests (assetid, assetname, category, reason, requestedby) 
                VALUES (?, 
                        (SELECT assetname FROM assetdetails WHERE id = ?), 
                        ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("issss", $assetId, $assetId, $category, $reason, $requestedBy);
            if ($stmt->execute()) {
                $successMessage = 'Asset request submitted successfully!';
            } else {
                $errorMessage = 'Error executing query: ' . $stmt->error;
            }
        } else {
            $errorMessage = 'Error preparing statement: ' . $conn->error;
        }
    } else {
        $errorMessage = 'Please fill out all required fields.';
    }
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
                <a class="navbar-brand ms-3" href="#">Submit New Asset Request</a>
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
                        <div class="mb-3">
                            <label for="requestCategory" class="form-label">Category</label>
                            <select class="form-select" id="requestCategory" name="requestCategory" required>
                            <option value="">Select Category</option>
                    <option value="Laptops"
                        <?php echo isset($category) && $category == 'Laptops' ? 'selected' : ''; ?>>
                        Laptop
                    </option>
                    <option value="Printer"
                        <?php echo isset($category) && $category == 'Printer' ? 'selected' : ''; ?>>
                        Printer
                    </option>
                    <option value="CPU"
                        <?php echo isset($category) && $category == 'CPU' ? 'selected' : ''; ?>>
                        CPU
                    </option>
                    <option value="Motherboard"
                        <?php echo isset($category) && $category == 'Motherboard' ? 'selected' : ''; ?>>
                        Motherboard
                    </option>
                    <option value="RAM"
                        <?php echo isset($category) && $category == 'RAM' ? 'selected' : ''; ?>>
                        RAM
                    </option>
                    <option value="GPU"
                        <?php echo isset($category) && $category == 'GPU' ? 'selected' : ''; ?>>
                        GPU
                    </option>
                    <option value="Storage"
                        <?php echo isset($category) && $category == 'Storage' ? 'selected' : ''; ?>>
                        Storage
                    </option>
                    <option value="Power Supply"
                        <?php echo isset($category) && $category == 'Power Supply' ? 'selected' : ''; ?>>
                        Power Supply
                    </option>
                    <option value="CPU Cooler"
                        <?php echo isset($category) && $category == 'CPU Cooler' ? 'selected' : ''; ?>>
                        CPU Cooler
                    </option>
                    <option value="Case"
                        <?php echo isset($category) && $category == 'Case' ? 'selected' : ''; ?>>
                        Case
                    </option>
                    <option value="Monitor"
                        <?php echo isset($category) && $category == 'Monitor' ? 'selected' : ''; ?>>
                        Monitor
                    </option>
                    <option value="Keyboard"
                        <?php echo isset($category) && $category == 'Keyboard' ? 'selected' : ''; ?>>
                        Keyboard
                    </option>
                    <option value="Mouse"
                        <?php echo isset($category) && $category == 'Mouse' ? 'selected' : ''; ?>>
                        Mouse
                    </option>
                    <option value="Headphones"
                        <?php echo isset($category) && $category == 'Headphones' ? 'selected' : ''; ?>>
                        Headphones
                    </option>
                    <option value="Webcam"
                        <?php echo isset($category) && $category == 'Webcam' ? 'selected' : ''; ?>>
                        Webcam
                    </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" id="sessionUsername"
                                value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
                            <label for="assetName" class="form-label">Asset</label>
                            <select class="form-select" id="assetName" name="assetName" required>
                                <option value="">Select Asset</option>
                                <?php if (!empty($assets)): ?>
                                <?php foreach ($assets as $asset): ?>
                                <option value="<?php echo htmlspecialchars($asset); ?>">
                                    <?php echo htmlspecialchars($asset); ?></option>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <option value="">No assets available for this category</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="requestReason" class="form-label">Reason</label>
                            <textarea class="form-control" id="requestReason" name="requestReason" rows="4"
                                placeholder="Why do you need this asset?" required></textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-orange px-4 py-2">Submit Request</button>
                            <a href="assets.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>"
                                class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
     $('#requestCategory').on('change', function() {
    var category = $(this).val();

    if (category) {
        $.ajax({
            url: './queries/assetrequest/fetch_assets_category.php',
            type: 'POST',
            data: { category: category },
            success: function(response) {
                var assets = JSON.parse(response);
                var assetSelect = $('#assetName');

                assetSelect.empty();
                assetSelect.append('<option value="">Select Asset</option>');

                if (Array.isArray(assets)) {
                    $.each(assets, function(index, asset) {
                        assetSelect.append('<option value="' + asset.id + '">' + asset.name + '</option>');
                    });
                } else {
                    assetSelect.append('<option value="">No assets available for this category</option>');
                }
            },
            error: function() {
                alert('Error fetching assets.');
            }
        });
    } else {
        $('#assetName').empty().append('<option value="">Select Asset</option>');
    }
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
                window.location.href =
                    './assets.php';
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