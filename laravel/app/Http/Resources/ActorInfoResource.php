<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ActorInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Actor $this */
        return [
            'actor_id' => $this->actor_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'film_info' => implode(', ', $this->films->pluck('category_and_title')->toArray()),
        ];
    }
}
