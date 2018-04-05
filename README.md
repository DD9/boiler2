# boiler2
DD9's Boilerplate Theme (v2), with Bootstrap 4+

----

# Compile Boiler2 (NPM + GULP)

Configure GULP to automate several tasks, starting with minifying vendor JS files and compiling LESS 

- Install **Node** & **NPM** https://nodejs.org/en/ (NPM will insall with Node)
- Verify Installs

```
node -v
npm -v
```
- Copy `browser-sync-config-sample.json` to `browser-sync-config.json`  (the later will not be commited to git)
- Customize `browser-sync-config.json` with your local  `WP_SITEURL` (i.e. http://boiler.localhost/)
- Navigate to theme directory and from command line `npm install` 
- Confirm creation of /node_modules/ (which will be ignored by Git)
- From the theme directory and from command line `gulp`
- This will fire up a `browser-sync` window, which should force reload whenever changes to PHP/SASS/JS are made
- Verify gulp is monitoring for changes by tweaking .php, .sass and .js files


# Adding Vendor Scripts (JavaScript)

- Stop gulp (`ctrl +c` from terminal)
- `npm install [some_npm_package] --save`  (This will pull down the node_module and update the (production) dependencies in `package.json`
- From `gulpfile.js` add a link to the new resoure
```
var jsVendorSRC = {
  vendorPaths: [
    './node_modules/bootstrap/dist/js/bootstrap.min.js',
    './node_modules/[some_npm_package]/dist/[some_nmp_script.min.js]'
  ]
};
```
- Run `gulp` and the new script should be compiled into `vendors.min.js`


## Adding Vendor Scripts (PHP)

PHP libraries will be added via https://getcomposer.org/

*More details on this later, ask TGD if you need a PHP script in the meantime.*

# Install Boiler2

Create a WordPress install 

Create a theme folder (i.e /wp-content/themes/themename/), navigate to that folder, and pull down the repo

```
git clone git@github.com:dd9/boiler2.git .

#or

git clone https://github.com/dd9/boiler2.git .

```

**Important: WPengine Workflow: Make sure to delete `.git/` and `.gitignore` from the theme directory.** You will not be able to push the theme to WPengine if it is assocaited with another GitHub repository 

