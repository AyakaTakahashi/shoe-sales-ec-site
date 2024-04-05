<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function isFavoritedByAuthUser()
    {
        if (!Auth::check()) {
            return false;
        }
        return $this->favoritedByUsers()->where('user_id', Auth::id())->exists();
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_product_favorites')->withTimestamps();
    }
}
