<?php

function format_uang($rp)
{
    return number_format($rp, 0, ',', '.');
}

function terbilang($rp)
{
    $rp     = abs($rp);
    $baca   = array(
        '',
        'satu ',
        'dua ',
        'tiga ',
        'empat ',
        'lima ',
        'enam ',
        'tujuh ',
        'delapan ',
        'sembilan ',
        'sepuluh ',
        'sebelas '
    );
    $terbilang = '';
    if ($rp < 12) { //0 - 11
        $terbilang = '' . $baca[$rp];
    } elseif ($rp < 20) { // 12 - 19
        $terbilang = terbilang($rp - 10) . ' belas';
    } elseif ($rp < 100) { //20 -99
        $terbilang = terbilang($rp / 10) . ' puluh' . terbilang($rp % 10);
    } elseif ($rp < 200) {
        $terbilang = ' seratus' . terbilang($rp - 100);
    } elseif ($rp < 1000) {
        $terbilang = terbilang($rp / 100) . ' ratus' . terbilang($rp % 100);
    } elseif ($rp < 2000) {
        $terbilang = ' seribu' . terbilang($rp - 1000);
    } elseif ($rp < 1000000) {
        $terbilang = terbilang($rp / 1000) . ' ribu' . terbilang($rp % 1000);
    } elseif ($rp < 1000000000) {
        $terbilang = terbilang($rp / 1000000) . ' juta' . terbilang($rp % 1000000);
    }
    return $terbilang;
}

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $nama_bulan = array(
        1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari        = $nama_hari[$urutan_hari];
        $text       .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text       .= "$tanggal $bulan $tahun";
    }

    return $text;
}
