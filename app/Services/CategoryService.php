<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\CategoryContract;
use App\Category;

/**
 * Class CategoryService
 * Provides an abstraction to all I/Os surrounding Categories. This service is bound into the service container as
 * CategoryService, and is also implicitly bound into the CategoryController.
 *
 * @package App\Services
 */
class CategoryService implements CategoryContract
{

    /**
     * Creates a new category. If ?parent_id is provided in the URL query, then we will append it to the correct parent.
     * @param array $data
     * @return Model
     */
    public function createCategory(array $data) : Model
    {

        // Create the new category model.
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->user_id = auth()->user()->id;

        // Check if this is a child node. If so, append it... otherwise it is a root.
        if (isset($data['parent_id'])) {

            $parentCategory = $this->getCategory($data['parent_id']);
            $parentCategory->appendNode($category);

        } else {

            $category->save();
        }

        // Return the model so that we can work with it if needed.
        return $category;
    }

    /**
     * Deletes a category given ID. Deleting a parent category also deletes a child category.
     * @param int $id
     */
    public function deleteCategory(int $id)
    {

        return $this->getCategory($id)->delete();
    }

    /**
     * Gets a category along with it's ancestors and children given the ID.
     * @param int $id
     * @param array $options
     * @return Model
     */
    public function getCategory(int $id, array $options = []) : Model
    {

        return Category::with(['ancestors','children'])->findOrFail($id);
    }

    /**
     * Returns a paginated list of all categories along with their ancestors. Useful for building menus etc...
     * @param array $options
     * @return array
     */
    public function getCategories(array $options = []) : LengthAwarePaginator
    {
        // Let the front end set the limit. Why not?
        $limit = isset($options['limit']) ? $options['limit'] : 30;

        return Category::with(['children'])->paginate($limit);
    }

    /**
     * Updates the category name and slug of an existing category.
     * @param int $id
     * @param array $options
     * @return Model
     */
    public function updateCategory(int $id, array $data = []) : Model
    {

        // Find the category in the database or die trying.
        $category = Category::findOrFail($id);

        // Update the data. In a production environment, I would handle parent changes using transactions.
        $category->name = $data['name'];
        $category->slug = $data['slug'];

        $category->save();

        return $category;
    }
}
