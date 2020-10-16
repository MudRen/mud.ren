<?php

namespace App\Admin\Controllers;

use App\Thread;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ThreadController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Thread';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Thread());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('node_id', __('Node id'));
        $grid->column('title', __('Title'));
        $grid->column('excellent_at', __('Excellent at'))->hide();
        $grid->column('pinned_at', __('Pinned at'))->hide();
        $grid->column('frozen_at', __('Frozen at'))->hide();
        $grid->column('banned_at', __('Banned at'))->hide();
        $grid->column('published_at', __('Published at'));
        $grid->column('cache', __('Cache'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('deleted_at', __('Deleted at'))->hide();
        $grid->column('popular_at', __('Popular at'))->hide();

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
        $show = new Show(Thread::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->author('作者信息', function ($author) {
            $author->setResource('/admin/users');
            $author->id();
            $author->name();
            $author->email();
        });
        $show->field('node_id', __('Node id'));
        $show->node('话题分类', function ($node) {
            $node->setResource('/admin/nodes');
            $node->id();
            $node->title();
            $node->description();
        });
        $show->field('title', __('Title'));
        $show->field('excellent_at', __('Excellent at'));
        $show->field('pinned_at', __('Pinned at'));
        $show->field('frozen_at', __('Frozen at'));
        $show->field('banned_at', __('Banned at'));
        $show->field('published_at', __('Published at'));
        $show->field('cache', __('Cache'))->json();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('popular_at', __('Popular at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Thread());

        $form->number('user_id', __('User id'));
        $form->number('node_id', __('Node id'));
        $form->text('title', __('Title'));
        $form->datetime('excellent_at', __('Excellent at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('pinned_at', __('Pinned at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('frozen_at', __('Frozen at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('banned_at', __('Banned at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('published_at', __('Published at'))->default(date('Y-m-d H:i:s'));
        $form->text('cache', __('Cache'));
        $form->datetime('popular_at', __('Popular at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
