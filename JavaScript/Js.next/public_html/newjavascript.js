/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//4.for ...of

for (let i = 0 of [1, 2, 3]) {

}

//5. Format string

var object = {
name:"ay",
        age:"23"
}
var ex = "My name is ${object.name} and I am ${object.age} years old";

//6.Classes
        
class Person  {
    constuctor (name, age) {
        this.name = name;
        this.age = age;
    }
    get name() {

    }
    set name(name) {

    }
    validate () {

    }
}
 
class Student extends Person{
    super(fname,lname);
    
}

//8.Destructioning assignment

let numbers =["one","two","three"];
let[one,two] = numebrs;
console.log(one);
console.log(two);
[x,y] = [y,x];

let person = {
    name:'pesho',
    address: {
        city: 'Sofia',
        street :'Aleksander Nevski'
    }
}
let {name, address: {city:city}} = person;

//10.Maps and sets

let map= new Map();

map.set('one',1);
console.log(map.get('one'));
console.log(map.has('one'));

let set = new Set();

set.add("on e");
set.add('ten');

//11.Arrow functions.

people.sort(function(p1,p2){
    return p1.age < p2.age;
});

people.sort((p1,p2) => p1.age < p2.age);
let f = (x) => x*x;

//12.Modules
//first file
class Person () {
    
}
module.exports = {
    Person : Person,
    Human : Human
}
//second file
import humans from './humans';
var person = new humans.Person();

//or

import {Person} from './humans';
var person = new Person();