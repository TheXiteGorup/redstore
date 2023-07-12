<?php
session_start();

$host = "127.0.0.1";
$db_name = "redstore";
$db_user = "reds";
$db_password = "redstore";

// Create a connection
$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user inputs
function sanitizeInput($input) {
    // Remove leading/trailing white spaces
    $input = trim($input);
    // Escape special characters to prevent SQL injection
    $input = htmlspecialchars($input);
    // Additional sanitization or validation can be performed here if needed
    return $input;
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Registration form handling
        $username = sanitizeInput($_POST["username"]);
        $email = sanitizeInput($_POST["email"]);
        $password = sanitizeInput($_POST["password"]);

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the INSERT statement
        $sql = "INSERT INTO accounts (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful.";
        } else {
            $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - RedStore</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/79d5627f40.js" crossorigin="anonymous"></script>
    <style>
        .form-container form:not(.active) {
            display: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="account.php">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px;"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle();">
            </div>
        </div>
    </div>

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="window.location.href='login.php'">Login</span>
                            <span onclick="toggleForm('register')">Register</span>
                            <hr id="Indicator">
                        </div>

                        <form id="RegForm" method="post">
                            <input type="text" placeholder="Username" name="username">
                            <input type="email" placeholder="Email" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" name="register" class="btn">Register</button>
                            <?php if (isset($error)) : ?>
                                <p class="error"><?php echo $error; ?></p>
                            <?php endif; ?>
                        </form>
                        <?php if (isset($message)) : ?>
                            <p class="success"><?php echo $message; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function toggleForm(form) {
            if (form === "register") {
                RegForm.classList.add('active');
                Indicator.style.transform = "translateX(100px)";
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
            }
        }
    </script>
</body>

</html>
