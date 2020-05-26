[![GitHub](https://img.shields.io/github/license/chiragobhan/laravel-forum)](https://github.com/chiragobhan/laravel-forum/blob/master/LICENSE)
[![](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](https://github.com/chiragobhan/laravel-forum/pulls) 
[![Website](https://img.shields.io/website?down_color=red&down_message=down&up_color=brightgreen&up_message=live&url=https%3A%2F%2Fl-forum.000webhostapp.com%2F)](https://l-forum.000webhostapp.com/)
[![W3C Validation](https://img.shields.io/w3c-validation/html?targetUrl=https%3A%2F%2Fl-forum.000webhostapp.com%2F)](https://validator.w3.org/nu/?doc=https%3A%2F%2Fl-forum.000webhostapp.com%2F)
[![Maintenance](https://img.shields.io/maintenance/yes/2020)](https://github.com/chiragobhan/laravel-forum/issues)
# Forum App using Laravel

A message board where users can interact with one another via posts and comments. Features include - an admin panel, related posts, enable/disable comments and topics/categories.  
  
Live Demo - https://l-forum.000webhostapp.com/  
  
Admin credentials:  
Username - admin  
password - admin@forum  
  
User credentials:  
Username - user  
password - user@forum  
  
## Pre-requisites
1. [XAMPP](https://www.apachefriends.org/download.html) / [WAMP Server](https://bitnami.com/stack/wamp/installer)
2. [Composer](https://getcomposer.org/download/)
3. [Laravel](https://laravel.com/docs/7.x)
  
## Getting Started
  
### Step 1
Download or Clone this repository.
  
### Step 2
Rename `.env.example` to `.env`
  
### Step 3
Open your terminal, navigate to the project and run:  =
#### `composer update`  
This might take a few minutes and will install all the required dependencies for the project
  
### Step 4
Start your Apache and MySQL server using [XAMPP](https://www.apachefriends.org/download.html) or [WAMP](https://bitnami.com/stack/wamp/installer) and make a new database. For example, "forum"  
  
### Step 5
Enter the database details in `.env` file as below:  
  
![.env](https://user-images.githubusercontent.com/32812640/82909516-00bcdc80-9f87-11ea-8f2c-5eefeb74c810.PNG)

### Step 6
For migrating tables to database run the following command by navigating to the project directory:  
#### `php artisan migrate`
  
### Step 7
Now we need to generate the missing APP_KEY in `.env` file (line 3).
  
![key](https://user-images.githubusercontent.com/32812640/82910117-d586bd00-9f87-11ea-9611-cdfd31cc0b5f.PNG)
  
To generate one, run the following command in your terminal:  
#### `php artisan key:generate`  
  
![generate-key](https://user-images.githubusercontent.com/32812640/82912300-8d1cce80-9f8a-11ea-8c72-fd57f0e63a4b.PNG)
  
This command will generate and add the key in `.env` file:
  
![key-generated](https://user-images.githubusercontent.com/32812640/82912349-a02f9e80-9f8a-11ea-9a0c-de43bd2ae648.PNG)
  
### Step 8
Finally, run this command to see the project in action:
#### `php artisan serve`
