<?php

namespace App\Models;
use CodeIgniter\Model;

class Vyrobce extends Model {
protected $table = 'vyrobce';
protected $primaryKey = 'idVyrobce';

protected $returnType = 'object';
}