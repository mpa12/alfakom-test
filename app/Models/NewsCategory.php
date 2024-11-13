<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int id
 * @property string name
 * @property int parent_id
 * @property int lft
 * @property int rgt
 * @property int depth
 * @property int created_by
 * @property User creator
 * @property null|NewsCategory parent
 * @property NewsCategory[] children
 */
class NewsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'lft',
        'rgt',
        'depth',
        'created_by',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(NewsCategory::class, 'parent_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function news(): HasManyThrough
    {
        return $this->hasManyThrough(
            News::class,
            NewsHasCategory::class,
            'news_id',
            'id',
            'id',
            'category_id'
        );
    }
}
