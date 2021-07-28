<!DOCTYPE html>
<html>
    <title>PRPL HEERDIN ASMARA TIMOR</title>
</html>

<?php
class User
{
    public $nama;
    public $email;
    public $date_of_birth;

    public function __construct($datauser)
    {
        $this->nama = $datauser['nama'];
        $this->email = $datauser['email'];
        $this->date_of_birth = $datauser['date_of_birth'];
    }
}

class UserRequest
{
    protected static $rules = [
        'nama' => 'string',
        'email' => 'string',
        'date_of_birth' => 'string'
    ];

    public static function validate($datauser){
        foreach (static::$rules as $property => $type){
            if (gettype($datauser[$property]) != $type){
                throw new \Exception("User property {$property} must be of type {$type}" );
            }
        }
    }
}


class Json{
    public static function from ($datauser){
        return json_encode($datauser);
    }
}


class Age{
    public static function now($datauser){
        $date_of_birth = new DateTime($datauser['date_of_birth']);
        $today = new Datetime(date('d.m.y'));
        return [
            'Usia' => $today->diff($date_of_birth)->y . " tahun",
            'Bulan' => $today->diff($date_of_birth)->m." Bulan",
            'Hari' => $today->diff($date_of_birth)->d. " Hari",
        ];
    }
}


$datauser = [
    'nama' => 'Herdin Asmara Timor',
    'email' => 'herdin1900018212@webmail.uad.ac.id',
    'date_of_birth' => '18.8.2000'
];


UserRequest::validate($datauser);
$user = new User($datauser);
print_r(Json::from($user));
echo '<br>';
print_r(Age::now($datauser));