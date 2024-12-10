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
    <title>CIVIC | Asset Details</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/management.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                                <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li> -->
                                <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">

            <div class="row g-3">

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-box-seam card-icon text-primary"></i>
                            <div>
                                <h6 class="card-title">Total Assets</h6>
                                <p id="total_assets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success"></i>
                            <div>
                                <h6 class="card-title">Total Stock</h6>
                                <p id="available_assets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-gear card-icon text-warning"></i>
                            <div>
                                <h6 class="card-title">Under Maintenance</h6>
                                <p id="under_maintenance_assets" class="card-value">0</p>
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
                                <p id="dispose_assets" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addAssetModal">
                        <i class="bi bi-plus-lg"></i> Add New Asset
                    </button>
                </div>
            </div>
            <div class="row mt-4">

                <div class="col-12">

                    <input type="text" id="searchInput" class="form-control" placeholder="Search">

                    <table class="table table-hover table-striped shadow-sm mt-3">
                        <thead class="bg-orange text-white">
                            <tr>
                                <!-- <th scope="col">Asset ID</th> -->
                                <th scope="col">Asset Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        include '../src/config/config.php';

        $records_per_page = 5;
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';  
        $sql = "SELECT COUNT(*) as total FROM assetdetails WHERE assetname LIKE ? OR category LIKE ? OR stock LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchParam = '%' . $searchTerm . '%';  
        $stmt->bind_param('sss', $searchParam, $searchParam, $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total_records = $row['total'];

        $total_pages = ceil($total_records / $records_per_page);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($current_page - 1) * $records_per_page;

        $sql = "SELECT * FROM assetdetails WHERE assetname LIKE ? OR category LIKE ? OR stock LIKE ? ORDER BY id DESC LIMIT $start_from, $records_per_page";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $searchParam, $searchParam, $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $assetcode = htmlspecialchars($row['assetcode']);
                $itemid = htmlspecialchars($row['itemid']);
                $assetName = htmlspecialchars($row['assetname']);
                $category = htmlspecialchars($row['category']);
                $stock = htmlspecialchars($row['stock']);
                $createdDate = htmlspecialchars($row['createDate']);
                $description = htmlspecialchars($row['description']);
                $serialnumber = htmlspecialchars($row['serialnumber']);
                $supplier = htmlspecialchars($row['supplier']);
                $purchasedate = htmlspecialchars($row['purchasedate']);
                $invoicenumber = htmlspecialchars($row['invoicenumber']);
                $amount = htmlspecialchars($row['amount']);
                $warranty = htmlspecialchars($row['warranty']);
                $status = htmlspecialchars($row['status']);
                $location = htmlspecialchars($row['location']);
                $createdby = htmlspecialchars($row['createdby']);
                $lifespan = htmlspecialchars($row['lifespan']);

                $formattedDate = date('Y-m-d', strtotime($createdDate));

        echo "<tr>
            <td>$assetName</td>
            <td>$category</td>
            <td>$stock</td>
            <td>$formattedDate</td>
            <td>
                <div class='dropdown'>
                    <button class='btn btn-sm btn-outline-dark dropdown-toggle' type='button'
                        id='actionDropdown1' data-bs-toggle='dropdown' aria-expanded='false'>
                        <i class='bi bi-three-dots-vertical'></i>
                    </button>
                    <ul class='dropdown-menu shadow-lg' aria-labelledby='actionDropdown1'>
                        <li>
                            <a class='dropdown-item text-primary' href='#' data-bs-toggle='modal'
                               data-bs-target='#viewAssetModal' 
                               data-asset-id='$id'
                               data-asset-code='$assetcode'
                               data-item-id='$itemid'
                               data-asset-name='$assetName'
                               data-serial-number='$serialnumber'
                               data-supplier='$supplier'
                               data-purchase-date='$purchasedate'
                               data-invoice-number='$invoicenumber'
                               data-amount='$amount'
                               data-warranty='$warranty'
                               data-category='$category'
                               data-status='$status'
                               data-location='$location'
                               data-stock='$stock'
                               data-created-by='$createdby'
                               data-lifespan='$lifespan'
                               data-description='$description'
                               title='View details'>
                               <i class='bi bi-eye'></i> View
                            </a>
                        </li>
                        <li>
                            <a class='dropdown-item text-warning' href='#' data-bs-toggle='modal'
                               data-bs-target='#editAssetModal1' 
                               data-asset-code='$assetcode'
                               data-asset-id='$id'
                               data-item-id='$itemid'
                               data-asset-name='$assetName'
                               data-serial-number='$serialnumber'
                               data-supplier='$supplier'
                               data-purchase-date='$purchasedate'
                               data-invoice-number='$invoicenumber'
                               data-amount='$amount'
                               data-warranty='$warranty'
                               data-category='$category'
                               data-status='$status'
                               data-location='$location'
                               data-stock='$stock'
                               data-created-by='$createdby'
                               data-lifespan='$lifespan'
                               data-description='$description'
                               title='Edit asset'>
                               <i class='bi bi-pencil'></i> Edit
                            </a>
                        </li>
                        <li>
                            <a class='dropdown-item text-danger' href='#' data-bs-toggle='modal'
                               data-bs-target='#deleteAssetModal1' title='Delete asset'>
                               <i class='bi bi-trash'></i> Delete
                            </a>
                        </li>
                        <li>
                            <a class='dropdown-item text-secondary' href='#' data-bs-toggle='modal'
                               data-bs-target='#qrModal1' title='Generate QR code'>
                               <i class='bi bi-qr-code-scan'></i> Generate QR
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No assets found</td></tr>";
}

