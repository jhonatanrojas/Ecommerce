<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return[
           'data'=> $this->collection->transform(function($element){
               return [
                        'title'=>$element->title,
                        'id'=>$element->id,
                        'humanPrice'=> "$". ($element->price /100),
                        'numberPrice'=> $element->price /100,
                        'description'=> $element->description7,
                        'image'=> $element->image_url
               ];
           })
        ];
    }
}
