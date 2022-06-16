<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Staff
 *
 * @property int $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property string|null $email
 * @property int $store_id
 * @property bool $active
 * @property string $username
 * @property string|null $password
 * @property string $last_update
 * @property mixed|null $picture
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUsername($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Address $address
 */
class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'staff_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];

    /**
     * Staffに関連するAddressを取得する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
