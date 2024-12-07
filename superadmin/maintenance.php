<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Maintenance Mannagement</title>
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
                        <li><a href="./assets.php" class="nav-link text-white">Assets</a></li>
                        <li><a href="./pcassets.php" class="nav-link text-white">PC's</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="./maintenance.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Dashboard</a>
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
                                <h6 class="card-title mb-1">Total Maintenance Requests</h6>
                                <p class="card-value mb-0" id="totalRequestsCount">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-check-circle card-icon text-success"></i>
                            <div>
                                <h6 class="card-title mb-1">Completed Maintenance</h6>
                                <p class="card-value mb-0" id="completedRequestsCount">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-file-earmark-text card-icon text-warning"></i>
                            <div>
                                <h6 class="card-title mb-1">Pending Maintenance</h6>
                                <p class="card-value mb-0" id="pendingRequestsCount">0</p> <!-- Dynamic value here -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center me-3">
                            <i class="bi bi-arrow-clockwise card-icon text-info"></i>
                            <div>
                                <h6 class="card-title mb-1">In Progress</h6>
                                <p class="card-value mb-0" id="inProgressRequestsCount">0</p>
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
                    <tbody id="maintenanceTableBody">
                    <tbody id="maintenanceTableBody">
                        <?php
    include '../src/config/config.php';
    $sql = "SELECT * FROM maintenance_requests ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $badgeClass = '';
            switch ($row['status']) {
                case 'Pending':
                    $badgeClass = 'bg-warning';
                    break;
                case 'In Progress':
                    $badgeClass = 'bg-info';
                    break;
                case 'Completed':
                    $badgeClass = 'bg-success';
                    break;
                default:
                    $badgeClass = 'bg-secondary';
                    break;
            }
            echo "
            <tr>
                <td>REQ{$row['request_id']}</td>
                <td>{$row['maintenance_name']}</td>
                <td>{$row['category']}</td>
                <td><span class='badge {$badgeClass}'>{$row['status']}</span></td>
                <td>{$row['assigned_to']}</td>
                <td>" . date('Y-m-d', strtotime($row['created_at'])) . "</td>
                <td>
                    <button class='btn btn-sm btn-info view-btn' 
                        data-bs-toggle='modal' 
                        data-bs-target='#viewAssetModal'
                        data-id='{$row['request_id']}'
                        data-name='{$row['maintenance_name']}'
                        data-category='{$row['category']}'
                        data-status='{$row['status']}'
                        data-assignedto='{$row['assigned_to']}'
                        data-remarks='{$row['remarks']}'>View</button>
                    <button class='btn btn-sm btn-warning edit-btn' 
                        data-bs-toggle='modal' 
                        data-bs-target='#editAssetModal'
                        data-id='{$row['request_id']}'
                        data-name='{$row['maintenance_name']}'
                        data-category='{$row['category']}'
                        data-status='{$row['status']}'
                        data-assignedto='{$row['assigned_to']}'
                        data-remarks='{$row['remarks']}'>Edit</button>
                    <button class='btn btn-sm btn-danger' onclick='deleteRequest({$row['request_id']})'>Delete</button>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7' class='text-center'>No maintenance requests found.</td></tr>";
    }
    $conn->close();
    ?>
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
                    <form id="addMaintenanceForm">
                        <div class="mb-3">
                            <label for="assetName" class="form-label">Maintenance Name</label>
                            <input type="text" class="form-control" id="assetName" name="maintenanceName"
                                placeholder="Enter Maintenance name" required>
                        </div>
                        <div class="mb-3">
                            <label for="assetCategory" class="form-label">Category</label>
                            <select class="form-select" id="assetCategory" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Computers">Computers</option>
                                <option value="Printers">Printers</option>
                                <option value="Monitors">Monitors</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="assetStatus" class="form-label">Status</label>
                            <select class="form-select" id="assetStatus" name="status" required>
                                <option value="Pending">Pending</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="assetAssignee" class="form-label">Assigned To</label>
                            <input type="text" class="form-control" id="assetAssignee" name="assignedTo"
                                placeholder="Enter assignee name (if applicable)">
                        </div>
                        <div class="mb-3">
                            <label for="assetRemarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="assetRemarks" name="remarks" rows="3"
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
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="viewAssetModalLabel">View Maintenance Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viewAssetName" class="form-label">Maintenance Name</label>
                        <input type="text" class="form-control" id="viewAssetName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="viewAssetCategory" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="viewAssetStatus" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetAssignee" class="form-label">Assigned To</label>
                        <input type="text" class="form-control" id="viewAssetAssignee" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="viewAssetRemarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="viewAssetRemarks" rows="3" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="editAssetModalLabel">Edit Maintenance Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAssetForm">
                        <!-- Maintenance Name (Read-Only) -->
                        <div class="mb-3">
                            <label for="editAssetName" class="form-label">Maintenance Name</label>
                            <input type="text" class="form-control" id="editAssetName" placeholder="Maintenance name"
                                disabled>
                        </div>

                        <!-- Category (Read-Only) -->
                        <div class="mb-3">
                            <label for="editAssetCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editAssetCategory" placeholder="Category"
                                disabled>
                        </div>

                        <!-- Status (Editable) -->
                        <div class="mb-3">
                            <label for="editAssetStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAssetStatus">
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>

                        <!-- Assigned To (Read-Only) -->
                        <div class="mb-3">
                            <label for="editAssetAssignee" class="form-label">Assigned To</label>
                            <input type="text" class="form-control" id="editAssetAssignee" placeholder="Assigned to"
                                disabled>
                        </div>

                        <!-- Remarks (Read-Only) -->
                        <div class="mb-3">
                            <label for="editAssetRemarks" class="form-label">Remarks</label>
                            <textarea class="form-control" id="editAssetRemarks" rows="3" placeholder="Remarks"
                                disabled></textarea>
                        </div>

                        <!-- Save Button -->
                        <button type="button" class="btn btn-warning" id="saveStatusButton">Save Changes</button>
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
        $(document).ready(function() {
            $('#addMaintenanceForm').on('submit', function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.ajax({
                    url: './queries/maintenance/add_maintenance_request.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                $('#addAssetModal').modal('hide');
                                location
                                    .reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'Try Again'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    }
                });
            });
        });
        </script>
        <script>
        function searchTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#maintenanceTableBody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let match = false;
                for (let i = 0; i < cells.length - 1; i++) {
                    if (cells[i].innerText.toLowerCase().includes(input)) {
                        match = true;
                        break;
                    }
                }
                row.style.display = match ? '' : 'none';
            });
        }
        </script>
        <script>
        function deleteRequest(requestId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: './queries/maintenance/delete_maintenance_request.php',
                        type: 'POST',
                        data: {
                            requestId: requestId
                        },
                        success: function(response) {
                            const res = JSON.parse(response);
                            if (res.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'The maintenance request has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete the request. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'An unexpected error occurred. Please try again later.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-btn');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const category = this.getAttribute('data-category');
                    const status = this.getAttribute('data-status');
                    const assignedTo = this.getAttribute('data-assignedto');
                    const remarks = this.getAttribute('data-remarks');

                    document.getElementById('viewAssetName').value = name;
                    document.getElementById('viewAssetCategory').value = category;
                    document.getElementById('viewAssetStatus').value = status;
                    document.getElementById('viewAssetAssignee').value = assignedTo;
                    document.getElementById('viewAssetRemarks').value = remarks ||
                        'No remarks provided';
                });
            });
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const category = this.getAttribute('data-category');
                    const status = this.getAttribute('data-status');
                    const assignedTo = this.getAttribute('data-assignedto');
                    const remarks = this.getAttribute('data-remarks');

                    document.getElementById('editAssetName').value = name;
                    document.getElementById('editAssetCategory').value = category;
                    document.getElementById('editAssetStatus').value = status;
                    document.getElementById('editAssetAssignee').value = assignedTo;
                    document.getElementById('editAssetRemarks').value = remarks ||
                        'No remarks provided';

                    document.getElementById('saveStatusButton').setAttribute('data-id', id);
                });
            });

            document.getElementById('saveStatusButton').addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const updatedStatus = document.getElementById('editAssetStatus').value;

                fetch('./queries/maintenance/update_maintenance_status.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            status: updatedStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated!',
                                text: 'The status has been updated successfully.',
                                confirmButtonText: 'OK',
                            }).then(() => {
                                location
                                    .reload();
                            });
                        } else {
                            = Swal.fire({
                                icon: 'error',
                                title: 'Update Failed',
                                text: 'Failed to update the status. Please try again.',
                                confirmButtonText: 'OK',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'An Error Occurred',
                            text: 'An unexpected error occurred. Please try again.',
                            confirmButtonText: 'OK',
                        });
                    });
            });
        });
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCounts() {
                fetch('./queries/maintenance/get_maintenance_counts.php')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('totalRequestsCount').textContent = data.total;
                        document.getElementById('completedRequestsCount').textContent = data.completed;
                        document.getElementById('pendingRequestsCount').textContent = data.pending;
                        document.getElementById('inProgressRequestsCount').textContent = data
                            .in_progress;
                        document.getElementById('overdueRequestsCount').textContent = data.overdue;
                    })
                    .catch(error => {
                        console.error('Error fetching counts:', error);
                    });
            }

            setInterval(updateCounts, 5000);

            updateCounts();
        });
        </script>
</body>

</html>