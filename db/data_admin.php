<?php
include "../connect/koneksi.php";
$user = mysqli_query($koneksi, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($user)):
    if ($row["nik"] != 'admin') { ?>
    <tr>
        <td><?= $row["nik"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["rt"] ?></td>
        <td><?= $row["rt"] ?></td>
    </tr>
    <?php
    }
endwhile;
    ?>