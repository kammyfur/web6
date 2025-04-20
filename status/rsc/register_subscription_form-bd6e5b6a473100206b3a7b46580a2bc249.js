SP.currentPage.registerSubscriptionForm = function(t) {
    var e = "#subscribe-form-" + t,
        i = "#subscribe-btn-" + t;
    HRB.utils.bindBasicAjaxForm(e, i, function(t, e) {
        var i, s;
        "string" == typeof e && (e = JSON.parse(e)), s = e.redirect_to, i = e.type !== undefined && null !== e.type ? {
            cssClass: e.type
        } : {}, "manage.statuspage.io" === window.location.hostname || "manage.statuspagetest.com" == window.location.hostname ? (HRB.utils.notify(e.text, Object.assign({
            method: "deferred"
        }, i)), window.location.reload()) : s ? (HRB.utils.notify(e.text, Object.assign({
            method: "deferred"
        }, i)), window.location.href = s) : HRB.utils.notify(e.text, i)
    }, function(t, e) {
        420 == e.status ? HRB.utils.notify("Hang on there, partner. You're subscribing too fast (give it a quick second and try again).", {
            cssClass: "error"
        }) : HRB.utils.basicFailAndReload("while subscribing you")
    })
};