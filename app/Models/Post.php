<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'content'];

    // protected $table = 'postovi';
    // protected $primaryKey = 'post_id';

    public function user() {
        // DEMONSTRACIJA ZA RAZLICITE NAZIVE KOLONA
        // return $this->belongsTo('App\Models\User', 'id_user', 'id');

        return $this->belongsTo('App\Models\User');
    }

    public function postCategories() {
        return $this->belongsToMany('App\Models\Category');
    }
}
