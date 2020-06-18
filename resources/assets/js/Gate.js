export default class Gate{

    constructor(usertype){
        this.usertype = usertype;
    }


    isAdmin(){
        return this.usertype === 'admin';
    }

    isUser(){
        return this.usertype === 'streamer';
    }
    isAdminOrAuthor(){
        if(this.usertype === 'admin' || this.usertype === 'author'){
            return true;
        }

    }
    isAuthorOrUser(){
        if(this.usertype === 'streamer' || this.usertype === 'author'){
            return true;
        }

    }



}

