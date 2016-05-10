<?php

if (isset($_GET['logout'])) {
    unset($_SESSION);
    session_destroy();

    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['oUser'])) {
    $_SESSION['oUser'] = NULL;
}

// bloc formulaire de connexion
if (isset($_POST['loginForm'])) {
    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sPasswordInput = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if ($sEmailInput && $sPasswordInput) {
        $oUser = $oUsersManager->getByEmailAndPassword($sEmailInput, $sPasswordInput);
        if ($oUser instanceof user) {
            $_SESSION['oUser'] = $oUser;
        }
    }
}

// bloc formulaire de depot d'annonce
if (isset($_POST['annonceForm'])) {
    $sTitleInput = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_STRING);
    $sDescriptionInput = filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING);
    $iPriceInput = filter_input(INPUT_POST, 'Price', FILTER_SANITIZE_STRING);


    $sImageInput = false;
    $aTypes = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
    if (isset($_FILES['Image']) && ($_FILES['Image']['error'] == UPLOAD_ERR_OK) && in_array($_FILES['Image']['type'], $aTypes)) {
        $sImageInput = $_FILES['Image']['tmp_name'];
    }

    if ($sTitleInput && $sDescriptionInput && $iPriceInput && $sImageInput) {
        $oAnnonce = new annonce();
        $oAnnonce->setTitle($sTitleInput);
        $oAnnonce->setDescription($sDescriptionInput);
        $oAnnonce->setCreatedDate(new DateTime('now'));
        $oAnnonce->setPrice($iPriceInput);

        $oAnnoncesManager->insert($oAnnonce);

        $sFileDest = 'userfiles/Img_ann' . $oAnnonce->getId() . '_001.png';
        if (move_uploaded_file($sImageInput, $sFileDest)) {
            $oAnnonce->setPicture($sFileDest);

            $oAnnoncesManager->update($oAnnonce);
        }
    }
}

// formulaire de contact
if (isset($_POST['contactForm'])) {
    $sEmailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $sMsgInput = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);

    if ($sEmailInput && $sMsgInput) {
        $oMessage = new MessageContact($sEmailInput, $sMsgInput);
        $oMessage->send();
    }
}


if (isset($_GET['delete_ann'])) {
    $oAnnonce = new annonce;
    $oAnnonce->setId($_GET['delete_ann']);

    $oAnnoncesManager->delete($oAnnonce);

    header('Location: index.php');
    exit();
}

//Creation utilisateurs
?>

