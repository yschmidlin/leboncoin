<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user {

    protected $id;
    protected $email;
    protected $password;

    public function __construct($aData = array()) {
        if ($aData) {
            $this->hydrate($aData);
        }
    }

    public function hydrate($aData) {
        foreach (array_keys(get_class_vars(get_class($this))) as $sKey) {
            if (isset($aData[$sKey])) {
                $this->$sKey = $aData[$sKey];
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($sNewId) {
        $this->id = $sNewId;
    }

    public function setEmail($sNewEmail) {
        $this->email = $sNewEmail;
    }

    public function setTitle($sNewPassword) {
        $this->password = $sNewPassword;
    }

}
