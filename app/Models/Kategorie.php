<?php

namespace App\Models;
use CodeIgniter\Model;

class Kategorie extends Model {
protected $table = 'typkomponent';
protected $primaryKey = 'idKomponent';

protected $returnType = 'object';

protected $autoIncrement = true;
protected $allowedFields = ['idKomponent', 'typKomponent', 'url'];
protected $useSoftDeletes = true;
protected $deletedField = 'deleted_at';
protected $dateFormat = 'int';
protected $useTimeStamps = true;
protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
}