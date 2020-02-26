const fs = require("fs");
const path = require("path");
const execSync = require("child_process").execFileSync;
const semver = require("semver");

const pathToFile = path.resolve(__dirname, "../style.css");
const pjson = require("../package.json");
const exec = command => execSync(command, { encoding: "utf8" });

const version = pjson.version;

const patch = semver.patch(version);
const patchedVersion = `${semver.major(version)}.${semver.minor(
	version
)}.${patch + 1}`;

pjson.version = patchedVersion;

fs.writeFileSync("./package.json", JSON.stringify(pjson, null, 2));
fs.unlinkSync(pathToFile, function(err) {
	if (err) console.log(err);
	else console.log("style.css deleted!");
});

fs.writeFileSync(
	pathToFile,
	`
	/*!
	Theme Name: Gbomotors
	Theme URI: http://underscores.me/
	Author: Vadim Mishkhozhev
	Author URI: http://underscores.me/
	Description: Custom theme: Gbomotors, developed by Vadim Mishkhozhev
	Version: ${patchedVersion}
	License: GNU General Public License v2 or later
	License URI: LICENSE
	Text Domain: gbomotors
	Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready
	GitHub Theme URI: stug111/gbo

	This theme, like WordPress, is licensed under the GPL.
	Use it to make something cool, have fun, and share what you've learned with others.

	Gbomotors is based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc.
	Underscores is distributed under the terms of the GNU GPL v2 or later.

	Normalizing styles have been helped along thanks to the fine work of
	Nicolas Gallagher and Jonathan Neal https://necolas.github.io/normalize.css/
	*/
`,
	function(err) {
		if (err) console.log(err);
		else console.log("style.css new created!");
	}
);

console.log("Current version:", version);
console.log("Publishing version:", patchedVersion);