$conn->close();
?>

                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php
                if ($current_page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($current_page - 1) . "'>Previous</a></li>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $current_page) {
                        echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                    }
                }

                if ($current_page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . ($current_page + 1) . "'>Next</a></li>";
                }
                ?>
                        </ul>
                    </nav>

                </div>
            </div>






        </div>
        <!-- add asset -->
        <div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="addAssetModalLabel">Add New Asset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #f9f9f9; border-radius: 5px; padding: 20px;">
                        <form method="POST" action="./queries/query_assets/add_asset.php">
                            <div class="row gy-3">
                                <!-- Column 1 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="assetCode" class="form-label">Asset Code</label>
                                        <input type="text" class="form-control shadow-sm" id="assetCode"
                                            name="assetCode" placeholder="Enter asset code" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="itemId" class="form-label">Item ID</label>
                                        <input type="number" class="form-control shadow-sm" id="itemId" name="itemId"
                                            placeholder="Enter item ID" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="assetname" class="form-label">Asset Name</label>
                                        <input type="text" class="form-control shadow-sm" id="assetname"
                                            name="assetname" placeholder="Enter Asset Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="serialNumber" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control shadow-sm" id="serialNumber"
                                            name="serialNumber" placeholder="Enter serial number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="supplier" class="form-label">Supplier</label>
                                        <input type="text" class="form-control shadow-sm" id="supplier" name="supplier"
                                            placeholder="Enter supplier name" required>
                                    </div>
                                </div>

                                <!-- Column 2 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="purchaseDate" class="form-label">Purchase Date</label>
                                        <input type="date" class="form-control shadow-sm" id="purchaseDate"
                                            name="purchaseDate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoiceNumber" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control shadow-sm" id="invoiceNumber"
                                            name="invoiceNumber" placeholder="Enter invoice number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" step="0.01" class="form-control shadow-sm" id="amount"
                                            name="amount" placeholder="Enter amount" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="warranty" class="form-label">Warranty (in years)</label>
                                        <input type="number" class="form-control shadow-sm" id="warranty"
                                            name="warranty" placeholder="Enter warranty period" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select shadow-sm" id="category" name="category" required>
                                            <option value="">Select Category</option>
                                            <option value="Desktop">Desktop</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Printer">Printer</option>
                                            <option value="Peripheral">Peripheral</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Column 3 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select shadow-sm" id="status" name="status" required>
                                            <option value="Available">Available</option>
                                            <option value="Under Maintenance">Under Maintenance</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control shadow-sm" id="location" name="location"
                                            placeholder="Enter location" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number" class="form-control shadow-sm" id="stock" name="stock"
                                            placeholder="Enter stock quantity" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="createdBy" class="form-label">Created By</label>
                                        <input type="text" class="form-control shadow-sm" id="createdBy"
                                            name="createdBy"
                                            value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"
                                            required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lifespan" class="form-label">Life Span</label>
                                        <input type="text" class="form-control shadow-sm" id="lifespan" name="lifespan"
                                            placeholder="" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control shadow-sm" id="description" name="description" rows="3"
                                    placeholder="Enter description" required></textarea>
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
        <!-- View Asset Modal -->
        <div class="modal fade" id="viewAssetModal" tabindex="-1" aria-labelledby="viewAssetModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="viewAssetModalLabel">View Asset Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #f9f9f9; border-radius: 5px; padding: 20px;">
                        <form>
                            <div class="row gy-3">
                                <!-- Column 1 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="viewAssetCode" class="form-label">Asset Code</label>
                                        <input type="text" class="form-control shadow-sm" id="viewAssetCode"
                                            name="viewAssetCode" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewItemId" class="form-label">Item ID</label>
                                        <input type="number" class="form-control shadow-sm" id="viewItemId"
                                            name="viewItemId" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewAssetName" class="form-label">Asset Name</label>
                                        <input type="text" class="form-control shadow-sm" id="viewAssetName"
                                            name="viewAssetName" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewSerialNumber" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control shadow-sm" id="viewSerialNumber"
                                            name="viewSerialNumber" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewSupplier" class="form-label">Supplier</label>
                                        <input type="text" class="form-control shadow-sm" id="viewSupplier"
                                            name="viewSupplier" disabled>
                                    </div>
                                </div>

                                <!-- Column 2 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="viewPurchaseDate" class="form-label">Purchase Date</label>
                                        <input type="date" class="form-control shadow-sm" id="viewPurchaseDate"
                                            name="viewPurchaseDate" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewInvoiceNumber" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control shadow-sm" id="viewInvoiceNumber"
                                            name="viewInvoiceNumber" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewAmount" class="form-label">Amount</label>
                                        <input type="number" step="0.01" class="form-control shadow-sm" id="viewAmount"
                                            name="viewAmount" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewWarranty" class="form-label">Warranty (in years)</label>
                                        <input type="number" class="form-control shadow-sm" id="viewWarranty"
                                            name="viewWarranty" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewCategory" class="form-label">Category</label>
                                        <input type="text" class="form-control shadow-sm" id="viewCategory"
                                            name="viewCategory" disabled>
                                    </div>
                                </div>

                                <!-- Column 3 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="viewStatus" class="form-label">Status</label>
                                        <input type="text" class="form-control shadow-sm" id="viewStatus"
                                            name="viewStatus" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewLocation" class="form-label">Location</label>
                                        <input type="text" class="form-control shadow-sm" id="viewLocation"
                                            name="viewLocation" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewStock" class="form-label">Stock</label>
                                        <input type="number" class="form-control shadow-sm" id="viewStock"
                                            name="viewStock" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="viewCreatedBy" class="form-label">Created By</label>
                                        <input type="text" class="form-control shadow-sm" id="viewCreatedBy"
                                            name="viewCreatedBy" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="viewLifespan" class="form-label">Life Span</label>
                                        <input type="text" class="form-control shadow-sm" id="viewLifespan"
                                            name="viewLifespan" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="viewDescription" class="form-label">Description</label>
                                <textarea class="form-control shadow-sm" id="viewDescription" name="viewDescription"
                                    rows="3" disabled></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Asset Modal -->
        <div class="modal fade" id="editAssetModal1" tabindex="-1" aria-labelledby="editAssetModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="editAssetModalLabel1">Edit Asset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #f9f9f9; border-radius: 5px; padding: 20px;">
                        <form id="editAssetForm" method="POST" action="./queries/query_assets/update_asset.php">
                            <input type="hidden" id="editAssetId" name="editAssetId">
                            <div class="row gy-3">
                                <!-- Column 1 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="editAssetCode" class="form-label">Asset Code</label>
                                        <input type="text" class="form-control shadow-sm" id="editAssetCode"
                                            name="editAssetCode" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editItemId" class="form-label">Item ID</label>
                                        <input type="number" class="form-control shadow-sm" id="editItemId"
                                            name="editItemId" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAssetName" class="form-label">Asset Name</label>
                                        <input type="text" class="form-control shadow-sm" id="editAssetName"
                                            name="editAssetName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editSerialNumber" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control shadow-sm" id="editSerialNumber"
                                            name="editSerialNumber" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editSupplier" class="form-label">Supplier</label>
                                        <input type="text" class="form-control shadow-sm" id="editSupplier"
                                            name="editSupplier" required>
                                    </div>
                                </div>

                                <!-- Column 2 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="editPurchaseDate" class="form-label">Purchase Date</label>
                                        <input type="date" class="form-control shadow-sm" id="editPurchaseDate"
                                            name="editPurchaseDate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editInvoiceNumber" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control shadow-sm" id="editInvoiceNumber"
                                            name="editInvoiceNumber" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAmount" class="form-label">Amount</label>
                                        <input type="number" step="0.01" class="form-control shadow-sm" id="editAmount"
                                            name="editAmount" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editWarranty" class="form-label">Warranty (in years)</label>
                                        <input type="number" class="form-control shadow-sm" id="editWarranty"
                                            name="editWarranty" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCategory" class="form-label">Category</label>
                                        <select class="form-select shadow-sm" id="editCategory" name="editCategory"
                                            required>
                                            <option value="">Select Category</option>
                                            <option value="Desktops">Desktop</option>
                                            <option value="Laptops">Laptop</option>
                                            <option value="Printers">Printer</option>
                                            <option value="Peripherals">Peripherals</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Column 3 -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="editStatus" class="form-label">Status</label>
                                        <select class="form-select shadow-sm" id="editStatus" name="editStatus"
                                            required>
                                            <option value="Available">Available</option>
                                            <option value="Under Maintenance">Under Maintenance</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editLocation" class="form-label">Location</label>
                                        <input type="text" class="form-control shadow-sm" id="editLocation"
                                            name="editLocation" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editStock" class="form-label">Stock</label>
                                        <input type="number" class="form-control shadow-sm" id="editStock"
                                            name="editStock" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editCreatedBy" class="form-label">Created By</label>
                                        <input type="text" class="form-control shadow-sm" id="editCreatedBy"
                                            name="editCreatedBy" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editLifespan" class="form-label">Life Span</label>
                                        <input type="text" class="form-control shadow-sm" id="editLifespan"
                                            name="editLifespan" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Description</label>
                                <textarea class="form-control shadow-sm" id="editDescription" name="editDescription"
                                    rows="3" required></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="editAsset" class="btn btn-orange">Save Changes</button>
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
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                fetch('./queries/query_assets/add_asset.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Asset Added',
                                text: data.message,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#addAssetModal').modal('hide');
                                    document.querySelector('form').reset();

                                    console.log("Asset added successfully, refreshing asset list.");
                                    loadAssets();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                                confirmButtonText: 'Try Again'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Request Failed',
                            text: 'An error occurred while adding the asset. Please try again later.',
                            confirmButtonText: 'OK'
                        });
                    });
            });

            function loadAssets(page = 1) {
                const records_per_page = 5;
                const start_from = (page - 1) * records_per_page;

                fetch(`./queries/query_assets/get_assets.php?page=${page}`)
                    .then(response => response.json())
                    .then(data => {
                        let tableBody = document.querySelector('table tbody');
                        tableBody.innerHTML = '';
                        data.assets.forEach(asset => {
                            // Format the createDate (example of format 'Y-m-d')
                            const formattedDate = new Date(asset.createDate);
                            const year = formattedDate.getFullYear();
                            const month = (formattedDate.getMonth() + 1).toString().padStart(2, '0');
                            const day = formattedDate.getDate().toString().padStart(2, '0');
                            const formattedCreateDate = `${year}-${month}-${day}`;
                            let row = document.createElement('tr');
                            row.innerHTML = `
                        <td>${asset.assetname}</td>
                        <td>${asset.category}</td>
                        <td>${asset.stock}</td>
                    <td>${formattedCreateDate}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-sm btn-outline-dark dropdown-toggle' type='button'
                                    id='actionDropdown1' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-three-dots-vertical'></i>
                                </button>
                                <ul class='dropdown-menu shadow-lg' aria-labelledby='actionDropdown1'>
                                    <li>
                                        <a class='dropdown-item text-primary' href='#' data-bs-toggle='modal'
                                           data-bs-target='#viewAssetModal'
                                           data-asset-id='${asset.id}'
                                           data-asset-code='${asset.assetcode}'
                                           data-item-id='${asset.itemid}'
                                           data-asset-name='${asset.assetname}'
                                           data-serial-number='${asset.serialnumber}'
                                           data-supplier='${asset.supplier}'
                                           data-purchase-date='${asset.purchasedate}'
                                           data-invoice-number='${asset.invoicenumber}'
                                           data-amount='${asset.amount}'
                                           data-warranty='${asset.warranty}'
                                           data-category='${asset.category}'
                                           data-status='${asset.status}'
                                           data-location='${asset.location}'
                                           data-stock='${asset.stock}'
                                           data-created-by='${asset.createdby}'
                                           data-lifespan='${asset.lifespan}'
                                           data-description='${asset.description}'
                                           title='View details'>
                                           <i class='bi bi-eye'></i> View
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item text-warning' href='#' data-bs-toggle='modal'
                                           data-bs-target='#editAssetModal1' 
                                           data-asset-code='${asset.assetcode}'
                                           data-asset-id='${asset.id}'
                                           data-item-id='${asset.itemid}'
                                           data-asset-name='${asset.assetname}'
                                           data-serial-number='${asset.serialnumber}'
                                           data-supplier='${asset.supplier}'
                                           data-purchase-date='${asset.purchasedate}'
                                           data-invoice-number='${asset.invoicenumber}'
                                           data-amount='${asset.amount}'
                                           data-warranty='${asset.warranty}'
                                           data-category='${asset.category}'
                                           data-status='${asset.status}'
                                           data-location='${asset.location}'
                                           data-stock='${asset.stock}'
                                           data-created-by='${asset.createdby}'
                                           data-lifespan='${asset.lifespan}'
                                           data-description='${asset.description}'
                                           title='Edit asset'>
                                           <i class='bi bi-pencil'></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item text-danger' href='#' data-bs-toggle='modal'
                                           data-bs-target='#deleteAssetModal1' title='Delete asset'>
                                           <i class='bi bi-trash'></i> Delete
                                        </a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item text-secondary' href='#' data-bs-toggle='modal'
                                           data-bs-target='#qrModal1' title='Generate QR code'>
                                           <i class='bi bi-qr-code-scan'></i> Generate QR
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    `;
                            tableBody.appendChild(row);
                        });

                        let pagination = document.querySelector('.pagination');
                        pagination.innerHTML = '';

                        if (data.total_pages > 1) {
                            if (page > 1) {
                                pagination.innerHTML +=
                                    `<li class="page-item"><a class="page-link" href="#" onclick="loadAssets(${page - 1})">Previous</a></li>`;
                            }

                            for (let i = 1; i <= data.total_pages; i++) {
                                let activeClass = (i === page) ? 'active' : '';
                                pagination.innerHTML +=
                                    `<li class="page-item ${activeClass}"><a class="page-link" href="#" onclick="loadAssets(${i})">${i}</a></li>`;
                            }

                            if (page < data.total_pages) {
                                pagination.innerHTML +=
                                    `<li class="page-item"><a class="page-link" href="#" onclick="loadAssets(${page + 1})">Next</a></li>`;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching assets:', error);
                    });
            }

            document.querySelector('#editAssetModal1').addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var assetId = button.getAttribute('data-asset-id');
                var assetName = button.getAttribute('data-asset-name');
                var assetCode = button.getAttribute('data-asset-code');
                var itemId = button.getAttribute('data-item-id');
                var serialNumber = button.getAttribute('data-serial-number');
                var supplier = button.getAttribute('data-supplier');
                var purchaseDate = button.getAttribute('data-purchase-date');
                var invoiceNumber = button.getAttribute('data-invoice-number');
                var amount = button.getAttribute('data-amount');
                var warranty = button.getAttribute('data-warranty');
                var category = button.getAttribute('data-category');
                var status = button.getAttribute('data-status');
                var location = button.getAttribute('data-location');
                var stock = button.getAttribute('data-stock');
                var createdBy = button.getAttribute('data-created-by');
                var lifespan = button.getAttribute('data-lifespan');
                var description = button.getAttribute('data-description');

                document.querySelector('#editAssetName').value = assetName;
                document.querySelector('#editAssetCode').value = assetCode;
                document.querySelector('#editItemId').value = itemId;
                document.querySelector('#editSerialNumber').value = serialNumber;
                document.querySelector('#editSupplier').value = supplier;
                document.querySelector('#editPurchaseDate').value = purchaseDate;
                document.querySelector('#editInvoiceNumber').value = invoiceNumber;
                document.querySelector('#editAmount').value = amount;
                document.querySelector('#editWarranty').value = warranty;
                document.querySelector('#editCategory').value = category;
                document.querySelector('#editStatus').value = status;
                document.querySelector('#editLocation').value = location;
                document.querySelector('#editStock').value = stock;
                document.querySelector('#editCreatedBy').value = createdBy;
                document.querySelector('#editLifespan').value = lifespan;
                document.querySelector('#editDescription').value = description;
            });
            </script>

            <script>
            document.getElementById('category').addEventListener('change', function() {
                const category = this.value;
                let lifespan = '';

                switch (category) {
                    case 'Desktops':
                        lifespan = 5;
                        break;
                    case 'Printers':
                        lifespan = 4;
                        break;
                    case 'Laptops':
                        lifespan = 5;
                        break;
                    case 'Peripherals':
                        lifespan = 2;
                        break;
                    default:
                        lifespan = '';
                }

                document.getElementById('lifespan').value = lifespan;
            });
            </script>
            <script>
            $('#viewAssetModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);

                var assetCode = button.data('asset-code');
                var itemId = button.data('item-id');
                var assetName = button.data('asset-name');
                var serialNumber = button.data('serial-number');
                var supplier = button.data('supplier');
                var purchaseDate = button.data('purchase-date');
                var invoiceNumber = button.data('invoice-number');
                var amount = button.data('amount');
                var warranty = button.data('warranty');
                var category = button.data('category');
                var status = button.data('status');
                var location = button.data('location');
                var stock = button.data('stock');
                var createdBy = button.data('created-by');
                var lifeSpan = button.data('lifespan');
                var description = button.data('description');

                var modal = $(this);
                modal.find('#viewAssetCode').val(assetCode);
                modal.find('#viewItemId').val(itemId);
                modal.find('#viewAssetName').val(assetName);
                modal.find('#viewSerialNumber').val(serialNumber);
                modal.find('#viewSupplier').val(supplier);
                modal.find('#viewPurchaseDate').val(purchaseDate);
                modal.find('#viewInvoiceNumber').val(invoiceNumber);
                modal.find('#viewAmount').val(amount);
                modal.find('#viewWarranty').val(warranty);
                modal.find('#viewCategory').val(category);
                modal.find('#viewStatus').val(status);
                modal.find('#viewLocation').val(location);
                modal.find('#viewStock').val(stock);
                modal.find('#viewCreatedBy').val(createdBy);
                modal.find('#viewLifespan').val(lifeSpan);
                modal.find('#viewDescription').val(description);
            });
            </script>
            <script>
            document.addEventListener("DOMContentLoaded", function() {
                const editAssetModal = new bootstrap.Modal(document.getElementById("editAssetModal1"));

                const editButtons = document.querySelectorAll("a[data-bs-target='#editAssetModal1']");

                editButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const assetData = button.dataset;

                        document.getElementById("editAssetId").value = assetData.assetId;
                        document.getElementById("editAssetCode").value = assetData.assetCode;
                        document.getElementById("editItemId").value = assetData.itemId;
                        document.getElementById("editAssetName").value = assetData.assetName;
                        document.getElementById("editSerialNumber").value = assetData
                            .serialNumber;
                        document.getElementById("editSupplier").value = assetData.supplier;
                        document.getElementById("editPurchaseDate").value = assetData
                            .purchaseDate;
                        document.getElementById("editInvoiceNumber").value = assetData
                            .invoiceNumber;
                        document.getElementById("editAmount").value = assetData.amount;
                        document.getElementById("editWarranty").value = assetData.warranty;
                        document.getElementById("editCategory").value = assetData.category;
                        document.getElementById("editStatus").value = assetData.status;
                        document.getElementById("editLocation").value = assetData.location;
                        document.getElementById("editStock").value = assetData.stock;
                        document.getElementById("editCreatedBy").value = assetData.createdBy;
                        document.getElementById("editLifespan").value = assetData.lifespan;
                        document.getElementById("editDescription").value = assetData
                            .description;

                        editAssetModal.show();
                    });
                });
            });
            </script>
            <script>
            document.getElementById('editCategory').addEventListener('change', function() {
                const category = this.value;
                let lifespan = '';

                switch (category) {
                    case 'Desktops':
                        lifespan = 5;
                        break;
                    case 'Printers':
                        lifespan = 4;
                        break;
                    case 'Laptops':
                        lifespan = 5;
                        break;
                    case 'Peripherals':
                        lifespan = 2;
                        break;
                    default:
                        lifespan = '';
                }

                document.getElementById('editLifespan').value = lifespan;
            });
            </script>
            <script>
            function handleUpdateResponse(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Asset Updated',
                        text: response.message,
                        confirmButtonText: 'Okay'
                    }).then(() => {
                        location.reload();

                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonText: 'Okay'
                    });
                }
            }

            document.querySelector('#editAssetForm').addEventListener('submit', function(event) {
                event.preventDefault();

                let formData = new FormData(this);
                fetch('./queries/query_assets/update_asset.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => handleUpdateResponse(data))
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Request Failed',
                            text: 'An error occurred while updating the asset. Please try again later.',
                            confirmButtonText: 'Okay'
                        });
                    });
            });
            </script>

            <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                let searchTerm = this.value.toLowerCase();
                filterAssets(searchTerm);
            });

            function filterAssets(searchTerm) {
                let rows = document.querySelectorAll('table tbody tr');
                rows.forEach(row => {
                    let assetName = row.cells[0].textContent
                        .toLowerCase();
                    let category = row.cells[1].textContent
                        .toLowerCase();
                    let stock = row.cells[2].textContent
                        .toLowerCase();

                    if (assetName.includes(searchTerm) || category.includes(searchTerm) || stock.includes(
                            searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
            </script>

            <script>
            function updateCountsAndCharts() {
                $.ajax({
                    url: './queries/query_assets/asset_dashboard_data.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#total_assets').text(data.totalAssetsCount);
                        $('#available_assets').text(data.availableAssetsCount);
                        $('#under_maintenance_assets').text(data.underMaintenanceStockCount);
                        $('#dispose_assets').text(data.disposeAssetsCount);
                    }
                });
            }

            $(document).ready(function() {
                updateCountsAndCharts();
            });
            </script>



</body>

</html>