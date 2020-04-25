<?php

namespace App\Http\Requests;

use App\Contracts\ItemSortable;
use App\Contracts\PricingItemRequestDataProvider;
use App\Contracts\SortableDataProvider;
use App\Contracts\PricingRequestDataProvider;
use App\Http\Requests\Concerns\NameEntryDataTrait;
use App\Http\Requests\Concerns\TitleAndDescriptionDataTrait;
use App\Http\Requests\Concerns\UploadFileEntryDataTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use PhpParser\Builder\Class_;

class SortableRequest extends Request implements SortableDataProvider
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payload' => ['required', 'array'],
            'payload.*.id' => ['required', 'integer'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function items(): array
    {
        return Collection::make($this->input('payload'))->map(function (array $item){
            return $this->toSortableItem($item);
        })->all();
    }

    private function toSortableItem(array $item)
    {
        return new class($item) implements ItemSortable {

            /**
             * @var array
             */
            protected $item;

            public function __construct(array $item)
            {
                $this->item = $item;
            }

            public function getId(): int
            {
                return Arr::get($this->item, 'id');
            }
        };
    }
}
