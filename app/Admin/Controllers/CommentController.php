<?php

namespace App\Admin\Controllers;

use App\Comment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());

        $grid->column('id', __('Id'));
        $grid->column('commentable_type', __('Commentable type'));
        $grid->column('commentable_id', __('Commentable id'));
        $grid->column('user_id', __('User id'))->hide();
        $grid->column('author.name', __('Author'));
        $grid->column('banned_at', __('Banned at'))->hide();
        $grid->column('cache', __('Cache'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('deleted_at', __('Deleted at'))->hide();

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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('commentable_type', __('Commentable type'));
        $show->field('commentable_id', __('Commentable id'));
        $show->field('user_id', __('User id'));
        $show->author('作者信息', function ($author) {
            $author->setResource('/admin/users');
            $author->id();
            $author->name();
            $author->email();
        });
        $show->field('banned_at', __('Banned at'));
        $show->field('cache', __('Cache'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        $show->content('评论内容', function ($content) {
            $content->setResource('/admin/contents');
            $content->id();
            $content->body();
            $content->created_at();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment());

        $form->text('commentable_type', __('Commentable type'));
        $form->number('commentable_id', __('Commentable id'));
        $form->number('user_id', __('User id'));
        $form->datetime('banned_at', __('Banned at'))->default(date('Y-m-d H:i:s'));
        $form->text('cache', __('Cache'));

        return $form;
    }
}
