<?php

    $conexion = new mysqli("localhost", "root", "", "henpapel_sitio");
    if($conexion->connect_errno) {
        die("ERROR: No pudo hacer la conexion a la BD. " . $mysqli->connect_error());
    }

    $sql = "SELECT TipoProd, Modelo, Descripcion, PrecioUnit FROM productos_catalogo order by TipoProd asc";

    $query = $conexion->query($sql);

    $data = array();

    while ($row = $query->fetch_array(MYSQLI_BOTH)){

        $TipoProd    = "";
        $Modelo      = "";
        $Descripcion = "";
        $PrecioUnit  = 0;

        $TipoProd = $row['TipoProd'];
        $TipoProd = strval($TipoProd);
        $TipoProd = trim($TipoProd);
        $TipoProd = utf8_encode($TipoProd);

        $Modelo = $row['Modelo'];
        $Modelo = strval($Modelo);
        $Modelo = trim($Modelo);
        $Modelo = utf8_encode($Modelo);

        $Descripcion = $row['Descripcion'];
        $Descripcion = strval($Descripcion);
        $Descripcion = trim($Descripcion);
        $Descripcion = utf8_encode($Descripcion);

        $PrecioUnit = $row['PrecioUnit'];
        $PrecioUnit = floatval($PrecioUnit);

        $data[] = array(
                "TipoProd"    => $TipoProd,
                "Modelo"      => $Modelo,
                "Descripcion" => $Descripcion,
                "PrecioUnit"  => $PrecioUnit
            );

    };

    $response = array(
        "sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData" => $data
    );

    $query->free();

    header('Content-Type: application/json');
    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>
