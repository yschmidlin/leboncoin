<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersManager {

    private $oDB;

    public function __construct(PDO $oDB) {
        $this->oDB = $oDB;
    }

    /* public function getList() {
      $oRes = mysql_query('SELECT * FROM users');

      $aList = array();
      while ($aRes = mysql_fetch_array($oRes)) {
      //traitement des lignes
      $aList[] = new user($aRes);
      }

      return $aList;
      } */

    public function getList() {
        $oRes = $this->oDB->query('SELECT * FROM users');

        $aList = array();
        while ($aRes = $oRes->fetch(PDO::FETCH_ASSOC)) {
//traitement des lignes
            $aList[] = new annonce($aRes);
        }

        return $aList;
    }

    /* public function get($id) {
      $oRes = mysql_query('SELECT * FROM users WHERE id=' . $id);
      $aRes = mysql_fetch_array($oRes);

      return new user($aRes);
      } */

    public function get($id) {
        $oRes = $this->oDB->prepare('SELECT * FROM users WHERE id = :id');
        $oRes->bindValue(':id', $id, PDO::PARAM_INT);
        $oRes->execute();

        $aRes = $oRes->fetch(PDO::FETCH_ASSOC);
        return new annonce($aRes);
    }

    /* public function getByEmailAndPassword($email, $password) {
      $oRes = mysql_query('SELECT * FROM users WHERE email="' . $email . '" AND password="' . $password . '"');
      $aRes = mysql_fetch_array($oRes);
      if ($aRes) {
      return new user($aRes);
      }
      return false;
      } */

    public function getByEmailAndPassword($email, $password) {
        $oRes = $this->oDB->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $oRes->bindValue(':email', $email, PDO::PARAM_STR);
        $oRes->bindValue(':password', $password, PDO::PARAM_STR);
        $oRes->execute();

        $aRes = $oRes->fetch(PDO::FETCH_ASSOC);
        if ($aRes) {
            return new user($aRes);
        }
        return false;
    }

    public function insert(user &$oUser) {
        $oRes = $this->oDB->prepare('INSERT INTO users (email, password) VALUES(:email, :password)');
        $oRes->bindValue(':email', $oUser->getEmail(), PDO::PARAM_STR);
        $oRes->bindValue(':password', $oUser->getPassword(), PDO::PARAM_STR);
        $oRes->execute();

        $oUser->setId($this->oDB->lastInsertId());


        /* $sSQL = 'INSERT INTO users (email, password) VALUES('
          . '"' . $oUser->getEmail() . '",'
          . '"' . $oUser->getPassword() . '")';
          print_r($sSQL);
          mysql_query($sSQL);
          //print_r(mysql_error());

          $oUser->setId(mysql_insert_id()); */
    }

}
