<?php
    include("easy_connection.php");
    //route: http://localhost/tp_desarrollo_web/?proveedores

    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
 
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':ejecutarGet();
            break;
    }
 
    function ejecutarGet() {
        global $connection;
        if (isset($_GET["proveedores"])) {
            $consulta = "SELECT * from Proveedores";
            $resultado = mysqli_query($connection, $consulta);

            $arreglo = array();
            try {
                foreach ($resultado as $campoActual) {
                    array_push(
                        $arreglo, array("id" => $campoActual["ID"], 
                            "nombre" => $campoActual["Name"],
                            "direccion" => $campoActual["Address"],
                            "telefono" => $campoActual["Phone"],
                            "email" => $campoActual["Email"]
                            )
                    );
                }
            } catch (PDOException $e) {
                echo "Error al recorrer el resultado.";
            }
            //json_encode($arreglo);
            echo json_encode($arreglo);
        }
    }

/* 

    //---forma 1
    $consulta = "SELECT * from Proveedores";
    $resultado = mysqli_query($connection, $consulta);

    echo "<table border='1'> <tr><td> Proveedor</td></tr>";

    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr> <td>" . $fila['Name'] . "</td></tr>";
        //echo $fila['Name'] . "<br/>"; 
    }
     

    echo "</table>"; 
 */

    //---forma 2
    /* 
    $consultaSQL = "SELECT * from Proveedores";
    $resultado = mysqli_query($connection, $consultaSQL);
     
    $arreglo = array();
    try {
        foreach ($resultado as $campos) {
            array_push($arreglo, array("id" => $campos["ID"], "nombre" => $campos["Name"]));
        }
    } catch (PDOException $e) {
        echo "Error al recorrer el resultado.";
    }
    echo json_encode($arreglo); */




?>