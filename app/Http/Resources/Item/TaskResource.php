<?php

namespace App\Http\Resources\Item;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'text' => $this->text,
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('Y-m-d'),
            'time' => Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('H:i'),
            'day' => Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('d'),
            'month' => Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('m'),
            'year' => Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('Y'),
            'done' => $this->done,
        ];
    }
}
