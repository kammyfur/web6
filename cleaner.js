//   ____ _                  ____  
//  / ___| | ___  __ _ _ __ |  _ \ 
// | |   | |/ _ \/ _` | '_ \| |_) |
// | |___| |  __/ (_| | | | |  _ < 
//  \____|_|\___|\__,_|_| |_|_| \_\
//                                  
// NodeJS powered HTML cleaner
//
// This software is released on the public domain
// but dependencies may be subject to other licenses.
//

// NOTICES :
//   - PHP and JavaScript (.js files) compatibility is still experimental, backup all PHP code and .js files before running CleanR
//   - CleanR is made to be the SIMPLEST cleaner, so some settings (like the indent length, 4 spaces) cannot be changed
//   - JavaScript cleaner don't clean the CleanR code for safety
//   - JavaScript cleaner only works for plain JS files (.js only)
//   - If you enable the 'ignoreMin' option, all files or directories containing (in their name):
//      * .min
//      * -min
//      * _min
//      * .min.js

const config = { // Change your settings HERE, and ONLY here!
    recursive: true, // Whether or not fetch all directories and subdirectories, default: true
    enablePhp: true, // Whether or not enable (experimental) PHP compatibility, default: false
    enableJs: true, // Whether or not enable (experimental) JavaScript compatibility, default: false
    enableCss: true, // Whether or not enable (experimental) CSS compatibility, default: false
    ignoreMin: true, // Whether or not the JS cleaner will ignore minified scripts, default: true
    beautiThing: ".", // The folder CleanR will run in, relative to the script folder, default: '.'
}

// NEVER edit this code manually, edit only the config
console.log("Welcome to ");
console.log("  ____ _                  ____  " + "\n" +
    " / ___| | ___  __ _ _ __ |  _ \\ " + "\n" +
    "| |   | |/ _ \\/ _` | '_ \\| |_) | " + "\n" +
    "| |___| |  __/ (_| | | | |  _ < " + "\n" +
    " \\____|_|\\___|\\__,_|_| |_|_| \\_\\");
console.log("version 1.0");
console.log("");
var cleaner = require('pretty');
var beautify = require('js-beautify').js;
var beaucss = require('js-beautify').css;
var fs = require('fs');
const Stopwatch = require('statman-stopwatch');
var sw = new Stopwatch();
var directory = __dirname + "/" + config.beautiThing;

console.log("Systems ready!\n");
list = [];
jsl = [];
css = [];
ignored = [];
directories = [];
total = [];
done = [];
audited = [];
unchanged = [];

function fetch(dir, r) {
    directories.push(dir);
    console.log("Fetching: " + dir);
    tmp = fs.readdirSync(dir);
    tmp.forEach((file) => {
        canonical = dir + "/" + file;
        if (fs.lstatSync(canonical).isDirectory()) {
            if (r) {
                if (file != ".git" && file != ".svn" && file != "node_modules") {
                    fetch(canonical, true);
                }
            }
        } else {
            total.push(canonical);
            if ((config.enablePhp && file.endsWith(".php")) || file.endsWith(".html")) {
                console.log("Add: " + canonical);
                list.push(canonical);
            } else {
                if (config.enableJs && file.endsWith(".js")) {
                    if ((config.ignoreMin && file.endsWith(".min.js")) || (config.ignoreMin && file.endsWith("_min.js")) || (config.ignoreMin && file.endsWith("-min.js")) || (config.ignoreMin && canonical.includes("-min/")) || (config.ignoreMin && canonical.includes("-min-") || (config.ignoreMin && canonical.includes("_min/")) || (config.ignoreMin && canonical.includes("_min_")) || (config.ignoreMin && canonical.includes(".min/")) || (config.ignoreMin && canonical.includes(".min.")))) {
                        console.log("Ignore: " + canonical);
                        ignored.push(canonical);
                    } else {
                        if (canonical == __filename) {
                            console.log("Ignore: " + canonical);
                            ignored.push(canonical);
                        } else {
                            console.log("Add: " + canonical);
                            jsl.push(canonical);
                        }
                    }
                } else {
                    if (config.enableJs && file.endsWith(".css")) {
                        console.log("Add: " + canonical);
                        css.push(canonical);
                    } else {
                        console.log("Ignore: " + canonical);
                        ignored.push(canonical);
                    }
                }
            }
        }
    })
}

function clean(mode, file) {
    if (mode != "html" && mode != "js" && mode != "css") {
        console.log("Abort: " + file + " - Mode specified to API isn't a valid mode");
        return;
    }
    console.log("File: " + file);
    console.log(file + ": Reading raw file... (1/8)");
    buffer = fs.readFileSync(file);
    if (false) {} else {
        console.log(file + ": Converting to CleanR file... (2/8)");
        content = buffer.toString();
        console.log(file + ": Preparing file for cleanup... (3/8)");
        uuid = require('uuid').v4();
        console.log(file + ": Cleaning file... (4/8)");
        if (mode == "html") {
            cleaned = cleaner(content, {
                ocd: true
            });
        } else if (mode == "js") {
            cleaned = beautify(content, {
                indent_size: 4,
                space_in_empty_paren: true
            });
        } else if (mode == "css") {
            cleaned = beaucss(content, {
                indent_size: 4,
                space_in_empty_paren: true
            });
        }
        console.log(file + ": Converting cleaned code... (5/8)");
        console.log(file + ": Analyzing changes... (6/8)");
        if (cleaned === content) {
            unchanged.push(file);
            console.log(file + ": No changes detected (7/8)");
        } else {
            audited.push(file);
            console.log(file + ": Writing cleaned file... (7/8)");
            fs.writeFileSync(file, cleaned);
        }
        console.log(file + ": Flushing RAM... (8/8)");
        cleaned = undefined;
        newcont = undefined;
        cup = undefined;
        uuid = undefined;
        buffer = undefined;
        content = undefined;
        console.log("Finished: " + file);
        done.push(file);
        if (JSON.stringify(done) === JSON.stringify(list)) {}
    }
}

console.log("Getting files list...");
fetch(directory, config.recursive);
console.log("Fetched files!");
console.log("\nCleanR listed " + total.length + " files in " + directories.length + " folders, including:\n   - " + ignored.length + " file(s) that can't be cleaned by CleanR\n   - " + (list.length + jsl.length + css.length) + " file(s) that will be cleaned WITHOUT ANY BACKUP by CleanR");
console.log("\nChanges done to files are PERMANENT and cannot be undone.\nNeither Minteck Projects or dependencies developers are responsible for any unusable file.\n\nClean up will now start in 30 seconds, press Ctrl+C to cancel NOW (no changes done so far)");
setTimeout(() => {
    sw.start();
    console.log("\nFlushing RAM...");
    ignored = undefined;
    directories = undefined;
    total = undefined;
    console.log("Starting clean up...");
    list.forEach((file) => {
        clean('html', file);
    })
    jsl.forEach((file) => {
        clean('js', file);
    })
    css.forEach((file) => {
        clean('css', file);
    })
    sw.stop();
    console.log("\nFlushing RAM...");
    list = undefined;
    jsl = undefined;
    css = undefined;
    done = undefined;
    alg = audited.length;
    ulg = unchanged.length;
    audited = undefined;
    unchanged = undefined;
    console.log("Doing some cleanup operations...");
    cleaner = undefined;
    beautify = undefined;
    directory = undefined;
    coptions = undefined;
    fs = undefined;
    console.log("\nCleanR finished work in " + (sw.read(0) / 1000).toFixed(2) + " seconds.\n" + alg + " files audited, " + ulg + " files left unchanged");
}, 15000)