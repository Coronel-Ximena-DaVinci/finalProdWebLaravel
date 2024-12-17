<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'stock',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getImageNameAttribute() {
        if (!$this->image) {
            return null;
        }
        return collect(explode(DIRECTORY_SEPARATOR, $this->image))->last();
    }

    public function getImageUrlAttribute() {
        if (!$this->image) {
            return null;
        }
        return "/storage" . '/' . Str::replace(DIRECTORY_SEPARATOR, '/', $this->image);
    }
}
