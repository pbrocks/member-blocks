 function(e, t) {}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), n.d(t, "name", function() {
        return l
    }), n.d(t, "settings", function() {
        return c
    });
    var r = n(0),
        o = (n.n(r), n(1)),
        i = (n.n(o), n(2)),
        a = (n.n(i), n(823)),
        s = (n.n(a), n(527)),
        l = "core/shortcode",
        c = {
            title: Object(o.__)("Shortcode"),
            description: Object(o.__)("A shortcode is a WordPress-specific code snippet that is written between square brackets as [shortcode]. "),
            icon: "shortcode",
            category: "widgets",
            attributes: {
                text: {
                    type: "string",
                    source: "text"
                }
            },
            transforms: {
                from: [{
                    type: "shortcode",
                    tag: "[a-z][a-z0-9_-]*",
                    attributes: {
                        text: {
                            type: "string",
                            shortcode: function(e, t) {
                                return t.content
                            }
                        }
                    }
                }]
            },
            supports: {
                customClassName: !1,
                className: !1,
                html: !1
            },
            edit: Object(i.withInstanceId)(function(e) {
                var t = e.attributes,
                    n = e.setAttributes,
                    r = e.instanceId,
                    a = "blocks-shortcode-input-" + r;
                return wp.element.createElement("div", {
                    className: "wp-block-shortcode"
                }, wp.element.createElement("label", {
                    htmlFor: a
                }, wp.element.createElement(i.Dashicon, {
                    icon: "editor-code"
                }), Object(o.__)("Shortcode")), wp.element.createElement(s.a, {
                    id: a,
                    value: t.text,
                    placeholder: Object(o.__)("Write shortcode here…"),
                    onChange: function(e) {
                        return n({
                            text: e
                        })
                    }
                }))
            }),
            save: function(e) {
                var t = e.attributes;
                return wp.element.createElement(r.RawHTML, null, t.text)
            }
        }
},