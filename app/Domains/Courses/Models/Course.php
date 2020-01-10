<?php

namespace App\Domains\Courses\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App
 *
 * @property int         id
 * @property string      title
 * @property string      description
 * @property int         user_id
 * @property Carbon      starts_at
 * @property Carbon|null ends_at
 * @property Carbon|null published_at
 * @property Carbon|null closed_at
 *
 * @property-read User   user
 *
 * @method Builder|Course isPublished()
 * @method Builder|Course isOpen()
 * @method Builder|Course isFuture()
 * @method Builder|Course isApplicable()
 *
 */
class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'starts_at',
        'ends_at',
        'published_at',
        'closed_at',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
        'published_at',
        'closed_at',
    ];

    public function scopeIsPublished(Builder $query)
    {
        return $query->where(function (Builder $q) {
            return $q->whereNull('published_at')
                ->orWhere('published_at', '<', Carbon::now());
        });
    }

    public function scopeIsOpen(Builder $query)
    {
        return $query->where(function (Builder $q) {
            return $q->whereNull('closed_at')
                ->orWhere('closed_at', '>', Carbon::now());
        });
    }

    public function scopeIsFuture(Builder $query)
    {
        return $query->where('starts_at', '>', Carbon::now());
    }

    public function scopeIsApplicable(Builder $query)
    {
        return $query->isPublished()
            ->isFuture()
            ->isOpen();
    }
}
