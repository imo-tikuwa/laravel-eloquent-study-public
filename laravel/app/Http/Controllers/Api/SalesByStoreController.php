<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalesByStoreResource;
use App\Models\Store;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SalesByStoreController extends Controller
{
    /**
     * Storeごとの売上を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Store::query();
        $query->with([
            'address',
            'address.city',
            'address.city.country',
            'staff',
        ])->withCount([
            'own as total_sales' => function ($query) {
                $query->selectTotalSales();
            },
        ]);

        return SalesByStoreResource::collection($query->get());
    }
}
