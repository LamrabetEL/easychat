<?php

namespace Easychat\Repository;

class UserRepository extends BaseRepository
{
	public $table = "user";
	
	public function __construct()
    {
        parent::__construct($this->table);
    }
	public function getUserByUsername($user){

		$statement = "SELECT * FROM 
		{$this->table} u WHERE username = :username";
		$query = self::connexion()->prepare($statement);
		$query->setFetchMode(\PDO::FETCH_ASSOC);
		$query->execute(array('username'=>$user));
		$result = $query->fetch();
		return $result;
	}
	public function create($data){

		$result = $this->insert($data);
		
		return $result; 
	}
	public function getConnectedUsers()
	{
		$statement = "SELECT u.id , u.username FROM 
		{$this->table} u WHERE isConnected = 1";
		$query = self::connexion()->prepare($statement);
		$query->setFetchMode(\PDO::FETCH_ASSOC);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

}