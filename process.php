<?php

// Check whether form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $mobile = $_POST["mobile"] ?? "";
    $course = $_POST["course"] ?? "";

    // Remove unnecessary spaces
    $name = trim($name);
    $email = trim($email);
    $mobile = trim($mobile);
    $course = trim($course);

    // Sanitize input
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $mobile = htmlspecialchars($mobile);
    $course = htmlspecialchars($course);

    // Validation
    $errors = [];

    if ($name == "") {
        $errors[] = "Name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }

    if ($mobile == "") {
        $errors[] = "Mobile number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $errors[] = "Mobile number must contain exactly 10 digits.";
    }

    if ($course == "") {
        $errors[] = "Please select a course.";
    }

    // Display errors
    if (!empty($errors)) {

        echo "<h2>Registration Failed</h2>";

        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }

        echo "<br>";
        echo "<a href='index.php'>Go Back</a>";

    } else {

        // CSV file
        $file = "registrations.csv";

        // Create file and add header if file does not exist
        if (!file_exists($file)) {

            $handle = fopen($file, "w");

            fputcsv($handle, [
                "Name",
                "Email",
                "Mobile",
                "Course"
            ]);

            fclose($handle);
        }

        // Open CSV file in append mode
        $handle = fopen($file, "a");

        // Store student record
        fputcsv($handle, [
            $name,
            $email,
            $mobile,
            $course
        ]);

        fclose($handle);

        // Success message
        echo "<h2>Registration Successful!</h2>";

        echo "<p>Your registration has been submitted successfully.</p>";

        echo "<p><b>Name:</b> " . $name . "</p>";
        echo "<p><b>Email:</b> " . $email . "</p>";
        echo "<p><b>Mobile:</b> " . $mobile . "</p>";
        echo "<p><b>Course:</b> " . $course . "</p>";

        echo "<br>";

        echo "<a href='index.php'>Register Another Student</a>";
        echo "<br><br>";
        echo "<a href='record.php'>View Registered Students</a>";
    }

} else {

    echo "<h2>Invalid Request</h2>";
    echo "<p>Please submit the registration form.</p>";
    echo "<a href='index.php'>Go to Registration Form</a>";

}

?>