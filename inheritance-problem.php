<?php
// Inheritance Problem

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga,
        $jmlHalaman,
        $wktMain,
        $tipe;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $wktMain = 0, $tipe = "tipe")
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->wktMain = $wktMain;
        $this->tipe = $tipe;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap()
    {
        // Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        } else if ($this->tipe == "Game") {
            $str .= " ~ {$this->wktMain} Jam.";
        }
        return $str;
    }
}

class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50, "Game");

// Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.
// Game : Uncharted | Neil Druckmann, Sony Computer (Rp. 250000) - 50 jam.

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
