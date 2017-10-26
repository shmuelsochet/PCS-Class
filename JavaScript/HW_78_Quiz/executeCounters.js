console.log(myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment(),
    myApp.counter.increment());



var counter1 = myApp.counter.createCounter();
var counter2 = myApp.counter.createCounter();

console.log(counter1.increment(),
    counter1.increment(),
    counter1.increment(),
    counter1.increment(),
    counter1.increment());

console.log(counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment(),
    counter2.increment());

console.log(myApp.counter.getCount());
console.log(counter1.getCount());
console.log(counter2.getCount());
