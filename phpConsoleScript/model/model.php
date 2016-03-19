<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 15:06
 */

/**
 * Class model
 */
class model extends SQLite3 {

    public function __construct()
    {
        $this->open('seedStarsChallenge.db');
        $this->exec('DROP TABLE IF EXISTS job');
        $this->exec('CREATE TABLE job (id integer primary key autoincrement, job_name varchar, status varchar, check_time varchar)');
    }

    /**
     * Insert job row
     *
     * @param array $dbJobs
     * @param string $time
     */
    public function insertIntoJob(array $dbJobs, $time) {
        foreach($dbJobs as $job) {
            $query = "INSERT INTO job (job_name, status, check_time) VALUES ('" . $job['job_name'] . "', '" . $job['status'] . "', '" . $time . "');";
            $this->exec($query);
        }
    }

}