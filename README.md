# Photography website for Chris Dinh
The website will serve as a place for Chris to showcase his photos and adventures through the gallery and blog. The website will be built on the wordpress ecosystem (LAMP stack) and will be set up in a way where almost every piece of information or content can be updated via the Wordpress admin, allowing us to change the website as much as needed. The first iteration of the website will be built via the Sage framework. The second iteration of the website will be a headless set up, where we install the CMS on a subdomain and use wordpress' REST API to expose data needed to build the site. The main site will then be built in React/Typescript.

## Table of Contents
1. [Introducing new code to the repo](#introducing-new-code-to-the-repo)
2. [Local Set Up](#local-set-up)

## Local Set Up
1. Download [Local by Flywheel](https://localwp.com/)
2. Create a new website (name it `chrisdinh`)
3. Once the website has been set up, open your terminal
4. Change directory into the public directory of the newly set up website (on mac, the command should be `cd ~/Local\ Sites/chrisdinh/app/public`)
5. Run `git init`
6. Add our remote origin `git remote add origin  ...`
7. Run `git pull && git fetch -p`
8. Run `git checkout main --force`
9. Head over to the staging website and export a copy of the database
10. From the local app, click the command `Open site shell`
11. Run `wp db import path/to/db-dump.sql` to replace your database with the staging database
12. Run `wp search-replace db-url chrisdinh.local --dry-run`
13. Once you've confirmed the import looks correct, run the same command without the `--dry-run` flag
14. Export all the images from staging and replace the local `uploads` folder (inside `/wp-content/uploads`) with the uploads folder from staging
15. Exit the site shell
16. Open your VSC and via the terminal, run `composer update` in the `public` directory
17. Change directory to the theme `cd wp-content/themes/chrisdinh-photography`
18. Ensure you're using a node version of `16.14.0` (if not, i highly suggest download NVM to manage your node versions and then installing any version above `16.14.0`)
19. Run `composer install && yarn install` from the theme directory
20. Run `yarn dev` to start the development host
21. Begin coding

## Introducing new code to the repo

When you are introducing new code into the repo, there are certain steps you must take before writing your code.
1. Checkout to the `main` branch and run `git pull` so your local environment is caught up the the most recent updates in our main branch.
2. From your `main` branch, checkout into a new branch using a branch name that describes what you're looking to introduce into the codebase. For example, if you're working on a new module called a featured image module, you could checkout to a branch named `module/featured-image` (`git checkout -b module/featured-image`)
3. Begin working on your code and as you work, make sure you're testing any styling/js/php thats needed for the new code to work without bugs
4. Once your code is in a good place, make sure everything is committed and push your branch to the remote repo.
5. Checkout to the staging branch and run `git pull` to ensure your local staging branch is in sync with the remote repo staging branch
6. Merge your feature branch into `staging`
7. Run `git push origin staging` so that our remote staging branch is in sync with your latest updates
8. Head over to our staging website and make sure your updates have not broken anything on the website
9. Once you've confirmed your new feature has not broken anything on the website, open your PR and add a descriptive PR name and PR description so we can accurately track what the code does and why its needed in the code base.
10. Assign reviewers to the PR
11. Address any PR comments
12. Once your PR is approved, merge your PR into the `main` branch