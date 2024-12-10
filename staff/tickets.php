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
    <link rel="stylesheet" href="../public/css/staff/management.css">
    <link rel="stylesheet" href="../public/css/staff/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div id="sidebar" class="col-12 col-md-3 col-lg-2 px-0 bg-orange text-white">
        <div class="sidebar-header text-center py-3">
            <img src="../images/civicph_logo.png" alt="CIVIC" style="max-width: 60%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="./dashboard.php" class="nav-link text-white"><i class="bi bi-layout-text-window-reverse"></i>
                    Dashboard</a></li>
            <li><a href="./assets.php" class="nav-link text-white"><i class="bi bi-ui-checks-grid"></i> Asset
                    Request</a>
            </li>
            <!-- <li><a href="./consignment.php" class="nav-link text-white"><i class="bi bi-truck"></i> Consignment</a></li>
            <li><a href="./pcs.php" class="nav-link text-white"><i class="bi bi-laptop"></i> PC's</a></li> -->
            <li><a href="./tickets.php" class="nav-link text-white active"><i class="bi bi-ticket-perforated"></i>
                    Tickets</a></li>
            <!-- <li><a href="./schedule.php" class="nav-link text-white"><i class="bi bi-receipt-cutoff"></i>
                    Schedule</a></li>
            <li><a href="./reports.php" class="nav-link text-white"><i class="bi bi-file-earmark-text"></i> Reports</a>
            </li>
            <li><a href="./diagnostichistory.php" class="nav-link text-white"><i class="fas fa-history"></i>
                    History</a></li>
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
                <a class="navbar-brand ms-3" href="#">My Tickets</a>

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
        </nav>

        <div class="container-fluid py-4">

            <div class="row mb-4">
                <div class="col-12">
                    <!-- <h3 class="text-dark">My Tickets</h3>
                    <p class="text-muted">Submit requests for assets you need to perform your tasks effectively. You can
                        also track the status of your submitted requests below.</p> -->
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-send-check card-icon text-primary"></i>
                            <div>
                                <h6 class="card-title">Total Ticket</h6>
                                <p class="card-value" id="totalTickets">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle card-icon text-success"></i>
                            <div>
                                <h6 class="card-title">Solved Ticket</h6>
                                <p class="card-value" id="solvedTickets">Loading...</p>
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
                                <p class="card-value" id="openTickets">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-x-circle card-icon text-danger"></i>
                            <div>
                                <h6 class="card-title">Closed Ticket</h6>
                                <p class="card-value" id="closedTickets">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row mb-4">
                    <div class="col-12">
                        <!-- <h3 class="text-dark">My Tickets</h3>
            <p class="text-muted">Track and manage your support tickets, or create a new ticket for any issue or request.</p> -->
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search"
                            onkeyup="searchTable()">
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
                            <tbody id="ticketTableBody">
                                <?php
                    include '../src/config/config.php';

                    $createdBy = $_SESSION['username'];
                    $sql = "SELECT ticketid, subject, description, category, status, assignedto, lastupdated FROM tickets WHERE createdby = ? ORDER BY ticketid DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('s', $createdBy);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ticketId = 'TCK' . str_pad($row['ticketid'], 3, '0', STR_PAD_LEFT);
                            $subject = htmlspecialchars($row['subject']);
                            $category = htmlspecialchars($row['category']);
                            $description = htmlspecialchars($row['description']);
                            $status = htmlspecialchars($row['status']);
                            $assignedTo = $row['assignedto'] ?? 'Not Assigned';
                            $lastUpdated = htmlspecialchars($row['lastupdated']);
                            $badgeClass = ($status === 'Open') ? 'bg-primary' : (($status === 'In Progress') ? 'bg-warning' : 'bg-secondary');

                            // Use <?= to output PHP variables in the HTML
                            echo "<tr>
                                <td>$ticketId</td>
                                <td>$subject</td>
                                <td>$category</td>
                                <td><span class='badge $badgeClass'>$status</span></td>
                                <td>$lastUpdated</td>
                                <td>
                                    <button class='btn btn-sm btn-info' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#viewTicketModal' 
                                        data-id='{$row['ticketid']}'
                                        data-subject='$subject'
                                        data-category='$category'
                                        data-description='$description'
                                        data-status='$status'
                                        data-assignedto='$assignedTo'
                                        data-lastupdated='$lastUpdated'>
                                        View
                                    </button>

                                    <button class='btn btn-sm btn-warning edit-btn' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#editTicketModal'
                                        data-id='{$row['ticketid']}'
                                        data-subject='$subject'
                                        data-category='$category'
                                        data-description='$description'
                                        data-status='$status'
                                        data-lastupdated='$lastUpdated'>
                                        Edit
                                    </button>

                            <button class='btn btn-sm btn-danger close-btn' data-id='{$row['ticketid']}'>Close</button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr>
                            <td colspan='6' class='text-center'>No records found</td>
                        </tr>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
                            </tbody>
                        </table>
                    </div>
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

        <div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="viewTicketModalLabel">View Ticket Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Title:</strong> <span id="viewTicketSubject"></span></p>
                        <p><strong>Category:</strong> <span id="viewTicketCategory"></span></p>
                        <p><strong>Description:</strong> <span id="viewTicketDescription"></span></p>
                        <p><strong>Status:</strong> <span id="viewTicketStatus"></span></p>
                        <p><strong>Last Updated:</strong> <span id="viewTicketLastUpdated"></span></p>
                        <p><strong>Assigned To:</strong> <span id="viewTicketAssignedTo"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editTicketModal" tabindex="-1" aria-labelledby="editTicketModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editTicketForm">
                            <input type="hidden" id="editTicketId" name="ticketId">
                            <div class="mb-3">
                                <label for="editTicketTitle" class="form-label">Ticket Title</label>
                                <input type="text" class="form-control" id="editTicketTitle" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="editTicketCategory" class="form-label">Category</label>
                                <select class="form-select" id="editTicketCategory" name="category" required>
                                    <option value="Technical Issue">Technical Issue</option>
                                    <option value="Request">Request</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editTicketDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editTicketDescription" name="description" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="createTicketModalLabel">Create New Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./queries/tickets/queries-tickets.php" method="POST" id="createTicketForm">
                            <div class="mb-3">
                                <label for="newTicketTitle" class="form-label">Ticket Title</label>
                                <input type="text" class="form-control" id="newTicketTitle" name="subject"
                                    placeholder="Enter the title of your issue" required>
                            </div>

                            <div class="mb-3">
                                <label for="newTicketDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="newTicketDescription" name="description" rows="4"
                                    placeholder="Provide details about the issue or request" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="newTicketCategory" class="form-label">Category</label>
                                <select class="form-select" id="newTicketCategory" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Technical Issue">Technical Issue</option>
                                    <option value="Request">Request</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="newTicketStatus" class="form-label">Status</label>
                                <select class="form-select" id="newTicketStatus" name="status" required disabled>
                                    <option value="Open" selected>Open</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="newTicketCreatedBy" class="form-label">Created By</label>
                                <input type="text" class="form-control" id="newTicketCreatedBy" name="createdBy"
                                    value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required readonly>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-orange">Submit Ticket</button>
                            </div>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });

        function fillUpdateForm(ticketID, title, category, status, description) {
            document.getElementById('updateTicketID').value = ticketID;
            document.getElementById('updateTicketTitle').value = title;
            document.getElementById('updateTicketCategory').value = category;
            document.getElementById('updateTicketDescription').value = description;
            document.getElementById('updateTicketStatus').value = status;
        }
        </script>
        <script>
        document.querySelector('#createTicketModal form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const url = this.action;

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();

                console.log(result);

                if (response.ok && result.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: result.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {

                        document.querySelector('#createTicketModal form').reset();
                        const modalElement = document.getElementById('createTicketModal');
                        const modalInstance = bootstrap.Modal.getInstance(modalElement);
                        modalInstance.hide();

                        const newRow = document.createElement('tr');
                        const ticketId = 'TCK' + String(result.data.TicketID).padStart(4, '0');
                        const subject = result.data.Subject || 'N/A';
                        const category = result.data.Category || 'N/A';
                        const status = result.data.Status || 'N/A';
                        const lastUpdated = result.data.LastUpdated ||
                            'N/A';

                        const badgeClass = status === 'Open' ? 'bg-primary' : status ===
                            'In Progress' ? 'bg-warning' : 'bg-secondary';

                        newRow.innerHTML = `
                        <td>${ticketId}</td>
                        <td>${subject}</td>
                        <td>${category}</td>
                        <td><span class='badge ${badgeClass}'>${status}</span></td>
                        <td>${lastUpdated}</td>
                        <td>
                            <button class='btn btn-sm btn-info' 
                                data-bs-toggle='modal' data-bs-target='#viewTicketModal'
                                data-id='${result.data.TicketID}'>View</button>
                            <button class='btn btn-sm btn-warning' 
                                data-bs-toggle='modal' data-bs-target='#editTicketModal'
                                data-id='${result.data.TicketID}'>Edit</button>
                            <button class='btn btn-sm btn-danger' data-id='${result.data.TicketID}'>Solve</button>
                        </td>
                    `;


                        const tableBody = document.getElementById('ticketTableBody');
                        tableBody.appendChild(newRow);
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: result.message || 'Something went wrong!',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
        </script>
        <script>
        document.querySelector('table tbody').addEventListener('click', function(event) {
            if (event.target.matches('button[data-bs-target="#viewTicketModal"]')) {
                const button = event.target;

                const ticketId = button.getAttribute('data-id');
                const subject = button.getAttribute('data-subject');
                const category = button.getAttribute('data-category');
                const description = button.getAttribute('data-description');
                const status = button.getAttribute('data-status');
                const lastUpdated = button.getAttribute('data-lastupdated');
                const assignedTo = button.getAttribute('data-assignedto') ||
                    'Not Assigned';

                document.getElementById('viewTicketSubject').textContent = subject;
                document.getElementById('viewTicketCategory').textContent = category;
                document.getElementById('viewTicketDescription').textContent = description;
                document.getElementById('viewTicketStatus').textContent = status;
                document.getElementById('viewTicketLastUpdated').textContent = lastUpdated;
                document.getElementById('viewTicketAssignedTo').textContent = assignedTo;
            }
        });
        </script>
        <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const tableBody = document.getElementById('ticketTableBody');
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let isMatch = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const cellContent = cells[j].textContent || cells[j].innerText;
                        if (cellContent.toLowerCase().indexOf(filter) > -1) {
                            isMatch = true;
                            break;
                        }
                    }
                }

                row.style.display = isMatch ? '' : 'none';
            }
        }
        </script>
        <script>
        function handleUpdateResponse(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonText: 'Okay'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message,
                    confirmButtonText: 'Okay'
                });
            }
        }

        $('#editTicketForm').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            fetch('./queries/tickets/queries-update-tickets.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => handleUpdateResponse(data))
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.',
                        confirmButtonText: 'Okay'
                    });
                });
        });
        </script>

        <script>
        $(document).on('click', '.edit-btn', function() {
            var ticketId = $(this).data('id');
            var title = $(this).data('subject');
            var category = $(this).data('category');
            var description = $(this).data('description');
            $('#editTicketId').val(ticketId);
            $('#editTicketTitle').val(title);
            $('#editTicketCategory').val(category);
            $('#editTicketDescription').val(description);
        });
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
                        text: 'Do you want to close this ticket?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, close it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('./queries/tickets/queries-close-ticket.php', {
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
                                            'Closed!',
                                            'The ticket has been closed.',
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
                                'The ticket was not closed.',
                                'info'
                            );
                        }
                    });
                });
            });
        });
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('./queries/tickets/queries-get_ticket_counts.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalTickets').textContent = data.totalTickets;
                    document.getElementById('solvedTickets').textContent = data.solvedTickets;
                    document.getElementById('openTickets').textContent = data.openTickets;
                    document.getElementById('closedTickets').textContent = data.closedTickets;
                })
                .catch(error => {
                    console.error('Error fetching ticket counts:', error);
                });
        });
        </script>
</body>

</html>