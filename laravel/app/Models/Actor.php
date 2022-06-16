<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Actor
 *
 * @property int $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Actor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereActorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereLastUpdate($value)
 * @mixin \Eloquent
 * @property-read string $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Film[] $films
 * @property-read int|null $films_count
 */
class Actor extends Model
{
    use HasFactory;

    protected $table = 'actor';

    protected $primaryKey = 'actor_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    protected $appends = [
        'full_name',
    ];

    /**
     * 姓名を繋げた文字列を返す
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Actorに関連するFilmについてFilmActorを介して取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function films()
    {
        return $this->hasManyThrough(
            Film::class,
            FilmActor::class,
            firstKey: 'actor_id',
            secondKey: 'film_id',
            localKey: 'actor_id',
            secondLocalKey: 'film_id',
        );
    }
}
