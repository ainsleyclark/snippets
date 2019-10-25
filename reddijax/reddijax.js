function execute(url, data, async, method) {
    
    return new Promise((resolve, reject) =>
    {
        try {
            let request = new XMLHttpRequest();
            request.open(method, url, async);
            request.onload = function () {
                if (this.status >= 200 && this.status < 400) {
                    resolve(JSON.parse(this.response));
                } else {
                    reject('error with code ' + this.status);
                }
            };

            request.onerror = function() {
                reject(JSON.parse(this.response));
            };

            request.send(data);
        } catch(exception) {
            reject('invalid data and/or url');
        }
    });
}

class Reddijax {

    post(url, data = {}, async = true) {
        return execute(url, data, async, 'POST')
    }

    get(url, data = {}, async = true) {
        return execute(url, data, async, 'GET')
    }
}

export default Reddijax;