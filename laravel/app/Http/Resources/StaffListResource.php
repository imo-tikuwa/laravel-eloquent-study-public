<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class StaffListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Staff $this */
        return [
            'id' => $this->staff_id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'address' => $this->address->address,
            'zip_code' => $this->address->postal_code,
            'phone' => $this->address->phone,
            'city' => $this->address->city->city,
            'country' => $this->address->city->country->country,
            'sid' => $this->store_id,
        ];
    }
}
