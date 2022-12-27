<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");
while ($row = mysqli_fetch_assoc($tb_pengajuan)) :
    $id_pengajuan = $row['id_pengajuan'];
    $data_arsip =
        mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT arsip_surat.file_surat, arsip_surat.nomor_surat FROM arsip_surat INNER JOIN pengajuan USING(id_pengajuan) WHERE arsip_surat.id_pengajuan='$id_pengajuan'"));
    if ($row['status_pengajuan'] == 'Di Terima' and $data_arsip["file_surat"] == '') { ?>
        <tr>
            <td><?= $row["nama_lengkap"] ?></td>
            <td><?= $row["kode_surat"] ?></td>
            <td><?= $row["jenis_surat"] ?></td>
            <td><?= $row["tgl_pengajuan"] ?></td>
            <td><?= $row["keperluan"] ?></td>
            <td><?= $data_arsip["nomor_surat"] ?></td>
            <td>
                <a href="../data_input/data_surat.php?id_pengajuan=<?= $row['id_pengajuan'] ?>&kode_surat=<?= $row['kode_surat']; ?>" class="btn btn-success">
                    <i class="fas fa-eye"></i> Lihat
                </a>
            </td>
            <td>
                <a href="../admin/upload.php?id_pengajuan=<?= $row["id_pengajuan"] ?>&jenis_surat=<?= $row['jenis_surat'] ?>&nama=<?= $row["nama_lengkap"] ?>&kode_surat=<?= $row['kode_surat'] ?>" class="btn btn-primary">
                    <i class="fas fa-upload"></i> Upload
                </a>
            </td>
        </tr>
<?php
    }
endwhile;
?>