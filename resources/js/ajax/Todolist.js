class Todolist{

    setId(id){
        this.id = id;
    }

    setName(name){
        this.name = name;
    }

    add(){
        if(this.name != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_add&name=' + this.name]);
            return JSON.parse(request.response);
        }
    }

    update(){
        if(this.id != undefined && this.name != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_update&id=' + this.id + '&name=' + this.name]);
            return JSON.parse(request.response);
        }
        return false;
    }

    delete(){
        if(this.id != undefined){
            let request = new XMLHttpRequest();
            request.open('POST', '/wp-admin/admin-ajax.php', false);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.send(['action=todolist_delete&id=' + this.id]);
            return JSON.parse(request.response);
        }
    }
    
}