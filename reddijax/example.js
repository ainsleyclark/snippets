//Require & Import
import Reddijax from './reddijax';
let ajax = new Reddijax();

//Get
ajax.get('https://jsonplaceholder.typicode.com/todos/1').then((data) => {
    console.log(data);
}).catch((error) => {
    console.log('error: ' + error);
});

//Post
let fdata = {
    name: "paul rudd",
    movies: ["I Love You Man", "Role Models"]
};

ajax.post('https://reqres.in/api/users', fdata).then((res) => {
    console.log(res);
}).catch((error) => {
   console.log('error: ' + error);
});