<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#contact');
    exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? 'General Enquiry'));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || ($email === '' && $phone === '') || $message === '') {
    $_SESSION['contact_flash'] = ['type' => 'danger', 'message' => 'Please fill all required fields.'];
    header('Location: /#contact');
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['contact_flash'] = ['type' => 'danger', 'message' => 'Please enter a valid email address.'];
    header('Location: /#contact');
    exit;
}

try {
    executeQuery(
        'INSERT INTO contact_enquiries (full_name, mobile, email, subject, message, ip_address, status, is_read) VALUES (:full_name, :mobile, :email, :subject, :message, :ip_address, :status, :is_read)',
        [
            'full_name' => $name,
            'mobile' => $phone,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
            'status' => 'New',
            'is_read' => 0,
        ]
    );

    $_SESSION['contact_flash'] = ['type' => 'success', 'message' => 'Thanks! Your enquiry has been submitted.'];
} catch (Throwable $e) {
    $_SESSION['contact_flash'] = ['type' => 'danger', 'message' => 'Unable to submit your enquiry right now.'];
}

header('Location: /#contact');
exit;
