<?php
include "koneksi.php";
// Include mPDF library
require_once 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'debug' => true,
    'mode' => 'c',
    'format' => 'A4',
    'default_font_size' => 10,
    'margin_left' => 15,
    'margin_right' => 15,
    'margin_top' => 16,
    'margin_bottom' => 16,
    'orientation' => 'P'
]);

// Fetch student data from database
$koneksi = mysqli_connect($server, $user, $password, $database);
$sql = "SELECT * FROM tmhs ORDER BY id_mhs DESC";
$result = mysqli_query($koneksi, $sql);

// Create HTML table
$html = '
    <html>
        <head>
            <title>Laporan Data Mahasiswa</title>
        </head>
        <body>
            <h3 style="text-align: center;">Laporan Data Mahasiswa</h3>
            <table border="1" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: center;">NIM</th>
                        <th style="text-align: center;">Nama Lengkap</th>
                        <th style="text-align: center;">Alamat</th>
                        <th style="text-align: center;">Prodi</th>
                    </tr>
                </thead>
                <tbody>';

// Fill table body with student data
while ($row = mysqli_fetch_array($result)) {
    $html .= '
        <tr>
            <td style="text-align: center;">' . $row['nim'] . '</td>
            <td>' . $row['nama'] . '</td>
            <td>' . $row['alamat'] . '</td>
            <td>' . $row['prodi'] . '</td>
        </tr>';
}

$html .= '
                </tbody>
            </table>
        </body>
    </html>';
ob_start();
ob_end_flush();

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output()
/*echo $html ;
// Generate PDF from HTML
$mpdf->WriteHTML($html);
// Output PDF
$mpdf->Output(); // Save to file
//$mpdf->Output('laporan.pdf', 'D'); // Paksa unduhan
// $mpdf->Output('laporan.pdf', 'I'); // Tampilkan di browser
//$mpdf->Output(); // Output to browser for download
*/
?>