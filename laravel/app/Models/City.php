<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property int $city_id
 * @property string $city
 * @property int $country_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereLastUpdate($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Country $country
 */
class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    protected $primaryKey = 'city_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    /**
     * Cityに関連するCountryを取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
