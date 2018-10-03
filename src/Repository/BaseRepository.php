<?php

namespace Easychat\Repository;

use Easychat\app\Config;

abstract class BaseRepository
{
	
    protected $table;
    protected $configDb;

    public function __construct($table)
    {
        $this->table = $table;
        self::connexion();
    }

	
    public static function connexion()
    {
		try {
			
			$configDb = require(__DIR__.'/../../app/configDb.php');
			
			$connection = new \PDO('mysql:host='.$configDb["host"].';dbname='.$configDb["dbname"],
                $configDb["user"],
                $configDb["password"]);

		} catch (\PDOException $e) {

			echo 'Error db :'.$e->getMessage();
			die;
		}
		return $connection;
    }
	
	public function insert($data = array())
    {
        $statement = "INSERT INTO {$this->table}(";
        $statementValues = [];
        $statementNames = [];
        $values = [];

        foreach ($data as $column => $value) {
            $statementNames[] = $column;
            $statementValues[] = "?";
            $values[] = $value;
        }

        $statement .= implode(',', $statementNames).') VALUES('.implode(',', $statementValues).')';
        $query = self::connexion()->prepare($statement);
        $result = $query->execute($values);

        if ($result) {
            $id = self::connexion()->lastInsertId();
            return $id;
        } else {
            var_dump( $query->errorInfo());
            die;
        }
    }

	public function update($data = array(),$where = array())
    {
        $statement = "UPDATE {$this->table} SET ";
        $values = [];

        if (!empty($data)) {
            $statementPieces = [];
            foreach ($data as $fieldName => $fieldValue) {
                $statementPieces[] = "$fieldName = ? ";
                $values[] = $fieldValue;
            }
            $statement .= implode(',', $statementPieces);
        }

        $statement .= " WHERE ";
        
        if (!empty($where)) {
            $wherePieces = [];
            foreach ($where as $fieldName => $fieldValue) {
                $wherePieces[] = "$fieldName = ? ";
                $values[] = $fieldValue;
            }
            $statement .= implode('AND', $wherePieces);
        }
        $query = self::connexion()->prepare($statement);
        $result = $query->execute($values);
    }


}