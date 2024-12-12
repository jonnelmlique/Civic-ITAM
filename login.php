<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIVIC | IT Asset Management</title>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body>
<video id="background-video" autoplay loop muted>
        <source src="./public/css/civic.webm" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4">
            <div class="form-wrapper">
                <div class="logowrap">
                    <img src="./images/civicph_logo.png" alt="Logo" class="logo">
                </div>
                <div class="form-container">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-orange w-100">Login</button>
                    </form>
                </div>
            </div>
            <p class="text-center mt-3">
                <small>© 2024 Civic Merchandising</small>
            </p>
        </div>
    </div>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#loginForm").submit(function(e) {
            e.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                url: './queries-account/login.php',
                method: 'POST',
                data: {
                    email: email,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            if (response.role === 'admin') {
                                window.location.href = './superadmin/dashboard.php';
                            } else if (response.role === 'itstaff') {
                                window.location.href = './admin/dashboard.php';
                            } else if (response.role === 'employee') {
                                window.location.href = './staff/dashboard.php';
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Invalid role detected.'
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'An error occurred. Please try again later.'
                    });
                }
            });
        });
    });
    </script>

</body>

</html>