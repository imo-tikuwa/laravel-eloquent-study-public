<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ianguage
 *
 * @property int $language_id
 * @property string $name
 * @property string $last_update
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage whereLastUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ianguage whereName($value)
 * @mixin \Eloquent
 */
class Ianguage extends Model
{
    use HasFactory;

    protected $table = 'language';

    protected $primaryKey = 'language_id';

    const UPDATED_AT = 'last_update';

    protected $fillable = [
    ];

    protected $guarded = [
    ];

    protected $casts = [
    ];
}
