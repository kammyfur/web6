<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/language.php";
header("Content-Type: application/javascript");

?>

try { // This script is 99.99 % stable, so don't show any errors;
! function(t) {
    var e = {};

    function n(a) {
        if (e[a]) return e[a].exports;
        var o = e[a] = {
            i: a,
            l: !1,
            exports: {}
        };
        return t[a].call(o.exports, o, o.exports, n), o.l = !0, o.exports
    }
    n.m = t, n.c = e, n.d = function(t, e, a) {
        n.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: a
        })
    }, n.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, n.t = function(t, e) {
        if (1 & e && (t = n(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var a = Object.create(null);
        if (n.r(a), Object.defineProperty(a, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var o in t) n.d(a, o, function(e) {
                return t[e]
            }.bind(null, o));
        return a
    }, n.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return n.d(e, "a", e), e
    }, n.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, n.p = "", n(n.s = 6)
}([, , , , , , function(t, e, n) {
    n(7), n(8), n(9), n(17), n(10), n(11), t.exports = n(12)
}, function(t, e) {
    window.NodeList && !NodeList.prototype.forEach && (NodeList.prototype.forEach = Array.prototype.forEach)
}, function(t, e) {
    function n(t, e) {
        var n = document.querySelector(t.getAttribute("aria-controls"));
        t.setAttribute("aria-expanded", e), n.setAttribute("aria-hidden", !e)
    }
    var a, o;
    a = ".p-contextual-menu__toggle", (o = document.querySelectorAll(a)).forEach((function(t) {
        "click" === t.getAttribute("data-trigger") ? function(t) {
            t.addEventListener("click", (function(t) {
                var e = "true" === t.target.getAttribute("aria-expanded");
                t.preventDefault(), n(t.target, !e)
            }))
        }(t) : "hover" === t.getAttribute("data-trigger") && function(t) {
            var e = document.querySelector(t.getAttribute("aria-controls")),
                a = null;
            t.addEventListener("click", (function(t) {
                t.preventDefault()
            })), t.addEventListener("mouseover", (function() {
                clearTimeout(a), n(t, !0)
            })), t.addEventListener("mouseleave", (function() {
                n(t, !0), a = setTimeout((function() {
                    n(t, !1)
                }), 50)
            })), e.addEventListener("mouseover", (function() {
                clearTimeout(a)
            })), e.addEventListener("mouseleave", (function() {
                a = setTimeout((function() {
                    n(t, !1)
                }), 50)
            })), document.onkeydown = function(e) {
                27 === (e = e || window.event).keyCode && n(t, !1)
            }
        }(t)
    })), document.addEventListener("click", (function(t) {
        o.forEach((function(e) {
            var a = document.querySelector(e.getAttribute("aria-controls"));
            !e.contains(t.target) && !a.contains(t.target) && n(e, !1)
        }))
    })), document.onkeydown = function(t) {
        27 === (t = t || window.event).keyCode && o.forEach((function(t) {
            n(t, !1)
        }))
    }
}, function(t, e) {
    document.addEventListener("DOMContentLoaded", (function() {
        var t = document.getElementById("contact-form-container");

        function e(e, n) {
            fetch(e.formLocation).then((function(t) {
                return t.text()
            })).then((function(o) {
                t.classList.remove("u-hide"), t.innerHTML = o.replace(/%% formid %%/g, e.formId).replace(/%% lpId %%/g, e.lpId).replace(/%% returnURL %%/g, e.returnUrl).replace(/%% lpurl %%/g, e.lpUrl),
                    function(t) {
                        var e = window.location.pathname.split("/").slice(1).join("-") || "global";
                        t && t.search.split("&").forEach((function(t) {
                            (t.startsWith("product") || t.startsWith("?product")) && (e = t.split("=")[1])
                        }));
                        var n = document.getElementById("product-context");
                        n && (n.value = e)
                    }(n),
                    function() {
                        var t = new URLSearchParams(window.location.search),
                            e = document.getElementById("utm_campaign");
                        e && (e.value = t.get("utm_campaign"));
                        var n = document.getElementById("utm_source");
                        n && (n.value = t.get("utm_source"));
                        var a = document.getElementById("utm_medium");
                        a && (a.value = t.get("utm_medium"))
                    }(),
                    function() {
                        var e = 1,
                            n = document.getElementById("contact-modal"),
                            o = document.querySelector(".p-modal__close"),
                            i = document.querySelector(".js-close"),
                            l = n.querySelectorAll(".pagination a"),
                            r = n.querySelectorAll(".js-pagination"),
                            s = n.querySelector(".mktoButton"),
                            c = n.querySelector("#Comments_from_lead__c"),
                            d = document.querySelectorAll(".js-other-container");

                        function m(t) {
                            e = t,
                                function() {
                                    var t;
                                    4 == e ? n.classList.add("thank-you") : n.classList.remove("thank-you"), c.value = (t = "", n.querySelectorAll(".js-formfield").forEach((function(e) {
                                        var n = "",
                                            a = e.querySelector(".p-heading--five"),
                                            o = e.querySelectorAll("input, textarea");
                                        t += a.innerText + "\r\n", o.forEach((function(a) {
                                            switch (a.type) {
                                                case "radio":
                                                    a.checked && (t += n + a.value, n = ", ");
                                                    break;
                                                case "checkbox":
                                                    if (a.checked) {
                                                        var o = "",
                                                            i = a.closest('[class*="col-"]').querySelector(".js-sub-section");
                                                        i && (o = i.innerText + ": ");
                                                        var l = e.querySelector("label[for=" + a.id + "]");
                                                        l = l ? o + l.innerText : a.id, t += n + l, n = ", "
                                                    }
                                                    break;
                                                case "text":
                                                case "textarea":
                                                    a.classList.contains("mktoField") || "" === a.value || (t += n + a.value, n = ", ")
                                            }
                                        })), t += "\r\n\r\n"
                                    })), t);
                                    var a = n.querySelector(".js-pagination--" + e);
                                    r.forEach((function(t) {
                                        t.classList.add("u-hide")
                                    })), a.classList.remove("u-hide")
                                }()
                        }

                        function u() {
                            m(1), t.classList.add("u-hide"), t.removeChild(n), a(""), ga("send", "event", "interactive-forms", "close", window.location.pathname)
                        }
                        document.onkeydown = function(t) {
                            27 == (t = t || window.event).keyCode && u()
                        }, s && o.addEventListener("click", (function() {
                            ga("send", "event", "interactive-forms", "submitted", window.location.pathname)
                        })), o && o.addEventListener("click", (function(t) {
                            t.preventDefault(), u()
                        })), i && i.addEventListener("click", (function(t) {
                            t.preventDefault(), u()
                        })), n && n.addEventListener("click", (function(t) {
                            "contact-modal" == t.target.id && (t.preventDefault(), u())
                        })), l.forEach((function(t) {
                            t.addEventListener("click", (function(t) {
                                t.preventDefault();
                                var n = t.target.closest("a"),
                                    a = e;
                                n.classList.contains("pagination__link--previous") ? (m(a -= 1), ga("send", "event", "interactive-forms", "goto:" + a, window.location.pathname)) : (m(a += 1), ga("send", "event", "interactive-forms", "goto:" + a, window.location.pathname))
                            }))
                        })), d.forEach((function(t) {
                            var e = t.querySelector(".js-other-container__checkbox"),
                                n = t.querySelector(".js-other-container__input");
                            e.addEventListener("change", (function(t) {
                                t.target.checked ? (n.style.opacity = 1, n.focus()) : (n.style.opacity = 0, n.value = "")
                            }))
                        }))
                    }(), window.CaptchaCallback()
            })).catch((function(t) {
                console.log("Request failed", t)
            }))
        }

        function n() {
            a("#get-in-touch"), ga("send", "event", "interactive-forms", "open", window.location.pathname)
        }

        function a(t) {
            var e = window.location;
            e.hash === t && "" !== t || ("pushState" in history ? history.pushState("", document.title, e.pathname + e.search + t) : e.hash = t)
        }
        document.querySelectorAll(".js-invoke-modal").forEach((function(a) {
            a.addEventListener("click", (function(o) {
                o.preventDefault(), a.dataset.formLocation ? e(a.dataset, a) : e(t.dataset), n()
            }))
        })), window.CaptchaCallback = function() {
            [].slice.call(document.querySelectorAll("div[class^=g-recaptcha]")).forEach((function(t) {
                if (!t.hasAttribute("data-widget-id")) {
                    var e = t.getAttribute("data-sitekey"),
                        n = grecaptcha.render(t, {
                            sitekey: e
                        });
                    t.setAttribute("data-widget-id", n)
                }
            }))
        }, "#get-in-touch" === window.location.hash && (e(t.dataset), n()), window.onhashchange = function() {
            "#get-in-touch" === window.location.hash && (e(t.dataset), n())
        }
    }))
}, function(t, e) {
    var n = [].slice.call(document.querySelectorAll(".p-navigation__dropdown-link")),
        a = document.querySelector(".dropdown-window"),
        o = document.querySelector(".dropdown-window-overlay");

    function i(t) {
        t.classList.remove("is-selected"), a.classList.add("slide-animation"), o.classList.add("fade-animation"), window.history.pushState && window.history.pushState(null, null, window.location.href.split("#")[0])
    }
    if (n.forEach((function(t) {
            t.addEventListener("click", (function(t) {
                t.preventDefault();
                var e = this;
                a.classList.remove("slide-animation"), o.classList.remove("fade-animation"), n.forEach((function(t) {
                    var n = document.getElementById(t.id + "-content");
                    t === e ? t.classList.contains("is-selected") ? i(t) : (t.classList.add("is-selected"), n.classList.remove("u-hide"), window.history.pushState && window.history.pushState(null, null, "#" + t.id)) : (t.classList.remove("is-selected"), n.classList.add("u-hide"))
                }))
            }))
        })), window.addEventListener("hashchange", (function() {
            n.forEach((function(t) {
                document.getElementById(t.id + "-content");
                t.classList.contains("is-selected") && i(t)
            }))
        })), o && o.addEventListener("click", (function() {
            n.forEach((function(t) {
                document.getElementById(t.id + "-content");
                t.classList.contains("is-selected") && i(t)
            }))
        })), window.location.hash) {
        var l = window.location.hash.split("#")[1];
        document.getElementById(l) && setTimeout((function() {
            document.getElementById(l).click()
        }), 0)
    }
    var r, s, c = window.location.href;

    function d(t, e) {
        var n = document.querySelector(t);
        n && [].slice.call(n.querySelectorAll("a")).forEach((function(t) {
            t.addEventListener("click", (function() {
                dataLayer.push({
                    event: "GAEvent",
                    eventCategory: e,
                    eventAction: "from:" + c + " to:" + t.href,
                    eventLabel: t.text,
                    eventValue: void 0
                })
            }))
        }))
    }
    d("#canonical-products", "www.ubuntu.com-nav-0-products"), d("#canonical-login", "www.ubuntu.com-nav-0-login"), d("#navigation", "www.ubuntu.com-nav-1"), d("#enterprise-content", "www.ubuntu.com-nav-1-enterprise"), d("#developer-content", "www.ubuntu.com-nav-1-developer"), d("#community-content", "www.ubuntu.com-nav-1-community"), d("#download-content", "www.ubuntu.com-nav-1-download"), d(".p-navigation--secondary", "www.ubuntu.com-nav-2"), d(".p-contextual-footer", "www.ubuntu.com-footer-contextual"), d(".p-footer__nav", "www.ubuntu.com-nav-footer-0"), d(".p-footer--secondary", "www.ubuntu.com-nav-footer-1"), r = "#main-content", (s = document.querySelector(r)) && [].slice.call(s.querySelectorAll("a")).forEach((function(t) {
            var e;
            e = t.classList.contains("p-button--positive") ? "www.ubuntu.com-content-cta-0" : t.classList.contains("p-button") ? "www.ubuntu.com-content-cta-1" : "www.ubuntu.com-content-link", t.href.startsWith("#") || t.addEventListener("click", (function() {
                dataLayer.push({
                    event: "GAEvent",
                    eventCategory: e,
                    eventAction: "from:" + c + " to:" + t.href,
                    eventLabel: t.text,
                    eventValue: void 0
                })
            }))
        })),
        function(t) {
            var e = [].slice.call(document.querySelectorAll(t));
            e && e.forEach((function(t) {
                if (!t.classList.contains("u-hide")) {
                    var e = t.querySelector("a");
                    dataLayer.push({
                        event: "NonInteractiveGAEvent",
                        eventCategory: "www.ubuntu.com-impression",
                        eventAction: "from:" + c + " to:" + e.href,
                        eventLabel: e.text,
                        eventValue: void 0
                    })
                }
            }))
        }(".js-takeover"),
        function() {
            for (var t = new URLSearchParams(window.location.search), e = ["campaign", "source", "medium"], n = 0; n < e.length; n++)
                for (var a = document.getElementsByName("utm_" + e[n]), o = 0; o < a.length; o++) a[o] && (a[o].value = t.get("utm_" + e[n]))
        }()
}, function(t, e) {
    var n = function(t, e) {
            var n = new XMLHttpRequest,
                o = t.getAttribute("action"),
                i = serialize(t);
            n.open("POST", o, !0), n.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), e && n.addEventListener("readystatechange", (function() {
                4 == this.readyState && e.apply(this, arguments)
            }));
            var l = t.getElementsByClassName("g-recaptcha")[0],
                r = l.dataset.widgetId,
                s = grecaptcha.getResponse(r),
                c = document.getElementById("recaptcha-msg");
            if ("" === s) return c || (l.classList.add("recaptcha-is-error"), l.insertAdjacentHTML("afterend", '<p id="recaptcha-msg" class="p-form-validation__message" role="alert"><strong>Error:</strong> You need to complete the recaptcha to submit this form. </p>')), !1;
            if (c) {
                l.classList.remove("recaptcha-is-error");
                var d = document.getElementById("recaptcha-msg");
                d.parentNode.removeChild(d)
            }
            i = i.concat("&grecaptcharesponse=" + s), n.send(i);
            var m = t.querySelector("input[name=download_asset_url]");
            null != m && (m = m.value);
            var u = t.querySelector("input[name=return_url]");
            null != u && (u = u.value);
            var g = t.classList.contains("modal-form"),
                p = t.classList.contains("whitepaper-form"),
                h = t.querySelector("input[name=thankyoumessage]");
            return null != h && (h = h.value), document.querySelector(".js-feedback-notification") || t.reset(), grecaptcha.reset(), a(m, u, g, h, t, p), !0
        },
        a = function(t, e, n, a, l, r) {
            if (t) {
                var s = document.createElement("iframe");
                s.setAttribute("src", t), s.style.width = "0px", s.style.height = "0px", document.body.insertBefore(s, document.body.childNodes[0])
            }
            if (e && window.setTimeout((function() {
                    window.location.href = e
                }), 1e3), n && (document.getElementsByClassName("js-pagination--3")[0].classList.add("u-hide"), document.getElementsByClassName("js-pagination--4")[0].classList.remove("u-hide")), null === e && !1 === n && !1 === r) {
                null === a && (a = "Thank you<br />A member of our team will be in touch within one working day");
                var c = document.querySelector(".js-feedback-notification");
                if (c) {
                    c.innerHTML = '<div class="p-notification--positive"><p class="p-notification__response">' + a + "</p></div>";
                    for (var d = l.querySelectorAll("input, button"), m = 0; m < d.length; m++) d[m].disabled = "disabled";
                    var u = l.querySelector(".g-recaptcha");
                    u && u.classList.add("u-hide"), l.style.opacity = ".5"
                } else document.getElementById("main-content").insertAdjacentHTML("afterbegin", '<div class="p-strip is-shallow u-no-padding--bottom"><div class="row"><div class="p-notification--positive"><p class="p-notification__response">' + a + "</p></div></div></div>"), window.scrollTo(0, 0)
            }
            r && (function(t, e, n) {
                var a = new Date;
                a.setTime(a.getTime() + 24 * n * 60 * 60 * 1e3);
                var o = "expires=" + a.toUTCString();
                document.cookie = t + "=" + e + ";" + o + ";path=/"
            }(o(), "true", 30), i(), window.location.hash = "#introduction")
        };

    function o() {
        return "formFilled" + window.location.pathname.split("/").join("-")
    }

    function i() {
        var t, e = document.querySelector(".l-content");
        (e && (t = e, fetch("robotics/_content").then((function(t) {
            return t.text()
        })).then((function(e) {
            t.innerHTML = e, t.classList.add("u-reveal")
        })).catch((function(t) {
            console.log("Request failed", t)
        }))), l) && (document.querySelectorAll(".u-obfuscate p", ".u-obfuscate li").forEach((function(t) {
            t.innerHTML = r(t.innerText)
        })), l = !1);
        document.querySelectorAll(".u-obfuscate").forEach((function(t) {
            t.classList.remove("u-obfuscate")
        }));
        var n = document.querySelector(".signup-form");
        n && n.classList.add("u-hide")
    }
    document.querySelectorAll("form[id^=mktoForm]").forEach((function(t) {
        t.addEventListener("submit", (function(t) {
            t.preventDefault ? t.preventDefault() : t.returnValue = !1;
            var e = document.getElementById(t.target.id);
            e.action = "https://app-sjg.marketo.com/index.php/leadCapture/save2", n(e)
        }))
    }));
    var l = !0;

    function r(t) {
        return t.split("").reverse().join("")
    }
    window.onload = function() {
        ! function(t) {
            for (var e = t + "=", n = document.cookie.split(";"), a = 0; a < n.length; a++) {
                for (var o = n[a];
                    " " == o.charAt(0);) o = o.substring(1);
                if (0 == o.indexOf(e)) return o.substring(e.length, o.length)
            }
            return null
        }(o()) ? (l = !0, document.querySelectorAll(".u-obfuscate p", ".u-obfuscate li").forEach((function(t) {
            t.innerText = r(t.innerHTML)
        }))) : i()
    }
}, function(t, e) {
    document.querySelectorAll("footer li h2").forEach((function(t) {
        t.addEventListener("click", (function(t) {
            t.target.classList.toggle("active")
        }))
    })), document.querySelectorAll(".p-code-copyable").forEach((function(t) {
        var e = t.querySelector(".p-code-copyable__action"),
            n = t.querySelector(".p-code-copyable__input");
        e && n && e.addEventListener("click", (function(e) {
            n.select(), e.preventDefault;
            try {
                dataLayer.push({
                    event: "GAEvent",
                    eventCategory: "Copy to clipboard",
                    eventAction: n.value,
                    eventLabel: document.URL,
                    eventValue: void 0
                }), t.classList.add("is-copied"), setTimeout((function() {
                    t.classList.remove("is-copied")
                }), 300)
            } catch (e) {
                t.classList.add("is-not-copied"), console.log("Unable to copy")
            }
        })), n && n.addEventListener("click", (function() {
            this.select()
        }))
    }))
}, , , , , function(t, e, n) {
    "use strict";
    n.r(e),
        function(t) {
            if (t && "undefined" != typeof window) {
                var e = document.createElement("style");
                e.setAttribute("type", "text/css"), e.innerHTML = t, document.head.appendChild(e)
            }
        }('.global-nav{color:#f7f7f7;display:-webkit-box;display:flex;flex-shrink:0;font-family:Ubuntu,-apple-system,Segoe UI,Roboto,Oxygen,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;font-size:.875rem;font-weight:300;line-height:1.5rem;z-index:100}.global-nav h1{max-width:40em;font-style:normal;font-weight:100;margin-top:0}@media (max-width:772px){.global-nav h1{font-size:2.2281872349rem;line-height:3rem;margin-bottom:.835rem;padding-top:.166rem}}@media (min-width:772px){.global-nav h1{font-size:2.910285368rem;line-height:3.5rem;margin-bottom:.8rem;padding-top:.201rem}}@media (min-width:1681px){.global-nav h1{margin-bottom:.85rem;padding-top:.151rem}}.global-nav h2{max-width:40em;font-style:normal;font-weight:100;margin-top:0}@media (max-width:772px){.global-nav h2{font-size:1.83274rem;line-height:2.5rem;margin-bottom:.9rem;padding-top:.101rem}}@media (min-width:772px){.global-nav h2{font-size:2.2281872349rem;line-height:3rem;margin-bottom:.8rem;padding-top:.201rem}}.global-nav h3{max-width:40em;font-style:normal;font-weight:300;margin-top:0}@media (max-width:772px){.global-nav h3{font-size:1.4927113703rem;line-height:2rem;margin-bottom:.5rem;padding-top:.5rem}}@media (min-width:772px){.global-nav h3{font-size:1.7059558517rem;line-height:2.5rem;margin-bottom:.9rem;padding-top:.101rem}}.global-nav .global-nav__matrix-title,.global-nav h4{max-width:40em;font-style:normal;font-weight:300;margin-top:0}@media (max-width:772px){.global-nav .global-nav__matrix-title,.global-nav h4{font-size:1.22176rem;line-height:1.5rem;margin-bottom:.7rem;padding-top:.301rem}}@media (min-width:772px){.global-nav .global-nav__matrix-title,.global-nav h4{font-size:1.306122449rem;line-height:2rem;margin-bottom:.95rem;padding-top:.051rem}}@media (min-width:1681px){.global-nav .global-nav__matrix-title,.global-nav h4{margin-bottom:1rem;padding-top:.001rem}}.global-nav .global-nav__flex-container .global-nav__matrix-title,.global-nav h5{max-width:40em;font-size:1rem;font-style:normal;font-weight:500;line-height:1.5rem;margin-bottom:1.1rem;margin-top:0;padding-top:.401rem}.global-nav h6{max-width:40em;font-size:1rem;font-style:italic;font-weight:300;line-height:1.5rem;margin-bottom:1.1rem;margin-top:0;padding-top:.338rem}@media (min-width:1681px){.global-nav h6{padding-top:.345rem}}.global-nav .p-text--default,.global-nav cite,.global-nav p{line-height:1.5rem;margin-top:0;padding-top:.4005rem}.global-nav .p-text--default,.global-nav cite{margin-bottom:.1rem}.global-nav p{margin-bottom:1.1rem}p:not([class*=p-heading--]):not([class*=p-muted-heading])+.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.global-nav p{margin-top:-.5rem}.global-nav .global-nav__muted-heading,.global-nav .p-text--small,.global-nav small{font-size:.875rem;line-height:1rem;margin-bottom:.8rem;padding-top:.2005rem}@media (min-width:1681px){.global-nav .global-nav__muted-heading,.global-nav .p-text--small,.global-nav small{padding-top:.2006rem}}.global-nav .p-text--x-small{font-size:.765625rem;line-height:1rem;margin-bottom:.8rem;padding-top:.2505rem}@media (min-width:1681px){.global-nav .p-text--x-small{padding-top:.2006rem}}.global-nav .global-nav__muted-heading{color:#666;margin-bottom:.8rem;margin-top:0;padding-top:.2rem;text-transform:uppercase}.global-nav strong{font-weight:400}.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--1,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--one,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h1{padding-top:1.7rem}@media (max-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--1,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--one,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h1{padding-top:1.665rem}}.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--2,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--two,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h2{padding-top:1.7rem}@media (max-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--2,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--two,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h2{padding-top:1.6rem}}@media (max-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--3,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--three,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h3{padding-top:2rem}}@media (min-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--3,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--three,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h3{padding-top:1.6rem}}@media (max-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--4,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--four,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h4{padding-top:1.8rem}}@media (min-width:772px){.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--4,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--four,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h4{padding-top:1.55rem}}.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--5,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--6,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--five,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-heading--six,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h5,.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+h6{padding-top:1.9rem}.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading])+.p-muted-heading{padding-top:1.7rem}.global-nav .u-hide-text{overflow:hidden;text-indent:calc(100% + 10rem);white-space:nowrap}.global-nav .u-no-margin--bottom:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(p):not(small):not([class*=p-heading]){margin-bottom:0!important}@media (max-width:772px){.global-nav h1.u-no-margin--bottom{margin-bottom:-.165rem!important}}@media (min-width:772px){.global-nav h1.u-no-margin--bottom{margin-bottom:-.2rem!important}}@media (min-width:1681px){.global-nav h1.u-no-margin--bottom{margin-bottom:-.15rem!important}}@media (max-width:772px){.global-nav h2.u-no-margin--bottom{margin-bottom:-.1rem!important}}@media (min-width:772px){.global-nav h2.u-no-margin--bottom{margin-bottom:-.2rem!important}}@media (max-width:772px){.global-nav h3.u-no-margin--bottom{margin-bottom:0!important}}@media (min-width:772px){.global-nav h3.u-no-margin--bottom{margin-bottom:-.1rem!important}}@media (max-width:772px){.global-nav .u-no-margin--bottom.global-nav__matrix-title,.global-nav h4.u-no-margin--bottom{margin-bottom:.2rem!important}}@media (min-width:772px){.global-nav .u-no-margin--bottom.global-nav__matrix-title,.global-nav h4.u-no-margin--bottom{margin-bottom:-.05rem!important}}@media (min-width:1681px){.global-nav .u-no-margin--bottom.global-nav__matrix-title,.global-nav h4.u-no-margin--bottom{margin-bottom:0!important}}.global-nav .global-nav__flex-container .u-no-margin--bottom.global-nav__matrix-title,.global-nav h5.u-no-margin--bottom,.global-nav h6.u-no-margin--bottom,.global-nav p.u-no-margin--bottom{margin-bottom:.1rem!important}.global-nav .u-no-margin--bottom.global-nav__muted-heading,.global-nav .u-no-margin--bottom.p-text--small,.global-nav .u-no-margin--bottom.p-text--x-small,.global-nav small.u-no-margin--bottom{margin-bottom:-.2rem!important}@font-face{.global-nav{font-display:auto;font-family:Ubuntu;font-style:normal;font-weight:300;src:url(https://assets.ubuntu.com/v1/e8c07df6-Ubuntu-L_W.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/8619add2-Ubuntu-L_W.woff) format("woff");font-weight:400;src:url(https://assets.ubuntu.com/v1/fff37993-Ubuntu-R_W.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/7af50859-Ubuntu-R_W.woff) format("woff");font-style:italic;src:url(https://assets.ubuntu.com/v1/f8097dea-Ubuntu-LI_W.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/8be89d02-Ubuntu-LI_W.woff) format("woff");src:url(https://assets.ubuntu.com/v1/fca66073-ubuntu-ri-webfont.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/f0898c72-ubuntu-ri-webfont.woff) format("woff");font-weight:100;src:url(https://assets.ubuntu.com/v1/7f100985-Ubuntu-Th_W.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/502cc3a1-Ubuntu-Th_W.woff) format("woff");font-family:Ubuntu Mono;src:url(https://assets.ubuntu.com/v1/fdd692b9-UbuntuMono-R_W.woff2) format("woff2"),url(https://assets.ubuntu.com/v1/85edb898-UbuntuMono-R_W.woff) format("woff")}}.global-nav .measure--p{max-width:40em}.global-nav html{-moz-osx-font-smoothing:grayscale;-webkit-font-smoothing:antialiased;color:#111;font-family:Ubuntu,-apple-system,Segoe UI,Roboto,Oxygen,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;font-smoothing:subpixel-antialiased;font-weight:300;line-height:1.5rem}@media screen and (max-width:1681px){.global-nav html{font-size:1rem}}@media screen and (min-width:1681px){.global-nav html{font-size:1.125rem;line-height:1.6875rem}}.global-nav p{max-width:40em}.global-nav .p-text--small.dense,.global-nav small.dense{margin-bottom:1.3rem}.global-nav p:not([class*=p-heading--]):not([class*=p-muted-heading]):empty{line-height:0;margin:0;padding:0}.global-nav sub,.global-nav sup{line-height:0;position:relative;vertical-align:baseline}.global-nav abbr[title]{border-bottom:.1em dotted;cursor:help;text-decoration:none}.global-nav .u-hide{display:none!important}@media screen and (max-width:772px){.global-nav .u-hide--small{display:none!important}}@media (min-width:772px) and (max-width:1036px){.global-nav .u-hide--medium{display:none!important}}@media screen and (min-width:1036px){.global-nav .u-hide--large{display:none!important}}.global-nav .u-no-margin{margin:0!important}.global-nav .u-no-margin--top{margin-top:0!important}.global-nav .u-no-margin--right{margin-right:0!important}.global-nav .u-no-margin--left{margin-left:0!important}.global-nav .u-table-cell-padding-overlap{margin-bottom:-.5rem!important;margin-top:calc(-.5rem - 1px)!important}.global-nav .u-no-padding{padding:0!important}.global-nav .u-no-padding--top{padding-top:0!important}.global-nav .u-no-padding--right{padding-right:0!important}.global-nav .u-no-padding--bottom{padding-bottom:0!important}.global-nav .u-no-padding--left{padding-left:0!important}.global-nav *{box-sizing:border-box}.global-nav .global-nav__header{background-color:#262626;width:100%;z-index:99}.global-nav .global-nav__header-row{display:-webkit-box;display:flex;width:100%}.global-nav .global-nav__header-logo{margin:0}.global-nav .global-nav__header-logo-anchor{display:inline-block;line-height:0;padding:.6875rem 1rem .6875rem 0}@media (max-width:875px){.global-nav .global-nav__header-logo-anchor{display:block;padding-left:0;padding-right:1.5rem}}.global-nav .global-nav__header-list{list-style:none;margin:0 0 0 auto;padding:0}.global-nav .global-nav__header-link{display:inline-block;margin:0;padding:0;position:relative}.global-nav .global-nav__header-link.is-selected>.global-nav__header-link-anchor:after{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.global-nav .global-nav__header-link-anchor{color:#f7f7f7;display:inline-block;line-height:1.25rem;margin-bottom:0;padding:.375rem .5rem;text-decoration:none}@media (max-width:875px){.global-nav .global-nav__header-link-anchor{padding-left:0}}.global-nav .has-dropdown .global-nav__header-link-anchor{padding:.375rem 1.625rem .375rem .5rem}.global-nav .has-dropdown .global-nav__header-link-anchor:after{-webkit-transition-duration:.1s;transition-duration:.1s;-webkit-transition-timing-function:cubic-bezier(.215,.61,.355,1);transition-timing-function:cubic-bezier(.215,.61,.355,1);background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg width=\'16\' height=\'16\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath fill=\'%23f7f7f7\' d=\'M1.86 5l6.157 3.84L14.139 5 15 6.357l-6.983 5.03L1 6.358z\' fill-rule=\'evenodd\'/%3E%3C/svg%3E");background-size:100%;content:"";height:.5rem;right:.5rem;top:.75rem;width:.625rem}.global-nav .global-nav__dropdown,.global-nav .has-dropdown .global-nav__header-link-anchor:after{-webkit-transition-property:-webkit-transform;transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;position:absolute}.global-nav .global-nav__dropdown{-webkit-transition-duration:.333s;transition-duration:.333s;-webkit-transition-timing-function:cubic-bezier(.215,.61,.355,1);transition-timing-function:cubic-bezier(.215,.61,.355,1);background-color:#262626;margin:0;overflow:hidden;top:2rem;-webkit-transform:translateY(-100%);transform:translateY(-100%);width:100%;z-index:98}.global-nav .global-nav__dropdown.show-content{height:auto;-webkit-transform:translateY(0);transform:translateY(0)}.global-nav .global-nav__dropdown-content{margin:0 auto;padding-top:0}@media (max-width:875px){.global-nav .global-nav__dropdown-content{padding:.5rem 0}}.global-nav .global-nav__row{margin:0 auto;padding:0 1.5rem}@media (max-width:875px){.global-nav .global-nav__row{padding:0 1rem}}.global-nav .global-nav__row.is-bordered:after{background-color:#666;content:"";display:block;height:1px;margin-top:2rem;width:100%}.global-nav .global-nav__strip{margin:0;padding:2rem 0 0}@media (max-width:875px){.global-nav .global-nav__strip{padding-top:1rem}}.global-nav .global-nav__mobile-strip{display:none}@media (max-width:875px){.global-nav .global-nav__mobile-strip{display:inherit}}.global-nav .global-nav__mobile-strip .global-nav__split-list{display:none}.global-nav .global-nav__flex-container{display:-webkit-box;display:flex}.global-nav .global-nav__flex-container .global-nav__matrix-item{border:0;padding:0 0 2rem}.global-nav .global-nav__flex-container .global-nav__matrix-title{font-weight:400}.global-nav .global-nav__others-col{margin-top:0;width:74.17808%}.global-nav .global-nav__resources-col{margin-left:3.2877%;margin-top:0;width:22.53423%}.global-nav .global-nav__expanding-row{border-top:1px solid #666;cursor:pointer;font-size:.8175rem;line-height:1.5;margin:0;max-width:inherit;padding:1rem 0;position:relative}.global-nav .global-nav__expanding-row:after{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg width=\'16\' height=\'16\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath fill=\'%23f7f7f7\' d=\'M1.86 5l6.157 3.84L14.139 5 15 6.357l-6.983 5.03L1 6.358z\' fill-rule=\'evenodd\'/%3E%3C/svg%3E");background-repeat:no-repeat;background-size:.8175rem;content:"";height:.8rem;position:absolute;right:.5rem;top:1.2rem;width:.8175rem}.global-nav .global-nav__expanding-row.is-active:after{-webkit-transform:rotate(180deg);transform:rotate(180deg)}.global-nav .global-nav__expanding-row.is-active+.global-nav__split-list{display:block}.global-nav .global-nav__matrix{display:-webkit-box;display:flex;flex-wrap:wrap;list-style:none;margin:0;padding:0}@media (max-width:875px){.global-nav .global-nav__matrix{-webkit-box-orient:vertical;-webkit-box-direction:normal;flex-direction:column}}.global-nav .global-nav__matrix-item{border-top:1px solid #666;-webkit-box-flex:1;flex:1 1 auto;flex-wrap:wrap;margin:0;padding:1rem;width:33.33%}.global-nav .global-nav__matrix-item:nth-child(3n+1){padding-left:0}.global-nav .global-nav__matrix-item:nth-child(3n+3){border-right:0;padding-right:0}@media (min-width:875px){.global-nav .global-nav__matrix-item:first-child,.global-nav .global-nav__matrix-item:nth-child(2),.global-nav .global-nav__matrix-item:nth-child(3){border-top:0}}@media (max-width:875px){.global-nav .global-nav__matrix-item{padding:1rem 0;width:100%}}.global-nav .global-nav__matrix-image{display:inline-block;height:auto;margin-bottom:1rem;margin-right:.75rem;max-height:2rem;max-width:2rem;position:relative;top:.1rem}@media (max-width:875px){.global-nav .global-nav__matrix-image{display:none}}.global-nav .global-nav__matrix-content{display:-webkit-box;display:flex;-webkit-box-flex:1;flex:1 1 auto;-webkit-box-orient:vertical;-webkit-box-direction:normal;flex-direction:column;margin:0;padding-right:1rem;width:100%}.global-nav .global-nav__matrix-title{line-height:2rem}@media (max-width:875px){.global-nav .global-nav__matrix-title{margin-bottom:0}}.global-nav .global-nav__matrix-desc{margin:-1rem 0 .1rem 2.75rem}@media (max-width:875px){.global-nav .global-nav__matrix-desc{display:none}}.global-nav .global-nav__link{color:#f7f7f7;display:-webkit-inline-box;display:inline-flex;text-decoration:none}.global-nav .global-nav__link:hover{text-decoration:underline}.global-nav .global-nav__split-list{-webkit-column-gap:2rem;-moz-column-gap:2rem;column-gap:2rem;-webkit-columns:2;-moz-columns:2;column-count:2;list-style:none;margin:0 0 1.5rem;padding:0}.global-nav .global-nav__split-list .global-nav__list-item{display:inline-block;margin:0;padding:.25rem 0;width:100%}.global-nav .global-nav__inline-list{margin:.5rem 0 0;padding:0 0 1rem 2.75rem}@media (max-width:875px){.global-nav .global-nav__inline-list{margin-top:0;padding:0}}.global-nav .global-nav__inline-list .global-nav__list-item{display:inline;font-weight:400;list-style:none;margin-right:1.25rem}.global-nav .global-nav__muted-heading{color:#f7f7f7;font-weight:400}@media (max-width:875px){.global-nav .global-nav__muted-heading{font-size:.8175rem}}.global-nav .global-nav__overlay{-webkit-transition-duration:.5s;transition-duration:.5s;-webkit-transition-property:opacity;transition-property:opacity;-webkit-transition-timing-function:cubic-bezier(.215,.61,.355,1);transition-timing-function:cubic-bezier(.215,.61,.355,1);background-color:rgba(17,17,17,.4);height:100%;left:0;margin:0;opacity:0;pointer-events:none;position:fixed;width:100%;z-index:97}@media (max-width:875px){.global-nav .global-nav__overlay{display:none}}.global-nav .global-nav__overlay.show-overlay{opacity:1;pointer-events:all}@media (max-width:875px){body{padding-bottom:3rem;position:relative}.u-hide--mobile{display:none}}.skip-content a{color:#007aa6;display:block;left:-999px;position:absolute;top:-999px}.skip-content a:focus{background:#fff;border:1px solid #007aa6;left:0;padding:3px;position:relative;top:0;z-index:999999}');
    var a = {
        flagships: [],
        others: [],
        resources: [],
        abouts: []
    };

    function o(t, e, n) {
        for (var a = 0; a < t.length; a += 1) e.call(n, a, t[a])
    }

    function i(t) {
        var e = window.document.createElement("div");
        return e.innerHTML = t, e.childNodes[0]
    }

    function l(t) {
        var e = t.flagships,
            n = t.others,
            a = t.resources,
            o = t.abouts;

        function i(t) {
            return t.links.map((function(t) {
                return '<li class="global-nav__list-item">\n        <a class="global-nav__link" href="'.concat(t.url, '">\n          ').concat(t.text, "&nbsp;&rsaquo;\n        </a>\n      </li>")
            })).join("")
        }
        var l = e.map((function(t, n) {
                var a = "";
                t.links && (a = '<ul class="global-nav__inline-list">\n          '.concat(i(t), "\n        <ul>"));
                var o = '<li class="global-nav__matrix-item">\n          <a class="global-nav__link" href='.concat(t.url, '>\n            <img class="global-nav__matrix-image" src=').concat(t.logoUrl, ' width="32" height="32" alt="icon">\n            <h4 class="global-nav__matrix-title">').concat(t.title, '&nbsp;&rsaquo;</h4>\n          </a>\n          <div class="global-nav__matrix-content">\n            <p class="global-nav__matrix-desc">').concat(t.description, "</p>\n            ").concat(a, "\n          </div>\n        </li>");
                if (n === e.length - 1)
                    for (var l = 2 * e.length % 3, r = 0; r < l; r += 1) o += '<li class="global-nav__matrix-item">\n              &nbsp;\n            </li>';
                return o
            })).join(""),
            r = n.map((function(t, e) {
                var a = "";
                t.links && (a = '<ul class="global-nav__inline-list u-no-padding--left">\n          '.concat(i(t), "\n        <ul>"));
                var o = '<li class="global-nav__matrix-item">\n          <div class="global-nav__matrix-content">\n            <h4 class="global-nav__matrix-title"><a class="global-nav__link" href='.concat(t.url, ">").concat(t.title, '&nbsp;›</a></h4>\n            <p class="global-nav__matrix-desc u-no-margin--left">').concat(t.description, "</p>\n            ").concat(a, "\n          </div>\n        </li>");
                if (e === n.length - 1)
                    for (var l = 2 * n.length % 3, r = 0; r < l; r += 1) o += '<li class="global-nav__matrix-item">\n              &nbsp;\n            </li>';
                return o
            })).join(""),
            s = a.map((function(t) {
                return '<li class="global-nav__list-item">\n          <a class="global-nav__link" href='.concat(t.url, ' title="Visit ').concat(t.title, '">').concat(t.title, "</a>\n        </li>")
            })).join(""),
            c = o.map((function(t) {
                return '<li class="global-nav__list-item">\n          <a class="global-nav__link" href='.concat(t.url, ">").concat(t.title, "</a>\n        </li>")
            })).join(""),
            d = function(t) {
                var e = t.flagships,
                    n = t.others,
                    a = t.resources,
                    o = t.abouts;

                function i(t) {
                    return '<li class="global-nav__list-item">\n        <a class="global-nav__link" href='.concat(t.url, ">").concat(t.title, "</a>\n      </li>")
                }
                var l = e.map((function(t) {
                        return i(t)
                    })).join(""),
                    r = n.map((function(t) {
                        return i(t)
                    })).join(""),
                    s = a.map((function(t) {
                        return i(t)
                    })).join(""),
                    c = o.map((function(t) {
                        return i(t)
                    })).join("");
                return '<div class="global-nav__mobile-strip">\n      <div class="global-nav__row">\n        <h5 class="global-nav__muted-heading global-nav__expanding-row"><?= $lang->products ?></h5>\n        <ul class="global-nav__split-list">\n          '.concat(l, '\n        </ul>\n      </div>\n      <div class="global-nav__row">\n        <h5 class="global-nav__muted-heading global-nav__expanding-row">Also from Canonical</h5>\n        <ul class="global-nav__split-list">\n          ').concat(r, '\n        </ul>\n      </div>\n      <div class="global-nav__row">\n        <h5 class="global-nav__muted-heading global-nav__expanding-row">Resources</h5>\n        <ul class="global-nav__split-list">\n          ').concat(s, '\n        </ul>\n      </div>\n      <div class="global-nav__row">\n        <h5 class="global-nav__muted-heading global-nav__expanding-row">About</h5>\n        <ul class="global-nav__split-list u-no-margin--bottom">\n          ').concat(c, "\n        </ul>\n      </div>\n    </div>")
            }(t);
        return "".concat(d, '\n    <div class="global-nav__strip u-hide--mobile">\n      <div class="global-nav__row is-bordered">\n        <ul class="global-nav__matrix">\n          ').concat(l, '\n        </ul>\n      </div>\n    </div>\n    <div class="global-nav__strip u-hide--mobile">\n      <div class="global-nav__row">\n        <div class="global-nav__flex-container">\n          <div class="global-nav__others-col">\n            <h5 class="global-nav__muted-heading">Also from Canonical</h5>\n            <div class="global-nav__matrix">\n              ').concat(r, '\n            </div>\n          </div>\n          <div class="global-nav__resources-col">\n            <h5 class="global-nav__muted-heading">Resources</h5>\n            <ul class="global-nav__split-list">\n              ').concat(s, '\n            </ul>\n            <h5 class="global-nav__muted-heading">About</h5>\n            <ul class="global-nav__split-list">\n              ').concat(c, "\n            </ul>\n          </div>\n        </div>\n      </div>\n    </div>")
    }

    function r(t, e) {
        var n = e.querySelectorAll(".global-nav__header-link.has-dropdown"),
            a = e.querySelector(".global-nav__dropdown"),
            i = e.querySelectorAll(".global-nav__dropdown-content"),
            l = e.querySelectorAll(".global-nav__expanding-row"),
            r = e.querySelector(".global-nav__overlay"),
            s = window.innerWidth < t;

        function c() {
            a.classList.remove("show-content"), o(n, (function(t, e) {
                return e.classList.remove("is-selected")
            })), r.classList.remove("show-overlay")
        }

        function d() {
            window.scrollTo(0, e.offsetTop)
        }

        function m(t) {
            var n = t.querySelector(".global-nav__header-link-anchor").getAttribute("href"),
                a = e.querySelector(n);
            t.classList.add("is-selected"), o(i, (function(t, e) {
                return e !== a && e.classList.add("u-hide")
            })), a.classList.remove("u-hide"), r.classList.add("show-overlay"), s && d()
        }
        o(n, (function(t, e) {
            e.addEventListener("click", (function(t) {
                t.preventDefault(), a.classList.contains("show-content") ? e.classList.contains("is-selected") ? c() : (o(n, (function(t, e) {
                    return e.classList.remove("is-selected")
                })), m(e)) : (a.classList.add("show-content"), m(e))
            }))
        })), o(l, (function(t, e) {
            e.addEventListener("click", (function(t) {
                t.target.classList.toggle("is-active"), d()
            }))
        })), r.addEventListener("click", c)
    }

    function s(t) {
        return t ? '<li class="global-nav__header-link">\n    <a class="global-nav__header-link-anchor" href="'.concat(t, '">We are hiring</a>\n  </li>') : ""
    }! function() {
        var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
            e = t.maxWidth,
            n = void 0 === e ? "68rem" : e,
            o = t.hiring,
            c = void 0 !== o && o;
        var d = i('<div class="skip-content"><a href="#main-content">Skip to main content</a></div'),
            m = i('<div id="ul-global-nav" class="global-nav" role="complementary"></div>'),
            u = i('<div class="global-nav__overlay"></div>'),
            g = i('<div class="global-nav__header">\n    <div class="global-nav__header-row global-nav__row" style="max-width:'.concat(n, '">\n      <div class="global-nav__header-logo">\n        <a class="global-nav__header-logo-anchor" href="https://minteck-projects.alwaysdata.net">\n          <img src="/static/logos/global/global-white.svg"> <span class="global-nav__header-name">Minteck Projects™</span>\n        </a>\n      </div>\n      <ul class="global-nav__header-list">\n        ').concat(s(c), '\n        <li class="global-nav__header-link has-dropdown">\n          <a class="global-nav__header-link-anchor" href="#mprj-products"><?= $lang->products ?></a>\n        </li>\n      </ul>\n    </div>\n  </div>')),
            p = i('<div class="global-nav__dropdown">\n      <!--<div class="global-nav__dropdown-content u-hide" id="mprj-products" style="max-width:'.concat(n, '">\n        ').concat(l(a), "\n      </div>\n    </div>-->"));
        document.body.insertBefore(m, document.body.firstElementChild), document.body.insertBefore(d, m), m.appendChild(g), m.appendChild(p), m.appendChild(u), r(900, m)
    }({
        showLogins: !1
    });
    ! function(t) {
        if (void 0 === e) var e = {};
        if (e.hasOwnProperty("cookiePolicy")) throw TypeError("Namespace 'cpNs' not available");
        var n = null,
            a = function() {
                n.getAttribute("open") && (n.removeAttribute("open"), o("_cookies_accepted", "true", 3e3))
            },
            o = function(t, e, n) {
                var a = new Date;
                a.setTime(a.getTime() + 24 * n * 60 * 60 * 1e3);
                var o = "expires=" + a.toUTCString();
                document.cookie = t + "=" + e + "; " + o
            };
        if (t) var i = t.content,
            l = t.duration;
        i || (i = "We use cookies to improve your experience. By your continued\n      use of this site you accept such use.");
        if ("true" !== function(t) {
                for (var e = t + "=", n = document.cookie.split(";"), a = 0; a < n.length; a++) {
                    for (var o = n[a];
                        " " == o.charAt(0);) o = o.substring(1);
                    if (0 === o.indexOf(e)) return o.substring(e.length, o.length)
                }
                return ""
            }("_cookies_accepted")) {
            var r = document.createRange(),
                s = "".concat('\n    <!--<div class="cookie-policy">\n      <dialog\n        tabindex="0"\n        open="open"\n        role="alertdialog"\n        class="p-notification p-notification--cookie-policy"\n        aria-labelledby="cookie-policy-title"\n        aria-describedby="cookie-policy-content">\n        <h1 id="cookie-policy-title" class="u-off-screen">\n          Cookie policy notification\n        </h1>\n        <span class="p-notification__content"\n          id="cookie-policy-content"\n          role="document"\n          tabindex="0">', " ").concat(i, " ").concat('\n        <button class="p-notification__close js-close"\n          aria-label="Close this cookie policy notification">Close</button>\n      </span>\n    </dialog>\n  </div>-->'),
                c = r.createContextualFragment(s);
            document.body.insertBefore(c, document.body.lastChild), (n = document.querySelector(".p-notification--cookie-policy")).querySelector(".js-close").addEventListener("click", (function(t) {
                t.preventDefault(), a()
            })), l && (window.setTimeout((function() {
                a()
            }), l), window.addEventListener("unload", (function() {
                a()
            })))
        }
    }({
        content: "Nous utilisons des cookies pour améliorer votre expérience.",
        duration: 1e3
    })
}]);
} catch (e) {};