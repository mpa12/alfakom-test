<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int category_id
 * @property int news_id
 * @property NewsCategory category
 * @property News news
 */
class NewsHasCategory extends Model
{
    use HasFactory;

    protected $primaryKey = null;

    protected $fillable = [
        'category_id',
        'news_id',
    ];

    public $timestamps = false;
    public $incrementing = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
