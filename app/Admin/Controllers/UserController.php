<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('username', __('Username'));
        $grid->column('email', __('Email'));
        // $grid->column('phone', __('Phone'));
        // $grid->column('password', __('Password'));
        $grid->column('avatar', __('Avatar'));
        // $grid->column('realname', __('Realname'));
        // $grid->column('gender', __('Gender'));
        // $grid->column('bio', __('Bio'));
        // $grid->column('extends', __('Extends'));
        // $grid->column('settings', __('Settings'));
        $grid->column('level', __('Level'));
        $grid->column('is_admin', __('Is admin'));
        $grid->column('cache', __('Cache'));
        // $grid->column('last_active_at', __('Last active at'));
        $grid->column('banned_at', __('Banned at'));
        $grid->column('activated_at', __('Activated at'));
        // $grid->column('remember_token', __('Remember token'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        // $grid->column('deleted_at', __('Deleted at'));
        $grid->column('energy', __('Energy'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('password', __('Password'));
        $show->field('avatar', __('Avatar'));
        $show->field('realname', __('Realname'));
        $show->field('gender', __('Gender'));
        $show->field('bio', __('Bio'));
        $show->field('extends', __('Extends'));
        $show->field('settings', __('Settings'));
        $show->field('level', __('Level'));
        $show->field('is_admin', __('Is admin'));
        $show->field('cache', __('Cache'));
        $show->field('last_active_at', __('Last active at'));
        $show->field('banned_at', __('Banned at'));
        $show->field('activated_at', __('Activated at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('energy', __('Energy'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->text('username', __('Username'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->password('password', __('Password'));
        $form->image('avatar', __('Avatar'));
        $form->text('realname', __('Realname'));
        $form->text('gender', __('Gender'))->default('male');
        $form->text('bio', __('Bio'));
        $form->text('extends', __('Extends'));
        $form->text('settings', __('Settings'));
        $form->number('level', __('Level'));
        $form->switch('is_admin', __('Is admin'));
        $form->text('cache', __('Cache'));
        $form->datetime('last_active_at', __('Last active at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('banned_at', __('Banned at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('activated_at', __('Activated at'))->default(date('Y-m-d H:i:s'));
        $form->text('remember_token', __('Remember token'));
        $form->number('energy', __('Energy'));

        return $form;
    }
}
