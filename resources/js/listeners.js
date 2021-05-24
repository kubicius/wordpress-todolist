function addTask(element){
    todolistTaskObj = new TodolistTask();
    idTodolist = getListId(element);
    todolistTaskObj.setIdTodolist(idTodolist);
    todolistTaskObj.setDescription(element.value);
    todolistTaskObj.add();
}

function deleteTask(element){
    todolistTaskObj = new TodolistTask();
    id = getTaskId(element);
    todolistTaskObj.setId(id);
    todolistTaskObj.delete();
}

function updateTask(element){
    todolistTaskObj = new TodolistTask();
    id = getTaskId(element);
    let task = todolist.querySelector( '#todolist_task_' + id );
    let checkbox = task.querySelector('.todolist__task-checkbox').value;
    checkbox = checkbox == 'on' ? 1 : 0;
    let input = task.querySelector('.todolist__task-input--edit').value;
    todolistTaskObj.setId(id);
    todolistTaskObj.setDescription(input);
    todolistTaskObj.setFinished(checkbox);
    todolistTaskObj.update();
}

function getListId(element){
    id = element.closest('.todolist__list').id;
    id = id.substring(id.lastIndexOf("_") + 1);
    return id;
}

function getTaskId(element){
    id = element.closest('.todolist__task').id;
    id = id.substring(id.lastIndexOf("_") + 1);
    return id;
}

const todolist = document.querySelector('.todolist');

todolist.querySelectorAll('.todolist__task-input--add').forEach(element => element.addEventListener( "change", () => addTask(element) ));
todolist.querySelectorAll('.todolist__task-checkbox').forEach(element => element.addEventListener( "change", () => updateTask(element) ));
todolist.querySelectorAll('.todolist__task-button--delete').forEach(element => element.addEventListener( "click", () => deleteTask(element) ));