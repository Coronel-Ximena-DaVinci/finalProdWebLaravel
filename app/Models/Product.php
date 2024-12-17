<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function saveImage(UploadedFile $image) {
        $ds = DIRECTORY_SEPARATOR;
        $path = "products{$ds}{$this->id}{$ds}image";
        $filename = $image->getClientOriginalName();
        $old = $this->image;

        /**
         * @var Illuminate\Filesystem\FilesystemAdapter $storage
         */
        $storage = Storage::disk('public');
        if ($old) {
            Storage::disk('public')->delete($this->image);
        }
        $storage->putFileAs($path, $image, $filename);
        $this->image = $path . $ds . $filename;
        $this->save();

    }
}
