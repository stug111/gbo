const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const IgnoreEmitPlugin = require('ignore-emit-webpack-plugin')

module.exports = {
	entry: {
		index: path.resolve(process.cwd(), 'src', 'index.js'),
		style: path.resolve(process.cwd(), 'src', 'sass', 'style.scss'),
	},
	module: {
		rules: [
			{
				test: /\.m?js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'],
					},
				},
			},
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader, // creates style nodes from JS strings
					'css-loader', // translates CSS into CommonJS
					'sass-loader', // compiles Sass to CSS, using Node Sass by default,
					'postcss-loader',
				],
			},
			{
				test: /\.(png|jpg|gif|woff)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]',
						},
					},
				],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].css',
			chunkFilename: '[id].css',
			ignoreOrder: false,
		}),
		new IgnoreEmitPlugin(['style.js', 'editor-style.js', 'woocommerce.js']),
	],
}
