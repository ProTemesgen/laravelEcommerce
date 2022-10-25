<?php

namespace App\Http\Livewire;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;


    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $product            = Product::where('slug', $this->slug)->first();
        $popular_product    = Product::inRandomOrder()->limit(6)->get();
        $related_product    = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(6)->get();


        return view('livewire.details-component',[

            'product'           =>$product,
            'popular_product'   =>$popular_product,
            'related_product'   =>$related_product,

        ])->layout('layouts.base');
    }
}
