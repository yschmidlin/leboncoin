

<div id="mainContent">

    <!-- On utilise la nouvelle balise HTML5 "section" pour définir un groupe d'éléments <article> -->
    <section>
        <h2>Consulter les annonces</h2>

        <?php
        // afficher les annonces
        foreach ($mesAnnonces as $oAnnonce) {
            echo '<article class="annonce">';

            echo '<div class="description">';
            echo '<h3>' . $oAnnonce->getId() . '</h3>';
            echo '<h3>' . $oAnnonce->getTitle() . '</h3>';

            echo '<p>' . substr($oAnnonce->getDescription(), 0, 100) . '</p>';

            echo '<strong class="important">' . $oAnnonce->getPrice() . ' €' . '</strong>';

            echo '<div class="image">';

            echo '<a href="index.php?page=detail_annonce&id=' . $oAnnonce->getId() . '">';


            echo '<img src="' . $oAnnonce->getPicture() . '" alt="Descrition annonce" title="Description de l\'annonce" />';


            echo '</a>';
            echo '</div>';
            echo '</article>';
        }
        ?>
    </section>
</div>

<aside>
    <h2 class="title important">Annonces à la une</h2>
    <?php
    // afficher les annonces
    foreach ($mesAnnoncesSide as $annonce) {

        echo '<article class="annonce-side">';
        echo '<h3>' . $annonce['titre'] . '</h3>';
        echo '<p>' . '<strong>' . $annonce['prix'] . ' €' . '</strong>' . '</p>';
        echo '<img src="' . $annonce['photo'] . '" alt="description annonce" title="Description de l\'annonce" />';
        echo '</article>';
    }
    ?>

    <button>En savoir plus</button>
</aside>