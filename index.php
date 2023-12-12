<?php

use Master\Menu;
use Master\data_bidang;
use Master\kegiatan;
use Master\user;

include 'autoload.php';
include 'Config/Database.php';

$menu = new Menu();
$data_bidang = new data_bidang($dataKoneksi);
$kegiatan = new kegiatan($dataKoneksi);
$user = new user($dataKoneksi);
// $mahasiswa->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="">CRUD OOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria- controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
foreach ($menu->topMenu() as $r) {
    ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                    <?php echo $r['Text']; ?>
                                </a>
                            </li>
                        <?php
}
?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
if (!isset($target) or $target == "home") {
    echo "Hai, Selamat Datang Di Beranda";
    // =========== start kontent data_bidang ======================
} elseif ($target == "data_bidang") {
    if ($act == "tambah_data_bidang") {
        echo $data_bidang->tambah();
    } elseif ($act == "simpan_data_bidang") {
        if ($data_bidang->simpan()) {
            echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=data_bidang';
                        </script>";
        } else {
            echo "<script>
                            alert('data gagal disimpan');
                            window.location.href='?target=data_bidang';
                        </script>";
        }
    } elseif ($act == "edit_data_bidang") {
        $id = $_GET['id'];
        echo $data_bidang->edit($id);
    } elseif ($act == "update_data_bidang") {
        if ($data_bidang->update()) {
            echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=data_bidang';
                        </script>";
        } else {
            echo "<script>
                            alert('data gagal diubah');
                            window.location.href='?target=data_bidang';
                        </script>";
        }
    } elseif ($act == "delete_data_bidang") {
        $id = $_GET['id'];
        if ($data_bidang->delete($id)) {
            echo "<script>
                            alert('data sukses dihapus');
                            window.location.href='?target=data_bidang';
                        </script>";
        } else {
            echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=data_bidang';
                    </script>";
        }
    } else {
        echo $data_bidang->index();
    }

    // kegiatan
} elseif ($target == "kegiatan") {
    if ($act == "tambah_kegiatan") {
        echo $kegiatan->tambah();
    } elseif ($act == "simpan_kegiatan") {
        if ($kegiatan->simpan()) {
            echo "<script>
                        alert('data sukses disimpan');
                        window.location.href='?target=kegiatan';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=kegiatan';
                    </script>";
        }
    } elseif ($act == "edit_kegiatan") {
        $id = $_GET['id'];
        echo $kegiatan->edit($id);
    } elseif ($act == "update_kegiatan") {
        if ($kegiatan->update()) {
            echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=kegiatan';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=kegiatan';
                    </script>";
        }
    } elseif ($act == "delete_kegiatan") {
        $id = $_GET['id'];
        if ($kegiatan->delete($id)) {
            echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=kegiatan';
                    </script>";
        } else {
            echo "<script>
                    alert('data gagal dihapus');
                    window.location.href='?target=kegiatan';
                </script>";
        }
    } else {
        echo $kegiatan->index();
    }

    // user
} elseif ($target == "user") {
    if ($act == "tambah_user") {
        echo $user->tambah();
    } elseif ($act == "simpan_user") {
        if ($user->simpan()) {
            echo "<script>
                        alert('data sukses disimpan');
                        window.location.href='?target=user';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=user';
                    </script>";
        }
    } elseif ($act == "edit_user") {
        $id = $_GET['id'];
        echo $user->edit($id);
    } elseif ($act == "update_user") {
        if ($user->update()) {
            echo "<script>
                        alert('data sukses diubah');
                        window.location.href='?target=user';
                    </script>";
        } else {
            echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=user';
                    </script>";
        }
    } elseif ($act == "delete_user") {
        $id = $_GET['id'];
        if ($user->delete($id)) {
            echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=user';
                    </script>";
        } else {
            echo "<script>
                    alert('data gagal dihapus');
                    window.location.href='?target=user';
                </script>";
        }
    } else {
        echo $user->index();
    }

    // no pengguna
} elseif ($target == 'pengguna') {

    echo "selamat datang di pengguna";
}
?>
    </div>
</div>
</body>
</html>