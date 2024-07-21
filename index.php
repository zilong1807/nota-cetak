<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Nota App</h1>
        <form action="generate_pdf.php" method="get">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="barangTable">
                    <!-- Baris-baris data barang akan ditambahkan melalui JavaScript -->
                </tbody>
            </table>
            <button type="button" onclick="tambahBaris()">Tambah Barang</button>
            <br><br>
            <button type="submit">Buat Nota</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
