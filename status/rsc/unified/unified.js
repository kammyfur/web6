// window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"bc12d0ca7c","applicationID":"1887052,5587075","transactionName":"IlgMRUFXWFhWEE5CQwBDF0IcS0BVRxcSHl4PUwdJ","queueTime":0,"applicationTime":137,"agent":""}(window.NREUM||(NREUM={})).loader_config={licenseKey:"bc12d0ca7c",applicationID:"1887052"};window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var i=n[t]={exports:{}};e[t][0].call(i.exports,function(n){var i=e[t][1][n];return r(i||n)},i,i.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var i=0;i<t.length;i++)r(t[i]);return r}({1:[function(e,n,t){function r(){}function i(e,n,t){return function(){return o(e,[u.now()].concat(f(arguments)),n?null:this,t),n?void 0:this}}var o=e("handle"),a=e(4),f=e(5),c=e("ee").get("tracer"),u=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],l="api-",d=l+"ixn-";a(p,function(e,n){s[n]=i(l+n,!0,"api")}),s.addPageAction=i(l+"addPageAction",!0),s.setCurrentRouteName=i(l+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,i="function"==typeof n;return o(d+"tracer",[u.now(),e,t],r),function(){if(c.emit((i?"":"no-")+"fn-start",[u.now(),r,i],t),i)try{return n.apply(this,arguments)}catch(e){throw c.emit("fn-err",[arguments,this,e],t),e}finally{c.emit("fn-end",[u.now()],t)}}}};a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=i(d+n)}),newrelic.noticeError=function(e,n){"string"==typeof e&&(e=new Error(e)),o("err",[e,u.now(),!1,n])}},{}],2:[function(e,n,t){function r(e,n){var t=e.getEntries();t.forEach(function(e){"first-paint"===e.name?c("timing",["fp",Math.floor(e.startTime)]):"first-contentful-paint"===e.name&&c("timing",["fcp",Math.floor(e.startTime)])})}function i(e,n){var t=e.getEntries();t.length>0&&c("lcp",[t[t.length-1]])}function o(e){if(e instanceof s&&!l){var n,t=Math.round(e.timeStamp);n=t>1e12?Date.now()-t:u.now()-t,l=!0,c("timing",["fi",t,{type:e.type,fid:n}])}}if(!("init"in NREUM&&"page_view_timing"in NREUM.init&&"enabled"in NREUM.init.page_view_timing&&NREUM.init.page_view_timing.enabled===!1)){var a,f,c=e("handle"),u=e("loader"),s=NREUM.o.EV;if("PerformanceObserver"in window&&"function"==typeof window.PerformanceObserver){a=new PerformanceObserver(r),f=new PerformanceObserver(i);try{a.observe({entryTypes:["paint"]}),f.observe({entryTypes:["largest-contentful-paint"]})}catch(p){}}if("addEventListener"in document){var l=!1,d=["click","keydown","mousedown","pointerdown","touchstart"];d.forEach(function(e){document.addEventListener(e,o,!1)})}}},{}],3:[function(e,n,t){function r(e,n){if(!i)return!1;if(e!==i)return!1;if(!n)return!0;if(!o)return!1;for(var t=o.split("."),r=n.split("."),a=0;a<r.length;a++)if(r[a]!==t[a])return!1;return!0}var i=null,o=null,a=/Version\/(\S+)\s+Safari/;if(navigator.userAgent){var f=navigator.userAgent,c=f.match(a);c&&f.indexOf("Chrome")===-1&&f.indexOf("Chromium")===-1&&(i="Safari",o=c[1])}n.exports={agent:i,version:o,match:r}},{}],4:[function(e,n,t){function r(e,n){var t=[],r="",o=0;for(r in e)i.call(e,r)&&(t[o]=n(r,e[r]),o+=1);return t}var i=Object.prototype.hasOwnProperty;n.exports=r},{}],5:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,i=t-n||0,o=Array(i<0?0:i);++r<i;)o[r]=e[n+r];return o}n.exports=r},{}],6:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function i(e){function n(e){return e&&e instanceof r?e:e?c(e,f,o):o()}function t(t,r,i,o){if(!l.aborted||o){e&&e(t,r,i);for(var a=n(i),f=v(t),c=f.length,u=0;u<c;u++)f[u].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function d(e,n){h[e]=v(e).concat(n)}function m(e,n){var t=h[e];if(t)for(var r=0;r<t.length;r++)t[r]===n&&t.splice(r,1)}function v(e){return h[e]||[]}function g(e){return p[e]=p[e]||i(t)}function w(e,n){u(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var h={},y={},b={on:d,addEventListener:d,removeEventListener:m,emit:t,get:g,listeners:v,context:n,buffer:w,abort:a,aborted:!1};return b}function o(){return new r}function a(){(s.api||s.feature)&&(l.aborted=!0,s=l.backlog={})}var f="nr@context",c=e("gos"),u=e(4),s={},p={},l=n.exports=i();l.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(i.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(o){}return e[n]=r,r}var i=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){i.buffer([e],r),i.emit(e,n,t)}var i=e("ee").get("handle");n.exports=r,r.ee=i},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,o,function(){return i++})}var i=1,o="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=E.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();u(y,function(n,t){e[n]||(e[n]=t)}),c("mark",["onload",a()+E.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function i(){"complete"===d.readyState&&o()}function o(){c("mark",["domContent",a()+E.offset],null,"api")}function a(){return O.exists&&performance.now?Math.round(performance.now()):(f=Math.max((new Date).getTime(),f))-E.offset}var f=(new Date).getTime(),c=e("handle"),u=e(4),s=e("ee"),p=e(3),l=window,d=l.document,m="addEventListener",v="attachEvent",g=l.XMLHttpRequest,w=g&&g.prototype;NREUM.o={ST:setTimeout,SI:l.setImmediate,CT:clearTimeout,XHR:g,REQ:l.Request,EV:l.Event,PR:l.Promise,MO:l.MutationObserver};var h=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1167.min.js"},b=g&&w&&w[m]&&!/CriOS/.test(navigator.userAgent),E=n.exports={offset:f,now:a,origin:h,features:{},xhrWrappable:b,userAgent:p};e(1),e(2),d[m]?(d[m]("DOMContentLoaded",o,!1),l[m]("load",r,!1)):(d[v]("onreadystatechange",i),l[v]("onload",r)),c("mark",["firstbyte",f],null,"api");var x=0,O=e(6)},{}],"wrap-function":[function(e,n,t){function r(e){return!(e&&e instanceof Function&&e.apply&&!e[a])}var i=e("ee"),o=e(5),a="nr@original",f=Object.prototype.hasOwnProperty,c=!1;n.exports=function(e,n){function t(e,n,t,i){function nrWrapper(){var r,a,f,c;try{a=this,r=o(arguments),f="function"==typeof t?t(r,a):t||{}}catch(u){l([u,"",[r,a,i],f])}s(n+"start",[r,a,i],f);try{return c=e.apply(a,r)}catch(p){throw s(n+"err",[r,a,p],f),p}finally{s(n+"end",[r,a,c],f)}}return r(e)?e:(n||(n=""),nrWrapper[a]=e,p(e,nrWrapper),nrWrapper)}function u(e,n,i,o){i||(i="");var a,f,c,u="-"===i.charAt(0);for(c=0;c<n.length;c++)f=n[c],a=e[f],r(a)||(e[f]=t(a,u?f+i:i,o,f))}function s(t,r,i){if(!c||n){var o=c;c=!0;try{e.emit(t,r,i,n)}catch(a){l([a,t,r,i])}c=o}}function p(e,n){if(Object.defineProperty&&Object.keys)try{var t=Object.keys(e);return t.forEach(function(t){Object.defineProperty(n,t,{get:function(){return e[t]},set:function(n){return e[t]=n,n}})}),n}catch(r){l([r])}for(var i in e)f.call(e,i)&&(n[i]=e[i]);return n}function l(n){try{e.emit("internal-error",n)}catch(t){}}return e||(e=i),t.inPlace=u,t.flag=a,t}},{}]},{},["loader"]);
window.pageColorData = {
    "blue": "#3498DB",
    "border": "#E0E0E0",
    "body_background": "#ffffff",
    "font": "#737F8D",
    "graph": "#738bd7",
    "green": "#43b581",
    "light_font": "#99aab5",
    "link": "#738bd7",
    "orange": "#f26522",
    "red": "#f04747",
    "yellow": "#faa61a"
};

