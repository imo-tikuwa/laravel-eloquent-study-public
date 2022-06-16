<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalesByFilmCategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SalesByFilmCategoryController extends Controller
{
    /**
     * Categoryごとの売上を返します
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $query = Category::query();
        $query->withCount([
            'own as total_sales' => function ($query) {
                $query->selectTotalSales();
            },
        ]);

        return SalesByFilmCategoryResource::collection($query->get());
    }
}
