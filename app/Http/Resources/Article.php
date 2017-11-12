<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Article extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' =>$this->collection,
            'articles' => [
                'self' => 'link-value'
            ],
            // 'id' => $this->id,
            // 'title' => $this->title,
            // 'link' => $this->link,
            // 'pic_link' => $this->pic_link,
            // 'date' => $this->date,
            // 'time' => $this->time,
            // 'body' => $this->body,
            // 'pic_link_large' => $this->pic_link_large,
            // 'date_time' => $this->date_time,
        ];
    }
}
