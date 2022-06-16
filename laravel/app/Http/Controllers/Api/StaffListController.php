<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StaffListResource;
use App\Models\Staff;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StaffListController extends Controller
{
    /** @var int ページあたりの件数 */
    private const PER_PAGE_COUNT = 10;

    /**
     * Staffの一覧を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Staff::query();
        $query->with([
            'address',
            'address.city',
            'address.city.country',
        ]);
        $staffs = $query->paginate(self::PER_PAGE_COUNT);

        return StaffListResource::collection($staffs);
    }
}
