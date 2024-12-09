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
    $sql = "select genero from generos order by id_genero";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);   // no recibe parametros

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

?>