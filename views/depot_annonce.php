<?php if ($_SESSION['oUser'] instanceof user) { ?>
    <form method = "post" enctype = "multipart/form-data">
        <label for = "Title">Titre</label>
        <input id = "Title" type = "text" name = "Title" /></br>

        <label for = "Description">Description</label>
        <textarea id = "Description" rows = "4" cols = "50" name = "Description" placeholder = "Description"></textarea></br>

        <label for = "price">Prix</label>
        <input id = "price" type = "text" name = "Price" /></br>

        <label for = "Image">monImage</label>
        <input id = "Image" type = "file" name = "Image" /></br>

        <input type = "submit" name = "annonceForm" value = "Submit">
    </form>
    <?php
} else {
    echo 'Veuilleez vous connecter pour accéder a ce service';
}
?>