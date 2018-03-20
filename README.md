# boiler2
Boilerplate Theme (v2), with Bootstrap 4+

----



# Compile Boiler2 (NPM + GULP)

Configure GULP to automate several tasks, starting with minifying vendor JS files and compiling LESS 

- Install **Node** https://nodejs.org/en/
- Install **NPM** globally  `npm install npm -g` (Node will come installed with NPM)
- Install **gulp** globally `npm install gulp -g`
- Install **sass** globally `npm install sass -g`
- Verify Installs

```
node -v
npm -v
gulp -v
sass -v
```

- Navigate to theme directory and from command line `npm install`
- Confirm creation of /node_modules/ (which will be ignored by Git)
- From the theme directory and from command line `gulp`
- Verify gulp is monitoring for changes by tweaking .less and .js files



# Install Boiler2

--

## Fork it (As a solo repo)

Create a WordPress install (probably local)

Create a theme folder (i.e /wp-content/themes/themename/), navigate to that folder, and pull down the repo

```
git clone git@github.com:dd9/boiler2.git .

#or

git clone https://github.com/dd9/boiler2.git .

#then

git remote add upstream https://github.com/dd9/boiler2.git

#or

git remote add upstream git@github.com:dd9/boiler2.git

#then

git fetch upstream

```


--

## Using Boiler2 as a Submodule

http://git-scm.com/book/en/v2/Git-Tools-Submodules

From superproject root: 

```
git submodule add https://github.com/DD9/boiler2 wp-content/themes/themename

```


You may need to run this from the superproject root, depending on if you pulled down the superproject repo with submodule already created.

```

git submodule init

git submodule update

```

If you want to check for new work in a submodule, you can go into the directory and run git fetch and git merge the upstream branch to update the local code.  If you run git submodule update --remote, Git will go into your submodules and fetch and update for you.

To push from the submodule to the boiler2 repo, navigate to the theme repo, checkout the master branch (since you will be working from a detached head).  Then work and commit as per usual.  When finished, commit work to super repo as well.



--

## Using Subtrees (bidirectional workflow)

http://blogs.atlassian.com/2013/05/alternatives-to-git-submodule-git-subtree/

https://medium.com/@v/git-subtrees-a-tutorial-6ff568381844

From superproject root: 

```
git remote add -f boiler2 git@github.com:dd9/boiler2.git

git subtree add --prefix=wp-content/themes/[THEMENAME] boiler2 master --squash

```

*(This will create the theme directory for you.)*

To pull down upstream changes

```
## Specd for later updates, but I didn't seem to need this.  Also try adding --squash to this if you have to run it.
## git fetch boiler2 master 

git subtree pull --prefix=wp-content/themes/[THEMENAME] boiler2 master --squash

```


To push changes back to boiler2 theme from within a different superproject root:

```
git subtree push --prefix=wp-content/themes/[THEMENAME] boiler2 master
```

*(Pushes to master branch, will work for DD9 team authorized to deploy here)*

---

## Using Subtrees (unidirectional workflow)

http://blogs.atlassian.com/2013/05/alternatives-to-git-submodule-git-subtree/

https://help.github.com/articles/about-git-subtree-merges/

http://williamdodson.co/articles/git-subtree/

```
git remote add -f boiler2 git@github.com:dd9/boiler2.git

git merge --squash -s ours --no-commit boiler2/master

git read-tree --prefix=wp-content/themes/[THEMENAME] -u boiler2/master

git commit -m "Merge boiler2 as subtree"

# Then to update the external subtree repo:

git pull --squash -s subtree boiler2 master
# no commit history from subtree, appears as though code changes were made directly to code in super project repo

#or

git pull -s subtree boiler2 master 
# this brought in all the commits from the entire subtree history


```

## Setting browsersync configs
See the browser-sync-config-sample.json in the Boiler2 theme folder to setup browsersync auto refresh. 

# Converting local dependencies into NPM dependencies and injecting them
See example: https://basecamp.com/1922309/projects/772526/todos/344872769#comment_607942957





