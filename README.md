# WordPress-Compiler
Compiler Workflow that allows for Node Pre-Processors during WordPress Development



### Requirements
Node v14.19.3

### Optional
Visual Studio Code (This package ustilizes Live Sass Compiler extension)

### OVERALL STRUCTURE OF WORDPRESS SET UP:

- build

  - Core WP files
  - wp-content

- source
  - .git
  - .gitignore
  - package.json
  - src
    - Copy of WP Core files
    - dev-scripts
      - copy.js
      - scss

### OVERALL WORKFLOW

All Development should be from the "source" directory, with Visual Studio Code watchinhg for Sass changes. After each save, Live Watch will compile and save style.css in the src directory.

Template files and folders can be added as needed.

When ready to preview, npm run copy. This will copy all files and directories into build/wp-content/themes/customtheme

This set up will allow you to use Node and migrate WP from local to server without having to move node_modules & git files/folders.

CAVEAT! Deleting a file from your src directory will not remove it from the compiled version, so you will need to remove it manually.


### PREPARATION

1) Create your local directory. This directory will be used to store two directories:

  - build
  - this package

2) In the build directory, install a fresh WordPress instance. Easiest way is to use MAMP (https://www.mamp.info/en).

3) If you already have a theme, activate it. If not, there are minimalist boilerplate themes you can download, such as _underscores (https://underscores.me/). 

4) Once you are able to activate a theme, go into it's directory at /wp-content/themes/yourtheme. You'll want to copy all of the contents (files and directories) and paste them in step 6, below.

5) In the /src/ directory, you'll want to DELETE ALL of the existing files and folders, EXCEPT for dev-scripts. (I just kept these files here so you know where your theme files belong)

6) Paste all of your theme files (from step 4) into the /src directory of this package. 


### SOURCE FOLDER

Go to /src/dev-scripts/copy.js, open the file and change the themeName variable to whatever the name of your theme directory.

Any time you're ready to update your build's files and folders, run the following command:
```
npm run copy
```

If Bootstrap will be used (or any other package with CSS, for that matter), install via NPM.

### SET UP SASS

Sass files should live in the src/dev-scripts directory

If Visual Studio Code, there's a SASS watcher that waits for changes and auto-compiles when SCSS files are saved.

Search for "Live Sass Compiler" extension

Settings can be applied for User & Workspaces. In this case, apply the below settings to Workspace. Click on the Extensions tab on the left-most column (square grid icon). Click on the cog wheel to the right of the Live Sass Compiler listing.

```
"liveSassCompile.settings.formats":[
  {
    "format": "compressed",
    "extensionName": ".css",
    "savePath": "/src"
  }
]
```

- Work Space = Project
- User = Global/App-wide

### SASS Files

Open src/dev-scripts/style.scss

By default this boilerplate assumes Bootstrap will be used and is pointing to those SCSS files in the compile. (I left this in so you won't have to find the path to node_modules)
