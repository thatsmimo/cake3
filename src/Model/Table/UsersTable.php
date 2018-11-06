<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;


class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('users');
        //$this->displayField('id');
        $this->primaryKey('id');
    }
}