
<?php

//print_r($_GET);
//echo 'ID =' . $_GET['id'];
$oAnnonce = false;
if (isset($_GET['id'])) {
    $oAnnonce = $oAnnoncesManager->get($_GET['id']);
    //$oAnnonce = annonce::getById($_GET['id']);
}

if ($oAnnonce instanceof annonce) {
    echo '<article>';

    echo '<a href="index.php?delete_ann=' . $oAnnonce->getId() . '" alt="">Supprimer annonce</a>';

    echo '<div class = "description">';
    echo '<h3>' . $oAnnonce->getId() . '</h3>';
    echo '<h3>' . $oAnnonce->getTitle() . '</h3>';

    echo '<strong class = "important">' . $oAnnonce->getPrice() . ' €' . '</strong>';

    echo '<div class="image">';

    echo '<a href="index.php?page=detail_annonce&id=' . $oAnnonce->getId() . '">';

    echo '<p>' . $oAnnonce->getDescription() . '</p>';
    echo '<img src="' . $oAnnonce->getPicture() . '" alt="description annonce" title="Description de l\'annonce" />';
    echo '</div>';
    echo '</article>';
} else {
    echo 'Annonce invalide';
}
?>
