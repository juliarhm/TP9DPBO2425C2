<?php

include_once ("models/DB.php");
include_once ("KontrakPembalap.php");

class TabelPembalap extends DB implements KontrakPembalap {
    private $table = 'pembalap';

    // Konstruktor untuk inisialisasi database
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Method untuk mendapatkan semua pembalap
    public function getAllPembalap(): array {
        $query = "SELECT * FROM pembalap";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // Method untuk mendapatkan pembalap berdasarkan ID
    public function getPembalapById($id): ?array {
        $this->executeQuery("SELECT * FROM pembalap WHERE id = :id", ['id' => $id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;
    }

    // implementasikan metode CRUD di bawah ini sesuai kebutuhan

    // Perbaikan pada TabelPembalap.php
    public function addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $query = "INSERT INTO " . $this->table . " (nama, tim, negara, poinMusim, jumlahMenang) VALUES (:nama, :tim, :negara, :poinMusim, :jumlahMenang)"; 

        $params = [
            ':nama' => $nama,
            ':tim' => $tim,
            ':negara' => $negara,
            ':poinMusim' => $poinMusim,
            ':jumlahMenang' => $jumlahMenang
        ];
        $this->executeQuery($query, $params); 
    }
    
    public function updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $query = "UPDATE " . $this->table . " SET nama = :nama, tim = :tim, negara = :negara, poinMusim = :poinMusim, jumlahMenang = :jumlahMenang WHERE id = :id";
        
        $params = [
            ':id' => $id,
            ':nama' => $nama,
            ':tim' => $tim,
            ':negara' => $negara,
            ':poinMusim' => $poinMusim,
            ':jumlahMenang' => $jumlahMenang
        ];
        // Panggil executeQuery untuk menjalankan UPDATE
        $this->executeQuery($query, $params);
    }
    
    public function deletePembalap($id): void {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        // Panggil executeQuery untuk menjalankan DELETE
        $this->executeQuery($query, ['id' => $id]);
    }

}

?>