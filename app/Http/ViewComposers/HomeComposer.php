<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Contracts\CategoryContract;
use App\Contracts\EntryContract;

class HomeComposer
{

    /**
     * @var CategoryContract
     */
    private $categoryService;

    /**
     * @var EntryContract
     */
    private $entryService;

    public function __construct(CategoryContract $categoryContract, EntryContract $entryContract)
    {

        // Injecting the Category and Entry services via the service container.
        $this->categoryService = $categoryContract;
        $this->entryService = $entryContract;
    }

    public function compose(View $view)
    {

        // Get the categories for use on the page.
        $categoriesResponse = $this->categoryService->getCategories(['limit' => 100]);

        $categories = array_map(function($category){
            return $category->toArray();
        },$categoriesResponse->items());

        $view->with('categories', $categories);
    }
}
