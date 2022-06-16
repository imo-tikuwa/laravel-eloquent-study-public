<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilmActor
 *
 * @property int $actor_id
 * @property int $film_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereActorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmActor whereLastUpdate($value)
 * @mixin \Eloquent
 */
class FilmActor extends Model
{
    use HasFactory;

    protected $table = 'film_actor';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];
}
