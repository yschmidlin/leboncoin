<?php

/*
  $mesAnnonces=array(array(
  'titre'=>'toto',
  'prix'=>'20',
  'photo'=>'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
  array(
  'titre'=>'titi',
  'prix'=>'30',
  'photo'=>'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
  array(
  'titre'=>'tutu',
  'prix'=>'50',
  'photo'=>'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
  array(
  'titre'=>'tonton',
  'prix'=>'35',
  'photo'=>'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg')
  );
 */

//$sFilename = 'data/annonce'. str_pad('1', 3, '0', STR_PAD_LEFT);
//$mesAnnonces = Annonce::load();

$mesAnnonces = $oAnnoncesManager->getList();

$mesAnnoncesSide = array(array(
        'titre' => 'toto',
        'prix' => '20',
        'photo' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
    array(
        'titre' => 'titi',
        'prix' => '30',
        'photo' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
    array(
        'titre' => 'tutu',
        'prix' => '50',
        'photo' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg'),
    array(
        'titre' => 'tonton',
        'prix' => '35',
        'photo' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg')
);
?>