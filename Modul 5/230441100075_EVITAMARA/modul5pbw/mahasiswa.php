<?php
session_start();

// Fungsi untuk menambahkan data mahasiswa
function tambahMahasiswa($data) {
    $_SESSION['mahasiswa'][] = $data;
}

// Fungsi untuk mengedit data mahasiswa
function editMahasiswa($nim, $data) {
    foreach($_SESSION['mahasiswa'] as $key => $mahasiswa){
        if($mahasiswa['nim'] == $nim){
            $_SESSION['mahasiswa'][$key] = $data;
            break;
        }
    }
}

// Fungsi untuk menghapus data mahasiswa
function hapusMahasiswa($nim) {
    foreach($_SESSION['mahasiswa'] as $key => $mahasiswa){
        if($mahasiswa['nim'] == $nim){
            unset($_SESSION['mahasiswa'][$key]);
            break;
        }
    }
}

if(!isset($_SESSION['username'])){
    header("location: index.php");
}

// Proses form tambah mahasiswa
if(isset($_POST['tambah'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    tambahMahasiswa(array('nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan));
}

// Proses form edit mahasiswa
if(isset($_POST['edit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    editMahasiswa($nim, array('nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan));
}

// Proses hapus mahasiswa
if(isset($_GET['hapus'])){
    hapusMahasiswa($_GET['hapus']);
}

// Data mahasiswa untuk diedit
$edit_mahasiswa = null;
if(isset($_GET['edit'])){
    $nim = $_GET['edit'];

    foreach($_SESSION['mahasiswa'] as $key => $mahasiswa){
        if($mahasiswa['nim'] == $nim){
            $edit_mahasiswa = $mahasiswa;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <form action="" method="post">
            <p>NIM:</p>
            <input type="text" name="nim" value="<?php echo isset($edit_mahasiswa) ? $edit_mahasiswa['nim'] : ''; ?>">
            <p>Nama:</p>
            <input type="text" name="nama" value="<?php echo isset($edit_mahasiswa) ? $edit_mahasiswa['nama'] : ''; ?>">
            <p>Alamat:</p>
            <input type="text" name="alamat" value="<?php echo isset($edit_mahasiswa) ? $edit_mahasiswa['alamat'] : ''; ?>">
            <p>Angkatan:</p>
            <input type="text" name="angkatan" value="<?php echo isset($edit_mahasiswa) ? $edit_mahasiswa['angkatan'] : ''; ?>"><br><br>
            <?php if(isset($edit_mahasiswa)) { ?>
            <input type="hidden" name="nim" value="<?php echo $edit_mahasiswa['nim']; ?>">
            <input type="submit" name="edit" value="Simpan Edit">
            <?php } else { ?>
            <input type="submit" name="tambah" value="Tambah">
            <?php } ?>
        </form>
        <br>
        <table border="1" cellspacing="1" cellpadding="10">
            <tr bgcolor="deeppink">
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Tampilkan data mahasiswa
            if(isset($_SESSION['mahasiswa'])){
                foreach($_SESSION['mahasiswa'] as $mahasiswa){
                    echo "<tr>";
                    echo "<td>".$mahasiswa['nim']."</td>";
                    echo "<td>".$mahasiswa['nama']."</td>";
                    echo "<td>".$mahasiswa['alamat']."</td>";
                    echo "<td>".$mahasiswa['angkatan']."</td>";
                    echo "<td><a href='?hapus=".$mahasiswa['nim']."'>Hapus</a> | <a href='?edit=".$mahasiswa['nim']."'>Edit</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br>
        <a href="logout.php">Logout</a>
    </div>
    </center>
</body>
</html>
