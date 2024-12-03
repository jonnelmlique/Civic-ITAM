<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | Add Asset Details</title>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="../../public/css/superadmin/sidebar.css">
    <link rel="stylesheet" href="../../public/css/superadmin/addassetdetails.css">

</head>

<body>

    <div id="sidebar">
        <div class="sidebar-header text-center">
            <img src="../../images/civicph_logo.png" alt="CIVIC" style="max-width: 30%; height: auto;">
        </div>
        <ul class="nav flex-column">
            <li><a href="../dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="../assetdetails.php" class="active"><i class="fas fa-cogs"></i> Asset Details</a></li>
            <li><a href="../pcassets.php"><i class="fas fa-desktop"></i> PC Assets</a></li>
            <li><a href="../status.php"><i class="fas fa-check-circle"></i> Status</a></li>
            <li><a href="../assetconsignment.php"><i class="fas fa-truck"></i> Consignment</a></li>
            <li><a href="../tickets.php"><i class="fas fa-ticket-alt"></i> Tickets</a></li>
            <li><a href="../reports.php"><i class="fas fa-file-alt"></i> Reports</a></li>
            <li><a href="../maintenance.php"><i class="fas fa-tools"></i> Maintenance Schedule</a></li>
            <li><a href="../diagnostichistory.php"><i class="fas fa-history"></i> Diagnostic History</a></li>
            <li><a href="../manageuser.php"><i class="fas fa-users"></i> Manage Users</a></li>

        </ul>

    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-orange" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand ms-3" href="#">Add Asset Details</a>
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
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">

            <div class="form-grid">
                <div class="form-group">
                    <label for="id">Id:</label>
                    <input type="text" id="id" class="input-field" placeholder="Enter Id">
                </div>
                <div class="form-group">
                    <label for="assetCode">Asset Code:</label>
                    <input type="text" id="assetCode" class="input-field" placeholder="Enter Asset Code">
                </div>
                <div class="form-group">
                    <label for="computerName">Computer Name:</label>
                    <input type="text" id="computerName" class="input-field" placeholder="Enter Computer Name">
                </div>
                <div class="form-group">
                    <label for="itemId">Item ID:</label>
                    <input type="text" id="itemId" class="input-field" placeholder="Enter Item ID">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" class="input-field" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="itemType">Item Type:</label>
                    <input type="text" id="itemType" class="input-field" placeholder="Enter Item Type">
                </div>
                <div class="form-group">
                    <label for="serialNumber">Serial Number:</label>
                    <input type="text" id="serialNumber" class="input-field" placeholder="Enter Serial Number">
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier:</label>
                    <input type="text" id="supplier" class="input-field" placeholder="Enter Supplier">
                </div>
                <div class="form-group">
                    <label for="purchaseDate">Purchase Date:</label>
                    <input type="date" id="purchaseDate" class="input-field">
                </div>
                <div class="form-group">
                    <label for="invoiceNumber">Invoice Number:</label>
                    <input type="text" id="invoiceNumber" class="input-field" placeholder="Enter Invoice Number">
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" id="amount" class="input-field" placeholder="Enter Amount">
                </div>
                <div class="form-group">
                    <label for="warranty">Warranty:</label>
                    <input type="text" id="warranty" class="input-field" placeholder="Enter Warranty">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" id="category" class="input-field" placeholder="Enter Category">
                </div>
                <div class="form-group">
                    <label for="createDate">Create Date:</label>
                    <input type="date" id="createDate" class="input-field">
                </div>
                <div class="form-group">
                    <label for="createdBy">Created By:</label>
                    <input type="text" id="createdBy" class="input-field" placeholder="Enter Creator">
                </div>
                <div class="form-group">
                    <label for="lastModifiedDate">Last Modified Date:</label>
                    <input type="date" id="lastModifiedDate" class="input-field">
                </div>
                <div class="form-group">
                    <label for="lastModifiedBy">Last Modified By:</label>
                    <input type="text" id="lastModifiedBy" class="input-field" placeholder="Enter Last Modifier">
                </div>
            </div>

            <div class="button-group">
                <button type="button" class="btn btn-update">Add</button>
                <button type="button" class="btn btn-cancel">Cancel</button>
            </div>
            </form>
        </div>
        <script>
        function toggleDropdown() {
            var menu = document.getElementById("dropdownMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
        </script>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
        </script>
</body>

</html>