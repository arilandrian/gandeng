<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabung dengan GANDENG</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .choice-container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center; max-width: 600px; width: 90%; }
        h1 { margin-bottom: 20px; color: #333; }
        .choice-box { display: flex; flex-direction: column; gap: 20px; }
        .choice-button { display: flex; align-items: center; text-align: left; padding: 20px; border: 1px solid #ddd; border-radius: 8px; text-decoration: none; color: #333; transition: all 0.3s ease; }
        .choice-button:hover { background-color: #f9f9f9; border-color: #007bff; }
        .choice-button i { font-size: 2em; margin-right: 20px; color: #007bff; width: 40px; }
        .choice-button div h3 { margin: 0 0 5px 0; }
        .choice-button div p { margin: 0; font-size: 0.9em; color: #666; }
        .login-link { margin-top: 30px; }
        .login-link a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="choice-container">
        <h1>Gabung dengan GANDENG</h1>
        <p>Pilih peran Anda untuk memulai kolaborasi dan menciptakan dampak positif.</p>
        <div class="choice-box">
            <a href="{{ route('register.donatur.form') }}" class="choice-button">
                <i class="fas fa-hand-holding-heart"></i>
                <div>
                    <h3>Sebagai Donatur</h3>
                    <p>Dukung berbagai program sosial dan lihat dampak dari donasi Anda.</p>
                </div>
            </a>
            <a href="{{ route('register.komunitas.form') }}" class="choice-button">
                <i class="fas fa-users"></i>
                <div>
                    <h3>Sebagai Komunitas/Organisasi</h3>
                    <p>Buat program galang dana dan jangkau lebih banyak donatur.</p>
                </div>
            </a>
        </div>
        <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
    </div>
</body>
</html>