<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        $grid->column('type_id', __('Type'))->display(function () {
            return $this->type->name;
        });
        $grid->column('category_id', __('Category'))->display(function () {
            return $this->category->title;
        })->sortable();
        $grid->column('question', __('Question'));
        $grid->column('difficulty', __('Difficulty'))->using(['简单', '普通', '困难'], '？');
        $grid->column('score', __('Score'));
        $grid->column('meta', __('Meta'))->label();
        $grid->column('answer', __('Answer'))->display(function ($value) {
            // 非选择题直接返回结果
            if ($this->type->id > 3) {
                return $value;
            }
            return array_map(function ($n) {
                // return ['A', 'B', 'C', 'D', 'E', 'F', 'G'][$n];
                return chr($n + 65);
            }, $value);
        })->label();
        $grid->column('analysis', __('Analysis'))->hide();
        $grid->column('created_at', __('Created at'))->sortable();
        // $grid->column('updated_at', __('Updated at'));

        $grid->quickSearch('question', 'meta');
        $grid->enableHotKeys();

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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type_id', __('Type id'));
        $show->field('category_id', __('Category id'));
        $show->field('question', __('Question'));
        $show->field('difficulty', __('Difficulty'));
        $show->field('score', __('Score'));
        $show->field('meta', __('Meta'))->json();
        $show->field('answer', __('Answer'))->json();
        $show->field('analysis', __('Analysis'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question());

        $form->select('type_id', __('Type id'))->options(Type::pluck('name', 'id'));
        $form->select('category_id', __('Category id'))->options(Category::pluck('title', 'id'));
        $form->select('difficulty', __('Difficulty'))->options(["简单", "普通", "困难"]);
        $form->decimal('score', __('Score'))->default(1);
        $form->textarea('question', __('Question'));
        $form->list('meta', __('Meta'));
        $form->list('answer', __('Answer'));
        $form->textarea('analysis', __('Analysis'));

        return $form;
    }
}
