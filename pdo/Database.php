<?php

namespace dataBase;

use Mockery\Exception;
use PDO;
use PDOException;
use stdClass;

class Database
{
    private $_host;
    private $_database;
    private $_username;
    private $_passoword;
    private $_return_type;

    public function __construct($cfg_options, $_return_type = 'object')
    {
        // set connection configurations
        $this->_host      = $cfg_options['host'];
        $this->_database  = $cfg_options['database'];
        $this->_username  = $cfg_options['username'];
        $this->_passoword = $cfg_options['passoword'];

        // set the return type
        if (!empty($_return_type) && $_return_type == 'object') {
            $this->_return_type = PDO::FETCH_OBJ;
        } else {
            $this->_return_type = PDO::FETCH_ASSOC;
        }
    }

    public function execute_query($sql, $parameters = null): stdClass
    {
        $connection = new PDO (
            'mysql:host=' . $this->_host . ';dbname=' . $this->_database . ';charset=utf8',
            $this->_username,
            $this->_passoword,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $results = null;

        try {
            $db = $connection->prepare($sql);
            if (!empty($parameters)) {
                $db->execute($parameters);
            } else {
                $db->execute();
            }

            $results = $db->fetchAll($this->_return_type);
        } catch (PDOException $err) {
            // close connection
            $connection = null;

            return $this->_result('error', $err->getMessage(), $sql, null, 0, null);
        }
        // close connection
        $connection = null;

        return $this->_result('success', 'success', $sql, $results, $db->rowCount(), null);
    }

    public function execute_non_query($sql, $parameters = null): stdClass
    {
        $connection = new PDO (
            'mysql:host=' . $this->_host . ';dbname=' . $this->_database . ';charset=utf8',
            $this->_username,
            $this->_passoword,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $connection->beginTransaction();

        try {
            $db = $connection->prepare($sql);
            if (!empty($parameters)) {
                $db->execute($parameters);
            } else {
                $db->execute();
            }

            $last_inserted_id = $connection->lastInsertId();

            // finish transaction
            $connection->commit();

        } catch (PDOException $err) {
            //undo all sql operations on error
            $connection->rollBack();

            // close connection
            $connection = null;

            return $this->_result('error', $err->getMessage(), $sql, null, 0, null);
        }
        // close connection
        $connection = null;

        return $this->_result('success', 'success', $sql, null, $db->rowCount(), $last_inserted_id);
    }

    private function _result($status, $message, $sql, $results, $affected_rows, $last_id): stdClass
    {
        $tmp                = new stdClass();
        $tmp->status        = $status;
        $tmp->message       = $message;
        $tmp->query           = $sql;
        $tmp->results       = $results;
        $tmp->affected_rows = $affected_rows;
        $tmp->last_id       = $last_id;

        return $tmp;
    }
}