function calculateViewbox(dayCount, rectWidth, rectPadding) {
    var viewBox = [];
    if (dayCount === 90) {
        viewBox.push(0);
    } else {
        var offset = 90 - dayCount;
        viewBox.push((offset * rectWidth) + (rectPadding * (offset))); // x origin
    }
    viewBox.push(0); // y origin
    viewBox.push((rectWidth * dayCount) + (rectPadding * (dayCount - 1))); // svg width
    viewBox.push(34); // svg height
    return viewBox.join(' ');
}

document.addEventListener('DOMContentLoaded', function() {

    function getKeyAndCount(width) {
        if (width <= MAX_WIDTH_30_DAYS) {
            return {
                dayCount: 30,
                uptimeKey: 'thirty'
            }
        } else if (width <= MAX_WIDTH_60_DAYS) {
            return {
                dayCount: 60,
                uptimeKey: 'sixty'
            }
        } else {
            return {
                dayCount: 90,
                uptimeKey: 'ninety'
            }
        }
    }

    window.addEventListener('resize', function() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            resizeSvgViewBoxes();
        }, delay);
    });
});
var timeoutId;
var monthStrings = [
    'Jan', 'Feb', 'Mar',
    'Apr', 'May', 'Jun',
    'Jul', 'Aug', 'Sep',
    'Oct', 'Nov', 'Dec'
];
var EVENT_MAX_LENGTH = 90;

