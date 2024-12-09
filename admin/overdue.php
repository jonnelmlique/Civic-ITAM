<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Overdue Asset Management</title>
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
                <a href="./overdue.php" class="nav-link text-white active">
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
            <div class="row mb-4">
                <div class="col-12">
                    <!-- Optional Header or Description -->
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-box-seam card-icon text-danger"></i>
                            <div>
                                <h6 class="card-title">Total Overdue Assets</h6>
                                <p id="total_overdue_assets" class="card-value">0</p>
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
                                <p id="under_maintenance" class="card-value">0</p>
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
                                <p id="awaiting_return" class="card-value">0</p>
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
                                <p id="other_issues" class="card-value">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
                <input type="text" id="searchInput" class="form-control" placeholder="Search" onkeyup="searchTable()">
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
                    <tbody id="overdueTableBody">
                        <?php
                include '../src/config/config.php';

                $sql = "SELECT * FROM overdue_assets ORDER BY due_date ASC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $badgeClass = match ($row['status']) {
                            'overdue' => 'bg-danger',
                            'maintenance' => 'bg-warning',
                            'returned' => 'bg-success',
                            default => 'bg-secondary',
                        };

                        echo "
                        <tr>
                            <td>ASSET{$row['id']}</td>
                            <td>{$row['asset_name']}</td>
                            <td>{$row['category']}</td>
                            <td><span class='badge {$badgeClass}'>" . ucfirst($row['status']) . "</span></td>
                            <td>{$row['assigned_to']}</td>
                            <td>{$row['due_date']}</td>
                            <td>
                               <button class='btn btn-info btn-sm view-btn' data-bs-toggle='modal' data-bs-target='#viewOverdueAssetModal' 
                        data-id='{$row['id']}'
                        data-name='{$row['asset_name']}'
                        data-category='{$row['category']}'
                        data-assignedto='{$row['assigned_to']}'
                        data-duedate='{$row['due_date']}'
                        data-status='{$row['status']}'>View</button>
             <button class='btn btn-warning btn-sm edit-btn' data-bs-toggle='modal' data-bs-target='#editOverdueAssetModal'
    data-id='{$row['id']}'
    data-name='{$row['asset_name']}'
    data-category='{$row['category']}'
    data-assignedto='{$row['assigned_to']}'
    data-duedate='{$row['due_date']}'
    data-status='{$row['status']}'>Edit</button>

                                <button class='btn btn-sm btn-danger resolve-btn' data-id='{$row['id']}'>Resolve</button>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No overdue assets found.</td></tr>";
                }

                $conn->close();
                ?>
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
    <div class="modal fade" id="addOverdueAssetModal" tabindex="-1" aria-labelledby="addOverdueAssetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addOverdueAssetModalLabel">Add Overdue Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addOverdueAssetForm">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="assetName" class="form-label">Overdue Name</label>
                                    <input type="text" class="form-control" id="assetName" name="asset_name"
                                        placeholder="Enter asset name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="assetCategory" class="form-label">Category</label>
                                    <select class="form-select" id="assetCategory" name="category" required>
                                        <option selected disabled>Choose category</option>
                                        <option value="computers">Computers</option>
                                        <option value="printers">Printers</option>
                                        <option value="monitors">Monitors</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="assignedTo" class="form-label">Assigned To</label>
                                    <input type="text" class="form-control" id="assignedTo" name="assigned_to"
                                        placeholder="Enter assignee's name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dueDate" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="dueDate" name="due_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="assetStatus" class="form-label">Status</label>
                                    <select class="form-select" id="assetStatus" name="status" required>
                                        <option value="overdue" selected>Overdue</option>
                                        <option value="maintenance">Under Maintenance</option>
                                        <option value="returned">Returned</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add Overdue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editOverdueAssetModal" tabindex="-1" aria-labelledby="editOverdueAssetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="editOverdueAssetModalLabel">Edit Overdue Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Removed action attribute for AJAX -->
                    <form id="editAssetForm">
                        <input type="hidden" id="editAssetId" name="asset_id"> <!-- Hidden asset ID -->

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editAssetName" class="form-label">Overdue Name</label>
                                    <input type="text" class="form-control" id="editAssetName" name="asset_name"
                                        placeholder="Enter asset name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetCategory" class="form-label">Category</label>
                                    <select class="form-select" id="editAssetCategory" name="category" required>
                                        <option selected>Choose category</option>
                                        <option value="computers">Computers</option>
                                        <option value="printers">Printers</option>
                                        <option value="monitors">Monitors</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editAssignedTo" class="form-label">Assigned To</label>
                                    <input type="text" class="form-control" id="editAssignedTo" name="assigned_to"
                                        placeholder="Enter assignee's name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editDueDate" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="editDueDate" name="due_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetStatus" class="form-label">Status</label>
                                    <select class="form-select" id="editAssetStatus" name="status" required>
                                        <option value="overdue">Overdue</option>
                                        <option value="maintenance">Under Maintenance</option>
                                        <option value="returned">Returned</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewOverdueAssetModal" tabindex="-1" aria-labelledby="viewOverdueAssetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="viewOverdueAssetModalLabel">View Overdue Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Overdue Name</label>
                                <p id="viewAssetName" class="form-control-plaintext">Sample Asset Name</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <p id="viewAssetCategory" class="form-control-plaintext">Computers</p>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Assigned To</label>
                                <p id="viewAssignedTo" class="form-control-plaintext">John Doe</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Due Date</label>
                                <p id="viewDueDate" class="form-control-plaintext">2024-12-15</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <p id="viewAssetStatus" class="form-control-plaintext">Overdue</p>
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



    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    document.getElementById('addOverdueAssetForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        fetch('./queries/overdue/add_overdue_asset.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: result.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: result.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again.',
                    confirmButtonText: 'OK'
                });
            });
    });
    </script>
    <Script>
    // View button click event
    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const category = this.getAttribute('data-category');
            const assignedTo = this.getAttribute('data-assignedto');
            const dueDate = this.getAttribute('data-duedate');
            const status = this.getAttribute('data-status');

            // Set the modal fields with the values from the data attributes
            document.getElementById('viewAssetName').innerText = name;
            document.getElementById('viewAssetCategory').innerText = category;
            document.getElementById('viewAssignedTo').innerText = assignedTo;
            document.getElementById('viewDueDate').innerText = dueDate;
            document.getElementById('viewAssetStatus').innerText = status;
        });
    });
    </Script>
    <Script>
    // Edit button click event
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const category = this.getAttribute('data-category');
            const assignedTo = this.getAttribute('data-assignedto');
            const dueDate = this.getAttribute('data-duedate');
            const status = this.getAttribute('data-status');

            // Set the modal fields with the values from the data attributes
            document.getElementById('editAssetName').value = name;
            document.getElementById('editAssetCategory').value = category;
            document.getElementById('editAssignedTo').value = assignedTo;
            document.getElementById('editDueDate').value = dueDate;
            document.getElementById('editAssetStatus').value = status;

            // Store the ID for updating later
            document.getElementById('editAssetId').value = id;
        });
    });
    </Script>
    <script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            let asset_id = $(this).data('id');
            let asset_name = $(this).data('name');
            let category = $(this).data('category');
            let assigned_to = $(this).data('assignedto');
            let due_date = $(this).data('duedate');
            let status = $(this).data('status');

            $('#editAssetName').val(asset_name);
            $('#editAssetCategory').val(category);
            $('#editAssignedTo').val(assigned_to);
            $('#editDueDate').val(due_date);
            $('#editAssetStatus').val(status);

            $('#editAssetForm').data('id', asset_id);
        });

        $('#editAssetForm').on('submit', function(e) {
            e.preventDefault();
            let asset_id = $('#editAssetForm').data('id');
            let asset_name = $('#editAssetName').val();
            let category = $('#editAssetCategory').val();
            let assigned_to = $('#editAssignedTo').val();
            let due_date = $('#editDueDate').val();
            let status = $('#editAssetStatus').val();

            $.ajax({
                url: './queries/overdue/update-overdue.php',
                type: 'POST',
                data: {
                    asset_id: asset_id,
                    asset_name: asset_name,
                    category: category,
                    assigned_to: assigned_to,
                    due_date: due_date,
                    status: status
                },
                success: function(response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Asset Updated Successfully!',
                            text: result.message,
                            showConfirmButton: true
                        }).then(() => {
                            location
                                .reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: result.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was an issue with the request.',
                        showConfirmButton: true
                    });
                }
            });
        });
    });
    </script>

    <script>
    function searchTable() {
        const searchInput = document.getElementById("searchInput").value.toLowerCase();

        const rows = document.querySelectorAll("#overdueTableBody tr");

        rows.forEach(function(row) {
            const cells = row.getElementsByTagName("td");
            let matchFound = false;

            for (let i = 0; i < cells.length; i++) {
                if (cells[i].textContent.toLowerCase().includes(searchInput)) {
                    matchFound = true;
                    break;
                }
            }

            if (matchFound) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
    </script>
    <script>
    function updateCounts() {
        $.ajax({
            url: './queries/overdue/get_counts.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);

                $('#total_overdue_assets').text(data.total_overdue_assets);
                $('#under_maintenance').text(data.under_maintenance);
                $('#awaiting_return').text(data.awaiting_return);
                $('#other_issues').text(data.other_issues);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data: " + error);
                console.error("Status: " + status);
                console.error("Response: " + xhr.responseText);
            }
        });
    }

    setInterval(updateCounts, 5000);

    updateCounts();
    </script>

</body>

</html>