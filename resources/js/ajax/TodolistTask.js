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

    add(){
        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php', false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        request.send(['action=todolist_task_add&idTodolist=' + this.idTodolist + '&description=' + this.description]);
    }

    update(){
        let request = new XMLHttpRequest();

    }

    delete(){
        let request = new XMLHttpRequest();
        
    }
    
}