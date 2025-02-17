<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = htmlspecialchars($_POST['name']);
    $userEmail = htmlspecialchars($_POST['email']);
    $userMessage = htmlspecialchars($_POST['message']);
    $memberName = htmlspecialchars($_POST['memberName']);
    $memberPosition = htmlspecialchars($_POST['memberPosition']);

    $file = 'team_messages.txt';
    $timestamp = date('Y-m-d H:i:s');
    $content = "Time: $timestamp\nTo: $memberName ($memberPosition)\nFrom: $userName\nEmail: $userEmail\nMessage: $userMessage\n-------------------------\n";

    if (file_put_contents($file, $content, FILE_APPEND)) {
        echo "<script>alert('Message sent successfully to $memberName!'); window.location.href='team.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.'); window.location.href='team.html';</script>";
    }
} else {
    echo "Invalid request!";
}
?>
