<?php declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CustomerListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Customer $this */
        return [
            'id' => $this->customer_id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'address' => $this->address->address,
            'zip_code' => $this->address->postal_code,
            'phone' => $this->address->phone,
            'city' => $this->address->city->city,
            'country' => $this->address->city->country->country,
            'notes' => $this->activebool ? Customer::ACTIVEBOOL_TRUE : Customer::ACTIVEBOOL_FALSE,
            'sid' => $this->store_id,
        ];
    }
}
