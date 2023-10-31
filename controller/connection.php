<?php
try {
    $mysqli = new mysqli("localhost", "root", "colarce2014.", "final");    
} catch (mysqli_sql_exception $e) {
    echo "Error:". $e->getMessage();
}