<?php

include_once("models/DB.php");
include_once("models/TabelPembalap.php");
include_once("models/TabelSirkuit.php");
include_once("views/ViewPembalap.php");
include_once("views/ViewSirkuit.php");
include_once("presenters/PresenterPembalap.php");
include_once("presenters/PresenterSirkuit.php");

// menentukan navigasi (pembalap)
$nav = $_GET['nav'] ?? 'pembalap';

// logika untuk halamamn pembalap
if ($nav == 'pembalap') {

    // Inisialisasi Objek Khusus Pembalap
    $tabel = new TabelPembalap('localhost', 'mvp_db', 'root', '');
    $view = new ViewPembalap();
    $presenter = new PresenterPembalap($tabel, $view);

    // delete
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $presenter->hapusPembalap($_GET['id']);
        header("Location: index.php?nav=pembalap"); // Redirect kembali ke tab pembalap
        exit();
    }

    // add/edit
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = $_POST['id'] ?? null;
        
        // Ambil inputan sesuai field tabel pembalap
        $nama = $_POST['nama'] ?? '';
        $tim = $_POST['tim'] ?? '';
        $negara = $_POST['negara'] ?? '';
        $poinMusim = (int) ($_POST['poinMusim'] ?? 0);
        $jumlahMenang = (int) ($_POST['jumlahMenang'] ?? 0);

        if ($action == 'add') {
            $presenter->tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
        } else if ($action == 'edit' && $id != null) {
            $presenter->ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
        }

        header("Location: index.php?nav=pembalap");
        exit();
    }

    // tampilan
    if (isset($_GET['screen'])) {
        if ($_GET['screen'] == 'add') {
            echo $presenter->tampilkanFormPembalap();
        } else if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenter->tampilkanFormPembalap($_GET['id']);
        }
    } else {
        // Tampilkan Tabel
        echo $presenter->tampilkanPembalap();
    }
}

// logika untuk halaman sirkuit
else if ($nav == 'sirkuit') {

    // Inisialisasi Objek Khusus Sirkuit
    $tabel = new TabelSirkuit('localhost', 'mvp_db', 'root', '');
    $view = new ViewSirkuit();
    $presenter = new PresenterSirkuit($tabel, $view);

    // delete
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $presenter->hapusSirkuit($_GET['id']); // Pastikan ada method hapusSirkuit di PresenterSirkuit
        header("Location: index.php?nav=sirkuit"); // Redirect kembali ke tab sirkuit
        exit();
    }

    // add/edit
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $id = $_POST['id'] ?? null;

        // Ambil inputan sesuai field tabel sirkuit
        $namaSirkuit = $_POST['namaSirkuit'] ?? '';
        $lokasiNegara = $_POST['lokasiNegara'] ?? '';
        $panjangSirkuit_km = $_POST['panjangSirkuit_km'] ?? 0;
        $rekorLap_dtk = $_POST['rekorLap_dtk'] ?? '';
        $pemegangRekor = $_POST['pemegangRekor'] ?? '';

        if ($action == 'add') {
            $presenter->tambahSirkuit($namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor);
        } else if ($action == 'edit' && $id != null) {
            $presenter->ubahSirkuit($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor);
        }

        header("Location: index.php?nav=sirkuit");
        exit();
    }

    // tampilan-
    if (isset($_GET['screen'])) {
        if ($_GET['screen'] == 'add') {
            echo $presenter->tampilkanFormSirkuit();
        } else if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenter->tampilkanFormSirkuit($_GET['id']);
        }
    } else {
        // Tampilkan Tabel Sirkuit
        echo $presenter->tampilkanSirkuit();
    }
}
?>