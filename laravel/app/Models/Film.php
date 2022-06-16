<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Film
 *
 * @property int $film_id
 * @property string $title
 * @property string|null $description
 * @property string|null $release_year
 * @property int $language_id
 * @property int $rental_duration
 * @property string $rental_rate
 * @property int|null $length
 * @property string $replacement_cost
 * @property string|null $rating
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Film newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film query()
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereReleaseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRentalDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRentalRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereReplacementCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Actor[] $actors
 * @property-read int|null $actors_count
 * @property-read string $category_and_title
 */
class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $primaryKey = 'film_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    protected $appends = [
        'category_and_title',
    ];

    /**
     * カテゴリ名とタイトルを繋げた文字列を返す
     *
     * @return string
     */
    public function getCategoryAndTitleAttribute()
    {
        return $this->category?->name . ': ' . $this->title;
    }

    /**
     * Filmに関連するCategoryについてFilmCategoryを介して取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function category()
    {
        return $this->hasOneThrough(
            Category::class,
            FilmCategory::class,
            firstKey: 'film_id',
            secondKey: 'category_id',
            localKey: 'film_id',
            secondLocalKey: 'category_id',
        );
    }

    /**
     * Filmに関連するActorについてFilmActorを介して取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function actors()
    {
        return $this->hasManyThrough(
            Actor::class,
            FilmActor::class,
            firstKey: 'film_id',
            secondKey: 'actor_id',
            localKey: 'film_id',
            secondLocalKey: 'actor_id',
        );
    }
}
