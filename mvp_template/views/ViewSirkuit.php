<?php

include_once ("KontrakViewSirkuit.php");
include_once ("models/Sirkuit.php");

class ViewSirkuit implements KontrakViewSirkuit {

    public function tampilSirkuit($listSirkuit): string {
        $tbody = '';
        $no = 1;
        foreach($listSirkuit as $sirkuit){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getNamaSirkuit()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getLokasiNegara()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getPanjangSirkuit_km()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getRekorLap_dtk()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sirkuit->getPemegangRekor()) .'</td>';
            $tbody .= '<td class="col-actions">
                    <a href="index.php?nav=sirkuit&screen=edit&id='. $sirkuit->getId() .'" class="btn btn-edit">Edit</a>
                    <a href="index.php?nav=sirkuit&action=delete&id='. $sirkuit->getId() .'" class="btn btn-delete" onclick="return confirm(\'Hapus sirkuit?\')">Hapus</a>
                  </td>';
            $tbody .= '</tr>';
            $no++;
        }

        $templatePath = __DIR__ . '/../template/skin.html';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);

            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('DATA_JUDUL', 'Daftar Sirkuit Internasional', $template);

            $header = '<th class="col-id">No</th><th>Nama Sirkuit</th><th>Lokasi</th><th>Panjang (KM)</th><th>Rekor Lap</th><th>Pemegang Rekor</th>';
            $template = str_replace('DATA_HEADER', $header, $template);

            $tombol = '<a href="index.php?nav=sirkuit&screen=add" class="btn btn-add">+ Tambah Sirkuit</a>';
            $template = str_replace('DATA_TOMBOL_TAMBAH', $tombol, $template);
            
            $template = str_replace('Total:', 'Total Data: ' . count($listSirkuit), $template);
            return $template;
        }
        return $tbody;
    }

    public function tampilFormSirkuit($data = null): string {
       
        $templatePath = __DIR__ . '/../template/formSirkuit.html';
        $template = file_get_contents($templatePath);
        
        $action = 'add';
        $id = '';
        $nama = ''; $lokasi = ''; $panjang = ''; $rekor = ''; $pemegang = '';

        if ($data) {
            $action = 'edit';
            $id = $data['id'];
            $nama = $data['namaSirkuit'];
            $lokasi = $data['lokasiNegara'];
            $panjang = $data['panjangSirkuit_km'];
            $rekor = $data['rekorLap_dtk'];
            $pemegang = $data['pemegangRekor'];
        }

        $template = str_replace('__ACTION__', $action, $template);
        $template = str_replace('__ID__', $id, $template);
        $template = str_replace('DATA_NAMA', $nama, $template);
        $template = str_replace('DATA_LOKASI', $lokasi, $template);
        $template = str_replace('DATA_PANJANG', $panjang, $template);
        $template = str_replace('DATA_REKOR', $rekor, $template);
        $template = str_replace('DATA_PEMEGANG', $pemegang, $template);

        return $template;
    }
}
?>