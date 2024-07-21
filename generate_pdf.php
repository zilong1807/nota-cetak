<?php
require_once('tcpdf/tcpdf.php');

// Data dari form
$nama_barang = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$jumlah = $_POST['jumlah'];

// Buat objek TCPDF
$pdf = new TCPDF('P', 'mm', array(176, 250), true, 'UTF-8', false);

// Atur informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nota App');
$pdf->SetTitle('Nota Pembelian');
$pdf->SetSubject('Nota Pembelian');
$pdf->SetKeywords('Nota, PDF, PHP, JavaScript');

// Atur margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Tambah halaman
$pdf->AddPage();

// Tambah teks tanggal di atas tabel total
// Tambah judul nota pembelian
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Nota', 0, 1, 'C'); // Judul nota pembelian

// Tambah teks tanggal di bawah judul nota pembelian
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Tanggal: ' . date('d/m/Y'), 0, 1, 'C'); // Teks tanggal

// Tambah konten tabel ke PDF
$html = '
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th width="10%" style="text-align: center;">No</th>
            <th width="40%">Nama Barang</th>
            <th width="10%" style="text-align: center;">Qty</th>
            <th width="15%" style="text-align: center;">Sat</th>
            <th width="25%" style="text-align: center;">Total</th>
        </tr>
    </thead>
    <tbody>
';

$totalSemua = 0;

for ($i = 0; $i < count($nama_barang); $i++) {
    $nomor = $i + 1;
    $total_harga = $satuan[$i] * $jumlah[$i];
    $totalSemua += $total_harga;

    $html .= '
    <tr>
        <td width="10%" style="text-align: center;">' . $nomor . '</td>
        <td width="40%">' . htmlspecialchars($nama_barang[$i]) . '</td>
        <td width="10%" style="text-align: center;">' . $jumlah[$i] . '</td>
        <td width="15%" style="text-align: right;">' . $satuan[$i] . '</td>
        <td width="25%" style="text-align: right;">' . number_format($total_harga, 0, ',', '.') . '</td>
    </tr>';
}

$html .= '
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total Pembelian:</strong></td>
            <td style="text-align: right;">Rp ' . number_format($totalSemua, 0, ',', '.') . '</td>
        </tr>
    </tfoot>
</table>
';

// Tambahkan tabel dan teks ke konten PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Outputkan PDF sebagai response
$pdf->Output('nota_pembelian.pdf', 'I');
?>
