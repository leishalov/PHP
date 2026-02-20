<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg-shape bg-shape-1" aria-hidden="true"></div>
    <div class="bg-shape bg-shape-2" aria-hidden="true"></div>

    <main class="page">
        <section class="card" aria-labelledby="register-title">
            <p class="eyebrow">Account Setup</p>
            <h1 id="register-title">Create your account</h1>
            <p class="subtitle">Start using your dashboard with secure login and profile details.</p>

            <?php if (isset($_GET['error'])): ?>
                <p class="message error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <p class="message success">Registration successful. You can now log in.</p>
            <?php endif; ?>

            <form class="form" action="register_process.php" method="POST" novalidate>
                <div class="grid two">
                    <label for="full_name">
                        Full name
                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            placeholder="e.g., Alex Morgan"
                            autocomplete="name"
                            required
                        >
                    </label>

                    <label for="username">
                        Username
                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="alex_morgan"
                            autocomplete="username"
                            minlength="3"
                            maxlength="30"
                            pattern="[A-Za-z0-9_]{3,30}"
                            required
                        >
                    </label>
                </div>

                <label for="email">
                    Email address
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@company.com"
                        autocomplete="email"
                        required
                    >
                </label>

                <div class="grid two">
                    <label for="password">
                        Password
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="At least 8 characters"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >
                    </label>

                    <label for="confirm_password">
                        Confirm password
                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            placeholder="Repeat your password"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >
                    </label>
                </div>

                <p class="field-note">Use at least 8 characters with uppercase, lowercase, and a number.</p>

                <label class="check" for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    I agree to the terms and privacy policy.
                </label>

                <button type="submit">Create account</button>
            </form>
        </section>
    </main>
</body>
</html>
</body>
</html>