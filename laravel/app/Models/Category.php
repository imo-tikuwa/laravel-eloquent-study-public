<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Category
 *
 * @property int $category_id
 * @property string $name
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @mixin \Eloquent
 * @property-read \App\Models\FilmCategory|null $filmCategory
 * @property-read Category|null $own
 * @property-read mixed $total_sales
 * @method static Builder|Category selectTotalSales()
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'category_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    /**
     * Categoryの自己結合を行うリレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function own()
    {
        return $this->hasOne(self::class, 'category_id', 'category_id');
    }

    /**
     * Categoryごとの売上集計を返すローカルスコープ
     * Category -> FilmCategory -> Film -> Inventory -> Rental -> Payment
     * と繋げた先のPayment.amountをSUMで集計する
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectTotalSales(Builder $query)
    {
        $query->toBase()->select(DB::raw('SUM(payment.amount)'))
        ->join('film_category', 'film_category.category_id', '=', 'category.category_id')
        ->join('film', 'film.film_id', '=', 'film_category.film_id')
        ->join('inventory', 'inventory.film_id', '=', 'film.film_id')
        ->join('rental', 'rental.inventory_id', '=', 'inventory.inventory_id')
        ->join('payment', 'payment.rental_id', '=', 'rental.rental_id');

        return $query;
    }
}
