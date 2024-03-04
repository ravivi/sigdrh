<?php

namespace App\Admin\Controllers;

use App\Models\Grade;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GradeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Grade';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Grade());

        // $grid->column('id', __('Id'));
        // $grid->column('libelle', __('Libelle'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        // $grid->column('created_by', __('Created by'));
        // $grid->column('updated_by', __('Updated by'));
        // $grid->column('deleted_by', __('Deleted by'));
        // $grid->column('deleted_at', __('Deleted at'));
        $grid->id('Id')->sortable();
        $grid->libelle('Libelle');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        // $grid->filter(function() {
        //     $filter->scope('trashed', 'Recycle Bin')->onlyTrashed();
        // });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Grade::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('libelle', __('Libelle'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('created_by', __('Created by'));
        $show->field('updated_by', __('Updated by'));
        $show->field('deleted_by', __('Deleted by'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Grade());

        $form->text('libelle', __('Libelle'));
        $form->number('created_by', __('Created by'));
        $form->number('updated_by', __('Updated by'));
        $form->number('deleted_by', __('Deleted by'));

        return $form;
    }
}
