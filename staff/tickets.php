<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Tickets</title>
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
            <li><a href="./managerequests.php" class="nav-link text-white"><i class="bi bi-person"></i> Manage requests</a></li>
        </ul>
    </div>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-orange" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-3" href="#">Staff Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> John Doe
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
            <h3 class="text-dark">My Tickets</h3>
            <p class="text-muted">Track and manage your support tickets, or create a new ticket for any issue or request.</p>
        </div>
    </div>
  

    <div class="row g-3">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-send-check card-icon text-primary"></i>
                    <div>
                        <h6 class="card-title">Total Ticket</h6>
                        <p class="card-value">15</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-check-circle card-icon text-success"></i>
                    <div>
                        <h6 class="card-title">Approved Ticket</h6>
                        <p class="card-value">10</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-hourglass-split card-icon text-warning"></i>
                    <div>
                        <h6 class="card-title">Pending Ticket</h6>
                        <p class="card-value">3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-x-circle card-icon text-danger"></i>
                    <div>
                        <h6 class="card-title">Non Progress Ticket</h6>
                        <p class="card-value">2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h5 class="mb-3">Your Tickets</h5>
            <p class="text-muted mb-3">Below is the list of tickets you have submitted. Track their status or update them if needed.</p>
            <table class="table table-hover table-striped shadow-sm">
                <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TICKET001</td>
                        <td>PC Not Booting</td>
                        <td>Technical Issue</td>
                        <td><span class="badge bg-warning">In Progress</span></td>
                        <td>2024-12-01</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewTicketModal">View</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTicketModal">Edit</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateTicketModal">Update</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                <i class="bi bi-plus-lg"></i> Create New Ticket
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="viewTicketModalLabel">View Ticket Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> PC Not Booting</p>
                <p><strong>Category:</strong> Technical Issue</p>
                <p><strong>Description:</strong> The assigned PC does not boot properly and displays a black screen.</p>
                <p><strong>Status:</strong> In Progress</p>
                <p><strong>Last Updated:</strong> 2024-12-01</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTicketModal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editTicketTitle" class="form-label">Ticket Title</label>
                        <input type="text" class="form-control" id="editTicketTitle" value="PC Not Booting">
                    </div>
                    <div class="mb-3">
                        <label for="editTicketCategory" class="form-label">Category</label>
                        <select class="form-select" id="editTicketCategory">
                            <option value="Technical Issue" selected>Technical Issue</option>
                            <option value="Request">Request</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editTicketDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editTicketDescription" rows="3">The assigned PC does not boot properly and displays a black screen.</textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="createTicketModalLabel">Create New Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="newTicketTitle" class="form-label">Ticket Title</label>
                        <input type="text" class="form-control" id="newTicketTitle" placeholder="Enter the title of your issue">
                    </div>
                    <div class="mb-3">
                        <label for="newTicketCategory" class="form-label">Category</label>
                        <select class="form-select" id="newTicketCategory">
                            <option value="">Select Category</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Request">Request</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="newTicketDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="newTicketDescription" rows="4" placeholder="Provide details about the issue or request"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="updateTicketModal" tabindex="-1" aria-labelledby="updateTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange text-white">
                <h5 class="modal-title" id="updateTicketModalLabel">Update Your Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateTicketForm">
                    <div class="mb-3">
                        <label for="updateTicketID" class="form-label">Ticket ID</label>
                        <input type="text" class="form-control" id="updateTicketID" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updateTicketTitle" class="form-label">Ticket Title</label>
                        <input type="text" class="form-control" id="updateTicketTitle">
                    </div>
                    <div class="mb-3">
                        <label for="updateTicketCategory" class="form-label">Category</label>
                        <select class="form-select" id="updateTicketCategory">
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Request">Request</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateTicketDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="updateTicketDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="updateTicketStatus" class="form-label">Status</label>
                        <select class="form-select" id="updateTicketStatus">
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-orange">Update Ticket</button>
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
    function fillUpdateForm(ticketID, title, category, status, description) {
        document.getElementById('updateTicketID').value = ticketID;
        document.getElementById('updateTicketTitle').value = title;
        document.getElementById('updateTicketCategory').value = category;
        document.getElementById('updateTicketDescription').value = description;
        document.getElementById('updateTicketStatus').value = status;
}
</script>
</body>

</html>