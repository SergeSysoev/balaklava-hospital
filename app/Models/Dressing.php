<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Dressing extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'dressings';

    protected $guarded = ['id'];

    protected $fillable = [
        'dressing_date', 'dressing_name', 'inpatient_id', 'doctor_id'
    ];

    public function inpatient(){
        return $this->belongsTo('App\Models\Inpatient');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\HealthWorker');
    }
}
