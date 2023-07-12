<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RedStore</title>
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
                            <span onclick="window.location.href='account.php'">Register</span>
                            <span onclick="toggleForm('login')">Login</span>
                            <hr id="Indicator">
                        </div>

                        <form id="LoginForm" method="post" class="active">
                            <input type="text" placeholder="Username" name="username">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" name="login" class="btn">Login</button>
                            <?php if (isset($error)) : ?>
                                <p class="error"><?php echo $error; ?></p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var Indicator = document.getElementById("Indicator");

        function toggleForm(form) {
            if (form === "login") {
                LoginForm.classList.add('active');
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)"
            }
        }
    </script>
</body>

</html>