// Detect device (desktop vs. touch device)
function touchDevice() {
    var browser = bowser.getParser(window.navigator.userAgent);
    // if type is either mobile or tablet, return true
    return browser.parse().parsedResult.platform.type !== 'desktop';
}

// Class is in format day-<number>. Convert to just number
function dayNumberFromClass(className) {
    return parseInt(className.split('-')[1]);
}

// Class is in format component-<code>. Convert to just code
function componentCodeFromClass(className) {
    return className.split('-')[1];
}

// Convert number to string pixel measurement
function intToPixels(number) {
    return number.toString() + 'px';
}

function truncate(str) {
    return str.substring(0, EVENT_MAX_LENGTH) +
        (str.length > EVENT_MAX_LENGTH ? '...' : '');
}

// Tooltip Handling class constructor
function UptimeTooltipHandler(frameWidth) {
    this.visible = false;
    this.activeDay = {
        hovered: false
    };
    this.tooltip = document.getElementById('uptime-tooltip');
    this.frameWidth = frameWidth === undefined ? window.innerWidth : frameWidth;
    this.scrolling = false;

    window.addEventListener('mousemove', this.tooltipListener.bind(this));
    window.addEventListener('orientationchange', this.orientationListener.bind(this));

    // on tooltip creation, determine whether to display touch-specific controls
    var tooltipCloseButton = document.querySelector('.tooltip-close');

    if (touchDevice()) {
        var componentsContainer = document.querySelector('.components-container');
        componentsContainer.addEventListener('touchstart', this.handleTouch.bind(this));

        tooltipCloseButton.addEventListener('touchstart', this.unhoverTooltip.bind(this));
    } else {
        window.addEventListener('resize', this.resizeListener.bind(this));
        // classList not supported by IE < 9
        tooltipCloseButton.className += ' hidden';
    }

    // Handle toggle of group elements
    var groupComponents = document.querySelectorAll('[data-js-hook=component-group-opener]');
    for (var i = 0; i < groupComponents.length; i++) {
        groupComponents[i].addEventListener('click', this.hideTooltip.bind(this));
    }

    var tooltipBox = document.querySelector('#uptime-tooltip .tooltip-box');
    tooltipBox.addEventListener('mouseenter', this.mouseEnteredTooltip.bind(this));
    tooltipBox.addEventListener('mouseleave', this.unhoverTooltip.bind(this));
}

