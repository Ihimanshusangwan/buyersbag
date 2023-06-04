<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../media/icon.png" type="image/icon type">
    <title>Buyer's bag</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin;>
    <link rel="stylesheet" href="adminStyle/login.css">
</head>

<body>
    <div class="root-container">
        <div class="login-container">

            <div id="details">
                <h1 id="heading">Admin Login</h1>
                <img src="../media/logo.png" alt="Buyer's Bag" id="logo">
            </div>
            <form action="../backend/adminverify.php" method="POST" id="login-form">
                <div class="username">
                    <label for="username" class="label">Username:</label>
                    <input type="text" name="username" placeholder="enter username" class="input-box" required>
                </div>
                <div class="pass">
                    <label for="username" class="label">Password:</label>
                    <input type="password" name="password" placeholder="enter password" class="input-box" required>
                </div>
                <button type="submit" name="submit" value="submit" id="login-btn" class="label">Login</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("logo").addEventListener("click", () => {
            window.location.assign("../index.php");
        });
    </script>
</body>

</html>