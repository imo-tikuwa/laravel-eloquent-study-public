<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @property int $customer_id
 * @property int $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property int $address_id
 * @property bool $activebool
 * @property string $create_date
 * @property \Illuminate\Support\Carbon|null $last_update
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereActivebool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStoreId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Address $address
 */
class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $primaryKey = 'customer_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    /** @var string activebool = true の表示テキスト */
    const ACTIVEBOOL_TRUE = 'active';

    /** @var string activebool = false の表示テキスト */
    const ACTIVEBOOL_FALSE = '';

    /**
     * Customerに関連するAddressを取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
