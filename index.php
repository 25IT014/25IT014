<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Student Registration</h2>

    <form method="POST" action="process.php">

        <label>Name:</label><br>
        <input type="text" name="name" required>

        <label>Email:</label><br>
        <input type="email" name="email" required>

        <label>Mobile:</label><br>
        <input type="text" name="mobile" required>

        <label>Course:</label><br>
        <select name="course" required>
            <option value="">Select Course</option>
            <option value="BCA">BCA</option>
            <option value="B.Tech">B.Tech</option>
            <option value="MCA">MCA</option>
            <option value="M.Tech">M.Tech</option>
        </select>

        <input type="submit" value="Register">

    </form>

</div>

</body>
</html>