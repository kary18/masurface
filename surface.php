<?php
require_once("modelsurf.php");
try{
    $dbh = new PDO(
        'mysql:host=localhost;dbname=surface;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_PERSISTENT => true)
    );
}catch (PDOException $e){
    echo " erreur PDO: " .$e->getMessage() . "\n";
    exit();
}
createPieces('salon', '20', '5', '2');

/*function afficheEntete()
{
//  echo "  Longueur  |  Largeur  | Surface   |\n";
  printf("| %20s | %9s | %9s | %9s |\n", "piece", "Longueur", "Largeur", "Surface");
}
//function afficheLigne($piece, $long, $larg)
function afficheLigne($unePiece)
{
$var = "";
  
  if (
    isset($unePiece['piece'], $unePiece['longueur'], $unePiece['largeur']) &&
    is_string($unePiece['piece']) && 
    is_numeric($unePiece['longueur']) &&
    is_numeric($unePiece['largeur']) ) {
    printf(
    "| %20s | %9.2f | %9.2f | %9.2f |\n", 
    $unePiece['piece'], 
    $unePiece['longueur'], 
    $unePiece['largeur'], 
    calculSurface($unePiece['longueur'], $unePiece['largeur'])
);
  } else {
    echo "Erreur données:". var_dump($unePiece). "\n";
  }
//  echo " $long | $larg | ".calculSurface($long, $larg)." \n";
}
function calculSurface($long, $larg)
{
  if ( is_numeric($long) && is_numeric($larg) ) {
    $surface = $long * $larg;
  } else {
    echo "Erreur données:". /*var_dump($long). var_dump($larg) "\n" ;
  }
  return($surface);
}*/
