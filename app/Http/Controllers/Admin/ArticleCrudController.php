<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
        $this->crud->addFilter([ // select2 filter
          'name' => 'category_id',
          'type' => 'select2',
          'label'=> 'Category'
        ], function() {
            return \App\Models\Category::all()->pluck('name', 'id')->toArray();
        }, function($value) { // if the filter is active
                $this->crud->addClause('where', 'category_id', $value);
        });
        $this->crud->addFilter([ // select2_multiple filter
          'name' => 'categories',
          'type' => 'select2_multiple',
          'label'=> 'Сategories'
        ], function() { // the options that show up in the select2
            return \App\Models\Category::all()->pluck('name', 'id')->toArray();
        }, function($values) { // if the filter is active
            foreach ($values as $key => $value) {
                $this->crud->query = $this->crud->query->whereHas('categories', function ($query) use ($value) {
                    $query->where('category_id', $value);
                });
            }
        });
        $this->crud->addField([
            'label' => "categories",
            'type' => 'select2_multiple',
            'name' => 'categories',
            'entity' => 'categories',
            'attribute' => 'name',
            'pivot' => true,
        ]);


    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('category_id');
        CRUD::column('categories');
        CRUD::column('name');
        CRUD::column('title');
        CRUD::column('descriptoin');
        CRUD::column('content');
        CRUD::column('meta_title');
        CRUD::column('meta_name');
        CRUD::column('slug');
        CRUD::column('created_at');
        CRUD::column('deleted_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
       * Define what happens when the Create operation is loaded.
       *
       * @see https://backpackforlaravel.com/docs/crud-operation-create
       * @return void
       */
      protected function setupCreateOperation()
      {
          //Тут валидатор для create
          CRUD::setValidation(ArticleRequest::class);

          CRUD::field('category_id');
          CRUD::field('name');
          CRUD::field('title');
          CRUD::field('descriptoin');
          CRUD::field('content');
          CRUD::field('meta_name');
          CRUD::field('meta_title');
          CRUD::field('slug');
      }

      /**
       * Define what happens when the Update operation is loaded.
       *
       * @see https://backpackforlaravel.com/docs/crud-operation-update
       * @return void
       */
      protected function setupUpdateOperation()
      {
          //Тут валидатор для апдейта
          CRUD::setValidation(UpdateArticleRequest::class);

          CRUD::field('category_id');
          CRUD::field('name');
          CRUD::field('title');
          CRUD::field('descriptoin');
          CRUD::field('content');
          CRUD::field('meta_name');
          CRUD::field('meta_title');
          CRUD::field('slug');
      }

}
