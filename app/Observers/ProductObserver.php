<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Invoice;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $Invoice = Invoice::find($product->invoice_id);
        $Invoice->total = $Invoice->total + ($product->quantity * $product->price);
        $Invoice->save();
    }


    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        if($product->isDirty('quantity') || $product->isDirty('price')){

            $Invoice = Invoice::find($product->invoice_id);
            $Invoice->total = $Invoice->total - ($product->getOriginal('quantity') * $product->getOriginal('price'));
            $Invoice->save();
            $Invoice->total = $Invoice->total + ($product->quantity * $product->price);
            $Invoice->save();

          }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $Invoice = Invoice::find($product->invoice_id);
        $Invoice->total = $Invoice->total - ($product->quantity * $product->price);
        $Invoice->save();
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
