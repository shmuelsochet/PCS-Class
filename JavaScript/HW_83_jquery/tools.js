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
                    elem.addEventListener('click', function () {
                        callback(elem);
                    });

                    return this;
                },

                hide: function () {

                    previousDisplay = elem.style.display;

                    setCss(elem, 'display', 'none');

                    return this;
                },

                show: function () {

                    /* jshint -W030 */
                    previousDisplay === 'none' ? setCss(elem, 'display', '') :
                        setCss(elem, 'display', previousDisplay);

                    return this;
                }
            };
        }
    };

}());