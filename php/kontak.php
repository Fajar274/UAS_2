<?php
include 'config.php';

class KontakHandler {   //OOP class//
    private $conn;  //Privat properti//

    public function __construct($conn) {    //Public Function//
        $this->conn = $conn;
    }

    public function handleFormSubmission($data) {
        $this->insertIntoKontak($data);
        echo "<script>alert('Request call back telah dikirim')</script>";
    }

    private function insertIntoKontak($data) {  //Private Function yang tidak dibatasi aksesnya//
        $query = "INSERT INTO kontak SET
            nama = '{$data['nama']}',
            email = '{$data['email']}',
            telpon = '{$data['telpon']}',
            pesan = '{$data['pesan']}'";

        mysqli_query($this->conn, $query);
    }
}

if (isset($_POST['kirim'])) {
    $kontakHandler = new KontakHandler($conn);  //Objek yang berasal dari class-nya yaitu "KontakHandler"//

    $formData = array(
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'telpon' => $_POST['telpon'],
        'pesan' => $_POST['pesan']
    );

    $kontakHandler->handleFormSubmission($formData);
}
//Jawaban No.2//
//Terdapat konsep OOP berupa class dan objek berupa class bernama "KontalHandler"//
?>