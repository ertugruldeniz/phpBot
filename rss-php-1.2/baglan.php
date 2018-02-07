<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=bot", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>