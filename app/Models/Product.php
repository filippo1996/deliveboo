<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'img_path',
        'ingredient',
        'visibility',
        'price',
        'slug'
    ];

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The orders that belong to the product.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order')->withPivot('qty');
    }

    /**
     * get Path attribute cover img
     */
    public function getImgPathAttribute($value)
    {
        if(str_starts_with($value, 'https')){
            return $value;
        }
        $driver = env('FILESYSTEM_DRIVER');
        $imgDefault = 'products/product-placeholder.jpeg';

        if(Storage::disk($driver)->exists($value)){
            $value = Storage::disk($driver)->url($value);
        } else {
            $value = Storage::disk($driver)->url($imgDefault);
        }

        return $value;
    }
}
