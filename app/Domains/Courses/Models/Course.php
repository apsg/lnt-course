<?php

namespace App\Domains\Courses\Models;

use App\Helpers\PermissionsHelper;
use App\User;
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
 * @property int         type
 *
 * @property-read User   user
 * @property-read string term
 *
 * @method Builder|Course isPublished()
 * @method Builder|Course isOpen()
 * @method Builder|Course isFuture()
 * @method Builder|Course isApplicable()
 * @method Builder|Course isOwner(User $user)
 * @method Builder|Course permissionView(User $user)
 *
 */
class Course extends Model
{
    const TYPE_ADEPT = 1;
    const TYPE_TRAINER = 2;
    const TYPE_ME = 3;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'starts_at',
        'ends_at',
        'published_at',
        'closed_at',
        'type',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
        'published_at',
        'closed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function scopeIsOwner(Builder $query, User $user)
    {
        $query->where('user_id', '=', $user->id);
    }

    public function scopePermissionView(Builder $query, User $user = null)
    {
        if ($user === null) {
            return $query->isPublished()->isFuture();
        }

        if ($user->can(PermissionsHelper::COURSE_EDIT_ANY)) {
            return;
        }

        if ($user->can(PermissionsHelper::COURSE_EDIT_OWN)) {
            $query->isPublished()->orWhere('user_id', '=', $user->id);
        }

        return $query->isPublished()->isFuture();
    }

    public function getTermAttribute() : string
    {
        $dates[] = $this->starts_at->format('Y-m-d H:i');

        if ($this->ends_at !== null) {
            $dates[] = $this->ends_at->format('Y-m-d H:i');
        }

        return implode(' - ', $dates);
    }

    public function getTypeStringAttribute() : string
    {
        return __('lnt.types.' . $this->type);
    }
}
