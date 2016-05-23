<?php

namespace Framework;

use PDO;
use PDOException;

class Database
{
    private $db;
    private $error;

    public function __construct()
    {
        try {
            $dbData = Config::getInstance()->getConfig('db');
            $this->db = new PDO($dbData['dbtype'] . ':host=' . $dbData['host'] .
                ';dbname=' . $dbData['dbname'], $dbData['username'], $dbData['password']);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function fetchAll($query, $params = null)
    {

        $sth = $this->db->prepare($query);

        if ($params != null) {
            foreach ($params as $key => $value) {
                $sth->bindValue($key, $value);
            }
        }

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    public function insert($query, $params)
    {
        $sth = $this->db->prepare($query);

        foreach ($params as $key => $value) {
            $sth->bindValue($key, $value);
        }
        $sth->execute();
        $lastId = $this->db->lastInsertId();
        return $lastId;
    }

    public function delete($query, $params)
    {

        $sth = $this->db->prepare($query);

        foreach ($params as $key => $value) {
            $sth->bindValue($key, $value);
        }

        $sth->execute();
    }
}