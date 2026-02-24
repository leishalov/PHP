<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit;
}

$username = trim($_POST["username"] ?? "");
$email = trim($_POST["email"] ?? "");
$passwordRaw = $_POST["password"] ?? "";

$message = "";
$actionLink = "register.php";
$actionText = "Back to Register";
$isSuccess = false;

if ($username === "" || $email === "" || $passwordRaw === "") {
    $message = "Please fill out all required fields.";
} else {
    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $message = "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $isSuccess = true;
            $message = "Registration successful.";
            $actionLink = "login.php";
            $actionText = "Go to Login";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <style>
        :root {
            --bg: #f4efe8;
            --panel: #fffefb;
            --text: #242019;
            --muted: #6f685c;
            --border: #e2d7c7;
            --ok: #0f766e;
            --error: #b42318;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background: linear-gradient(135deg, #f8f4ed 0%, var(--bg) 100%);
        }

        .card {
            width: min(100%, 460px);
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 26px;
            box-shadow: 0 12px 30px rgba(35, 32, 25, 0.1);
            text-align: center;
        }

        .status {
            font-size: 15px;
            font-weight: 700;
            color: <?php echo $isSuccess ? "var(--ok)" : "var(--error)"; ?>;
            margin-bottom: 10px;
        }

        h2 {
            margin: 0 0 10px;
            font-size: 25px;
        }

        p {
            margin: 0 0 20px;
            color: var(--muted);
            line-height: 1.45;
            word-break: break-word;
        }

        a {
            display: inline-block;
            text-decoration: none;
            font-weight: 700;
            color: #fff;
            background: <?php echo $isSuccess ? "var(--ok)" : "var(--error)"; ?>;
            padding: 11px 18px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <main class="card" aria-live="polite">
        <div class="status"><?php echo $isSuccess ? "Success" : "Notice"; ?></div>
        <h2>Registration Result</h2>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, "UTF-8"); ?></p>
        <a href="<?php echo htmlspecialchars($actionLink, ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($actionText, ENT_QUOTES, "UTF-8"); ?></a>
    </main>
</body>
</html>
