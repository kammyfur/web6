window.onload = () => {
    // Workaround to make checkboxes work
    checkboxes = Array.from(document.querySelectorAll('label'));
    checkboxes.forEach((checkbox) => {
        if (Array.from(document.getElementsByName(checkbox.htmlFor)).length > 0) {
            checkbox.onclick = (event) => {
                obj = document.getElementsByName(event.target.htmlFor)[0];
                console.log(obj);
                console.log(obj.checked);
                if (obj.checked) {
                    obj.checked = false;
                } else {
                    obj.checked = true;
                }
            }
        }
    })

    outer = document.getElementById('mprj-products').outerHTML;
    document.getElementById('mprj-products').outerHTML = "";
    document.getElementsByClassName('global-nav__dropdown')[0].innerHTML = outer;
    els = Array.from(document.getElementsByClassName('global-nav__muted-heading'));
    els.forEach((e) => {
        e.onclick = (event) => {
            if (event.target.classList.contains("global-nav__mobile-shown-heading")) {
                event.target.nextElementSibling.style.display = "";
                event.target.classList.remove("global-nav__mobile-shown-heading");
            } else {
                event.target.nextElementSibling.style.display = "block";
                event.target.classList.add("global-nav__mobile-shown-heading");
            }
        }
    })

    Array.from(document.querySelectorAll('.p-navigation__dropdown-link > .p-navigation__link-anchor:not(.nodd)')).forEach((e) => {
        Array.from(document.getElementsByClassName('dropdown-window')[0].childNodes).forEach((l) => {
            if (l.nodeName != "#text") {
                l.classList.add("mpm-hide");
            }
        });
        e.onclick = (event) => {
            event.preventDefault();
            el = event.target.href.split("#")[1];
            dom = document.getElementById(el);
            if (dom.classList.contains("mpm-hide")) { // 'dom' is hidden
                dom.classList.remove("mpm-hide");
                dom.classList.remove("u-hide");
                Array.from(document.querySelectorAll('.p-navigation__dropdown-link > .p-navigation__link-anchor')).forEach((item) => {
                    if (document.getElementById(item.href.split("#")[1]).id != el && document.getElementById(item.href.split("#")[1]).nodeName != "#text") {
                        item.parentElement.classList.remove("is-selected");
                        document.getElementById(item.href.split("#")[1]).classList.add("mpm-hide");
                        document.getElementById(item.href.split("#")[1]).classList.add("u-hide");
                    }
                })
                event.target.parentElement.classList.add("is-selected");
                Array.from(document.getElementsByClassName('dropdown-window')[0].childNodes).forEach((l) => {
                    if (l.id != el && l.nodeName != "#text") {
                        l.classList.add("u-hide");
                    }
                });
                document.getElementsByClassName('dropdown-window')[0].classList.remove("slide-animation");
                document.getElementsByClassName('dropdown-window-overlay')[0].classList.remove("fade-animation");
            } else { // 'dom' is shown
                event.target.parentElement.classList.remove("is-selected");
                document.getElementsByClassName('dropdown-window')[0].classList.add("slide-animation");
                document.getElementsByClassName('dropdown-window-overlay')[0].classList.add("fade-animation");
                dom.classList.add("mpm-hide");
            }

            return false;
        }
    })

    document.getElementsByClassName('dropdown-window-overlay')[0].onclick = (event) => {
        Array.from(document.querySelectorAll('.p-navigation__dropdown-link')).forEach((item) => {
            if (item.classList.contains("is-selected")) {
                item.classList.remove("is-selected");
            }
        })
        document.getElementsByClassName('dropdown-window')[0].classList.add("slide-animation");
        document.getElementsByClassName('dropdown-window-overlay')[0].classList.add("fade-animation");
        dom.classList.add("mpm-hide");
    }
}