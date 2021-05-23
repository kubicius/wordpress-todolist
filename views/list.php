<div class="wrap">
    <?php include $this->viewDirectory . 'header.php' ?>
    <div class="todolist__container">
        <?php //foreach ($lists as $list): ?>
            <div class="todolist__list">
                <div class="todolist__title">
                    <span>Title</span><span class="dashicons dashicons-trash"></span>
                </div>
                <div class="todolist__task">
                    <input type="text" placeholder="Add task">
                </div>
                <div class="todolist__task" style="display:none;">
                    <input type="checkbox">
                    <span class="todolist__taskTitle"></span>
                    <span class="dashicons dashicons-trash"></span>
                </div>
                <div class="todolist__task">
                    <input type="checkbox">
                    <span class="todolist__taskTitle">Title</span>
                    <span class="dashicons dashicons-edit-large"></span>
                    <span class="dashicons dashicons-trash"></span>
                </div>
            </div>
        <?php //endforeach; ?>
        <div class="todolist__list todolist__list--new">
            <div class="todolist__title">
                <span>Add new to-do list</span>
            </div>
            <div class="todolist__task">
                <input type="text" placeholder="Add task">
            </div>
            <div class="todolist__task" style="display:none;">
                <input type="checkbox">
                <span class="todolist__taskTitle"></span>
                <span class="dashicons dashicons-trash"></span>
            </div>
        </div>
    </div>
</div>
