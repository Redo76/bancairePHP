<?php
require_once("Compte.php");
require_once("Personne.php");

$personne1 = new Personne("Court","Courtland", "86000 POITIERS");
// $personne1->addCompte($compte1);
// $personne1->addCompte($compte2);
$personne2 = new Personne("Felicienne","Beaujolie", "92110 CLICHY");
$personne3 = new Personne("Florus ","L'Heureux", "34070 MONTPELLIER");

$compte1 = new Compte($personne1);

// $compte1->setTitulaire($personne1);
$compte1->setMaxDecouvert(2000); 
$compte1->setMaxDebit(1500); 
$compte1->withdrawal(300);
$compte1->deposit(160);

// var_dump($compte1->getMaxDecouvert()); 
// var_dump($compte1->getMaxDebit()); 

$compte2 = new Compte($personne2);
// $compte2->setMaxDecouvert(2000); 
// print($compte2->getMaxDecouvert());
// echo "<br>";
$compte3 = new Compte($personne3);
$compte4 = new Compte($personne3, 500,456);

// echo "<br>";
// var_dump($compte4->getMaxDebit()); 
// echo "<br>";
// var_dump($compte4->getMaxDecouvert()); 
// echo "<br>";

// // print_r($personne1->getComptes());
// // echo "<br>";
// print_r($compte1->getTitulaire()); 
// echo "<br>";
// // print_r($compte2->getTitulaire()); 
// // echo "<br>";
// print $compte1->isDecouvert();
// echo "<br>";
// print $compte1->deposit(600);
// echo "<br>";
// print $compte1->withdrawal(1000);
// echo "<br>";

// print(virement($compte1, $compte2, 100));
// echo "<br>";
// var_dump($compte1->getSolde());
// echo "<br>";
// var_dump($compte2->getSolde());

function virement($compteDebit , $compteCredit, $amount){
    $retrait = $compteDebit->withdrawal($amount);
    if (!$retrait) {
        return "Transaction annulé";
    } else{
        $compteCredit->deposit($amount);
        return "Transaction effectué";
    }
}

$comptes = array($compte1, $compte2, $compte3, $compte4);

$compte3->setMaxDecouvert(1000); 
$compte3->setMaxDebit(1500); 
$compte3->withdrawal(500);
$compte3->deposit(960);

$compte2->deposit(2000);
$compte2->withdrawal(900);

virement($compte2, $compte4, 200)

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Bancaire PHP</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulaire</th>
                <th scope="col">Max Découvert</th>
                <th scope="col">Max Débit</th>
                <th scope="col">Solde</th>
                <th scope="col">A découvert</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comptes as $key => $compte) : ?>
            <tr>
                <th scope="row"><?= $compte->getNumber()?></th>
                <td><?= $compte->getTitulaire()->getNomComplet() ?></td>
                <td><?= $compte->getMaxDecouvert() ?> €</td>
                <td><?= $compte->getMaxDebit() ?> €</td>
                <td><?= $compte->getSolde() ?> €</td>
                <td><?= $compte->isDecouvert() ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>