<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug']; //Dapat izin CRUS
    //protected $guarded = ['name','slug']; //Tidak Dapat izin CRUD

    public function course(): HasMany
		{
			return $this->hasMany(Course::class, 'category_id','id');
		}
}
