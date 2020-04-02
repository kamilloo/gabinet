<?php

namespace App\Http\ViewComposers;

use App\Models\Enums\ModuleType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ActiveModuleComposer
{

    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $view->with('active_module', $this->findActiveModule());
    }


    private function findActiveModule():string
    {
        $request_path = $this->request->path();
        foreach (ModuleType::all() as $module)
        {
            if (Str::contains($request_path, $module))
            {
                return $module;
            }
        }
        return '';
    }
}
