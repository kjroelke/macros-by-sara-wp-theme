const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

function snakeToCamel(str) {
	return str.replace(/([-_][a-z])/g, (group) =>
		group.toUpperCase().replace('-', '').replace('_', ''),
	);
}

/**
 * For index.ts (located `~/src/js/folder-name/index.ts)`)
 * Array of strings modeled after folder names (e.g. 'about-choctaw')
 *
 * !Be sure to import page scss in these files!
 */
const appNames = [];

/**
 * For SCSS files (no leading `_`)
 * Array of strings modeled after scss names (e.g. 'we-are-choctaw')
 *  */
const styleSheets = []; // for scss only

module.exports = {
	...defaultConfig,
	...{
		entry: function () {
			// Define custom entry points here
			const entries = {
				global: `./src/index.js`,
				// 'vendors/fontawesome': `./src/js/vendors/fontawesome.js`,
				'vendors/bootstrap': `./src/js/vendors/bootstrap.js`,
				'vendors/fonts': `./src/js/vendors/fonts.js`,
			};

			if (appNames.length > 0) {
				appNames.forEach((appName) => {
					const appNameOutput = snakeToCamel(appName);
					entries[`pages/${appNameOutput}`] = `./src/js/${appName}/index.ts`;
				});
			}
			if (styleSheets.length > 0) {
				styleSheets.forEach((styleSheet) => {
					const styleSheetOutput = snakeToCamel(styleSheet);
					entries[
						`pages/${styleSheetOutput}`
					] = `./src/styles/pages/${styleSheet}.scss`;
				});
			}
			return entries;
		},
		output: {
			path: __dirname + `/dist`,
			filename: `[name].js`,
		},
	},
};
