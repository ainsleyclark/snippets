# Gulp 4 + Webpack 4 + Babel + BrowserSync + Font Awesome 5

All the tasks are done via Gulp. Webpack is just used for ES6 Import/Export as Gulp can't do it to my best of knowledge. Apart from ES6 Import/Export, Gulp was able to do all my other work that I wanted so I have mainly used Gulp. That being said, you can modify the webpack config to your preferences from `webpack` folder and use webpack specific plugins as you need.

For Live reloading, Browsersync has been used. For ES6 Transpilation, Babel has been used. For SourceMaps, Gulp & Webpack both have been used. For Icon Fonts, Font Awesome 5 has been used with Sass/CSS Workflow.

## Setup

- Install [Node](https://nodejs.org/)
- Optionally, also install [Yarn](https://yarnpkg.com/) or use *Npm* that comes with Node pre-installed
- Install Gulp globally through `npm install -g gulp@next`
- Install Webpack globally through `npm install -g webpack`

- Run `yarn` to install everything

## Usage

- **Build the Project and Serve locally (for Production)** - `npm start` or `yarn start`. The Production port is `8000`.


