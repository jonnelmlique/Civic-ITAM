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
    <title>CIVIC | Dashboard</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/staff/dashboard.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">

</head>

<body>

    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white active"><i
                        class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./assets.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> Asset
                    Request</a>
            </li>
            <!-- <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li> -->
            <li><a href="./tickets.php" class="nav-link text-white"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
            <!-- <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i>
                    Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a>
            </li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i>
                    Diagnostic History</a></li>
            <li><a href="./managerequest.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage
                    requests</a></li> -->
        </ul>
    </div>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#"> Dashboard</a>
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
        <div class="col-lg-4 col-md-6">
            <div class="card shadow border-0 mb-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-ui-checks-grid card-icon text-primary"></i>
                    <div>
                        <h5 class="card-title">My Assets</h5>
                        <p class="card-value" id="myAssetsCount">Loading...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow border-0 mb-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-ticket-perforated card-icon text-success"></i>
                    <div>
                        <h5 class="card-title">My Tickets</h5>
                        <p class="card-value" id="myTicketsCount">Loading...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow border-0 mb-3">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-receipt-cutoff card-icon text-danger"></i>
                    <div>
                        <h5 class="card-title">Pending Assets</h5>
                        <p class="card-value" id="pendingAssetsCount">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'civicitam');

    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("ERROR: Could not connect. " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

    $query_tickets = "SELECT ticketid, subject, status FROM tickets WHERE createdby = '$username' ORDER BY lastupdated DESC LIMIT 3";
    $tickets_result = $conn->query($query_tickets);

    $query_asset_requests = "SELECT requestid, assetname, status FROM assetrequests WHERE requestedby = '$username' ORDER BY createddate DESC LIMIT 3";
    $asset_requests_result = $conn->query($query_asset_requests);
    ?>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card shadow border-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-bell text-primary"></i> Notifications</h5>
                    <ul class="list-group">
                        <?php while ($asset = $asset_requests_result->fetch_assoc()) { ?>
                            <?php if ($asset['status'] == 'Pending') { ?>
                                <li class="list-group-item">Asset #<?php echo $asset['requestid']; ?>
                                    (<?php echo $asset['assetname']; ?>) is Pending.</li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-list-task text-success"></i> My Tickets</h5>
                    <ul class="list-group">
                        <?php while ($ticket = $tickets_result->fetch_assoc()) { ?>
                            <?php if (trim($ticket['status']) == 'Open') { ?>
                                <li class="list-group-item">New ticket is open: "<?php echo $ticket['subject']; ?>".</li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    $conn->close();
    ?>
<!-- </div>
    <div class="row g-3">
        <div class="col-lg-12">
            <div class="card shadow border-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-clock-history text-info"></i> Activity Logs</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Activity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dec 5</td>
                                <td>Test3</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Dec 5</td>
                                <td>Test2</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Dec 5</td>
                                <td>Test1</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->


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
    <sctipt>
        <script>
        fetch('./queries/dashboard/getdata.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('myAssetsCount').textContent = data.myAssetsCount;
                document.getElementById('myTicketsCount').textContent = data.myTicketsCount;
                document.getElementById('pendingAssetsCount').textContent = data.pendingAssetsCount;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        </script>

    </sctipt>
</body>

</html>