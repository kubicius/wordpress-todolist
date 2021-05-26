function todolistAddTask(element){
    let todolistTaskObj = new TodolistTask();
    let idTodolist = todolistGetListId(element);
    let description = element.value;
    todolistTaskObj.setIdTodolist(idTodolist);
    todolistTaskObj.setDescription(description);
    let response = todolistTaskObj.add();
    if(response.id != undefined){
        element.value = '';
        let list = todolist.querySelector('#todolist_' + idTodolist);
        let pattern = todolist.querySelector('.todolist__task--pattern');
        list.appendChild(pattern);
        let newTask = list.querySelector('.todolist__task--pattern');
        newTask.classList.remove('.todolist__task--pattern');
        newTask.querySelector('.todolist__task-title').innerHTML = description;
        newTask.querySelector('.todolist__task-input--edit').value = description;
        newTask.style.display = "flex";
        newTask.id = 'todolist_task_' + response.id;
    }else{
        todolistShowError('Error during task adding.');
    }
}

function todolistDeleteTask(element){
    let todolistTaskObj = new TodolistTask();
    let id = todolistGetTaskId(element);
    todolistTaskObj.setId(id);
    todolistTaskObj.delete();
    let task = todolist.querySelector('#todolist_task_' + id);
    task.remove();
}

function todolistUpdateTask(element){
    todolistTaskObj = new TodolistTask();
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector( '#todolist_task_' + id );
    let checkbox = task.querySelector('.todolist__task-checkbox').checked;
    checkbox = checkbox ? '1' : '0';
    let description = task.querySelector('.todolist__task-input--edit').value;
    todolistTaskObj.setId(id);
    todolistTaskObj.setDescription(description);
    todolistTaskObj.setFinished(checkbox);
    todolistTaskObj.update();
    todolistHideInput(element);
    let text = task.querySelector('.todolist__task-title');
    text.innerHTML = description;
}

function todolistShowInput(element){
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector( '#todolist_task_' + id );
    let input = task.querySelector('.todolist__task-input--edit');
    let text = task.querySelector('.todolist__task-title');
    input.style.display = "inline";
    text.style.display = "none";
}

function todolistHideInput(element){
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector( '#todolist_task_' + id );
    let input = task.querySelector('.todolist__task-input--edit');
    let text = task.querySelector('.todolist__task-title');
    input.style.display = "none";
    text.style.display = "inline";
}

function todolistGetListId(element){
    let id = element.closest('.todolist__list').id;
    id = id.substring(id.lastIndexOf("_") + 1);
    return id;
}

function todolistGetTaskId(element){
    let id = element.closest('.todolist__task').id;
    id = id.substring(id.lastIndexOf("_") + 1);
    return id;
}

function todolistShowError(string){
    alert(string);
}

const todolist = document.querySelector('.todolist');

todolist.querySelectorAll('.todolist__task-input--add').forEach(element => element.addEventListener( "change", () => todolistAddTask(element) ));
todolist.querySelectorAll('.todolist__task-checkbox').forEach(element => element.addEventListener( "change", () => todolistUpdateTask(element) ));
todolist.querySelectorAll('.todolist__task-input--edit').forEach(element => element.addEventListener( "change", () => todolistUpdateTask(element) ));
todolist.querySelectorAll('.todolist__task-button--delete').forEach(element => element.addEventListener( "click", () => todolistDeleteTask(element) ));
todolist.querySelectorAll('.todolist__task-button--edit').forEach(element => element.addEventListener( "click", () => todolistShowInput(element) ));