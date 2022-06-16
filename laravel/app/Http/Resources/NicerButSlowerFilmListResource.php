<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class NicerButSlowerFilmListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Film $this */
        return [
            'fid' => $this->film_id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category?->name,
            'price' => $this->rental_rate,
            'length' => $this->length,
            'rating' => $this->rating,
            'actors' => implode(', ', $this->actors->pluck('full_name')->toArray()),
        ];
    }
}
