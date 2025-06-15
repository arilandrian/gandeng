<?php

// File: config/payment.php

return [
    /*
    |--------------------------------------------------------------------------
    | Metode Pembayaran yang Tersedia
    |--------------------------------------------------------------------------
    |
    | Definisikan semua metode pembayaran yang diterima oleh aplikasi di sini.
    | Key (kiri) akan disimpan di database, dan Value (kanan) akan ditampilkan
    | kepada pengguna di formulir.
    |
    */

    'methods' => [
        'bca' => 'Transfer Bank - BCA',
        'bri' => 'Transfer Bank - BRI',
        'mandiri' => 'Transfer Bank - Mandiri',
        'gopay' => 'e-Wallet - GoPay',
        'ovo' => 'e-Wallet - OVO',
        'dana' => 'e-Wallet - DANA',
        // Jika ingin menambah, cukup tambahkan baris baru di sini
        // 'shopeepay' => 'e-Wallet - ShopeePay',
    ],

];