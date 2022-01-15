<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];

    public function search($key)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $key);
        // return $builder;

        return $this->table('orang')->like('nama', $key)->orLike('alamat', $key);
    }
}
