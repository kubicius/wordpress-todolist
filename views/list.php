<div class="todolist wrap">
    <?php include $this->viewDirectory . 'header.php' ?>
    <div class="todolist__container">
        <?php foreach ($todolists as $todolist): ?>
        <div class="todolist__list" id="todolist_1">
            <div class="todolist__title">
                <span><?php echo $todolist['name'] ?></span><span class="todolist__button--delete dashicons dashicons-trash"></span>
            </div>
            <div class="todolist__task">
                <input type="text" placeholder="Add task" class="todolist__task-input--add">
            </div>
            <div class="todolist__task todolist__task--pattern" style="display:none;">
                <input type="checkbox">
                <input type="text" class="todolist__task-input--add" style="display:none;">
                <span class="todolist__task-button--edit dashicons dashicons-edit-large"></span>
                <span class="todolist__task-button--delete dashicons dashicons-trash"></span>
            </div>
            <?php foreach ($todolist['tasks'] as $task): ?>
            <div class="todolist__task">
                <input type="checkbox">
                <span class="todolist__task-title"><?php echo $task['description'] ?></span>
                <span class="todolist__task-button--edit dashicons dashicons-edit-large"></span>
                <span class="todolist__task-button--delete dashicons dashicons-trash"></span>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <div class="todolist__list todolist__list--new">
            <div class="todolist__title">
                <span>Add new to-do list</span>
            </div>
            <div class="todolist__task">
                <input type="text" placeholder="Add task">
            </div>
            <div class="todolist__task" style="display:none;">
                <input type="checkbox">
                <span class="todolist__task-title"></span>
                <span class="dashicons dashicons-trash"></span>
            </div>
        </div>
    </div>
</div>
