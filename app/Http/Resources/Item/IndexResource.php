<?php

namespace App\Http\Resources\Item;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subject' =>$this->subject,
            'text' =>$this->text,
            'date' =>Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('Y-m-d'),
            'time' =>Carbon::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('H:i'),
            'done' => $this->done,

        ];
    }
}
