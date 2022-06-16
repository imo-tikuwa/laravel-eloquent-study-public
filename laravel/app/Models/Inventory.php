<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inventory
 *
 * @property int $inventory_id
 * @property int $film_id
 * @property int $store_id
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereFilmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereStoreId($value)
 * @mixin \Eloquent
 */
class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $primaryKey = 'inventory_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];
}
