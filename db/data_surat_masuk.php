<?php
include "../connect/koneksi.php";
$surat_masuk = mysqli_query($koneksi, "SELECT surat_masuk.nomor_surat, surat_masuk.jenis_surat, surat_masuk.tgl_surat_masuk, surat_masuk.file_surat FROM surat_masuk");
while ($row = mysqli_fetch_assoc($surat_masuk)) : ?>
    <tr>
        <td><?= $row["nomor_surat"] ?></td>
        <td><?= $row["jenis_surat"] ?></td>
        <td><?= $row["tgl_surat_masuk"] ?></td>
        <td>
            <a href="../surat_masuk/<?= $row['file_surat'] ?>" class="btn btn-primary">
                <i class="fas fa-download"></i> Download
            </a>
        </td>
    </tr>
<?php
endwhile;
?>