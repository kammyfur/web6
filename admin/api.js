Polymermin = {
    apiCommand: function(version, command, args, scheme, callback, error) {
        $('body').fadeOut(200);
        if (typeof version == "string" && typeof command == "string" && typeof args == "object" && typeof scheme == "string") {
            if (scheme == "get" || scheme == "post") {
                url = "/admin/api/" + version + "/" + command + "/";
            } else {
                error();
                $('body').fadeIn(200);
                throw new Error("[apiCommand@Polymermin] Invalid scheme, only 'post' and 'get' allowed");
            }
            $.ajax(url, {
                data: args,
                error: () => {
                    alert("Erreur de communication");
                    error();
                    $('body').fadeIn(200);
                    throw new Error("[apiCommand@Polymermin] Unable to connect to server");
                },
                success: (data) => {
                    if (data.startsWith("ok")) {
                        location.href = callback;
                    } else {
                        alert("Erreur : " + data);
                        error();
                        $('body').fadeIn(200);
                        throw new Error("[apiCommand@Polymermin] Server returned a non-zero exit code");
                    }
                },
                url: url,
                method: scheme
            })
        } else {
            error();
            $('body').fadeIn(200);
            throw new Error("[apiCommand@Polymermin] Invalid arguments types");
        }
    },
    ajaxLazyLoading: function(version, command, args, scheme, callback, error) {
        $('body').fadeOut(200);
        if (typeof version == "string" && typeof command == "string" && typeof args == "object" && typeof scheme == "string") {
            if (scheme == "get" || scheme == "post") {
                url = "/admin/api/" + version + "/" + command + "/";
            } else {
                error();
                $('body').fadeIn(200);
                throw new Error("[apiCommand@Polymermin] Invalid scheme, only 'post' and 'get' allowed");
            }
            $.ajax(url, {
                data: args,
                error: () => {
                    alert("Erreur de communication");
                    error();
                    $('body').fadeIn(200);
                    throw new Error("[apiCommand@Polymermin] Unable to connect to server");
                },
                success: (data) => {
                    $('body').fadeIn(200);
                    callback(data);
                },
                url: url,
                method: scheme
            })
        } else {
            error();
            throw new Error("[apiCommand@Polymermin] Invalid arguments types");
        }
    },
    ajaxLegacyLoading: function(version, command, args, scheme, callback, error) {
        if (typeof version == "string" && typeof command == "string" && typeof args == "object" && typeof scheme == "string") {
            if (scheme == "get" || scheme == "post") {
                url = "/admin/api/" + version + "/" + command + "/";
            } else {
                error();
                throw new Error("[apiCommand@Polymermin] Invalid scheme, only 'post' and 'get' allowed");
            }
            $.ajax(url, {
                data: args,
                error: () => {
                    alert("Erreur de communication");
                    error();
                    throw new Error("[apiCommand@Polymermin] Unable to connect to server");
                },
                success: (data) => {
                    callback(data);
                },
                url: url,
                method: scheme
            })
        } else {
            error();
            throw new Error("[apiCommand@Polymermin] Invalid arguments types");
        }
    }
}