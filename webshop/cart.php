<?php
session_start();

$page_title="Kosár";
include 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> eltávolítva a kosaradból!";
    echo "</div>";
}

else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> mennyiség frissítve!";
    echo "</div>";
}

if(count($_SESSION['cart_items'])>0){

    $ids = "";
    foreach($_SESSION['cart_items'] as $id=>$value){
        $ids = $ids . $id . ",";
    }

    $ids = rtrim($ids, ',');

    echo "<table class='table table-hover table-responsive table-bordered'>";

        echo "<tr>";
            echo "<th class='textAlignLeft'>Termék neve</th>";
            echo "<th>Ár (HUF)</th>";
            echo "<th>Végrehajtás</th>";
        echo "</tr>";

        $query = "SELECT id, name, price FROM products WHERE id IN ({$ids}) ORDER BY name";

        $stmt = $con->prepare( $query );
        $stmt->execute();

        $total_price=0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$price} Ft</td>";
                echo "<td>";
                    echo "<a href='remove_from_cart.php?id={$id}&name={$name}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Eltávolítás a kosárból";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";

            $total_price+=$price;
        }

        echo "<tr>";
                echo "<td><b>Teljes</b></td>";
                echo "<td>{$total_price} Ft</td>";
                echo "<td>";
                    echo "<a href='#' class='btn btn-success'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Fizetés";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";

    echo "</table>";
}

else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>Nincs termék</strong> a kosaradban!";
    echo "</div>";
}

include 'layout_foot.php';
?>
