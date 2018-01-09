function Vehicle(color) {
    "use strict";
    this.color = color;
    this.go = function (speed) {
        this.speed = speed;
        console.log("Now going at speed " + this.speed + " MPH!");
    };
    this.print = function () {
        console.log("Color: ", this.color, ".\n Speed: ", this.speed, "MPH.");
    };
}

function Plane(color) {
    "use strict";
    Vehicle.call(this, color);
    this.go = function (speed) {
        this.speed = speed;
        console.log("Now flying at speed " + this.speed + " MPH!");
    };
}

Plane.prototype = Object.create(Vehicle.prototype);

var v = new Vehicle("Black");

v.go(50);

v.print();



var p = new Plane("Green");

p.go(300);

p.print();

console.log(v);

console.log(p);