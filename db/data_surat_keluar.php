<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pengajuan USING(id_user) INNER JOIN surat USING(kode_surat)");
while ($row = mysqli_fetch_assoc($tb_pengajuan)) :
    $id_pengajuan = $row['id_pengajuan'];
    $data_arsip =
        mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT arsip_surat.file_surat, arsip_surat.nomor_surat FROM arsip_surat INNER JOIN pengajuan USING(id_pengajuan) WHERE arsip_surat.id_pengajuan='$id_pengajuan'"));
    if ($row['status_pengajuan'] == 'Di Terima' and $data_arsip["file_surat"] != '') { ?>
        <tr>
            <td><?= $data_arsip["nomor_surat"] ?></td>
            <td><?= $row["nama_lengkap"] ?></td>
            <td><?= $row["kode_surat"] ?></td>
            <td><?= $row["jenis_surat"] ?></td>
            <td>
                <a href="../surat_keluar/<?= $data_arsip['file_surat'] ?>" class="btn btn-primary">
                    <i class="fas fa-download"></i> Download
                </a>
            </td>
        </tr>
<?php
    }
endwhile;
?>