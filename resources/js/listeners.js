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

todolist = document.querySelector('.todolist');

todolist.querySelectorAll('.todolist__task-input--add').forEach(element => element.addEventListener( "change", () => addTask(element) ));
todolist.querySelectorAll('.todolist__task-button--delete').forEach(element => element.addEventListener( "click", () => deleteTask(element) ));