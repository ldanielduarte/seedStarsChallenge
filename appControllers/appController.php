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

    /**
     * Inserts a contact
     *
     * @param string $name
     * @param string $email
     */
    public function insertContact($name, $email) {
        $contact = array(
            'name' => mysql_real_escape_string(strip_tags($name)),
            'email' => mysql_real_escape_string(strip_tags($email))
        );

        $this->db->insertIntoContact($contact);
    }

}