import CrudApi from 'http://localhost/ela/view/js/api_crud.js';

export default class CrudEnrol {

    url = '/users';
    
    api;
    createAndAppendElement;
    constructor(users) {
        this.api = new CrudApi(this.url);
        this.users = users;
        this.createAndAppend = new CreateAndAppend();
    }

}