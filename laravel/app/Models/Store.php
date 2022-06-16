<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Store
 *
 * @property int $store_id
 * @property int $manager_staff_id
 * @property int $address_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereManagerStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereStoreId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Address $address
 * @property-read Store|null $own
 * @property-read mixed $total_sales
 * @method static Builder|Store selectTotalSales()
 * @property-read \App\Models\Staff $staff
 */
class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $primaryKey = 'store_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    /**
     * Storeの自己結合を行うリレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function own()
    {
        return $this->hasOne(self::class, 'store_id', 'store_id');
    }

    /**
     * Storeに関連するAddressを取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Storeに関連するStaffを取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'manager_staff_id');
    }

    /**
     * Storeごとの売上集計を返すローカルスコープ
     * Store -> Inventory -> Rental -> Payment
     * と繋げた先のPayment.amountをSUMで集計する
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelectTotalSales(Builder $query)
    {
        $query->toBase()->select(DB::raw('SUM(payment.amount)'))
        ->join('inventory', 'inventory.store_id', '=', 'store.store_id')
        ->join('rental', 'rental.inventory_id', '=', 'inventory.inventory_id')
        ->join('payment', 'payment.rental_id', '=', 'rental.rental_id');

        return $query;
    }
}
