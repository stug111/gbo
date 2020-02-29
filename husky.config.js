const tasks = arr => arr.join(" && ")

module.exports = {
	hooks: {
		"pre-commit": tasks(["node deploy/update-version.js", "git add", "lint-staged"]),
	},
}
