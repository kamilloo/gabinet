<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ItemSortable;
use App\Factories\PricingBuilder;
use App\Factories\PricingFactory;
use App\Factories\PricingRemover;
use App\Http\Controllers\Controller;
use App\Http\Requests\SortableRequest;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\PricingUpdateRequest;
use App\Http\Traits\Sortable;
use App\Models\Certificate;
use App\Models\Pricing;
use App\Models\PricingItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PricingItemController extends Controller
{
    use Sortable;

    public function sortable(Pricing $pricing, SortableRequest $request)
    {
        $resource = $pricing->items();

        $this->sortResources($resource, $request);

        return new JsonResponse(['message' => 'Cennik został zapisany.']);
    }

}
