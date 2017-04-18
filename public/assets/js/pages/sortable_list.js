(function () {
    'use strict';

    var byId = function (id) {
            return document.getElementById(id);
        },

        loadScripts = function (desc, callback) {
            var deps = [], key, idx = 0;

            for (key in desc) {
                deps.push(key);
            }

            (function _next() {
                var pid,
                    name = deps[idx],
                    script = document.createElement('script');

                script.type = 'text/javascript';
                script.src = desc[deps[idx]];

                pid = setInterval(function () {
                    if (window[name]) {
                        clearTimeout(pid);

                        deps[idx++] = window[name];

                        if (deps[idx]) {
                            _next();
                        } else {
                            callback.apply(null, deps);
                        }
                    }
                }, 30);

                document.getElementsByTagName('head')[0].appendChild(script);
            })()
        },

        console = window.console;


    if (!console.log) {
        console.log = function () {
            alert([].join.apply(arguments, ' '));
        };
    }


    Sortable.create(byId('foo'), {
        group: "words",
        animation: 150,
        store: {
            get: function (sortable) {
                var order = localStorage.getItem(sortable.options.group);
                return order ? order.split('|') : [];
            },
            set: function (sortable) {
                var order = sortable.toArray();
                localStorage.setItem(sortable.options.group, order.join('|'));
            }
        },
        onAdd: function (evt) {
            console.log('onAdd.foo:', [evt.item, evt.from]);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.foo:', [evt.item, evt.from]);
        },
        onRemove: function (evt) {
            console.log('onRemove.foo:', [evt.item, evt.from]);
        },
        onStart: function (evt) {
            console.log('onStart.foo:', [evt.item, evt.from]);
        },
        onSort: function (evt) {
            console.log('onStart.foo:', [evt.item, evt.from]);
        },
        onEnd: function (evt) {
            console.log('onEnd.foo:', [evt.item, evt.from]);
        }
    });


    Sortable.create(byId('bar'), {
        group: "words",
        animation: 150,
        onAdd: function (evt) {
            console.log('onAdd.bar:', evt.item);
        },
        onUpdate: function (evt) {
            console.log('onUpdate.bar:', evt.item);
        },
        onRemove: function (evt) {
            console.log('onRemove.bar:', evt.item);
        },
        onStart: function (evt) {
            console.log('onStart.foo:', evt.item);
        },
        onEnd: function (evt) {
            console.log('onEnd.foo:', evt.item);
        }
    });


    // Multi groups
    Sortable.create(byId('multi'), {
        animation: 150,
        draggable: '.tile',
        handle: '.tile__name'
    });

    [].forEach.call(byId('multi').getElementsByClassName('tile__list'), function (el) {
        Sortable.create(el, {
            group: 'photo',
            animation: 150
        });
    });


    // Editable list
    var editableList = Sortable.create(byId('editable'), {
        animation: 150,
        filter: '.js-remove',
        onFilter: function (evt) {
            evt.item.parentNode.removeChild(evt.item);
        }
    });
    byId('save').onclick = function () {
        var name = $("#list-name").val();
        $("#editable").prepend('<li>' + name + '<i class="js-remove">✖</i></li>');
        $("#myModal").modal('hide');
    };


    // Advanced groups
    [{
        name: 'advanced',
        pull: true,
        put: true
    },
        {
            name: 'advanced',
            pull: 'clone',
            put: false
        },
        {
            name: 'advanced',
            pull: false,
            put: true
        }].forEach(function (groupOpts, i) {
        Sortable.create(byId('advanced-' + (i + 1)), {
            sort: (i != 1),
            group: groupOpts,
            animation: 150
        });
    });


    // 'handle' option
    Sortable.create(byId('handle-1'), {
        handle: '.drag-handle',
        animation: 150
    });
})();


// Background
document.addEventListener("DOMContentLoaded", function () {
    function setNoiseBackground(el, width, height, opacity) {
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");

        canvas.width = width;
        canvas.height = height;

        for (var i = 0; i < width; i++) {
            for (var j = 0; j < height; j++) {
                var val = Math.floor(Math.random() * 255);
                context.fillStyle = "rgba(" + val + "," + val + "," + val + "," + opacity + ")";
                context.fillRect(i, j, 1, 1);
            }
        }

        el.style.background = "url(" + canvas.toDataURL("image/png") + ")";
    }

    setNoiseBackground(document.getElementsByTagName('body')[0], 50, 50, 0.02);
}, false);