<?php
class Database
{
    private $host = 'bx7loncqi8vnyihpduqt-mysql.services.clever-cloud.com';
    private $db = 'bx7loncqi8vnyihpduqt';
    private $user = 'ufzywigq33rdmmaz';
    private $pass = 'KjAdkfSUTAkvidNV9YdA';

    function conectar(){
        try{
            $conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            if (mysqli_connect_errno()) {
                throw new Exception("Error de conexión: " . mysqli_connect_error());
            }
            return $conexion;
        } catch(Exception $e){
            echo 'Error conexion: ' .$e->getMessage();
            exit;
        }
    }
    function insertarDatos($nombre, $email, $asunto, $mensage) {
        try {
            $conn = $this->conectar();

            $sql = "INSERT INTO Solicitudes (name, email, subject, message) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $email, $asunto, $mensage);

            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

// Crear una instancia de la clase Database
$db = new Database();

// Insertar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensage = $_POST["mensage"];

    if ($db->insertarDatos($nombre, $email, $asunto, $mensage)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos.";
    }
}