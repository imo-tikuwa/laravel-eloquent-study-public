<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorInfoResource;
use App\Models\Actor;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActorInfoController extends Controller
{
    /** @var int ページあたりの件数 */
    private const PER_PAGE_COUNT = 10;

    /**
     * Actorの一覧を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Actor::query();
        $query->with([
            'films',
            'films.category',
        ]);

        $customers = $query->paginate(self::PER_PAGE_COUNT);

        return ActorInfoResource::collection($customers);
    }
}
