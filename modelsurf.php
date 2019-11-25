<?php
function createPieces($nom, $longu, $large, $numlogep)
{
    global $dbh;
    global $unePiece;
    global $long, $larg;
    $prepare = new $dbh->prepare("INSERT INTO pieces (nom, longu, larg, surf, num_logep) VALUES (:nom, :longu, :larg, :num_logep)");
    
    $prepare->bindValue(':nom' , $nom, PDO::PARAM_STR);
    $prepare->bindValue(':longu' , $longu, PDO::PARAM_STR);
    $prepare->bindValue(':larg' , $large, PDO::PARAM_STR);
    $prepare->bindValue(':num_logep' , $numlogep, PDO::PARAM_STR);
    if ($prepare->execute() ) {
    echo" L'insertion est réussie\n";
    }else{
        echo"L'insertion est échouée\n";
    }
}

function readPieces($num_logement)
{
  global $dbh;
  $spiece = array();
  $prepare = $dbh->prepare("SELECT * FROM logements WHERE num_logement = :num_logement ");
  $prepare->bindValue(':num_logement', $num_logement, PDO::PARAM_STR);
  if ( $prepare->execute() ) {
    while ($aRow = $prepare->fetch(PDO::FETCH_ASSOC)) {
        $spiece = $aRow;
        }
  }
  return($spiece);
}
function updatec($nom, $longu, $large, $numlogep)
{
    global $dbh;
  $prepare = $dbh->prepare("UPDATE pieces SET dep_nom=:dep_nom WHERE dep_code = :dep_code ");
  $prepare->bindValue(':dep_code', $depCode, PDO::PARAM_STR);
  $prepare->bindValue(':dep_nom', $depNom, PDO::PARAM_STR);
  if ( $prepare->execute() ) {
    echo "Update réussi\n";
  } else {
    echo "Update échoué\n";
  }
}
function deletePieces($depCode)
{
  global $dbh;
  $prepare = $dbh->prepare("DELETE FROM departement WHERE dep_code=:dep_code ");
  $prepare->bindValue(':dep_code', $depCode, PDO::PARAM_STR);
  if ( $prepare->execute() ) {
    echo "L'effacement est réussi\n";
  } else {
    echo "L'effacement est échoué\n";
  }
}
function indexPieces()
{
  global $dbh;
  $aDep = array();
  $prepare = $dbh->prepare("SELECT * FROM departement");
  if ( $prepare->execute() ) {
    while ($aRow = $prepare->fetch(PDO::FETCH_ASSOC)) {
        $aDep[] = $aRow;
        }
  }
  return($aDep);
}