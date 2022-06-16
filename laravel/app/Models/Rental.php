<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rental
 *
 * @property int $rental_id
 * @property string $rental_date
 * @property int $inventory_id
 * @property int $customer_id
 * @property string|null $return_date
 * @property int $staff_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Rental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereRentalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereStaffId($value)
 * @mixin \Eloquent
 */
class Rental extends Model
{
    use HasFactory;

    protected $table = 'rental';

    protected $primaryKey = 'rental_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];
}
