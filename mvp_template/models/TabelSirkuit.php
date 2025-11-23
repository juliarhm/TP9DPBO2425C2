<?php

include_once ("models/DB.php");
include_once ("KontrakSirkuit.php");

class TabelSirkuit extends DB implements KontrakSirkuit {
    private $table = 'sirkuit';

    // Konstruktor untuk inisialisasi database
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Method untuk mendapatkan semua Sirkuit
    public function getAllSirkuit(): array {
        $query = "SELECT * FROM sirkuit";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // Method untuk mendapatkan Sirkuit berdasarkan ID
    public function getSirkuitById($id): ?array {
        $this->executeQuery("SELECT * FROM sirkuit WHERE id = :id", ['id' => $id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;
    }

    // implementasikan metode CRUD di bawah ini sesuai kebutuhan

    public function addSirkuit($namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void {
        $query = "INSERT INTO " . $this->table . " (namaSirkuit, lokasiNegara, panjangSirkuit_km, rekorLap_dtk, pemegangRekor) VALUES (:namaSirkuit, :lokasiNegara, :panjangSirkuit_km, :rekorLap_dtk, :pemegangRekor)"; 

        $params = [
            ':namaSirkuit' => $namaSirkuit,
            ':lokasiNegara' => $lokasiNegara,
            ':panjangSirkuit_km' => $panjangSirkuit_km,
            ':rekorLap_dtk' => $rekorLap_dtk,
            ':pemegangRekor' => $pemegangRekor
        ];
        $this->executeQuery($query, $params);
    }
    
    public function updateSirkuit($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void {
        $query = "UPDATE " . $this->table . " SET namaSirkuit = :namaSirkuit, lokasiNegara = :lokasiNegara, panjangSirkuit_km = :panjangSirkuit_km, rekorLap_dtk = :rekorLap_dtk, pemegangRekor = :pemegangRekor WHERE id = :id"; 

        $params = [
            ':id' => $id,
            ':namaSirkuit' => $namaSirkuit,
            ':lokasiNegara' => $lokasiNegara,
            ':panjangSirkuit_km' => $panjangSirkuit_km,
            ':rekorLap_dtk' => $rekorLap_dtk,
            ':pemegangRekor' => $pemegangRekor
        ];
        $this->executeQuery($query, $params);
    }
    
    public function deleteSirkuit($id): void {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        // panggil executeQuery untuk menjalankan DELETE
        $this->executeQuery($query, ['id' => $id]);
    }

}

?>