var pcs = pcs || {};

pcs.tools = (function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }



    return {
        wrap: function (id) {

            var elem = get(id);

            var previousDisplay;

            return {

                setCss: function (property, value) {
                    setCss(elem, property, value);
                    return this;
                },

                getCss: function (property) {
                    getComputedStyle(elem).getPropertyValue(property);
                    return this;
                },

                pulsate: function () {
                    var fontSize = 32,
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
                    // Shlomo said pass the even not the elem, since you get much more.
                    elem.addEventListener('click', function (event) {
                        callback(event);
                    });

                    return this;
                },

                hide: function () {

                    previousDisplay = elem.style.display;
                    //you cant do this with this.css if you're called by the window then it calls the wrong this
                    //when you use this then you're calling the objects setCss and not the module one
                    setCss(elem, 'display', 'none');

                    return this;
                },

                show: function () {

                    /* jshint -W030 */
                    //use var newDisplay === . Also !== 'none' is more likely
                    previousDisplay === 'none' ? setCss(elem, 'display', '') :
                        setCss(elem, 'display', previousDisplay);

                    return this;
                }
            };
        }
    };

}());