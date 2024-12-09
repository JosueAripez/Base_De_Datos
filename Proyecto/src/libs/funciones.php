<?php
function validaUsuario($usuario, $pass){
    global $conn;
    /* ? identifica un parametro dentro de la consulta */
    $sql = "select id_usuario, id_tipos_usuarios_fk, nombre_usuario from usuarios where nombre_usuario=? and password=?";
    $stmt = $conn->prepare($sql);
    /* la consulta recibe 2 parametros correo y contraseña, por tanto se envian en el mismo orden */
    $stmt->execute([$usuario, $pass]);   

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}
function registraUsuario($usuario,$fechanacimiento,$idrol, $genero, $pass){
    try{
        global $conn;
       
        $sql = "insert into usuarios (nombre_usuario, fecha_nacimiento, id_tipos_usuarios_fk, id_genero_fk, password) values(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario,$fechanacimiento,$idrol, $genero, $pass]);   // no recibe parametros
        return true;
    }catch(PDOException $e){
        echo "";
    }
    return false;
}
function listaGeneros(){
    global $conn;
    $sql = "select genero,id_genero from generos order by id_genero";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);   // no recibe parametros

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function registraUsuario1($nombre_usuario, $fecha_nacimiento, $id_tipos_usuarios_fk, $id_genero_fk, $password) {
    global $conn;

    try {
        $sql = "INSERT INTO usuarios (nombre_usuario, fecha_nacimiento, id_tipos_usuarios_fk, id_genero_fk, password)
                VALUES (:nombre_usuario, :fecha_nacimiento, :id_tipos_usuarios_fk, :id_genero_fk, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':id_tipos_usuarios_fk', $id_tipos_usuarios_fk);
        $stmt->bindParam(':id_genero_fk', $id_genero_fk);
        $stmt->bindParam(':password', $password);

        return $stmt->execute(); // Devuelve true si la inserción fue exitosa
    } catch (PDOException $e) {
        error_log("Error al registrar usuario: " . $e->getMessage());
        return false;
    }
}

?>