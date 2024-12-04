<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Dashboard</title>
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
            <li><a href="./dashboard.php" class="nav-link text-white active"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
            <li><a href="./asset.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> My Asset</a></li>
            <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li>
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i> My Tickets</a></li>
            <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i> My Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a></li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i> My History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage requests</a></li>
        </ul>
    </div>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-orange" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-3" href="#">My Schedule</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <h3 class="text-dark">Asset Schedule</h3>
            <p class="text-muted">Below is a list of your assigned assets. You can set or update the schedule for each asset.</p>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Assigned Asset Schedule</h5>
            <p class="text-muted mb-3">View your assigned assets and manage their schedules.</p>
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Asset Name</th>
                        <th scope="col">Asset ID</th>
                        <th scope="col">Scheduled Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PC-001</td>
                        <td>PC-001</td>
                        <td>2024-12-10</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#scheduleAssetModal" onclick="setAssetSchedule('PC-001', '2024-12-10')">Set Schedule</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateScheduleModal" onclick="fillScheduleForm('PC-001', '2024-12-10')">Update Schedule</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Monitor-005</td>
                        <td>Monitor-005</td>
                        <td>2024-12-12</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#scheduleAssetModal" onclick="setAssetSchedule('Monitor-005', '2024-12-12')">Set Schedule</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateScheduleModal" onclick="fillScheduleForm('Monitor-005', '2024-12-12')">Update Schedule</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="scheduleAssetModal" tabindex="-1" aria-labelledby="scheduleAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="scheduleAssetModalLabel">Set Asset Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="scheduleAssetForm">
                        <div class="mb-3">
                            <label for="assetID" class="form-label">Asset ID</label>
                            <input type="text" class="form-control" id="assetID" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="scheduleDate" class="form-label">Scheduled Date</label>
                            <input type="date" class="form-control" id="scheduleDate" required>
                        </div>
                        <button type="submit" class="btn btn-orange">Set Schedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateScheduleModal" tabindex="-1" aria-labelledby="updateScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="updateScheduleModalLabel">Update Asset Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateScheduleForm">
                        <div class="mb-3">
                            <label for="updateAssetID" class="form-label">Asset ID</label>
                            <input type="text" class="form-control" id="updateAssetID" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateScheduleDate" class="form-label">Scheduled Date</label>
                            <input type="date" class="form-control" id="updateScheduleDate" required>
                        </div>
                        <button type="submit" class="btn btn-orange">Update Schedule</button>
                    </form>
                </div>
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

    function setAssetSchedule(assetID, scheduleDate) {
        document.getElementById('assetID').value = assetID;
        document.getElementById('scheduleDate').value = scheduleDate;
    }

    function fillScheduleForm(assetID, scheduleDate) {
        document.getElementById('updateAssetID').value = assetID;
        document.getElementById('updateScheduleDate').value = scheduleDate;
    }

    document.getElementById('scheduleAssetForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const assetID = document.getElementById('assetID').value;
        const scheduleDate = document.getElementById('scheduleDate').value;

        console.log('Schedule Set:', assetID, scheduleDate);

        $('#scheduleAssetModal').modal('hide');
    });

    document.getElementById('updateScheduleForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const assetID = document.getElementById('updateAssetID').value;
        const scheduleDate = document.getElementById('updateScheduleDate').value;

        console.log('Schedule Updated:', assetID, scheduleDate);

        $('#updateScheduleModal').modal('hide');
    });
</script>

</body>

</html>
