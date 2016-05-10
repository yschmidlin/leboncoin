<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MessageContact {

    protected $sEmail;
    protected $sMsg;

    public function __construct($email, $msg) {
        $this->sEmail = $email;
        $this->sMsg = $msg;
    }

    public function send() {
        echo 'Objet = ' . $this->sEmail;
        echo 'Message = ' . $this->sMsg;
    }

}

?>