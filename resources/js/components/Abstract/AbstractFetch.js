export default class AbstractFetch {

    constructor() {
        this.endpoint = null;
        this.container = [];
    }

    fetch() {
        return new Promise(
            (resolve, reject) => {
                axios.get(this.endpoint).then((response) => {
                    this.data = response.data;
                    resolve();
                }).catch((response) => {
                    console.log('Failed to fetch from: ' + this.endpoint);
                    console.log(response);
                    reject();
                });
            }
        );
    }
}