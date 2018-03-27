# boiler2
Boilerplate Theme (v2), with Bootstrap 4+

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


# Converting local dependencies into NPM dependencies and injecting them
See example: https://basecamp.com/1922309/projects/772526/todos/344872769#comment_607942957


# Install Boiler2

--

## Fork it (As a solo repo)

Create a WordPress install 

Create a theme folder (i.e /wp-content/themes/themename/), navigate to that folder, and pull down the repo

```
git clone git@github.com:dd9/boiler2.git .

#or

git clone https://github.com/dd9/boiler2.git .

```


--
