<?php

class annonce {

    protected $id;
    protected $id_user;
    protected $title;
    protected $description;
    protected $picture;
    protected $price;
    protected $created_date;
    public static $NB_ANNONCES;

    public function __construct($aData = array()) {
        if ($aData) {
            $this->hydrate($aData);
        }
    }

    public function hydrate($aData) {
        foreach (array_keys(get_class_vars(get_class($this))) as $sKey) {
            if (isset($aData[$sKey])) {
                $this->$sKey = $aData[$sKey];

                /* $this->setId($aData['id']);
                  $this->setTitle($aData['title']);
                  $this->setDescription($aData['description']);
                  $this->setPicture($aData['picture']);
                  $this->setPrice($aData['price']);
                  $this->setCreatedDate($aData['created_date']);
                  $this->setIdUser($aData['id_user']); */
            }
        }
    }

    /* public static function load() {
      $aList = array();

      $aFiles = glob('data/annonce*');
      foreach ($aFiles as $sFile) {
      $aList[] = unserialize(file_get_contents($sFile));
      }

      self::$NB_ANNONCES = count($aList);

      return $aList;
      } */

    /* public static function getById($id) {
      $sFileName = 'data/annonce' . str_pad($id, 3, '0', STR_PAD_LEFT);
      if (file_exists($sFileName)) {
      return unserialize(file_get_contents($sFileName));
      }
      }

      public function save() {
      $sFileName = 'annonce' . str_pad($this->getId(), 3, '0', STR_PAD_LEFT);
      file_put_contents('data/' . $sFileName, serialize($this));
      } */

    public function getId() {
        return $this->id;
    }

    public function setId($sNewId) {
        $this->id = $sNewId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($sNewTitle) {
        $this->title = $sNewTitle;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($sNewDescription) {
        $this->description = $sNewDescription;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($sNewPicture) {
        $this->picture = $sNewPicture;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($iNewPrice) {
        $this->price = $iNewPrice;
    }

    public function getCreatedDate() {
        return $this->created_date->format('Y-m-d H:is');
    }

    public function setCreatedDate($oNewDate) {
        $this->created_date = $oNewDate;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($oNewIdUser) {
        $this->id_user = $oNewIdUser;
    }

}

?>