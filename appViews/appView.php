<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 22:14
 */

class appView {

    private $db;
    private $token;

    public function __construct(appModel $model, $token = '') {
        $this->db = $model;
        $this->token = $token;
    }

    /**
     * Display logic
     *
     * @param string $page
     * @return string
     */
    public function output($page = '') {
        if ('listContacts' === $page) {
            $output = '<div style="width:100%;text-align:center;">';
            $output .= '<h1>list</h1>';
            $output .= '<br/>';

            foreach ($this->db->listContacts() as $contact) {
                $output .= 'Name: ' . $contact['contact_name'];
                $output .= ' -- Email: ' . $contact['contact_email'];
                $output .= '<br/>';
            }

            $output .= '<br/><br/>';
            $output .= '<a href="index.php">back</a>';
            $output .= '</div>';

            return $output;
        } else if ('addContact' === $page) {
            $output = '<div style="width:100%;text-align:center;">';
            $output .= '<h1>add</h1>';
            $output .= '<form id="addContactForm" action="index.php" method="post">';
            $output .= '<label for="nameField">Name: </label><input type="text" name="nameField" id="nameField" value="" required /><br/>';
            $output .= '<label for="emailField">Email: </label><input type="email" name="emailField" id="emailField" value="" required /><br/><br/>';
            $output .= '<input type="hidden" name="token" value="' . $this->token . '" />';
            $output .= '<input type="submit" value="submit" />';
            $output .= '</form>';
            $output .= '<br/><br/>';
            $output .= '<a href="index.php">back</a>';
            $output .= '</div>';

            return $output;
        }

        $output = '<div style="width:100%;text-align:center;">';
        $output .= '<h1>WELCOME</h1><br/><br/>';
        $output .= '<a href="index.php?action=listContacts">List</a>';
        $output .= '&nbsp;&nbsp;&nbsp;';
        $output .= '<a href="index.php?action=addContact">Add</a>';
        $output .= '</div>';

        return $output;
    }
}