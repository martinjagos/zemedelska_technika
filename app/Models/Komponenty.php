<?php

namespace App\Models;
use CodeIgniter\Model;

class Komponenty extends Model {
protected $table = 'komponent';
protected $primaryKey = 'id';

protected $returnType = 'object';

protected $autoIncrement = true;
protected $allowedFields = ['id', 'nazev', 'vyrobce_id', 'typKomponent_id', 'pic', 'odkaz'];
protected $useSoftDeletes = true;
protected $deletedField = 'deleted_at';
protected $dateFormat = 'int';
protected $useTimeStamps = true;
protected $createdField = 'created_at';
protected $updatedField = 'updated_at';
}