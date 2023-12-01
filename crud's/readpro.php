<?php
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Preço: " . $row["preco"] . "<br>";
    }
} else {
    echo "Nenhum produto encontrado.";
}
?>
