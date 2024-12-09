<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Asset Consignment</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/management.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
    <style>
    #table .assetTable th {
        white-space: nowrap;
        text-align: center;
    }

    #assetTable tr {
        white-space: nowrap;
        text-align: center;
    }
    </style>
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
                <a href="./consignment.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Asset Consignment</a>
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
                <div class="col-12 d-flex justify-content-between">
                    <input type="text" id="searchInput" class="form-control w-50" placeholder="Search">
                    <button class="btn btn-orange" id="addAssetBtn" data-bs-toggle="modal"
                        data-bs-target="#addAssetModal">Add
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="assetTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reference</th>
                            <th>Consignment ID</th>
                            <th>Asset Details ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="assetTableBody">
                        <!-- Dynamic content will be added here by AJAX -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Add Asset Consignment Modal -->
    <div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addAssetModalLabel">Add Asset Consignment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_consignment" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="add_id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="add_id" placeholder="Enter asset ID"
                                    required>
                                <div class="invalid-feedback">Please provide an asset ID.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="add_reference" class="form-label">Reference</label>
                                <input type="text" class="form-control" id="add_reference" placeholder="Enter reference"
                                    required>
                                <div class="invalid-feedback">Please provide a reference.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="add_consignmentId" class="form-label">Consignment ID</label>
                                <input type="text" class="form-control" id="add_consignmentId"
                                    placeholder="Enter consignment ID" required>
                                <div class="invalid-feedback">Please provide a consignment ID.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="add_assetDetailsId" class="form-label">Asset Details ID</label>
                                <input type="text" class="form-control" id="add_assetDetailsId"
                                    placeholder="Enter asset details ID" required>
                                <div class="invalid-feedback">Please provide asset details ID.</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-orange">Add Asset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Asset Consignment Modal -->
    <div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addAssetModalLabel">Edit Asset Consignment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_consignment">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="edit_id" placeholder="Enter asset id" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="reference" class="form-label">Reference</label>
                            <input type="text" class="form-control" id="edit_reference" placeholder="Enter reference">
                        </div>
                        <div class="mb-3">
                            <label for="consignmentId" class="form-label">Consignment ID</label>
                            <input type="text" class="form-control" id="edit_consignmentId"
                                placeholder="Enter consignment id">
                        </div>
                        <div class="mb-3">
                            <label for="assetDetailsId" class="form-label">Asset ID Details</label>
                            <input type="text" class="form-control" id="edit_assetDetailsId"
                                placeholder="Enter asset details id" disabled>
                        </div>
                        <button type="submit" class="btn btn-orange">Edit Asset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });

    $(document).ready(function() {
        getConsignmentData();

        $('#add_consignment').on('submit', function(event) {
            event.preventDefault();

            var reference = $('#add_reference').val();
            var consignmentId = $('#add_consignmentId').val();
            var assetDetailsId = $('#add_assetDetailsId').val();

            manageAssetConsignment('add', {
                reference,
                consignmentId,
                assetDetailsId
            });
        });

        $('#edit_consignment').on('submit', function(event) {
            event.preventDefault();

            var id = $('#edit_id').val();
            var reference = $('#edit_reference').val();
            var consignmentId = $('#edit_consignmentId').val();
            var assetDetailsId = $('#edit_assetDetailsId').val();

            manageAssetConsignment('update', {
                id,
                reference,
                consignmentId,
                assetDetailsId
            });
        });
    });

    function getConsignmentData() {
        $.ajax({
            url: './queries/query_assetconsignment.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableBody = $('#assetTableBody');
                tableBody.empty();
                data.forEach(function(asset) {
                    var row = `<tr>
                        <td>${asset.id}</td>
                        <td>${asset.reference}</td>
                        <td>${asset.consignmentId}</td>
                        <td>${asset.assetdetailsid}</td>
                        <td>
                            <center>
                                <div class="action-icons">
                                    <button class="icon-btn edit-btn" data-id="${asset.id}" data-reference="${asset.reference}" data-consignment-id="${asset.consignmentId}" data-asset-details-id="${asset.assetdetailsid}" data-bs-toggle="modal" data-bs-target="#editAssetModal"><i class="fas fa-edit"></i></button>
                                    <button class="icon-btn delete-btn" data-id="${asset.id}"><i class="fas fa-trash"></i></button>
                                </div>
                            </center>
                        </td>
                    </tr>`;
                    tableBody.append(row);
                });

                $('.edit-btn').on('click', function() {
                    const id = $(this).data('id');
                    const reference = $(this).data('reference');
                    const consignmentId = $(this).data('consignment-id');
                    const assetDetailsId = $(this).data('asset-details-id');

                    $('#edit_id').val(id);
                    $('#edit_reference').val(reference);
                    $('#edit_consignmentId').val(consignmentId);
                    $('#edit_assetDetailsId').val(assetDetailsId);
                });

                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    deleteAssetConsignment(id);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Add and Update
    function manageAssetConsignment(action, data) {
        $.ajax({
            url: './queries/query_assetconsignment.php',
            method: 'POST',
            data: {
                action,
                ...data
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.response_type === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: action === 'add' ? 'Added!' : 'Updated!',
                        text: res.response,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    if (action === 'add') $('#addAssetModal').modal('hide');
                    if (action === 'update') $('#editAssetModal').modal('hide');
                    getConsignmentData();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: res.response,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: `An error occurred while performing the action (${action}).`,
                    confirmButtonText: 'Try Again'
                });
            }
        });
    }

    function deleteAssetConsignment(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this asset consignment!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'queries/query_assetconsignment.php',
                    method: 'POST',
                    data: {
                        action: 'delete',
                        id
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.response_type === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: res.response,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            getConsignmentData();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: res.response,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while deleting the asset consignment.',
                            confirmButtonText: 'Try Again'
                        });
                    }
                });
            }
        });
    }
    </script>
</body>

</html>