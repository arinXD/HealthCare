<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bmi extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function recommend() {
        // return $this->hasOne(recommend::class);
        return $this->hasOne(recommend::class, "rec_id");
        }

}
