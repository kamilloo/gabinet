<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ShopRequest;
use App\Models\Category;
use App\Models\Enums\ShopStatus;
use App\Models\Shop;
use Illuminate\Http\Request;
use Tests\CreatesApplication;

class ShopController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $shop = $this->getShop();

        return view('backend.shop.show', compact('shop'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request)
    {
        $shop = $this->getShop();
        $shop->fill([
            'url' => $request->getUrl(),
            'status' => $request->getUrl() ? $request->getStatus(): ShopStatus::INACTIVE,
        ]);
        $shop->save();

        return redirect(route('shop.show'))->with(['status' => 'Zmiany zapisane.']);
    }

    /**
     * @return mixed
     */
    private function getShop()
    {
        return Shop::whereRaw('1=1')->first() ?? new Shop;
    }
}
