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
    <title>CIVIC | Ticket Management</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../public/css/admincss/management.css">
    <link rel="stylesheet" href="../public/css/admincss/sidebar.css">
    <link rel="stylesheet" href="../public/css/superadmin/ticket.css">

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
                        <li><a href="./assetsrequest.php" class="nav-link text-white">Asset Request</a></li>

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
                <a href="./tickets.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">Ticket Management</a>
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
                    <!-- <h3 class="text-dark">Ticket Management</h3> -->
                    <!-- <p class="text-muted">Manage and monitor your tickets effectively. Here, you can track ticket
                        status, assigned personnel, and resolutions.</p> -->
                    <!-- <p class="text-muted">Use the options below to review ticket status, assign new tickets, and ensure
                        timely resolutions.</p> -->
                    <!-- </div> -->
                </div>

                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-card-list card-icon text-primary me-3"></i>
                                <div>
                                    <h6 class="card-title mb-1">Total Tickets</h6>
                                    <p class="card-value mb-0" id="totalTickets">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-check-circle card-icon text-success me-3"></i>
                                <div>
                                    <h6 class="card-title mb-1">Solved Tickets</h6>
                                    <p class="card-value mb-0" id="resolvedTickets">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-hourglass-split card-icon text-warning me-3"></i>
                                <div>
                                    <h6 class="card-title mb-1">Open Tickets</h6>
                                    <p class="card-value mb-0" id="openTickets">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle card-icon text-danger me-3"></i>
                                <div>
                                    <h6 class="card-title mb-1">Overdue Tickets</h6>
                                    <p class="card-value mb-0" id="overdueTickets">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
include '../src/config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT ticketid, subject, category, status, lastupdated, createdby, description, assignedto 
            FROM tickets 
            WHERE (assignedto = ? OR createdby = ?) AND status != 'Closed'
            ORDER BY lastupdated DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Please log in first.";
    exit();
}
?>

<div class="row mt-4">
    <div class="col-12">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search" onkeyup="searchTable()">
        </div>

        <div class="tickets-container" id="ticketsContainer">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ticketId = 'TKT' . str_pad($row['ticketid'], 4, '0', STR_PAD_LEFT);
                    $subject = htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8');
                    $category = htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8');
                    $status = htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8');
                    $lastUpdated = htmlspecialchars($row['lastupdated'], ENT_QUOTES, 'UTF-8');
                    $createdBy = htmlspecialchars($row['createdby'], ENT_QUOTES, 'UTF-8');
                    $description = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                    $assignedTo = htmlspecialchars($row['assignedto'], ENT_QUOTES, 'UTF-8');

                    $badgeClass = ($status === 'Solved') ? 'bg-success' : (($status === 'Open') ? 'bg-warning' : 'bg-danger');
                    
                    echo "
                    <div class='ticket-card' data-search='$ticketId $subject $category $status $lastUpdated $createdBy'>
                        <div class='ticket-header'>
                            <span class='ticket-id'>$ticketId</span>
                            <span class='badge $badgeClass'>$status</span>
                        </div>
                        <div class='ticket-body'>
                            <h5 class='ticket-title'>$subject</h5>
                            <p><strong>Category:</strong> $category</p>
                            <p><strong>Last Updated:</strong> $lastUpdated</p>
                            <p><strong>Created By:</strong> $createdBy</p>
                        </div>
                        <div class='ticket-footer'>
                            <!-- View Button -->
                            <button class='btn btn-sm btn-info view-btn' 
                                    data-bs-toggle='modal' 
                                    data-bs-target='#viewTicketModal'
                                    data-ticketid='$ticketId' 
                                    data-subject='$subject' 
                                    data-category='$category' 
                                    data-status='$status' 
                                    data-lastupdated='$lastUpdated' 
                                    data-createdby='$createdBy' 
                                    data-description='$description'>
                                View
                            </button>
                            
                             <button class='btn btn-sm btn-danger close-btn' data-id='{$row['ticketid']}'>Solve</button>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='no-tickets'>No tickets found</div>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</div>



          
<div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="viewTicketModalLabel">View Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ticketID" class="form-label">Ticket ID</label>
                                    <input type="text" class="form-control" id="ticketID" value="" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" value="" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category" value="" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" value="" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastUpdated" class="form-label">Last Updated</label>
                                    <input type="text" class="form-control" id="lastUpdated" value="" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="createdBy" class="form-label">Created By</label>
                                    <input type="text" class="form-control" id="createdBy" value="" disabled>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="5" disabled></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>




                <div class="modal fade" id="addMaintenanceModal" tabindex="-1"
                    aria-labelledby="addMaintenanceModalLabel" aria-hidden="true">


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
                    document.addEventListener("DOMContentLoaded", function() {
                        const viewButtons = document.querySelectorAll(".view-btn");

                        viewButtons.forEach(button => {
                            button.addEventListener("click", function() {
                                const ticketID = button.getAttribute("data-ticketid");
                                const title = button.getAttribute("data-subject");
                                const category = button.getAttribute("data-category");
                                const status = button.getAttribute("data-status");
                                const lastUpdated = button.getAttribute("data-lastupdated");
                                const createdBy = button.getAttribute("data-createdby");
                                const description = button.getAttribute("data-description");

                                document.getElementById("ticketID").value = ticketID;
                                document.getElementById("title").value = title;
                                document.getElementById("category").value = category;
                                document.getElementById("status").value = status;
                                document.getElementById("lastUpdated").value = lastUpdated;
                                document.getElementById("createdBy").value = createdBy;
                                document.getElementById("description").value = description;
                            });
                        });
                    });
                    </script>
              
                    <script>
                    function fetchTicketCounts() {
                        $.ajax({
                            url: './queries/tickets/get_count.php',
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#totalTickets').text(data.total);
                                $('#resolvedTickets').text(data.resolved);
                                $('#openTickets').text(data.open);
                                $('#overdueTickets').text(data.overdue);
                            },
                            error: function() {
                                $('#totalTickets, #resolvedTickets, #openTickets, #overdueTickets').text(
                                    'Error');
                            }
                        });
                    }

                    $(document).ready(function() {
                        fetchTicketCounts();
                    });
                    </script>



<script>
    function searchTable() {
        const searchQuery = document.getElementById('searchInput').value.toLowerCase();
                const tickets = document.querySelectorAll('.ticket-card');
                tickets.forEach(ticket => {
            const ticketContent = ticket.getAttribute('data-search').toLowerCase();
            if (ticketContent.includes(searchQuery)) {
                ticket.style.display = '';
            } else {
                ticket.style.display = 'none'; 
            }
        });
    }
</script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('.close-btn');

            closeButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e
                        .preventDefault();

                    const ticketId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to Solve this ticket?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, solve it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('./queries/tickets/update_ticket_status.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    body: 'ticketId=' + ticketId
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Solved!',
                                            'The ticket has been solved.',
                                            'success'
                                        ).then(() => {
                                            location
                                                .reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            data.message,
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred.',
                                        'error'
                                    );
                                });
                        } else {
                            Swal.fire(
                                'Cancelled',
                                'The ticket was not solved.',
                                'info'
                            );
                        }
                    });
                });
            });
        });

</script>
</body>

</html>