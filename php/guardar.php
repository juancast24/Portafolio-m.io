<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "host"; // Tu usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$dbname = "contacto_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

// Ejecutar y verificar
if ($stmt->execute()) {
    echo "Mensaje guardado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>