<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Laravel\Scout\Searchable;

/**
 * App\Object
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static Builder|ObjectItem whereCreatedAt($value)
 * @method static Builder|ObjectItem whereDescription($value)
 * @method static Builder|Object whereId($value)
 * @method static Builder|ObjectItem whereName($value)
 * @method static Builder|ObjectItem whereType($value)
 * @method static Builder|ObjectItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ObjectItem extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    /**
     * @return BelongsToMany
     */
    public function children()
    {
        return $this->belongsToMany(ObjectItem::class, 'objectItem_relations', 'child_id', 'parent_id')
            ->withPivot('child_id', 'parent_id')
            ->withTimestamps();
    }
}
