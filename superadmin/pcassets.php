<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | PC Asset </title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/assetdetails.css">
    <link rel="stylesheet" href="../public/css/superadmin/management.css">


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
                        <li><a href="./pcassets.php" class="nav-link text-white active">PC's</a></li>
                        <li><a href="./assetsrequest.php" class="nav-link text-white">Asset Requests</a></li>

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
                <a class="navbar-brand ms-3" href="./pcassets.php">Pc's Management </a>
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
                    <!-- <h3 class="text-dark">PC Assets Management</h3> -->
                    <!-- <p class="text-muted">Monitor and manage PC assets Ensure all systems are functioning optimally.</p> -->
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-pc-display-horizontal card-icon text-primary me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Total PCs</h6>
                                <p class="card-value mb-0" id="totalPcs">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Available PCs</h6>
                                <p class="card-value mb-0" id="availablePcs">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-people-fill card-icon text-warning me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Assigned PCs</h6>
                                <p class="card-value mb-0" id="assignedPcs">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-trash card-icon text-danger me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Pcs to Dispose</h6>
                                <p class="card-value mb-0">3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row mt-4">
                <div class="col-12 mb-3">
                    <div class="col-12 text-end mb-3">
                        <a href="http://localhost/Civic-ITAM/superadmin/queries/pcassets/query_schedulepc.php"
                            class="btn btn-orange" download>
                            Download Script
                        </a>

                    </div>
                    <input type="text" id="searchInput" class="form-control" placeholder="Search"
                        onkeyup="searchTable()">
                </div>

            </div>
            <div class="col-12">
                <table class="table table-hover table-striped shadow-sm">
                    <thead class="bg-orange text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PC ID</th>
                            <th scope="col">CPU Model</th>
                            <th scope="col">HDD Model</th>
                            <th scope="col">OS</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <?php
        include '../src/config/config.php';

        $sql = "SELECT id, pc_id, cpu_model, cpu_hertz, cpu_health, hdd_model, hdd_size, hdd_health, ram_size, ram_health, os_version, timestamp, assignedpc FROM pcassets ORDER BY timestamp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<tbody id="pcTableBody">';
            
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $pc_id = $row['pc_id'];
                $cpu_model = $row['cpu_model'];
                $cpu_hertz = $row['cpu_hertz'];
                $cpu_health = $row['cpu_health'];
                $hdd_model = $row['hdd_model'];
                $hdd_size = $row['hdd_size'];
                $hdd_health = $row['hdd_health'];
                $ram_size = $row['ram_size'];
                $ram_health = $row['ram_health'];
                $os_version = $row['os_version'];
                $last_updated = $row['timestamp'];
                $assignedpc = $row['assignedpc'];

                echo "<tr>
                        <td>{$id}</td>
                        <td>{$pc_id}</td>
                        <td>{$cpu_model}</td>
                        <td>{$hdd_model}</td>
                        <td>{$os_version}</td>
                        <td>{$last_updated}</td>
                        <td>
                            <button class='btn btn-sm btn-info view-asset-btn' 
                                    data-id='{$id}'
                                    data-pc-id='{$pc_id}'
                                    data-cpu-model='{$cpu_model}'
                                    data-cpu-hertz='{$cpu_hertz}'
                                    data-cpu-health='{$cpu_health}'
                                    data-hdd-model='{$hdd_model}'
                                    data-hdd-size='{$hdd_size}'
                                    data-hdd-health='{$hdd_health}'
                                    data-ram-size='{$ram_size}'
                                    data-ram-health='{$ram_health}'
                                    data-os-version='{$os_version}'
                                    data-last-updated='{$last_updated}'
                                    data-assignedpc='{$assignedpc}'
                                    data-bs-toggle='modal' 
                                    data-bs-target='#viewAssetModal'>
                                View
                            </button>
                        </td>
                    </tr>";
            }
            
            echo '</tbody>';
        } else {
            echo "<tr><td colspan='7' class='text-center'>No data found</td></tr>";
        }

        $conn->close();
        ?>
                </table>
            </div>

        </div>


        <!-- <div class="row mt-3">
            <div class="col-12 text-end">
                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addAssetModal">
                    <i class="bi bi-plus-lg"></i> Add New Pcs
                </button>
            </div>
        </div> -->
    </div>
    <!-- <div class="modal fade" id="addAssetModal" tabindex="-1" aria-labelledby="addAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="addAssetModalLabel">Add New PCs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="assetName" class="form-label">PC Name</label>
                                    <input type="text" class="form-control" id="assetName" placeholder="Enter PC Name">
                                </div>
                                <div class="mb-3">
                                    <label for="modelname" class="form-label">Model Name</label>
                                    <input type="text" class="form-control" id="modelname"
                                        placeholder="Enter Model Name">
                                </div>
                                <div class="mb-3">
                                    <label for="specsification" class="form-label">Specification</label>
                                    <textarea class="form-control" id="specsification" rows="3"
                                        placeholder="Enter Specifications"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="assetStatus" class="form-label">Status</label>
                                    <select class="form-select" id="assetStatus">
                                        <option value="Available">Available</option>
                                        <option value="Assigned">Assigned</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="assetAssignee" class="form-label">Assigned To</label>
                                    <input type="text" class="form-control" id="assetAssignee"
                                        placeholder="Enter assignee name (if applicable)">
                                </div>
                                <div class="mb-3">
                                    <label for="assetRemarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="assetRemarks" rows="3"
                                        placeholder="Additional information"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-orange">Add PCs</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="editAssetModal" tabindex="-1" aria-labelledby="editAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="editAssetModalLabel">Edit Asset Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAssetForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editAssetName" class="form-label">Asset Name</label>
                                    <input type="text" class="form-control" id="editAssetName"
                                        placeholder="Enter PC Name">
                                </div>
                                <div class="mb-3">
                                    <label for="editModelName" class="form-label">Model Name</label>
                                    <input type="text" class="form-control" id="editModelName"
                                        placeholder="Enter Model Name">
                                </div>
                                <div class="mb-3">
                                    <label for="editSpecification" class="form-label">Specification</label>
                                    <textarea class="form-control" id="editSpecification" rows="3"
                                        placeholder="Enter Specifications"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editAssetStatus" class="form-label">Status</label>
                                    <select class="form-select" id="editAssetStatus">
                                        <option value="Available">Available</option>
                                        <option value="Assigned">Assigned</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetAssignee" class="form-label">Assigned To</label>
                                    <input type="text" class="form-control" id="editAssetAssignee"
                                        placeholder="Enter assignee name (if applicable)">
                                </div>
                                <div class="mb-3">
                                    <label for="editAssetRemarks" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="editAssetRemarks" rows="3"
                                        placeholder="Additional information"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-orange">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="viewAssetModal" tabindex="-1" aria-labelledby="viewAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange text-white">
                    <h5 class="modal-title" id="viewAssetModalLabel">PC Asset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">PC ID:</label>
                                <p class="form-control-plaintext" id="viewPcId"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">CPU Model:</label>
                                <p class="form-control-plaintext" id="viewCpuModel"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">CPU Hertz:</label>
                                <p class="form-control-plaintext" id="viewCpuHertz"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">CPU Health:</label>
                                <p class="form-control-plaintext" id="viewCpuHealth"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">HDD Model:</label>
                                <p class="form-control-plaintext" id="viewHddModel"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">HDD Size:</label>
                                <p class="form-control-plaintext" id="viewHddSize"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">HDD Health:</label>
                                <p class="form-control-plaintext" id="viewHddHealth"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">RAM Size:</label>
                                <p class="form-control-plaintext" id="viewRamSize"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">RAM Health:</label>
                                <p class="form-control-plaintext" id="viewRamHealth"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">OS Version:</label>
                                <p class="form-control-plaintext" id="viewOsVersion"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Assigned To:</label>
                                <p class="form-control-plaintext" id="viewAssignedpc"></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Last Updated:</label>
                                <p class="form-control-plaintext" id="viewLastUpdated"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-orange" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel"
        aria-hidden="true">



        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
        </script>
        <script>
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const tableBody = document.getElementById("pcTableBody");
            const rows = tableBody.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let rowContainsFilter = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const cellText = cells[j].textContent || cells[j].innerText;
                        if (cellText.toLowerCase().indexOf(filter) > -1) {
                            rowContainsFilter = true;
                            break;
                        }
                    }
                }

                rows[i].style.display = rowContainsFilter ? "" : "none";
            }
        }
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewAssetModal = new bootstrap.Modal(document.getElementById('viewAssetModal'));

            document.querySelectorAll('.view-asset-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const pcId = this.getAttribute('data-pc-id');
                    const cpuModel = this.getAttribute('data-cpu-model');
                    const cpuHertz = this.getAttribute('data-cpu-hertz');
                    const cpuHealth = this.getAttribute('data-cpu-health');
                    const hddModel = this.getAttribute('data-hdd-model');
                    const hddSize = this.getAttribute('data-hdd-size');
                    const hddHealth = this.getAttribute('data-hdd-health');
                    const ramSize = this.getAttribute('data-ram-size');
                    const ramHealth = this.getAttribute('data-ram-health');
                    const osVersion = this.getAttribute('data-os-version');
                    const lastUpdated = this.getAttribute('data-last-updated');
                    const assignedpc = this.getAttribute('data-assignedpc');

                    document.getElementById('viewPcId').textContent = pcId;
                    document.getElementById('viewCpuModel').textContent = cpuModel;
                    document.getElementById('viewCpuHertz').textContent = cpuHertz;
                    document.getElementById('viewCpuHealth').textContent = cpuHealth;
                    document.getElementById('viewHddModel').textContent = hddModel;
                    document.getElementById('viewHddSize').textContent = hddSize;
                    document.getElementById('viewHddHealth').textContent = hddHealth;
                    document.getElementById('viewRamSize').textContent = ramSize;
                    document.getElementById('viewRamHealth').textContent = ramHealth;
                    document.getElementById('viewOsVersion').textContent = osVersion;
                    document.getElementById('viewAssignedpc').textContent = assignedpc;
                    document.getElementById('viewLastUpdated').textContent = lastUpdated;

                    viewAssetModal.show();
                });
            });
        });
        </script>
        <script>
        function loadPCCounts() {
            fetch('../superadmin/queries/pcassets/get_pc_counts.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalPcs').textContent = data.total_pcs;
                    document.getElementById('availablePcs').textContent = data.available_pcs;
                    document.getElementById('assignedPcs').textContent = data.assigned_pcs;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    document.getElementById('totalPcs').textContent = 'Error';
                    document.getElementById('availablePcs').textContent = 'Error';
                    document.getElementById('assignedPcs').textContent = 'Error';
                });
        }

        window.onload = loadPCCounts;
        setInterval(loadPCCounts, 100);
        </script>
</body>

</html>