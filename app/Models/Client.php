<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'cpf'];

    public function editUrl()
    {
        return 'clients/edit/'.$this->id;
    }

    public function deleteUrl()
    {
        return 'clients/delete/'.$this->id;

    }
}
