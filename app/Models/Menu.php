<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'group_name',
        'group_image',
        'group_note',
        'image',
        'is_available',
        'sort_order',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'integer',
        'sort_order' => 'integer',
    ];

    // Scope untuk filter berdasarkan kategori
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope untuk menu yang tersedia
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    // Ambil menu berdasarkan group
    public function scopeByGroup($query, $groupName)
    {
        return $query->where('group_name', $groupName);
    }

    // Sort berdasarkan sort_order
    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}