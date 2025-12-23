<?php

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Fetch values
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'] ?? "";
    $course = $_POST['course'] ?? [];
    $country = $_POST['country'];

    $errors = [];

    // Name validation
    if (empty($fullname)) {
        $errors[] = "Name is required";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    // Confirm password
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // Gender validation
    if (empty($gender)) {
        $errors[] = "Please select gender";
    }

    // Course validation
    if (empty($course)) {
        $errors[] = "Please select at least one course";
    }

    // Country validation
    if (empty($country)) {
        $errors[] = "Please select country";
    }

    // Display result
    if (!empty($errors)) {
        echo "<h3>Form Errors:</h3>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        echo "<h3>Registration Successful</h3>";
        echo "Name: $fullname <br>";
        echo "Email: $email <br>";
        echo "Username: $username <br>";
        echo "Gender: $gender <br>";
        echo "Country: $country <br>";
        echo "Courses: " . implode(", ", $course);
    }
}
?>