<?php
declare(strict_types=1);

namespace App\Http\Traits;

use App\Contracts\ItemSortable;
use App\Http\Requests\SortableRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

trait Sortable
{

    /**
     * @param HasMany|Builder $resource
     * @param SortableRequest $request
     */
    protected function sortResources($resource, SortableRequest $request): void
    {
        Collection::make($request->items())
            ->each(function (ItemSortable $sortable, $index) use ($resource) {
                (clone $resource)->where('id', $sortable->getId())->update(['position' => $index]);
            });
    }
}
