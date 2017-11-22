/* jshint -W098 */
var pcs = (function () {

    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return function (id) {
        var elem = get(id);
        var oldDisplayVal;
        var data = {};

        return {

            css: function (property, value) {
                // this is a problem since if he passes 0 then it will be a getter.
                //so if arguments.length is less than 2 is better. If undefined is a problem where
                // undefined itself was passed in.
                if (value) {
                    setCss(elem, property, value);
                    return this;
                } else {
                    return getComputedStyle(elem).getPropertyValue(property);
                    //you can possibly pass in a callback to allow for chaining
                }

            },

            pulsate: function () {
                var fontSize = parseInt(this.css("font-size")),
                    i = 1,

                    interval = setInterval(function () {
                        if (i <= 5 || i > 15) {
                            fontSize += 5;
                        } else {
                            fontSize -= 5;
                        }

                        setCss(elem, "fontSize", fontSize + 'px');

                        if (i++ === 20) {
                            clearInterval(interval);
                        }
                    }, 100);

                return this;
            },
            click: function (callback) {
                elem.addEventListener('click', callback);
                return this;
            },
            hide: function () {
                oldDisplayVal = this.getCss("display");
                this.setCss("display", "none");

                return this;
            },
            show: function () {
                var newDisplay = oldDisplayVal !== "none" ? oldDisplayVal : "inline-block";
                this.setCss("display", newDisplay);

                return this;
            },
            setInnerHtml: function (html) {
                elem.innerHTML = html;
                return this;
            },
            getElement: function () {
                return elem;
            },

            data: function (key, value) {
                if (value) {
                    data[key] = value;
                    return this;
                } else {
                    return data[key];
                }

            },

        };
    };
}());