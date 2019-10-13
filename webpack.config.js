let webpack = require('webpack');
let path = require('path');
let MiniCssExtractPlugin= require('mini-css-extract-plugin');
let VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
    entry: './resources/js/app.js',

    output: {
        path: path.resolve(__dirname, 'public/js'),
        filename:'app.js',
    },

    module: {
        rules: [
            {
                test: /\.scss|sass$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    "css-loader",
                    "sass-loader"
                ]
            },


            {
                test: /\.vue$/,
                use:[
                  "vue-loader",
                ],
            },

            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: file => (
                  /node_modules/.test(file) &&
                  !/\.vue\.js/.test(file)
                )
            },

            {
                test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "url-loader?limit=10000&mimetype=application/font-woff&name=../fonts/[hash].[ext]"
            },
            {
                test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "file-loader?name=../fonts/[hash].[ext]"
            },

            {
                test: /\.(png|jpg|gif)$/i,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 8192,
                        },
                    },
                ],
            },


        ]
    },


    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
        }
    },



    mode:'development',

    plugins: [
        new MiniCssExtractPlugin({
      filename: "../css/app.css",
    }),
        new VueLoaderPlugin()
    ],

//    optimization: {
//        splitChunks: {
//
//            chunks: 'all'
//        }
//    }
//
}
