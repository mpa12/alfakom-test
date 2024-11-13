<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int id
 * @property string name
 * @property string event_date
 * @property string message
 * @property int created_by
 * @property User creator
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_date',
        'message',
        'created_by',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(
            NewsCategory::class,
            NewsHasCategory::class,
        );
    }
}
