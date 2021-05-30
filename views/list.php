<div class="todolist wrap">
    <?php include $this->viewDirectory . 'header.php' ?>
    <div class="todolist__container">
        <?php foreach ($todolists as $todolist): ?>
        <div class="todolist__list" id="todolist_<?php echo $todolist['ID'] ?>">
            <div class="todolist__title">
                <span class="todolist__title-text"><?php echo $todolist['name'] ?></span><span class="todolist__button--edit dashicons dashicons-edit-large"></span><span class="todolist__button--delete dashicons dashicons-trash"></span>
            </div>
            <div class="todolist__title--edit"  style="display: none;">
                <input class="todolist__title-input" type="text" value="<?php echo $todolist['name'] ?>">
            </div>
            <div class="todolist__task todolist__task--add">
                <input type="text" placeholder="Add task" class="todolist__task-input--add">
            </div>
            <?php foreach ($todolist['tasks'] as $task): ?>
            <div class="todolist__task" id="todolist_task_<?php echo $task['ID'] ?>">
                <input type="checkbox" class="todolist__task-checkbox" <? echo $task['finished'] == 1 ? 'checked' : '' ?>>
                <span class="todolist__task-title"><?php echo $task['description'] ?></span>
                <input type="text" class="todolist__task-input--edit" value="<?php echo $task['description'] ?>" style="display:none;">
                <span class="todolist__task-button--edit dashicons dashicons-edit-large"></span>
                <span class="todolist__task-button--delete dashicons dashicons-trash"></span>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <div class="todolist__list todolist__list--new">
            <div class="todolist__title todolist__title--new">
            <span>New list</span><span class="dashicons dashicons-plus-alt"></span>
            </div>
            <div class="todolist__title"  style="display: none;">
                <span class="todolist__title-text"></span><span class="todolist__button--edit dashicons dashicons-edit-large"></span><span class="todolist__button--delete dashicons dashicons-trash"></span>
            </div>
            <div class="todolist__title--edit"  style="display: none;">
                <input class="todolist__title-input--new" type="text" placeholder="Title">
                <input class="todolist__title-input" type="text" placeholder="Title" style="display: none;">
            </div>
            <div class="todolist__task todolist__task--add" style="display: none;">
                <input type="text" placeholder="Add task" class="todolist__task-input--add">
            </div>
            <div class="todolist__task todolist__task--pattern" style="display:none;">
                <input type="checkbox" class="todolist__task-checkbox">
                <span class="todolist__task-title"></span>
                <input type="text" class="todolist__task-input--edit" style="display:none;">
                <span class="todolist__task-button--edit dashicons dashicons-edit-large"></span>
                <span class="todolist__task-button--delete dashicons dashicons-trash"></span>
            </div>
        </div>
    </div>
</div>
