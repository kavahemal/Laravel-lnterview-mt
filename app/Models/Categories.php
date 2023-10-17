<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function parent() {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Categories::class, 'parent_id')->where('status', 1)->orderBy('name');
    }

    public function allChildren() {
        return $this->children()->with('allChildren');
    }
}
