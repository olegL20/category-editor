<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

/**
 * @property int $id
 * @property array $title
 * @property string $currentTitle
 * @property int $parent_id
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title->en',
        'title->ua',
        'parent_id',
    ];

    protected $casts = [
        'title' => 'array',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCurrentTitleAttribute(): string
    {
        return json_decode($this->title, true)[App::currentLocale()];
    }
}
