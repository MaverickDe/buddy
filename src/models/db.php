<?php
class Facility {
    public static function getAll() {
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=ecoBuddy', 'username', 'password');
        $query = $db->query("SELECT * FROM eco_facilities");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //get

    //delete

    //create


    //update
}
?>
