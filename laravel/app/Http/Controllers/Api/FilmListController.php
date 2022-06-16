<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmListResource;
use App\Models\Film;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FilmListController extends Controller
{
    /** @var int ページあたりの件数 */
    private const PER_PAGE_COUNT = 10;

    /**
     * Filmの一覧を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Film::query();
        $query->with([
            'category',
            'actors',
        ]);

        $films = $query->paginate(self::PER_PAGE_COUNT);

        return FilmListResource::collection($films);
    }
}
