<?php

include_once(__DIR__ . "/KontrakPresenterSirkuit.php");
include_once(__DIR__ . "/../models/TabelSirkuit.php");
include_once(__DIR__ . "/../models/Sirkuit.php");
include_once(__DIR__ . "/../views/ViewSirkuit.php");

class PresenterSirkuit implements KontrakPresenterSirkuit
{
    // Model SirkuitQuery untuk operasi database
    private $tabelSirkuit; // Instance dari TabelSirkuit (Model)
    private $viewSirkuit; // Instance dari ViewSirkuit (View)

    // Data list Sirkuit
    private $listSirkuit = []; // Menyimpan array objek Sirkuit

    public function __construct($tabelSirkuit, $viewSirkuit)
    {
        $this->tabelSirkuit = $tabelSirkuit;
        $this->viewSirkuit = $viewSirkuit;
        $this->initListSirkuit();
    }

    // Method untuk initialisasi list Sirkuit dari database
    public function initListSirkuit()
    {
        // dapatkan data Sirkuit dari database
        $data = $this->tabelSirkuit->getAllSirkuit();

        // Buat objek Sirkuit dan simpan di list Sirkuit
        $this->listSirkuit = [];
        foreach ($data as $item) {
            $sirkuit = new Sirkuit(
                $item['id'],
                $item['namaSirkuit'],
                $item['lokasiNegara'],
                $item['panjangSirkuit_km'],
                $item['rekorLap_dtk'],
                $item['pemegangRekor']
            );
            $this->listSirkuit[] = $sirkuit;
        }
    }

    // Method untuk menampilkan daftar Sirkuit menggunakan View
    public function tampilkanSirkuit(): string
    {
        $this->initListSirkuit();
        return $this->viewSirkuit->tampilSirkuit($this->listSirkuit);
    }

    // Method untuk menampilkan form
    public function tampilkanFormSirkuit($id = null): string
    {
        $data = null;
        if ($id != null) {
            $data = $this->tabelSirkuit->getSirkuitById($id);
        }
        return $this->viewSirkuit->tampilFormSirkuit($data);
    }

    // implementasikan metode
    public function tambahSirkuit($namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void {
        $this->tabelSirkuit->addSirkuit($namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor);
    }
    
    public function ubahSirkuit($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void {
        $this->tabelSirkuit->updateSirkuit($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor);
    }
    
    public function hapusSirkuit($id): void {
        $this->tabelSirkuit->deleteSirkuit($id);
    }
}

?>