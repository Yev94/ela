
export default class ApiCrud {

    url = '/ela/api';

    async connectAndReturnData(urlAPI) {
        try {
            let response = await fetch(urlAPI);
            let data = await response.json();
            return data;
        } catch (error) {
            return console.error(error);
        }
    }


    reed() {
        let urlAPI = this.url + '?type=reed';
        return this.connectAndReturnData(urlAPI);
    }

    create(data) {
        let urlAPI = this.url + '?type=create';
        fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                this.reed();
            })
            .catch(error => console.error(error));
    }

    delete(id) {
        let urlAPI = this.url + '?type=delete&id=' + id;
        fetch(urlAPI, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .catch(error => console.error(error));
    }

    async consult(id) {
        let urlAPI = this.url + '?type=consult&id=' + id;
        return this.connectAndReturnData(urlAPI);
    }


    update(id, data) {
        let urlAPI = this.url + '?type=update&id=' + id;
        fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .catch(error => console.error(error));
    }
}