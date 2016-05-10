<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AnnoncesManager {

    private $oDB;

    public function __construct(PDO $oDB) {
        $this->oDB = $oDB;
    }

    public function getList() {
        $oRes = $this->oDB->query('SELECT * FROM Annonces');

        $aList = array();
        while ($aRes = $oRes->fetch(PDO::FETCH_ASSOC)) {
            //traitement des lignes
            $aList[] = new annonce($aRes);
        }

        return $aList;

        /* $oRes = mysql_query('SELECT * FROM Annonces');

          $aList = array();
          while ($aRes = mysql_fetch_array($oRes)) {
          //traitement des lignes
          $aList[] = new annonce($aRes);
          }

          return $aList; */
    }

    public function get($id) {
        $oRes = $this->oDB->prepare('SELECT * FROM Annonces WHERE id = :id');
        $oRes->bindValue(':id', $id, PDO::PARAM_INT);
        $oRes->execute();

        $aRes = $oRes->fetch(PDO::FETCH_ASSOC);
        return new annonce($aRes);

        /* $oRes = mysql_query('SELECT * FROM Annonces WHERE id=' . $id);
          $aRes = mysql_fetch_array($oRes);

          return new annonce($aRes); */
    }

    /* public function insert(Annonce &$oAnnonce) {
      $sSQL = 'INSERT INTO Annonces (title, description, picture, price, created_date, id_user) VALUES('
      . '"' . $oAnnonce->getTitle() . '",'
      . '"' . $oAnnonce->getDescription() . '",'
      . '"' . $oAnnonce->getPicture() . '",'
      . $oAnnonce->getPrice() . ','
      . '"' . $oAnnonce->getCreatedDate() . '",'
      . '"' . $oAnnonce->getIdUser() . '")';
      print_r($sSQL);
      mysql_query($sSQL);
      //print_r(mysql_error());

      $oAnnonce->setId(mysql_insert_id());
      } */

    public function insert(Annonce &$oAnnonce) {
        $oRes = $this->oDB->prepare('INSERT INTO Annonces (title, description, picture, price, created_date, id_user)
                VALUES(:title, :description, :picture, :price, :created_date, :id_user)');

        $oRes->bindValue(':title', $oAnnonce->getTitle(), PDO::PARAM_STR);
        $oRes->bindValue(':description', $oAnnonce->getDescription(), PDO::PARAM_STR);
        $oRes->bindValue(':picture', $oAnnonce->getPicture(), PDO::PARAM_STR);
        $oRes->bindValue(':price', $oAnnonce->getPrice(), PDO::PARAM_INT);
        $oRes->bindValue(':created_date', $oAnnonce->getCreatedDate(), PDO::PARAM_STR);
        $oRes->bindValue(':id_user', $oAnnonce->getIdUser(), PDO::PARAM_INT);

        $oRes->execute();

        $oAnnonce->setId($this->oDB->lastInsertId());
    }

    /* public function update(Annonce $oAnnonce) {
      mysql_query('UPDATE Annonces SET '
      . ' title = "' . $oAnnonce->getTitle() . '", '
      . ' description = "' . $oAnnonce->getDescription() . '", '
      . ' picture = "' . $oAnnonce->getPicture() . '", '
      . ' price = ' . $oAnnonce->getPrice()
      . ' WHERE id = ' . $oAnnonce->getId());
      } */

    public function update(Annonce $oAnnonce) {
        $oRes = $this->oDB->prepare('UPDATE Annonces SET
                    title= :title, description= :description, picture= :picture, price= :price, id_user= :id_user
                    WHERE id = :id');
        $oRes->bindValue(':title', $oAnnonce->getTitle(), PDO::PARAM_STR);
        $oRes->bindValue(':description', $oAnnonce->getDescription(), PDO::PARAM_STR);
        $oRes->bindValue(':picture', $oAnnonce->getPicture(), PDO::PARAM_STR);
        $oRes->bindValue(':price', $oAnnonce->getPrice(), PDO::PARAM_INT);
        $oRes->bindValue(':id_user', $oAnnonce->getIdUser(), PDO::PARAM_INT);
        $oRes->bindValue(':id', $oAnnonce->getId(), PDO::PARAM_INT);

        $oRes->execute();
    }

    public function delete(Annonce $oAnnonce) {
        //mysql_query('DELETE FROM Annonces WHERE id = ' . $oAnnonce->getId());
        $oRes = $this->oDB->prepare('DELETE FROM Annonces WHERE id = :id');
        $oRes->bindValue(':id', $oAnnonce->getId(), PDO::PARAM_INT);
        $oRes->execute();
    }

}
