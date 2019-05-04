<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Link extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id'    =>  $this->id,
            'url'   =>  $this->url,
            'shorten'   =>  $this->shorten,
            'hits'      =>  $this->hits
        ];
    }

    public function with($request)
    {
        return [
            'version'       =>  '1.0.0',
            'author_url'    =>  url('https://edwardpalen.com')
        ];
    }
}
