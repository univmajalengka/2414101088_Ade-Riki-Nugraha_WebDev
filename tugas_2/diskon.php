<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon Toko</title>
    <style>
        /* Reset & Base Style */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Container Card */
        .container {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4a5568;
            font-size: 1.5rem;
        }

        /* Form Style */
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #718096;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
        }
        button:hover {
            background: #5a67d8;
            transform: translateY(-2px);
        }

        /* Result Section */
        .result-box {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px dashed #edf2f7;
        }
        .line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
        }
        .line.total {
            margin-top: 1rem;
            font-size: 1.2rem;
            font-weight: 800;
            color: #2d3748;
        }
        .discount { color: #e53e3e; }
        .grand-total { color: #38a169; }
    </style>
</head>
<body>

<div class="container">
    <h2>Kasir Pintar</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="totalBelanja">Masukkan Total Belanja (Rp)</label>
            <input type="number" name="totalBelanja" id="totalBelanja" placeholder="Contoh: 150000" required>
        </div>
        <button type="submit" name="hitung">Hitung Total</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $totalBelanja = $_POST['totalBelanja'];
        
        function hitungDiskon($total) {
            if ($total >= 100000) return 0.1 * $total;
            if ($total >= 50000) return 0.05 * $total;
            return 0;
        }

        $diskon = hitungDiskon($totalBelanja);
        $totalBayar = $totalBelanja - $diskon;
        
        echo "
        <div class='result-box'>
            <div class='line'>
                <span>Belanja:</span>
                <span>Rp " . number_format($totalBelanja, 0, ',', '.') . "</span>
            </div>
            <div class='line discount'>
                <span>Diskon:</span>
                <span>- Rp " . number_format($diskon, 0, ',', '.') . "</span>
            </div>
            <div class='line total'>
                <span>Total Bayar:</span>
                <span class='grand-total'>Rp " . number_format($totalBayar, 0, ',', '.') . "</span>
            </div>
        </div>";
    }
    ?>
</div>

</body>
</html>