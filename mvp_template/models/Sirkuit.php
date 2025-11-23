<?php

class Sirkuit{

    private $id;
    private $namaSirkuit;
    private $lokasiNegara;
    private $panjangSirkuit_km;
    private $rekorLap_dtk;
    private $pemegangRekor;


    public function __construct($id, $namaSirkuit, $lokasiNegara, $panjangSirkuit_km, $rekorLap_dtk, $pemegangRekor){
        $this->id = $id;
        $this->namaSirkuit = $namaSirkuit;
        $this->lokasiNegara = $lokasiNegara;
        $this->panjangSirkuit_km = $panjangSirkuit_km;
        $this->rekorLap_dtk = $rekorLap_dtk;
        $this->pemegangRekor = $pemegangRekor;
    }

    public function getId(){
        return $this->id;
    }
    public function getnamaSirkuit(){
        return $this->namaSirkuit;
    }
    public function getLokasiNegara(){
        return $this->lokasiNegara;
    }
    public function getPanjangSirkuit_km(){
        return $this->panjangSirkuit_km;
    }
    public function getrekorLap_dtk(){
        return $this->rekorLap_dtk;
    }
    public function getpemegangRekor(){
        return $this->pemegangRekor;
    }

    public function senamaSirkuit($namaSirkuit){
        $this->namaSirkuit = $namaSirkuit;
    }
    public function setPanjangSirkuit($panjangSirkuit_km){
        $this->panjangSirkuit_km = $panjangSirkuit_km;
    }
    public function setLokasiNegara($lokasiNegara){
        $this->lokasiNegara = $lokasiNegara;
    }
    public function setrekorLap_dtk($rekorLap_dtk){
        $this->rekorLap_dtk = $rekorLap_dtk;
    }
    public function setpemegangRekor($pemegangRekor){
        $this->pemegangRekor = $pemegangRekor;
    }
}
?>