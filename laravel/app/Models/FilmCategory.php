<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilmCategory
 *
 * @property int $film_id
 * @property int $category_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmCategory whereLastUpdate($value)
 * @mixin \Eloquent
 */
class FilmCategory extends Model
{
    use HasFactory;

    protected $table = 'film_category';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];
}
