<?php
include "../connect/koneksi.php";
$user = mysqli_query($koneksi, "SELECT * FROM user");

while ($row = mysqli_fetch_assoc($user)) :
    if ($row["role_user"] != 'Admin') { ?>
        <tr>
            <td><?= $row["username"] ?></td>
            <td><?= $row["nama_lengkap"] ?></td>
            <td><?= $row["tempat_lahir"] ?></td>
            <td><?= $row["tanggal_lahir"] ?></td>
            <td><?= $row["gender"] ?></td>
            <td><?= $row["agama"] ?></td>
            <td><?= $row["alamat"] ?></td>
            <td>
                <a href="../update/user.php?id_user=<?= $row["id_user"] ?>"><button type="button" class="btn btn-primary m-1">
                        <i class="fas fa-edit"></i> Edit</button></a>
                <a href="#" class="tombol-hapus" data-id="<?= $row["id_user"] ?>"><button type="button" class="btn btn-danger m-1">
                        <i class="fas fa-trash"></i> Hapus</button></a>
            </td>
        </tr>
    <?php } ?>
<?php
endwhile;
?>