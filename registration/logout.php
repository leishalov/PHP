<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <meta http-equiv="refresh" content="2;url=login.php">
    <style>
        :root {
            --bg: #f3efe8;
            --panel: #fffefb;
            --text: #23201b;
            --muted: #6d665a;
            --border: #dfd5c6;
            --accent: #0f766e;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(140deg, #faf6ef, var(--bg));
            color: var(--text);
        }

        .card {
            width: min(100%, 420px);
            text-align: center;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 12px 30px rgba(35, 32, 25, 0.1);
        }

        h2 {
            margin: 0 0 10px;
            font-size: 24px;
        }

        p {
            margin: 0 0 18px;
            color: var(--muted);
        }

        a {
            display: inline-block;
            text-decoration: none;
            background: var(--accent);
            color: #fff;
            border-radius: 10px;
            padding: 10px 16px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <main class="card">
        <h2>You are logged out</h2>
        <p>Your session has ended. Redirecting to login page...</p>
        <a href="login.php">Go to Login Now</a>
    </main>
</body>
</html>
