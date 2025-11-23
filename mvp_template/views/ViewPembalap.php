<?php

include_once ("KontrakView.php"); // Atau KontrakViewPembalap.php jika sudah dipisah
include_once ("models/Pembalap.php");

class ViewPembalap implements KontrakView {

    public function tampilPembalap($listPembalap): string {
        $tbody = '';
        $no = 1;
        foreach($listPembalap as $pembalap){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getNama()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getTim()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getNegara()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getPoinMusim()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($pembalap->getJumlahMenang()) .'</td>';
            $tbody .= '<td class="col-actions">
                    <a href="index.php?nav=pembalap&screen=edit&id='. $pembalap->getId() .'" class="btn btn-edit">Edit</a>
                    <a href="index.php?nav=pembalap&action=delete&id='. $pembalap->getId() .'" class="btn btn-delete" onclick="return confirm(\'Yakin hapus?\')">Hapus</a>
                  </td>';
            $tbody .= '</tr>';
            $no++;
        }

        $templatePath = __DIR__ . '/../template/skin.html';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('DATA_JUDUL', 'Daftar Pembalap MotoGP', $template);
            
          
            $header = '<th class="col-id">No</th><th>Nama</th><th>Tim</th><th>Negara</th><th>Poin</th><th>Menang</th>';
            $template = str_replace('DATA_HEADER', $header, $template);

           
            $tombol = '<a href="index.php?nav=pembalap&screen=add" class="btn btn-add">+ Tambah Pembalap</a>';
            $template = str_replace('DATA_TOMBOL_TAMBAH', $tombol, $template);
            
            $template = str_replace('Total:', 'Total Data: ' . count($listPembalap), $template);
            return $template;
        }
        return $tbody;
    }

    public function tampilFormPembalap($data = null): string {
      
        $template = file_get_contents(__DIR__ . '/../template/form.html');
        
        $action = 'add';
        $id = '';
        $nama = ''; $tim = ''; $negara = ''; $poin = ''; $menang = '';

        if ($data) {
            $action = 'edit';
            $id = $data['id'];
            $nama = $data['nama'];
            $tim = $data['tim'];
            $negara = $data['negara'];
            $poin = $data['poinMusim'];
            $menang = $data['jumlahMenang'];
        }

        
        $template = str_replace('__ACTION__', $action, $template);
        $template = str_replace('__ID__', $id, $template);
        
        $template = str_replace('DATA_NAMA', $nama, $template);
        $template = str_replace('DATA_TIM', $tim, $template);
        $template = str_replace('DATA_NEGARA', $negara, $template);
        $template = str_replace('DATA_POIN', $poin, $template);
        $template = str_replace('DATA_MENANG', $menang, $template);
        return $template;
    }
}
?>