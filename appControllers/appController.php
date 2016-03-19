<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 21:17
 */

class appController {

    private $db;

    public function __construct(appModel $model) {
        $this->db = $model;
    }

    public function insertContact($name, $email) {
        $contact = array(
            'name' => strip_tags($name),
            'email' => strip_tags($email)
        );

        $this->db->insertIntoContact($contact);
    }

}