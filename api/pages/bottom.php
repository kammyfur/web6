<script>
    function getPrimaryParentLanguage() {
        /**
         * Get the primary parent language
         *
         * Get the user's default language, and if it's a sub-language,
         * infer the parent language - e.g. for "en-GB", infer "en"
         */
        var language = navigator.language || navigator.userLanguage || navigator.browserLanguage || navigator.systemLanguage;
        if (language.indexOf('-') !== -1) {
            language = language.split('-')[0];
        }
        return language
    };
    // get the users language and remove any extra detail suffix (e.g. -gb)
    var language = getPrimaryParentLanguage();
    // get notices matching the user language
    var notices = document.querySelectorAll(".notice[lang=" + language + "]");
    // display only one matching notice
    if (notices.length > 0) {
        notices[0].classList.remove("u-hide")
    }
    try {
    if (window.localStorage && window.sessionStorage) {
        /**
         * Choose a takeover
         * ===
         *
         * From the list of provided takeovers in the #takeovers template,
         * choose one (that matches the client's language), and replace the
         * base template with it.
         */
        var baseTakeover = document.getElementById('takeover'); // The base takeover element
        var takeovers = document.getElementById('takeovers'); // The list of current takeovers to choose from
        // For browsers that support <template> (all but IE), grab the template's ".content"
        takeovers = 'content' in takeovers ? takeovers.content : takeovers;
        // First, select takeovers that don't specify a language and don't exclude the users language
        var takeoverSelectors = [".js-takeover:not([lang]).js-takeover:not([lang-skip*=" + language + "])"]
        // Add selectors to find takeovers for any of the user's languages
        takeoverSelectors.push(".js-takeover[lang=" + language + "]");
        takeoverSelectors.push(".js-takeover[data-lang-extra*=" + language + "]");
        // Get the selected takeovers
        var selectedTakeovers = (takeovers.querySelectorAll(takeoverSelectors.join(',')));
        if (selectedTakeovers) {
            var selectedIndex = null;
            if (localStorage.getItem('selected_takeover_index') !== null) {
                // If we previously chose a takeover, increment the number to show the next takeover
                var nextIndex = parseInt(localStorage.getItem('selected_takeover_index')) + 1
                selectedIndex = nextIndex < selectedTakeovers.length ? nextIndex : 0;
            } else {
                // Otherwise, randomly choose one of the takeovers and store it for next time
                selectedIndex = Math.floor(Math.random() * selectedTakeovers.length);
            }
            // Store the current takeover
            localStorage.setItem('selected_takeover_index', selectedIndex)
            // Get the takeover element
            var selectedTakeover = selectedTakeovers[selectedIndex]
            if (!document.body.contains(selectedTakeover)) {
                // If it's not in the current document (as in, it's in a template) import it
                // Note: This is for all browser *except* IE, which doesn't support <template>s
                selectedTakeover = document.importNode(selectedTakeover, true);
            }
            // Replace the base takeover with the new one
            // Note: We can't use Node.replaceWith (which would be nice), as it's not supported in IE
            baseTakeover.parentNode.replaceChild(selectedTakeover, baseTakeover)
        }
    }
    } catch (e) {};
</script>
</div>
</div> <!-- /.inner-wrapper -->
</div> <!-- /.wrapper -->

<!-- footer content goes here -->