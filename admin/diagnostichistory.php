<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Diagnostic History</title>
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
                <a href="./diagnostichistory.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Diagnostic History</a>
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
                    <!-- <h3 class="text-dark">Diagnostic History</h3>
                    <p class="text-muted">Track the diagnostic history of all assets. This page shows detailed logs of
                        all maintenance and repair history related to each asset in your inventory.</p> -->
                </div>
            </div>

            <div class="container mt-4">
                <div class="row g-3">
                    <!-- Total Diagnoses Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-calendar-check card-icon text-primary"></i>
                                <div>
                                    <h6 class="card-title">Total Diagnoses</h6>
                                    <p class="card-value" id="totalDiagnoses">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed Diagnoses Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-check-circle card-icon text-success"></i>
                                <div>
                                    <h6 class="card-title">Completed Diagnoses</h6>
                                    <p class="card-value" id="completedDiagnoses">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Diagnoses In Progress Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle card-icon text-warning"></i>
                                <div>
                                    <h6 class="card-title">Diagnoses In Progress</h6>
                                    <p class="card-value" id="inProgressDiagnoses">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Diagnoses Card -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-x-circle card-icon text-danger"></i>
                                <div>
                                    <h6 class="card-title">Failed Diagnoses</h6>
                                    <p class="card-value" id="failedDiagnoses">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                    <!-- <h5 class="mb-3">Diagnostic History Logs</h5>
                    <p class="text-muted mb-3">View the history of all diagnostic actions performed on assets. This
                        includes information such as the asset ID, the technician's name, diagnostic details, and
                        status.</p> -->
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">Diagnostic ID</th>
                                <th scope="col">Asset Name</th>
                                <th scope="col">Technician</th>
                                <th scope="col">Diagnostic Details</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="diagnosticTable">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addDiagnosticModal">
                        <i class="bi bi-plus-lg"></i> Add New Diagnostic
                    </button>
                </div>
            </div>
        </div>

        <!-- Add Diagnostic Modal -->
        <div class="modal fade" id="addDiagnosticModal" tabindex="-1" aria-labelledby="addDiagnosticModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDiagnosticModalLabel">Add Diagnostic</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="add_diagnostic">
                            <div class="mb-3">
                                <label for="diagnosticID" class="form-label">Diagnostic ID</label>
                                <input type="text" class="form-control" id="add_diagnosticID" required>
                            </div>
                            <div class="mb-3">
                                <label for="asset" class="form-label">Asset</label>
                                <select class="form-select" id="add_assetID" required>
                                    <!--Options from AJAX -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="technician" class="form-label">Technician</label>
                                <input type="text" class="form-control" id="add_conductedby" required>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Diagnostic Details</label>
                                <textarea class="form-control" id="add_diagnosticDetails" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="add_status" required>
                                    <option value="Completed">Completed</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Failed">Failed</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Diagnostic</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Diagnostic Modal -->
    <div class="modal fade" id="editDiagnosticModal" tabindex="-1" aria-labelledby="editDiagnosticModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDiagnosticModalLabel">Edit Diagnostic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="edit_diagnostic">

                        <input type="text" class="form-control" id="editID" hidden>

                        <div class="mb-3">
                            <label for="diagnosticID" class="form-label">Diagnostic ID</label>
                            <input type="text" class="form-control" id="editDiagnosticID" required>
                        </div>
                        <div class="mb-3">
                            <label for="asset" class="form-label">Asset</label>
                            <select class="form-select" id="editAsset" required>
                                <!--Options from AJAX -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editTechnician" class="form-label">Technician</label>
                            <input type="text" class="form-control" id="editTechnician" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDetails" class="form-label">Diagnostic Details</label>
                            <textarea class="form-control" id="editDetails" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" required>
                                <option value="Completed">Completed</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- View Diagnostic Modal -->
    <div class="modal fade" id="viewDiagnosticModal" tabindex="-1" aria-labelledby="viewDiagnosticModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDiagnosticModalLabel">View Diagnostic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="diagnosticID" class="form-label">Diagnostic ID</label>
                        <input type="text" class="form-control" id="viewDiagnosticID" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="viewAsset" class="form-label">Asset</label>
                        <input type="text" class="form-control" id="viewAsset" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="viewTechnician" class="form-label">Technician</label>
                        <input type="text" class="form-control" id="viewTechnician" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="viewDetails" class="form-label">Diagnostic Details</label>
                        <textarea class="form-control" id="viewDetails" rows="3" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="viewStatus" class="form-label">Status</label>
                        <select class="form-select" id="viewStatus" disabled>
                            <option value="Completed">Completed</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Failed">Failed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('collapsed');
    });

    $(document).ready(function() {
        getDiagnosticHistory();

        $('#add_diagnostic').on('submit', function(event) {
            event.preventDefault();
            var diagnosticID = $('#add_diagnosticID').val();
            var assetID = $('#add_assetID').val();
            var conductedby = $('#add_conductedby').val();
            var diagnosticDetails = $('#add_diagnosticDetails').val();
            var status = $('#add_status').val();
            addDiagnosticHistory(diagnosticID, assetID, conductedby, diagnosticDetails, status);
        });

        $('#edit_diagnostic').on('submit', function(event) {
            event.preventDefault();
            var id = $('#editID').val();
            var diagnosticID = $('#editDiagnosticID').val();
            var assetID = $('#editAsset').val();
            var conductedby = $('#editTechnician').val();
            var diagnosticDetails = $('#editDetails').val();
            var status = $('#editStatus').val();
            editDiagnosticHistory(id, diagnosticID, assetID, conductedby, diagnosticDetails, status);
        });


        $('#addDiagnosticModal').on('shown.bs.modal', function() {
            populateAssetDropdown();
        });

        $('#editDiagnosticModal').on('shown.bs.modal', function() {
            var assetID = $('#editDiagnosticModal').data('assetid');
            populateAssetDropdown(assetID);
        });
    });

    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const cells = Array.from(row.cells);
            const match = cells.some(cell => cell.textContent.toLowerCase().includes(filter));
            row.style.display = match ? '' : 'none';
        });
    }

    function getDiagnosticHistory() {
        $.ajax({
            url: 'queries/diagnostichistory/query_getDiagnosticHistory.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var tableBody = $('#diagnosticTable');
                tableBody.empty();
                response.data.forEach(function(diagnosticData) {
                    var statusClass = '';
                    var statusText = diagnosticData.status;
                    if (statusText === 'Completed') {
                        statusClass = 'bg-success';
                    } else if (statusText === 'In Progress') {
                        statusClass = 'bg-warning';
                    } else if (statusText === 'Failed') {
                        statusClass = 'bg-danger';
                    }

                    var row = `<tr>
                        <td>${diagnosticData.diagnosticid}</td>
                        <td>${diagnosticData.computername}</td>
                        <td>${diagnosticData.conductedby}</td>
                        <td>${diagnosticData.remarks}</td>
                        <td>${diagnosticData.createdate}</td>
                        <td><span class="badge ${statusClass}">${statusText}</span></td>
                        <td>
                            <div class="action-icons">
                                <button class="view-btn btn-sm btn-info" data-bs-toggle="modal" data-id="${diagnosticData.id}" data-diagnosticID="${diagnosticData.diagnosticid}" data-assetID="${diagnosticData.computername}" data-conductedby="${diagnosticData.conductedby}" data-diagnostic-remarks="${diagnosticData.remarks}" data-status="${diagnosticData.status}" data-bs-target="#viewDiagnosticModal">View</button>

                                <button class="edit-btn btn-sm btn-warning" data-bs-toggle="modal" data-id="${diagnosticData.id}" data-diagnosticID="${diagnosticData.diagnosticid}" data-assetID="${diagnosticData.assetdetailsid}" data-conductedby="${diagnosticData.conductedby}" data-diagnostic-remarks="${diagnosticData.remarks}" data-status="${diagnosticData.status}" data-bs-target="#editDiagnosticModal">Edit</button>

                                <button class="delete-btn btn-sm btn-danger" data-id="${diagnosticData.id}">Delete</button>
                            </div>
                        </td>
                    </tr>`;
                    tableBody.append(row);
                });

                $('#diagnosticTable').on('click', '.edit-btn', function() {
                    var editID = $(this).data('id');
                    var diagnosticID = $(this).data('diagnosticid');
                    var assetID = $(this).data('assetid');
                    var conductedby = $(this).data('conductedby');
                    var diagnosticRemarks = $(this).data('diagnostic-remarks');
                    var status = $(this).data('status');


                    $('#editID').val(editID);
                    $('#editDiagnosticID').val(diagnosticID);
                    $('#editAsset').val(assetID);
                    $('#editTechnician').val(conductedby);
                    $('#editDetails').val(diagnosticRemarks);
                    $('#editStatus').val(status);

                    $('#editDiagnosticModal').data('assetid', assetID);
                });


                $('#diagnosticTable').on('click', '.view-btn', function() {
                    var diagnosticID = $(this).data('diagnosticid');
                    var assetID = $(this).data('assetid');
                    var conductedby = $(this).data('conductedby');
                    var diagnosticRemarks = $(this).data('diagnostic-remarks');
                    var status = $(this).data('status');

                    $('#viewDiagnosticID').val(diagnosticID);
                    $('#viewAsset').val(assetID);
                    $('#viewTechnician').val(conductedby);
                    $('#viewDetails').val(diagnosticRemarks);
                    $('#viewStatus').val(status);

                });

                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    deleteDiagnosticHistory(id);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error during AJAX request:', error, xhr.responseText);
                alert('An error occurred while fetching diagnostic history.');
            }
        });
    }

    function addDiagnosticHistory(diagnosticID, assetID, conductedby, diagnosticDetails, status) {
        $.ajax({
            url: 'queries/diagnostichistory/query_insertDiagnosticHistory.php',
            method: 'POST',
            data: {
                diagnosticID: diagnosticID,
                assetID: assetID,
                conductedby: conductedby,
                diagnosticDetails: diagnosticDetails,
                status: status
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.response_type === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.response,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#addDiagnosticModal').modal('hide');
                    getDiagnosticHistory();
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
                alert('An error occurred while inserting the diagnostic: ' + error);
            }
        });
    }

    function editDiagnosticHistory(id, diagnosticID, assetID, conductedby, diagnosticDetails, status) {
        $.ajax({
            url: 'queries/diagnostichistory/query_updateDiagnosticHistory.php',
            method: 'POST',
            data: {
                id: id,
                diagnosticID: diagnosticID,
                assetID: assetID,
                conductedby: conductedby,
                diagnosticDetails: diagnosticDetails,
                status: status
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.response_type === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.response,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#editDiagnosticModal').modal('hide');
                    getDiagnosticHistory();
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
                alert('An error occurred while updating the diagnostic: ' + error);
            }
        });
    }

    function deleteDiagnosticHistory(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this diagnostic history!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion if confirmed
                $.ajax({
                    url: 'queries/diagnostichistory/query_deleteDiagnosticHistory.php',
                    method: 'POST',
                    data: {
                        id: id,
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
                            $('#editDiagnosticModal').modal('hide');
                            getDiagnosticHistory(); // Refresh the diagnostic history
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
                            text: 'An error occurred while deleting the diagnostic history.',
                            confirmButtonText: 'Try Again'
                        });
                    }
                });
            }
        });
    }

    function populateAssetDropdown(selectedAssetID) {
        $.ajax({
            url: 'queries/diagnostichistory/query_getAssetComputerName.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var addDropdown = $('#add_assetID');
                var editDropdown = $('#editAsset');

                addDropdown.empty();
                editDropdown.empty();

                addDropdown.append('<option value="">Select Asset</option>');
                editDropdown.append('<option value="">Select Asset</option>');

                response.forEach(function(item) {
                    addDropdown.append('<option value="' + item.id + '">' + item.computername +
                        '</option>');
                    editDropdown.append('<option value="' + item.id + '">' + item.computername +
                        '</option>');
                });

                if (selectedAssetID) {
                    editDropdown.val(selectedAssetID).trigger('change');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching asset names: ", error);
            }
        });
    }
    </script>

    <script>
    // Function to fetch and update the data in real-time
    function fetchData() {
        $('#totalDiagnoses').text("Loading...");
        $('#completedDiagnoses').text("Loading...");
        $('#inProgressDiagnoses').text("Loading...");
        $('#failedDiagnoses').text("Loading...");

        $.ajax({
            url: './queries/diagnostichistory/query_count.php', // The PHP file that returns the counts
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#totalDiagnoses').text(data.totalDiagnoses || "0");
                $('#completedDiagnoses').text(data.completedDiagnoses || "0");
                $('#inProgressDiagnoses').text(data.inProgressDiagnoses || "0");
                $('#failedDiagnoses').text(data.failedDiagnoses || "0");
            },
            error: function() {
                alert('Error fetching data.');
            }
        });
    }

    // Fetch data initially and then every 5 seconds for real-time updates
    $(document).ready(function() {
        fetchData(); // Fetch data once when the page loads
        setInterval(fetchData, 5000); // Fetch data every 5 seconds for real-time updates
    });
    </script>
</body>

</html>