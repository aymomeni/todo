<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Todo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body
        ];
    }

    // can add custom json elements and formats to what is returned
    // public function with($request)
    // {
    //     return [
    //         'version' => '1.0.0',
    //         'author_url' => url("http://traversymedia.com")
    //     ];
    // }
}
