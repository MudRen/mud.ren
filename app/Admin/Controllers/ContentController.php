<?php

namespace App\Admin\Controllers;

use App\Content;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Content';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Content());

        $grid->column('id', __('Id'));
        $grid->column('contentable_type', __('Contentable type'));
        $grid->column('contentable_id', __('Contentable id'));
        $grid->column('body', __('Body'));
        $grid->column('markdown', __('Markdown'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('deleted_at', __('Deleted at'))->hide();

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('body', '内容');

        });

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
        $show = new Show(Content::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('contentable_type', __('Contentable type'));
        $show->field('contentable_id', __('Contentable id'));
        $show->field('body', __('Body'));
        $show->field('markdown', __('Markdown'));
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
        $form = new Form(new Content());

        $form->text('contentable_type', __('Contentable type'));
        $form->number('contentable_id', __('Contentable id'));
        $form->textarea('body', __('Body'));
        $form->textarea('markdown', __('Markdown'));

        return $form;
    }
}
