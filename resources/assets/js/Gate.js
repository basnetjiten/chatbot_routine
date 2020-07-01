export default class Gate{

    constructor(type){
        this.type = type;
    }

    isStudent(){

        return this.type === 'student';
    }
    isAdmin(){
        return this.type === 'admin';
    }




    isAdminOrAuthor(){
        if(this.type === 'admin' || this.type === 'author'){
            return true;
        }

    }
    isAuthorOrUser(){
        if(this.type === 'student' || this.type === 'author'){
            return true;
        }

    }



}

