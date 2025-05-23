<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .login-container { max-width: 350px; margin: 80px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; font-size: 16px; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <div id="message"></div>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required />
            <input type="password" id="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = '';
            messageDiv.className = '';
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ email, password })
                });
                const data = await response.json();
                if (response.ok) {
                    messageDiv.textContent = 'Login berhasil!';
                    messageDiv.className = 'success';
                    // Simpan token jika perlu: localStorage.setItem('token', data.token);
                } else {
                    messageDiv.textContent = data.message || 'Login gagal';
                    messageDiv.className = 'error';
                }
            } catch (err) {
                messageDiv.textContent = 'Terjadi kesalahan koneksi';
                messageDiv.className = 'error';
            }
        });
    </script>
</body>
</html>
