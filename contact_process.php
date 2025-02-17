<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input Sanitization
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $message = trim(htmlspecialchars($_POST['message']));

    // Simple Validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill in all fields!'); window.location.href='contact.html';</script>";
        exit();
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href='contact.html';</script>";
        exit();
    }

    // Prepare Content
    $file = 'messages.txt';
    $timestamp = date('Y-m-d H:i:s');
    $content = "Time: $timestamp\nName: $name\nEmail: $email\nMessage: $message\n-----------------------\n";

    // Save to File
    if (file_put_contents($file, $content, FILE_APPEND | LOCK_EX)) {
        echo "<script>alert('✅ Message sent successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('❌ Failed to send message. Please try again later.'); window.location.href='contact.html';</script>";
    }
} else {
    // Invalid Request Handling
    echo "<h3>🚫 Invalid request!</h3>";
}
?>
