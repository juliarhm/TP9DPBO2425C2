<?php

/*

    Interface ini mendefinisikan struktur dasar yang harus dimiliki oleh setiap Presenter 
    dalam arsitektur MVP (Model–View–Presenter).

    Interface ini berfungsi sebagai kontrak antara View dan Presenter, 
    yang menentukan metode-metode CRUD (Create, Read, Update, Delete) 
    yang wajib diimplementasikan oleh Presenter .

    Dengan adanya kontrak ini, setiap anggota tim dapat 
    bekerja dengan pola yang sama, menjaga konsistensi struktur kode,  
    dan memungkinkan dikerjakan secara paralel 
    tanpa saling mengganggu bagian kode lainnya.

*/
require_once __DIR__ . '/../models/DB.php';

interface KontrakPresenterSirkuit
{
    // method untuk tampilkan Sirkuit
    public function tampilkanSirkuit(): string;

    // method untuk tampilkan form Sirkuit
    public function tampilkanFormSirkuit($id = null): string;


    // method untuk CRUD Sirkuit
    public function tambahSirkuit($namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void;
    public function ubahSirkuit($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor): void;
    public function hapusSirkuit($id): void;
}
