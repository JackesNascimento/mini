<?php

class Stats_Model
{
    /**
     * Every model needs a database connection, passed to the model
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Gets simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_songs;
    }
}