UptimeTooltipHandler.prototype.tooltipListener = function(event) {
    if (!this.tooltipHovered) {
        this.updateHoveredDay(event);
        this.updateTooltip(event);
    }
}

// this handler will accommodate for mobile orientation change
UptimeTooltipHandler.prototype.orientationListener = function(event) {
    // just close the tooltip
    this.unhoverTooltip();
}

UptimeTooltipHandler.prototype.resizeListener = function(event) {
    this.frameWidth = window.innerWidth;
}

UptimeTooltipHandler.prototype.handleTouch = function(event) {
    if (event.target.classList.contains('uptime-day')) {
        event.stopPropagation();
        this.bladeTouched(event);
    }
}

UptimeTooltipHandler.prototype.mouseEnteredTooltip = function() {
    // Necessary to clear the timeout set for closing the tooltip when the mouse
    // moves off the blade or timeline, so the tooltip isnt closed on hover
    clearTimeout(timeoutId);
    // Sets it to null so the timeout can be set later, as clearTimeout only
    // cancels the timer, and we need to allow it to be reset in the mouse
    // move handler below
    timeoutId = null;
    this.tooltipHovered = true;
}

UptimeTooltipHandler.prototype.unhoverTooltip = function() {
    this.tooltipHovered = false;
    this.activeDay.hovered = false;
    this.hideTooltip();
}

UptimeTooltipHandler.prototype.bladeTouched = function(event) {
    event.preventDefault();
    var classes = event.target.getAttribute('class').split(' ');
    var componentCode = componentCodeFromClass(classes[1])
    var index = dayNumberFromClass(classes[2]);

    // If open and tapped on same component and day, close tooltip
    if (this.visible && this.activeDay.component === componentCode && this.activeDay.index === index) {
        this.hideTooltip();
    } else {
        this.updateHoveredDay(event);
        this.updateTooltip(event);
    }
}

UptimeTooltipHandler.prototype.updateHoveredDay = function(event) {
    var classes = event.target.getAttribute('class'); // classList doesn't work in IE
    var onDay = classes != null && classes.split(' ').indexOf('uptime-day') !== -1;

    if (onDay) {
        classes = classes.split(' ');

        var componentCode = componentCodeFromClass(classes[1]);

        this.activeDay = {
            index: dayNumberFromClass(classes[2]),
            component: componentCode,
            bounds: event.target.getBoundingClientRect(),
            isGroup: false,
            hovered: true
        }
    } else {
        this.activeDay.hovered = false;
    }
}

UptimeTooltipHandler.prototype.updateTooltip = function(event) {
    var classes = event.target.getAttribute('class'); // classList doesn't work in IE
    var hoveredOnGraphic = classes != null && classes.split(' ').indexOf('availability-time-line-graphic') !== -1;

    if (this.activeDay.hovered) {
        this.updateTooltipData();
        this.positionTooltip();
    } else if (this.visible && !this.activeDay.hovered && !hoveredOnGraphic) {
        // Important: since this is on mouse move it will be called multiple times
        // which will clear timeoutId and reset it to the new value, meaning
        // it is a race condition to cancel it
        if (!timeoutId) {
            var _this = this;
            timeoutId = setTimeout(function() {
                _this.hideTooltip();
                timeoutId = null;
            }, 250);
        }
    }
}

UptimeTooltipHandler.prototype.updateTooltipData = function() {
    // Get the data for the day we're hovered on
    var day = uptimeData["0"].days[this.activeDay.index];

    // Update the date for the tooltip
    var date = new Date(day.date);

    // UTC necessary since days are passed yyyy-mm-dd, and new Date uses midnight UTC, so local times
    // are presented as the day before
    var dateString = day.date + " minutes ago";
    document.querySelector('#uptime-tooltip .date').innerHTML = dateString;

    // Update the outage fields
    if (this.activeDay.isGroup) {
        this.updateGroupOutageFields()
    } else {
        this.updateOutageFields(day.outages.p, day.outages.m, day.related_events);
    }
}

