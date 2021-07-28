<?php

interface Shape{
    public function area();
}
class PersegiPanjang implements Shape{
    public $panjang;
    public $lebar;

    public function area(){
        return "Bangun Ruang:Luas Persegi Panjang"."<br>Panjang:".$this->panjang."<br>Lebar:".$this->lebar ."<br>Volume Kubus:" . $this->panjang * $this->lebar;
    }
}

class Bola implements Shape{
    public $jarijaribola;
    public function area(){
        return "Bangun Ruang:Volume Bola"."<br>jarijaribola:".$this->jarijaribola."<br>Volume Bola:" . 4/3 * (pi() * $this->jarijaribola * $this->jarijaribola * $this->jarijaribola );
    }
}

class Kerucut implements Shape{
    public $jarijarikerucut;
    public $tinggikerucut;

    public function area(){
        return "Bangun Ruang:Volume Kerucut"."<br>jarijarikerucut:". $this->jarijarikerucut ."<br>tinggikerucut:" . $this->tinggikerucut."<br>Volume Kerucut:" . 1/3 * (pi() * $this->jarijarikerucut * $this->jarijarikerucut * $this->tinggikerucut );
    }
}

class Kubus implements Shape{
    private $sisi = 12;

    public function area()
    {
        return "Bangun Ruang:Volume Kubus"."<br>Panjang sisi:".$this->sisi."<br>Volume Kubus:".$this->sisi * $this->sisi * $this->sisi . " m2 ";
    }
}

class Lingkaran implements Shape{
    public $jarijarilingkaran;

    public function area(){
        return "Bangun Ruang:Keliling Lingkaran"."<br>jarijarilingkaran:".$this->jarijarilingkaran."<br>Keliling Lingkaran:" . 2 * (pi() * $this->jarijarilingkaran);
    }
}

class KalkulatorBangunRuangFactory
{
    public function initializePayment($type)
    {
        if ($type === 'Luas Persegi Panjang') {
            return new PersegiPanjang();
        }
        if ($type == 'Volume Bola') {
            return new Bola();
        }
        if ($type === 'Volume Kerucut') {
            return new Kerucut();
        }
         if ($type === 'Volume Kubus') {
            return new Kubus(12);
        }
          if ($type === 'Keliling Lingkaran') {
            return new Lingkaran();
        }

        throw new Exception("Unsupported payment method");
    }
}

$pilihanKalkulatorBangunRuang = 'Volume Kubus';
$KalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$hasilKalkulatorBangunRuang = $KalkulatorBangunRuangFactory->initializePayment($pilihanKalkulatorBangunRuang);
print_r($hasilKalkulatorBangunRuang->area());

?>