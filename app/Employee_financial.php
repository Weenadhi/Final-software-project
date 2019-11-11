<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_financial extends Model
{
    protected $fillable = [
        'epf_no','sal_grp','bank','bbranch','acc',

    ];
}
