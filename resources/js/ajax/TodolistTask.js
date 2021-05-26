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
        if(this.idTodolist != undefined && this.description != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_task_add&idTodolist=' + this.idTodolist + '&description=' + this.description]);
            return JSON.parse(request.response);
        }
        return false;
    }

    update(){
        if(this.id != undefined && this.description != undefined && this.finished != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_task_update&id=' + this.id + '&description=' + this.description + '&finished=' + this.finished]);
            return JSON.parse(request.response);
        }
        return false;
    }

    delete(){
        if(this.id != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_task_delete&id=' + this.id]);
            return JSON.parse(request.response);
        }
        return false;
    }
    
}