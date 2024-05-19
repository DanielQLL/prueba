<?php
class Database{
private $host = 'bx7loncqi8vnyihpduqt-mysql.services.clever-cloud.com';
private $db = 'bx7loncqi8vnyihpduqt';
private $user = 'ufzywigq33rdmmaz';
private $pass = 'KjAdkfSUTAkvidNV9YdA';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//$name = $_POST['nombre'];
//$email = $_POST['email'];
//$subject = $_POST['asunto'];
//$message = $_POST['mensage'];

//$sql = "INSERT INTO Solicitudes (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

//if ($conn->query($sql) === TRUE) {
    //echo "<script>alert('Nuevo registro creado exitosamente'); window.location.href = 'index.html';</script>";
//} else {
 //   echo "Error: " . $sql . "<br>" . $conn->error;
//}

//$conn>close();
//}