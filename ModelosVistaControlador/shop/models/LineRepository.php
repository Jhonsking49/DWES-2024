<?php

class LineRepository
{
    public static function addLinea($orderID, $productID, $quantity, $price)
    {
        try {
            $bd = Conectar::conexion();

            $sql = "INSERT INTO line (id,p_id, amount, o_id, price_p) 
                    VALUES (null,$productID,$quantity,$orderID,$price)";

            $result = $bd->query($sql);

            if (!$result) {
                echo "Error al agregar la línea: " . $bd->error;
                exit;
            }
        } catch (Exception $e) {
            echo 'Error al agregar la línea: ' . $e->getMessage();
            exit;
        }
    }
    public static function getLineasByOrderId($orderId)
    {
        $bd = Conectar::conexion();

        $sql = "SELECT * FROM line WHERE o_id = $orderId";

        $result = $bd->query($sql);

        $lineas = array();
        while($datos=$result->fetch_assoc()){
            $linea = new LineModel($datos);
            $lineas[] = $linea;
        }

        return $lineas;
    }
}



?>