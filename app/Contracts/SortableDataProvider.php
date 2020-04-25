<?php

namespace App\Contracts;

interface SortableDataProvider
{
    /**
     * @return ItemSortable[]
     */
    public function items(): array;
}
