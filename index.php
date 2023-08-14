<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bracubackground.jpg'); /* Replace with the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 100px; /* Adjust the width as needed */
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-container button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            border-radius: 3px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="bracu_logo1.png" alt="Logo"> <!-- Replace with the path to your logo image -->
        </div>
        <h2>Login</h2>
        <form action="signin.php"  method="post">
            <label for="userType">User Type</label>
            <select id="userType" name="userType">
                <option value="member">member</option>
                <option value="oca">OCA</option>
                <option value="department">Department</option>
            </select>

            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="pin">PIN</label>
            <input type="password" id="pin" name="pin" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
