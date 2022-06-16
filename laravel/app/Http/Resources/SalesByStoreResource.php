<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SalesByStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Store $this */
        return [
            'store' => $this->address->city->city . ',' . $this->address->city->country->country,
            'manager' => $this->staff->first_name . ' ' . $this->staff->last_name,
            'total_sales' => $this->total_sales,
        ];
    }
}