UptimeTooltipHandler.prototype.hoursFromSeconds = function(s) {
    return Math.floor(s / 60);
}

UptimeTooltipHandler.prototype.minutesFromSeconds = function(s) {
    // If less than a minute, round up to 1 minute to show that some outage existed
    if (s > 0 && s < 1) {
        return 1;
    }

    // Otherwise use floor
    return Math.floor((s % 60) / 1);
}

UptimeTooltipHandler.prototype.updateGroupOutageFields = function() {
    // Hide time info
    document.querySelector('#uptime-tooltip .outage-field.major').style.display = 'none';
    document.querySelector('#uptime-tooltip .outage-field.partial').style.display = 'none';
    document.querySelector(".related-events h3").style.display = 'none';
    document.querySelector('.no-related-msg').style.display = 'none';

    var eventList = document.getElementById("related-events-list")
    var cloneList = eventList.cloneNode(false);
    eventList.parentNode.replaceChild(cloneList, eventList);

    var partialCount = 0;
    var majorCount = 0;

    var components = uptimeData[this.activeDay.component].component.group

    for (var i = 0; i < components.length; i++) {
        if (!uptimeData[components[i]]) continue;

        var outages = uptimeData[components[i]].days[this.activeDay.index].outages;

        if (outages.p) {
            partialCount += 1;
        }

        if (outages.m) {
            majorCount += 1;
        }
    }

    document.querySelector('#major-outage-group-count').style.display = majorCount ? 'block' : 'none';
    document.querySelector('#partial-outage-group-count').style.display = partialCount ? 'block' : 'none';

    document.querySelector('#major-outage-group-count .count').innerText = majorCount + (majorCount == 1 ? " component" : " components")
    document.querySelector('#partial-outage-group-count .count').innerText = partialCount + (partialCount == 1 ? " component" : " components ")

    document.querySelector('#uptime-tooltip .no-outages-msg').style.display = (majorCount || partialCount) ? 'none' : 'block';
}

UptimeTooltipHandler.prototype.updateOutageFields = function(partial, major, relatedEvents) {
    // Hide group info
    document.querySelector('#major-outage-group-count').style.display = 'none';
    document.querySelector('#partial-outage-group-count').style.display = 'none';

    // Show the message that no outage present, if none is present
    if (partial || major) {
        document.querySelector('#uptime-tooltip .no-outages-msg').style.display = 'none';
    } else {
        document.querySelector('#uptime-tooltip .no-outages-msg').style.display = 'block';
    }

    // Update partial outage field if an outage exists, otherwise hide it
    if (partial) {
        var hrs = this.hoursFromSeconds(partial);
        var mins = this.minutesFromSeconds(partial);
        document.querySelector('#uptime-tooltip .outage-field.partial .value-hrs').innerHTML = hrs.toString() + ' hrs';
        if (mins > 1) {
            document.querySelector('#uptime-tooltip .outage-field.partial .value-mins').innerHTML = mins.toString() + ' mins';
        } else {
            document.querySelector('#uptime-tooltip .outage-field.partial .value-mins').innerHTML = mins.toString() + ' min';
        }
        document.querySelector('#uptime-tooltip .outage-field.partial').style.display = 'flex';
    } else {
        document.querySelector('#uptime-tooltip .outage-field.partial').style.display = 'none';
    }

    // Update major outage field if an outage exists, otherwise hide it
    if (major) {
        var hrs = this.hoursFromSeconds(major);
        var mins = this.minutesFromSeconds(major);
        document.querySelector('#uptime-tooltip .outage-field.major .value-hrs').innerHTML = hrs.toString() + ' hrs';
        if (mins > 1) {
            document.querySelector('#uptime-tooltip .outage-field.major .value-mins').innerHTML = mins.toString() + ' mins';
        } else {
            document.querySelector('#uptime-tooltip .outage-field.major .value-mins').innerHTML = mins.toString() + ' min';
        }
        document.querySelector('#uptime-tooltip .outage-field.major').style.display = 'flex';
    } else {
        document.querySelector('#uptime-tooltip .outage-field.major').style.display = 'none';
    }

    var eventList = document.getElementById("related-events-list")
    var cloneList = eventList.cloneNode(false);
    document.querySelector(".related-events h3").style.display = (relatedEvents.length ? 'block' : 'none');

    for (var i = 0; i < relatedEvents.length; i++) {
        var listItem = document.createElement("li");
        listItem.className = "related-event";
        var anchor = document.createElement("a");
        anchor.className = "related-event-link";
        anchor.target = "_blank";
        anchor.href = window.Routes.incident_path(relatedEvents[i].code);


        var text = document.createTextNode(truncate(relatedEvents[i].name));
        anchor.appendChild(text);
        listItem.appendChild(anchor);
        cloneList.appendChild(listItem);
    }

    const displayNoRelatedMsg = ((major || partial) && !relatedEvents.length);
    document.querySelector('.no-related-msg').style.display = (displayNoRelatedMsg ? 'block' : 'none');

    eventList.parentNode.replaceChild(cloneList, eventList);
}

