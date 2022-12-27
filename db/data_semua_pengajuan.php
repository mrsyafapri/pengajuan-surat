<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");
while ($row = mysqli_fetch_assoc($tb_pengajuan)) : ?>
    <tr>
        <td><?= $row["nama_lengkap"] ?></td>
        <td><?= $row["kode_surat"] ?></td>
        <td><?= $row["jenis_surat"] ?></td>
        <td><?= $row["tgl_pengajuan"] ?></td>
        <td><?= $row["keperluan"] ?></td>
        <td>
            <?php if ($row["status_pengajuan"] == "Di Terima" or $row["status_pengajuan"] == "Revisi Di Terima" or $row["status_pengajuan"] == "Revisi Selesai") { ?>
                <span class="badge badge-success"><?= $row["status_pengajuan"] ?></span>
            <?php } elseif ($row["status_pengajuan"] == "Di Tolak") { ?>
                <span class="badge badge-danger"><?= $row["status_pengajuan"] ?></span>
            <?php } else if ($row["status_pengajuan"] == "Menunggu") { ?>
                <span class="badge badge-warning"><?= $row["status_pengajuan"] ?></span>
            <?php } ?>
        </td>
    </tr>
<?php
endwhile;
?>