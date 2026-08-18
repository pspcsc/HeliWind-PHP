<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#contact');
    exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || ($email === '' && $phone === '') || $message === '') {
    $_SESSION['contact_flash'] = ['type' => 'danger', 'message' => 'Please fill all required fields.'];
    header('Location: /#contact');
    exit;
}

$_SESSION['contact_flash'] = ['type' => 'success', 'message' => 'Thanks! Your enquiry has been submitted.'];
header('Location: /#contact');
exit;
