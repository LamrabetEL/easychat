<?php

namespace Easychat\Repository;

class MessageRepository extends BaseRepository
{
	public $table = "message";
	public $user = "user";
	
	public function __construct()
    {
        parent::__construct($this->table);
    }
	public function getAllMessage(){

		$statement = "SELECT u.username , m.* FROM 
		{$this->table} m JOIN {$this->user} u WHERE m.userId = u.id ";
		$query = self::connexion()->prepare($statement);
		$query->setFetchMode(\PDO::FETCH_ASSOC);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
	public function create($data){

		$result = $this->insert($data);
		return $result; 

	}
}