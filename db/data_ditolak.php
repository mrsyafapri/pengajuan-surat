<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");
while ($row = mysqli_fetch_assoc($tb_pengajuan)) :
    if ($row["status_pengajuan"] == "Di Tolak") { ?>
        <tr>
            <td><?= $row["nama_lengkap"] ?></td>
            <td><?= $row["kode_surat"] ?></td>
            <td><?= $row["jenis_surat"] ?></td>
            <td><?= $row["tgl_pengajuan"] ?></td>
            <td><?= $row["keperluan"] ?></td>
        </tr>
<?php
    }
endwhile;
?>