<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #e7a432;
            --bg-accent: #e6623a;
            --card: #eb8958;
            --text: #23201b;
            --muted: #6b6458;
            --primary: #0f766e;
            --primary-hover: #0b5d57;
            --ring: rgba(15, 118, 110, 0.35);
            --border: #dfd5c6;
            --shadow: 0 18px 40px rgba(38, 33, 24, 0.12);
            --radius: 18px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: "Manrope", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 20% 20%, #fff8ec 0%, rgba(255, 248, 236, 0) 45%),
                radial-gradient(circle at 85% 10%, #d8eee5 0%, rgba(216, 238, 229, 0) 35%),
                linear-gradient(145deg, var(--bg), var(--bg-accent));
        }

        .register-card {
            width: min(100%, 440px);
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-head {
            padding: 28px 28px 14px;
        }

        .badge {
            display: inline-block;
            margin-bottom: 10px;
            padding: 6px 10px;
            border-radius: 999px;
            background: #e5f4f1;
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        h2 {
            margin: 0 0 8px;
            font-size: 26px;
            line-height: 1.2;
        }

        .subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        form {
            padding: 10px 28px 28px;
        }

        .field {
            margin-bottom: 16px;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text);
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 15px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--ring);
        }

        button {
            width: 100%;
            border: none;
            border-radius: 12px;
            background: var(--primary);
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            padding: 12px 14px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.08s ease;
        }

        button:hover {
            background: var(--primary-hover);
        }

        button:active {
            transform: translateY(1px);
        }

        .hint {
            margin-top: 14px;
            font-size: 13px;
            color: var(--muted);
            text-align: center;
        }

        .hint a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .hint a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section class="register-card" aria-label="Registration form">
        <div class="card-head">
            <span class="badge">CONSERVO</span>
            <h2>Create your profile</h2>
            <p class="subtitle">Join in</p>
        </div>

        <form action="register_process.php" method="POST">
            <div class="field">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" autocomplete="username" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" autocomplete="email" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" autocomplete="new-password" required>
            </div>

            <button type="submit">Register</button>
            <p class="hint">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </section>
</body>
</html>
