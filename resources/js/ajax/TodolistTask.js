class TodolistTask{
    
    setId(id){
        this.id = id;
    }

    setIdTodolist(idTodolist){
        this.idTodolist = idTodolist;
    }

    setDescription(description){
        this.description = description;
    }

    setFinished(finished){
        this.finished = finished;
    }

    add(){
        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php', false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        request.send(['action=todolist_task_add&idTodolist=' + this.idTodolist + '&description=' + this.description]);
        return JSON.parse(request.response);
    }

    update(){
        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php', false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        request.send(['action=todolist_task_update&id=' + this.id + '&description=' + this.description + '&finished=' + this.finished]);
    }

    delete(){
        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php', false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        request.send(['action=todolist_task_delete&id=' + this.id]);
    }
    
}