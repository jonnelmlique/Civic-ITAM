<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Manage Users</title>
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
                    <i class="bi bi-exclamation-triangle active"></i> Overdue
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
                <a href="./users.php" class="nav-link text-white active">
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
                <a class="navbar-brand ms-3" href="#">User Management</a>
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
                    <!-- <h3 class="text-dark">User Management</h3>
                    <p class="text-muted">Manage users within the system. You can add new users, update their
                        information, or remove them from the system.</p> -->
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 total-users">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-person-badge card-icon text-primary me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Total Users</h6>
                                <p class="card-value mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 activated-users">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-person-plus card-icon text-success me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Activated Users</h6>
                                <p class="card-value mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 deactivated-users">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-person-x card-icon text-warning me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Deactivated Users</h6>
                                <p class="card-value mb-0">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 admin-users">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-shield-lock card-icon text-danger me-3"></i>
                            <div>
                                <h6 class="card-title mb-1">Admin Users</h6>
                                <p class="card-value mb-0">5</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search"
                            onkeyup="searchTable()">
                    </div>

                    <table class="table table-hover table-striped shadow-sm">
                        <thead class="bg-orange text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                include '../src/config/config.php';

                $sql = "SELECT id, first_name, last_name, username, email, contactnumber, department, role, status FROM employees";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $userId = 'EMP' . str_pad($row['id'], 3, '0', STR_PAD_LEFT); 
                        $fullName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                        $email = htmlspecialchars($row['email']);
                        $role = htmlspecialchars($row['role']);  
                        if ($role == 'admin') {
                            $formattedRole = 'Admin';
                        } elseif ($role == 'itstaff') {
                            $formattedRole = 'IT Staff';
                        } elseif ($role == 'employee') {
                            $formattedRole = 'Employee';
                        } else {
                            $formattedRole = $role; 
                        }
                        $status = htmlspecialchars($row['status']);
                        $badgeClass = ($status === 'Activated') ? 'bg-success' : 'bg-danger';

                        echo "<tr>
                            <td>$userId</td>
                            <td>$fullName</td>
                            <td>$email</td>
                            <td>$formattedRole</td>
                            <td><span class='badge $badgeClass'>$status</span></td>
                            <td>
                                <button class='btn btn-sm btn-info' 
                                    data-bs-toggle='modal' data-bs-target='#viewUserModal' 
                                    data-id='{$row['id']}'
                                    data-firstname='{$row['first_name']}'
                                    data-lastname='{$row['last_name']}'
                                    data-username='{$row['username']}'
                                    data-email='{$row['email']}'
                                    data-contactnumber='{$row['contactnumber']}'
                                    data-department='{$row['department']}'
                                     data-role='{$formattedRole}'
                                    data-status='{$row['status']}'>View</button>
                                          <button class='btn btn-sm btn-warning edit-btn' 
                                        data-bs-toggle='modal' data-bs-target='#editUserModal'
                                        data-id='{$row['id']}'
                                        data-firstname='{$row['first_name']}'
                                        data-lastname='{$row['last_name']}'
                                        data-username='{$row['username']}'
                                        data-email='{$row['email']}'
                                        data-contactnumber='{$row['contactnumber']}'
                                        data-department='{$row['department']}'
                                        data-role='{$row['role']}'
                                          data-status='{$row['status']}'>Edit</button>
                                     <button class='btn btn-sm btn-danger delete-btn' data-id='{$row['id']}'>Delete</button>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }

                $conn->close();
                ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-lg"></i> Add New User
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./queries-user/query_manageuser.php" method="post">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contactNumber" required
                                            pattern="^\d{11}$" maxlength="11"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" name="department" required>
                            <option value="Admin">Admin</option>
                                            <option value="CSD">CSD</option>
                                            <option value="IT Support">IT Support</option>
                                            <option value="Infrastructure">Infrastructure</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" name="role" required>
                                            <option value="admin">Admin</option>
                                            <option value="itstaff">IT Staff</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" required>
                                            <option value="Activated">Activated</option>
                                            <option value="Deactivated">Deactivated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- View User Modal -->
        <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewUserModalLabel">View User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="viewFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="viewFirstName" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="viewLastName" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="viewUsername" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="viewEmail" readonly>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="viewContactNumber" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="viewContactNumber" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewDepartment" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="viewDepartment" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewRole" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="viewRole" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="viewStatus" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="viewStatus" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./queries-user/query_updateuser.php" method="post">
                            <!-- Hidden input for user ID -->
                            <input type="hidden" name="id" id="editUserId">

                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="editFirstName" name="first_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="editLastName" name="last_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="editUsername" name="username"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="editEmail" name="email" required>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editContactNumber" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="editContactNumber"
                                            name="contact_number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editDepartment" class="form-label">Department</label>
                                        <select class="form-select" id="editDepartment" name="department" required>
                                        <option value="Admin">Admin</option>
                                            <option value="CSD">CSD</option>
                                            <option value="IT Support">IT Support</option>
                                            <option value="Infrastructure">Infrastructure</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editRole" class="form-label">Role</label>
                                        <select class="form-select" id="editRole" name="role" required>
                                            <option value="admin">Admin</option>
                                            <option value="itstaff">IT Staff</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editStatus" class="form-label">Status</label>
                                        <select class="form-select" id="editStatus" name="status" required>
                                            <option value="Activated">Activated</option>
                                            <option value="Deactivated">Deactivated</option>
                                        </select>
                                    </div>
                                </div>
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
        document.querySelector('#addUserModal form').addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const url = this.action;

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: result.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        document.querySelector('#addUserModal form').reset();
                        const modalElement = document.getElementById('addUserModal');
                        const modalInstance = bootstrap.Modal.getInstance(modalElement);
                        modalInstance.hide();

                        const newRow = document.createElement('tr');
                        const userId = 'EMP' + String(result.data.id).padStart(3,
                            '0');
                        const fullName = result.data.first_name + ' ' + result.data.last_name;
                        const email = result.data.email;
                        let role = result.data.role;
                        if (role === 'admin') {
                            role = 'Admin';
                        } else if (role === 'itstaff') {
                            role = 'IT Staff';
                        } else if (role === 'employee') {
                            role = 'Employee';
                        }  const status = result.data.status;
                        const badgeClass = status === 'Activated' ? 'bg-success' : 'bg-danger';

                        newRow.innerHTML = `
                    <td>${userId}</td>
                    <td>${fullName}</td>
                    <td>${email}</td>
                    <td>${role}</td>
                    <td><span class='badge ${badgeClass}'>${status}</span></td>
                    <td>
                        <button class='btn btn-sm btn-info view-btn' 
                            data-bs-toggle='modal' data-bs-target='#viewUserModal' 
                            data-id='${result.data.id}'
                            data-firstname='${result.data.first_name}'
                            data-lastname='${result.data.last_name}'
                            data-username='${result.data.username}'
                            data-email='${result.data.email}'
                            data-contactnumber='${result.data.contactnumber}'
                            data-department='${result.data.department}'
                            data-role='${result.data.role}'
                            data-status='${result.data.status}'>View</button>
                        <button class='btn btn-sm btn-warning edit-btn' 
                            data-bs-toggle='modal' data-bs-target='#editUserModal'
                            data-id='${result.data.id}'
                            data-firstname='${result.data.first_name}'
                            data-lastname='${result.data.last_name}'
                            data-username='${result.data.username}'
                            data-email='${result.data.email}'
                            data-contactnumber='${result.data.contactnumber}'
                            data-department='${result.data.department}'
                            data-role='${result.data.role}'
                            data-status='${result.data.status}'>Edit</button>
                        <button class='btn btn-sm btn-danger delete-btn' data-id='${result.data.id}'>Delete</button>
                    </td>
                `;

                        const tableBody = document.querySelector('table tbody');
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
        </script>
        <script>
        document.querySelector('table tbody').addEventListener('click', function(event) {
            if (event.target.matches('button[data-bs-target="#viewUserModal"]')) {
                const button = event.target;
                const userId = button.getAttribute('data-id');
                const firstName = button.getAttribute('data-firstname');
                const lastName = button.getAttribute('data-lastname');
                const username = button.getAttribute('data-username');
                const email = button.getAttribute('data-email');
                const contactNumber = button.getAttribute('data-contactnumber');
                const department = button.getAttribute('data-department');
                const role = button.getAttribute('data-role');
                const status = button.getAttribute('data-status');

                document.getElementById('viewFirstName').value = firstName;
                document.getElementById('viewLastName').value = lastName;
                document.getElementById('viewUsername').value = username;
                document.getElementById('viewEmail').value = email;
                document.getElementById('viewContactNumber').value = contactNumber;
                document.getElementById('viewDepartment').value = department;
                document.getElementById('viewRole').value = role;
                document.getElementById('viewStatus').value = status;
            }
        });
        </script>
        <script>
        $(document).on('click', '.edit-btn', function() {
            var userId = $(this).data('id');
            var firstName = $(this).data('firstname');
            var lastName = $(this).data('lastname');
            var username = $(this).data('username');
            var email = $(this).data('email');
            var contactNumber = $(this).data('contactnumber');
            var department = $(this).data('department');
            var role = $(this).data('role');
            var status = $(this).data('status');

            $('#editUserId').val(userId);
            $('#editFirstName').val(firstName);
            $('#editLastName').val(lastName);
            $('#editUsername').val(username);
            $('#editEmail').val(email);
            $('#editContactNumber').val(contactNumber);
            $('#editDepartment').val(department);
            $('#editRole').val(role); 
            $('#editStatus').val(status);
        });
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

        document.querySelector('#editUserModal form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch('./queries-user/query_updateuser.php', {
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
        document.querySelector('table tbody').addEventListener('click', function(event) {
            if (event.target.matches('.delete-btn')) {
                const userId = event.target.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('./queries-user/query_deleteuser.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    id: userId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: data.message,
                                        confirmButtonText: 'Okay'
                                    }).then(() => {
                                        document.querySelector(
                                                `button[data-id="${userId}"]`)
                                            .closest('tr').remove();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: data.message,
                                        confirmButtonText: 'Okay'
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while deleting the user.',
                                    confirmButtonText: 'Okay'
                                });
                            });
                    }
                });
            }
        });
        </script>
        <script>
        function updateUserCounts() {
            fetch('./queries-user/query_countuser.php')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.total-users .card-value').textContent = data.totalUsers;

                    document.querySelector('.activated-users .card-value').textContent = data.activatedUsers;

                    document.querySelector('.deactivated-users .card-value').textContent = data
                        .deactivatedUsers;

                    document.querySelector('.admin-users .card-value').textContent = data.adminUsers;
                })
                .catch(error => {
                    console.error('Error fetching user counts:', error);
                });
        }

        updateUserCounts();

        setInterval(updateUserCounts, 1000);
        </script>
        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
        </script>
</body>

</html>