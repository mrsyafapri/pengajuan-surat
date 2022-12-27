<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");
while ($row = mysqli_fetch_assoc($tb_pengajuan)) :
    if ($row["status_pengajuan"] == "Menunggu") { ?>
        <tr>
            <td><?= $row["nama_lengkap"] ?></td>
            <td><?= $row["kode_surat"] ?></td>
            <td><?= $row["jenis_surat"] ?></td>
            <td><?= $row["tgl_pengajuan"] ?></td>
            <td><?= $row["keperluan"] ?></td>
            <td>
                <?php if ($row["jenis_pengajuan"] == "Baru") { ?>
                    <span class="badge badge-success"><?= $row["jenis_pengajuan"] ?></span>
                <?php } else if ($row["jenis_pengajuan"] == "Revisi") { ?>
                    <span class="badge badge-warning"><?= $row["jenis_pengajuan"] ?></span>
                <?php } ?>
            </td>
            <td>
                <a href="../data_input/data_surat.php?id_pengajuan=<?= $row['id_pengajuan'] ?>&kode_surat=<?= $row['kode_surat']; ?>" class="btn btn-success">
                    <i class="fas fa-eye"></i> Lihat
                </a>
            </td>
            <td>
                <a href="../update_data/terima_pengajuan.php?id_pengajuan=<?= $row["id_pengajuan"] ?>&kode_surat=<?= $row["kode_surat"] ?>&id_user=<?= $row["id_user"] ?>" class="btn btn-primary m-1">
                    <i class="fas fa-check"></i> Terima
                </a>
                <a href="../update_data/tolak_pengajuan.php?id_pengajuan=<?= $row["id_pengajuan"] ?>&kode_surat=<?= $row["kode_surat"] ?>&id_user=<?= $row["id_user"] ?>" class="btn btn-danger m-1">
                    <i class="fas fa-times"></i> Tolak
                </a>
            </td>
        </tr>
<?php
    }
endwhile;
?>