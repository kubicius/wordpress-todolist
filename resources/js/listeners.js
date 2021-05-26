const todolist = document.querySelector('.todolist');

// Tasks.
todolist.addEventListener('change', function (event){
    if(event.target.classList.contains('todolist__task-input--add')) {
        todolistAddTask(event.target)
    }

    if(event.target.classList.contains('todolist__task-input--edit') || event.target.classList.contains('todolist__task-checkbox')) {
        todolistUpdateTask(event.target)
    }
});

todolist.addEventListener('click', function (event){
    if(event.target.classList.contains('todolist__task-button--delete')) {
        todolistDeleteTask(event.target)
    }

    if(event.target.classList.contains('todolist__task-button--edit')) {
        todolistShowTaskInput(event.target)
    }

    if(event.target.classList.contains('todolist__task-title')) {
        todolistToggleCheckbox(event.target)
    }
});

// Lists.
todolist.querySelector('.todolist__list--new').addEventListener( "click", todolistAddList );

todolist.addEventListener('click', function (event){
    if(event.target.classList.contains('todolist__button--delete')) {
        todolistDeleteList(event.target);
    }

    if(event.target.classList.contains('todolist__button--edit')) {
        todolistShowListInput(event.target);
    }
});

todolist.addEventListener('change', function (event){
    if(event.target.classList.contains('todolist__title-input')) {
        todolistUpdateList(event.target)
    }
});

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
        todolistShowError('Error occured during adding task.');
    }
}

function todolistAddList(){
    let container = todolist.querySelector('.todolist__container');
    let newList = this.cloneNode(true)
    container.append(newList, container.lastElementChild);
    this.style.display = 'none';

    let titleEdit = newList.querySelector('.todolist__title--edit');
    newList.classList.remove('todolist__list--new');
    newList.querySelector('.todolist__title--new').remove();
    titleEdit.style.display = 'flex';

    let input = titleEdit.querySelector('.todolist__title-input');
    let listAdd = this;

    input.addEventListener( "change", function(){
        titleEdit.style.display = 'none';
        let todolistObj = new Todolist();
        todolistObj.setName(this.value);

        let response = todolistObj.add();
        if(response.id != undefined){
            let title = newList.querySelector('.todolist__title');
            title.querySelector('.todolist__title-text').innerHTML = this.value;
            newList.querySelector('.todolist__task--add').style.display = 'flex';
            title.style.display = 'flex';
            newList.id = "todolist_" + response.id;
        }else{
            newList.remove();
            todolistShowError('Error occured during creating list.');
        }
        listAdd.style.display = 'block';
    });
}

function todolistDeleteTask(element){
    let todolistTaskObj = new TodolistTask();
    let id = todolistGetTaskId(element);
    todolistTaskObj.setId(id);
    let response = todolistTaskObj.delete();
    if(response == 1){
        let task = todolist.querySelector('#todolist_task_' + id);
        task.remove();
    }else{
        todolistShowError('Error occured during deleting task.');
    }
}

function todolistDeleteList(element){
    let todolistObj = new Todolist();
    let id = todolistGetListId(element);
    todolistObj.setId(id);
    let response = todolistObj.delete();
    if(response == 1){
        let list = todolist.querySelector('#todolist_' + id);
        list.remove();
    }else{
        todolistShowError('Error occured during deleting list.');
    }
}

function todolistUpdateTask(element){
    let todolistTaskObj = new TodolistTask();
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector('#todolist_task_' + id);
    let checkbox = task.querySelector('.todolist__task-checkbox').checked;
    checkbox = checkbox ? '1' : '0';
    let description = task.querySelector('.todolist__task-input--edit').value;
    todolistTaskObj.setId(id);
    todolistTaskObj.setDescription(description);
    todolistTaskObj.setFinished(checkbox);
    let response = todolistTaskObj.update();
    if(response == 1){
        todolistHideTaskInput(element);
        let text = task.querySelector('.todolist__task-title');
        text.innerHTML = description;
    }else{
        todolistShowError('Error occured during updating task.');
    }
}

function todolistUpdateList(element){
    let todolistObj = new Todolist();
    let id = todolistGetListId(element);
    let list = todolist.querySelector('#todolist_' + id);
    let name = element.value;
    todolistObj.setId(id);
    todolistObj.setName(name);
    let response = todolistObj.update();
    if(response == 1){
        todolistHideListInput(element);
        let text = list.querySelector('.todolist__title-text');
        text.innerHTML = name;
    }else{
        todolistShowError('Error occured during updating list.');
    }
}

function todolistShowTaskInput(element){
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector('#todolist_task_' + id);
    let input = task.querySelector('.todolist__task-input--edit');
    let text = task.querySelector('.todolist__task-title');
    input.style.display = "inline";
    text.style.display = "none";
}

function todolistShowListInput(element){
    let id = todolistGetListId(element);
    let list = todolist.querySelector('#todolist_' + id);
    let input = list.querySelector('.todolist__title--edit');
    let text = list.querySelector('.todolist__title');
    input.style.display = "inline";
    text.style.display = "none";
}

function todolistHideTaskInput(element){
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector( '#todolist_task_' + id );
    let input = task.querySelector('.todolist__task-input--edit');
    let text = task.querySelector('.todolist__task-title');
    input.style.display = "none";
    text.style.display = "inline";
}

function todolistHideListInput(element){
    let id = todolistGetListId(element);
    let list = todolist.querySelector( '#todolist_' + id );
    let input = list.querySelector('.todolist__title--edit');
    let text = list.querySelector('.todolist__title');
    input.style.display = "none";
    text.style.display = "flex";
}

function todolistToggleCheckbox(element){
    let id = todolistGetTaskId(element);
    let task = todolist.querySelector('#todolist_task_' + id);
    let checkbox = task.querySelector('.todolist__task-checkbox');
    if(checkbox.checked){
        checkbox.checked = false;
    }else{
        checkbox.checked = true;
    }
    todolistUpdateTask(element);
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