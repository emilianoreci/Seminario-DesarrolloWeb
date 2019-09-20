<?php
    include './connection.php';
    class RequetsProcessor{
        private $con;

        public function __construct() {
            $conexion=new Connection();
            $this->con=$conexion->getCon();
    
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':$this->ejecutarGet();
                    break;
                /* case 'POST':$this->ejecutarPost();
                    break; */
            }
        }
    
        function ejecutarGet() {
            if (isset($_GET["proveedores"])) {
                $validar = "SELECT * FROM razas";
                $consulta = "SELECT * from Proveedores";
                $resultado = $this->con->query($consulta);
                //$resultado = mysqli_query($connection, $consulta);

                $arreglo = array();
                try {
                    foreach ($resultado as $campos) {
                        array_push($arreglo, array("id" => $campos["ID"], "nombre" => $campos["Name"]));
                    }
                } catch (PDOException $e) {
                    echo "Error al recorrer el resultado.";
                }
                echo json_encode($arreglo);
            }
        }
    }
?>