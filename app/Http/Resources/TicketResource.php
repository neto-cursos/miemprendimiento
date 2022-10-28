<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => 'monica123',
            'subject'     => 'Monica en las nubes',
        ];
        /* 'isCompleted' => $this->completed_at !== null,
            'priority'    => $this->priority_id,
            'user'        => new UserResource($this->user),
            'agent'       => new UserResource($this->agent),
            'createdAt'   => $this->created_at->format('m/d/Y g:i A'),
            'updatedAt'   => $this->updated_at->format('m/d/Y g:i A'),
            'completedAt' => optional($this->completed_at)->format('m/d/Y g:i A'), */
    }
}
