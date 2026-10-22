<?php

    function listarVeiculos(PDO $pdo): array
{
    $sql = "
        SELECT *
        FROM veiculos
        ORDER BY tipo, placa
    ";

    return $pdo->query($sql)->fetchAll();
}


function buscarVeiculo(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare("
        SELECT *
        FROM veiculos
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    $veiculo = $stmt->fetch();

    return $veiculo ?: null;
}

?>