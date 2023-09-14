<?php

namespace App\Http\Resources\Item;

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
            'date' =>$this->date,
            'month' =>$this->month,
            'year' =>$this->year,
            'done' => $this->done,

        ];
    }
}
