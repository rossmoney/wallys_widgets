'use strict';

class Package
{
    constructor(props) {
        // Define properties with default values
        this.id = null;

        // Initialise properties from constructor argument
        if (props) {
            Object.assign(this, props);
        }

        // Load from database if given ID
        if (props !== undefined && Object.keys(props).length == 1 && props.id !== undefined) {
            let self = this;
            axios.get('/packages/' + props.id)
                .then(function (response) {
                    Object.assign(self, response.data);
                });
        }
    }

    save() {
        if (this.id > 0) {
            let self = this;

            // Let the controller know that we want a JSON response.
            // The Update Quote modal calls the same controller method but expects a different type of response. :(
            const config = {
                headers: {
                    'Accept': 'application/json'
                }
            };

            axios.put('/packages/' + this.id, this, config)
                .then(function (response) {
                    Object.assign(self, response.data);
                });
        } else {
            let self = this;
            axios.post('/packages', this)
                .then(function (response) {
                    Object.assign(self, response.data);
                });
        }
    }

    delete()
    {
        if (this.id > 0) {
            let self = this;

            // Let the controller know that we want a JSON response.
            // The Update Quote modal calls the same controller method but expects a different type of response. :(
            const config = {
                headers: {
                    'Accept': 'application/json'
                }
            };

            axios.delete('/packages/' + this.id, this, config)
                .then(function (response) {
                    Object.assign(self, response.data);
                });
        }
    }

    static find(id) {
        return new Package({ id });
    }
}

export default Package;