UptimeTooltipHandler.prototype.positionTooltip = function() {
    this.calculatePointerCenter();
    this.calculateBoxPosition();

    // show tooltip
    this.tooltip.style.display = 'block';

    // position pointer
    var pointer = this.tooltip.getElementsByClassName('pointer-container')[0];
    pointer.style.left = intToPixels(this.pointerCenter.x - 8);
    pointer.style.top = intToPixels(this.pointerCenter.y - 5);

    // position display box
    var box = this.tooltip.getElementsByClassName('tooltip-box')[0];
    box.style.left = intToPixels(this.boxLeft);
    box.style.top = intToPixels(this.pointerCenter.y + 5);

    this.visible = true;
}

UptimeTooltipHandler.prototype.calculatePointerCenter = function() {
    var bounds = this.activeDay.bounds;
    var rectLeft = bounds.left + window.pageXOffset;
    var rectBottom = bounds.bottom + window.pageYOffset;
    var rectWidth = bounds.right - bounds.left;

    this.pointerCenter = {
        x: rectLeft + Math.floor(rectWidth / 2),
        y: rectBottom + 5
    }
}

UptimeTooltipHandler.prototype.calculateBoxPosition = function() {
    var sideWidth = 162.5;
    if (this.pointerCenter.x - sideWidth < 0) {
        this.boxLeft = 0;
    } else if (this.pointerCenter.x + sideWidth > this.frameWidth) {
        this.boxLeft = this.frameWidth - sideWidth * 2;
    } else {
        this.boxLeft = this.pointerCenter.x - sideWidth;
    }
}

UptimeTooltipHandler.prototype.hideTooltip = function() {
    this.tooltip.style.display = 'none';
    this.visible = false;
}

new UptimeTooltipHandler();
$(function() {
    $('.tool').tooltipster({
        animationDuration: 100,
        contentAsHTML: true,
        delay: 100,
        theme: 'tooltipster-borderless',
        functionInit: function(instance, helper) {
            var $origin = $(helper.origin),
                dataOptions = $origin.attr('data-tooltip-config');
            if (dataOptions) {
                dataOptions = JSON.parse(dataOptions);
                $.each(dataOptions, function(name, option) {
                    instance.option(name, option);
                });
            }
        }
    });
    // clicks on first tab in subscribe popout since we won't know which is first
    // upon construction in the ruby code
    $('.updates-dropdown-nav > a').eq(0).click();

    // twitter follow button needs some margin
    $('.twitter-follow-button').css('margin-right', '6px');
});

$(function() {
    // open/close component groups
    HRB.utils.djshook('component-group-opener').on('click', function() {
        $(this).find('.group-parent-indicator').toggleClass('fa-plus-square-o').toggleClass('fa-minus-square-o').end().parent().toggleClass('open');
    });
});

$(function() {
    $(document).on('ajax:complete', '.modal.in', function(e) {
        // Close the active modal.
        $('.modal.in').modal('hide');
    });
});