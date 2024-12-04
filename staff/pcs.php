<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Pc's</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/staff/management.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">

</head>

<body>


    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white"><i class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./asset.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> Asset
                    Management</a>
            </li>
            <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white active"><i class="bi bi-laptop"></i> PC's</a></li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
            <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i>
                    Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a>
            </li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i>
                    Diagnostic History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage
                    requests</a></li>
        </ul>
    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">My Pc's</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> TWICE
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid py-4">

            <div class="row mb-4">
                <div class="col-12">
                    <!-- <h3 class="text-dark">My PCs</h3>
                    <p class="text-muted">Manage your assigned PCs, update details, or report issues.</p> -->
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <!-- <h5 class="mb-3">Assigned PCs</h5>
                    <p class="text-muted mb-3">Below is the list of PCs currently assigned to you.</p> -->
                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">PC ID</th>
                                <th scope="col">PC Name</th>
                                <th scope="col">Specifications</th>
                                <th scope="col">Status</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>PC001</td>
                                <td>HP EliteBook</td>
                                <td>16GB RAM, Intel i7, 512GB SSD</td>
                                <td><span class="badge bg-success">In Use</span></td>
                                <td>2024-12-01</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#viewPCModal">View</button>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editPCModal">Edit</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#reportPCModal">Report Issue</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#requestPCModal">
                        <i class="bi bi-plus-lg"></i> Request New PC
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="viewPCModal" tabindex="-1" aria-labelledby="viewPCModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="viewPCModalLabel">View PC Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>PC Name:</strong> HP EliteBook</p>
                        <p><strong>Specifications:</strong> 16GB RAM, Intel i7, 512GB SSD</p>
                        <p><strong>Status:</strong> In Use</p>
                        <p><strong>Last Updated:</strong> 2024-12-01</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editPCModal" tabindex="-1" aria-labelledby="editPCModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="editPCModalLabel">Edit PC Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="editPCName" class="form-label">PC Name</label>
                                <input type="text" class="form-control" id="editPCName" value="HP EliteBook">
                            </div>
                            <div class="mb-3">
                                <label for="editPCSpecs" class="form-label">Specifications</label>
                                <textarea class="form-control" id="editPCSpecs"
                                    rows="3">16GB RAM, Intel i7, 512GB SSD</textarea>
                            </div>
                            <button type="submit" class="btn btn-orange">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="reportPCModal" tabindex="-1" aria-labelledby="reportPCModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="reportPCModalLabel">Report Issue</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="issueDescription" class="form-label">Describe the Issue</label>
                                <textarea class="form-control" id="issueDescription" rows="4"
                                    placeholder="Provide details about the issue"></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange">Submit Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="requestPCModal" tabindex="-1" aria-labelledby="requestPCModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="requestPCModalLabel">Request New PC</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="requestPCName" class="form-label">PC Name</label>
                                <input type="text" class="form-control" id="requestPCName"
                                    placeholder="Enter the name of the PC you need">
                            </div>
                            <div class="mb-3">
                                <label for="requestPCSpecs" class="form-label">Specifications</label>
                                <textarea class="form-control" id="requestPCSpecs" rows="3"
                                    placeholder="Enter the desired specifications"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="requestPCReason" class="form-label">Reason for Request</label>
                                <textarea class="form-control" id="requestPCReason" rows="3"
                                    placeholder="Explain why you need this PC"></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange">Submit Request</button>
                        </form>
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