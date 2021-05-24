function addTask(){
    todolistTaskObj = new TodolistTask();
    idTodolist = getListId(this);
    todolistTaskObj.setIdTodolist(idTodolist);
    todolistTaskObj.setDescription(this.value);
    todolistTaskObj.add();
}

function getListId(element){
    id = element.closest('.todolist__list').id;
    id = id.substring(id.lastIndexOf("_") + 1);
    return id;
}

todolist = document.querySelector('.todolist');

todolist.querySelector('.todolist__task-input--add').addEventListener("change", addTask);