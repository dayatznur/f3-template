<?php


class Contact extends Crud {

    public function __construct($db) {
        parent::__construct($db, 'tcontact');
    }

}
