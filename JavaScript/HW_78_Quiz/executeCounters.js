var myApp = myApp || {};

var singleCounter = myApp.counter;

console.log(singleCounter.increment()
    .increment()
    .increment()
    .increment()
    .increment()
    .increment()
    .increment()
    .increment()
    .increment()
    .increment());

var createCounter1 = myApp.createCounters.createCounter();
var createCounter2 = myApp.createCounters.createCounter();

console.log(createCounter1.increment(),
    createCounter1.increment(),
    createCounter1.increment(),
    createCounter1.increment(),
    createCounter1.increment());

console.log(createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment(),
    createCounter2.increment());

console.log(singleCounter.getCount());
console.log(createCounter1.getCount());
console.log(createCounter2.getCount());
