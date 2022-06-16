<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerListResource;
use App\Models\Customer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerListController extends Controller
{
    /** @var int ページあたりの件数 */
    private const PER_PAGE_COUNT = 10;

    /**
     * Customerの一覧を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Customer::query();
        $query->with([
            'address',
            'address.city',
            'address.city.country',
        ]);

        $customers = $query->paginate(self::PER_PAGE_COUNT);

        return CustomerListResource::collection($customers);
    }
}
