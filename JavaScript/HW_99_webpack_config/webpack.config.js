var webpack = require('webpack');

module.exports = {
    entry: './webpack.js',
    output: {
        filename: 'bundle.js'
    },

    devtool: 'source-map',

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env']
                    }
                }
            },


            {
                test: /\.js$/, // include .js files
                enforce: "pre", // preload the jshint loader
                exclude: /node_modules/, // exclude any and all files in the node_modules folder
                use: [
                    {
                        loader: "jshint-loader",
                        options: {
                            esversion: 6,
                            strict: 'implied',
                            emitErrors: false,
                            failOnHint: false
                        }
                    }
                ]
            }

        ]
    },


    plugins: [
        new webpack.optimize.UglifyJsPlugin({ sourceMap: true })
    ]
};