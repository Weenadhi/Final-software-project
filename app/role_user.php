<?php

namespace App;


use Illuminate\Database\Eloquent\Model;



class role_user extends Model{

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'role_id',
    ];

}