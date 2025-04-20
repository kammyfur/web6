$(function() {
    SP.currentPage.updatesDropdown = {
        getParent: function() {
            return HRB.utils.djshook("updates-dropdown-container")
        },
        getDropdown: function() {
            return HRB.utils.djshook("updates-dropdown").filter(".updates-dropdown")
        },
        isOpen: !1,
        toggleDropdown: function() {
            0 == this.isOpen ? this.show() : this.hide()
        },
        show: function() {
            this.getDropdown().show(), this.isOpen = !0, setTimeout(function() {
                SP.currentPage.updatesDropdown.onBodyClose()
            }, 300)
        },
        hide: function() {
            this.getDropdown().hide(), this.isOpen = !1, this.offBodyClose(), $(window).trigger("updatesDropdownHide")
        },
        onBodyClose: function() {
            $("body").on("click.closeDropdown", function(o) {
                SP.currentPage.updatesDropdown.getDropdown().is(o.target) || SP.currentPage.updatesDropdown.getDropdown().has(o.target).length || SP.currentPage.updatesDropdown.hide()
            })
        },
        offBodyClose: function() {
            $("body").off("click.closeDropdown")
        }
    }, HRB.utils.djshook("show-updates-dropdown").on("click", function() {
        SP.currentPage.updatesDropdown.toggleDropdown()
    })
}), $(function() {
    var o = $(".updates-dropdown-nav").find("a"),
        t = $(".updates-dropdown-sections-container > div");
    o.on("click", function() {
        return $this = $(this), "updates-dropdown-close" == $this.attr("data-js-hook") ? void SP.currentPage.updatesDropdown.hide() : ($elToShow = $($this.attr("href")), o.removeClass("active"), $this.addClass("active"), t.hide(), $elToShow.show(), !1)
    })
}), $(function() {
    var o = HRB.utils.djshook("images-container"),
        t = function() {
            o.css("height", 315 * parseInt(o.css("width")) / 850)
        };
    o.length && (t(), $(window).on("resize", t))
}), $(function() {
    var o = $(".starter .masthead .updates-dropdown-container"),
        t = $(".masthead"),
        n = function() {
            o.css("top", (t.height() - o.height()) / 2)
        };
    o.length && (n(), $(window).on("resize", n))
}), $(function() {
    var o = HRB.utils.djshook("updates-dropdown-container"),
        t = $("#replace-with-subscribe");
    t.length && (t.replaceWith(o), o.css("display", "inline-block"))
});