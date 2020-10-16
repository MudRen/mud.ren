<?php

namespace App\Admin\Controllers;

use App\Node;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Layout\Content;

class NodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Node';

    public function index(Content $content)
    {
        $tree = new Tree(new Node);

        return $content
            ->header('树状模型')
            ->body($tree);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Node());

        $grid->column('id', __('Id'));
        $grid->column('node_id', __('Node id'));
        $grid->column('title', __('Title'));
        $grid->column('icon', __('Icon'));
        $grid->column('banner', __('Banner'));
        $grid->column('description', __('Description'));
        $grid->column('settings', __('Settings'));
        $grid->column('cache', __('Cache'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        // $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Node::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('node_id', __('Node id'));
        $show->field('title', __('Title'));
        $show->field('icon', __('Icon'));
        $show->field('banner', __('Banner'));
        $show->field('description', __('Description'));
        $show->field('settings', __('Settings'));
        $show->field('cache', __('Cache'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
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
        $form = new Form(new Node());

        $form->number('node_id', __('Node id'));
        $form->text('title', __('Title'));
        $form->text('icon', __('Icon'));
        $form->text('banner', __('Banner'));
        $form->text('description', __('Description'));
        $form->text('settings', __('Settings'));
        $form->text('cache', __('Cache'));

        return $form;
    }
}
