# Ticketing system

Software system in the form of an internet application, ticketing system for IT equipment services.
## Used technologies: HTML5, CSS3, JavaScript, PHP, CodeIgniter 4 and MySQL database.

## Users

There are three types of users:  
• administrator,  
• logistician,  
• IT service  

Registered users can log in to the system. The user has the opportunity to get access to certain parts of the application, depending on the role, after correctly entering the data. In case of incorrect data, the user will be notified with an appropriate message.

In addition to logging in to the system, the user has a link to a new website with a registration form and the ability to register themselves and activate the account by confirmation by e-mail. Users who are not registered or logged in cannot use the app.

The administrator is a user with special privileges to view all sections of the system. The logistician should have the privilege of inspecting sections of the logistics sector, and the IT service technician should have the privilege of inspecting sections of the service sector.

When registering a user, the following information must be entered:  
•	name,  
•	surname,  
• username (unique at the level of all users in the system),  
• password and password confirmation,  
• e-mail address (unique at the system level).  

If the login data is entered correctly, the following checks are performed:  
• Username is a required field, must have a unique value in the system, should contain only alphanumeric characters and dashes, with a minimum of 3 characters and a maximum of 20,  
• The password should have a minimum of 8 characters and a maximum of 16, it can contain alpha-numeric characters and special characters,  
• Basic checks of other fields.

If all fields are valid, a new entity is created in the database, and if some data is not entered or does not meet the conditions, the user receives a notification in the form of fields to display errors.

From the home page of the system, users have the opportunity to log in to the system. They also have the ability to continue working with the rest of the system without interruption after entering the data correctly. If they enter data incorrectly, a corresponding message will be displayed.

In addition to the registration and login form, the user, on the home screen, has the option to change the password in case it is forgotten. When the password is successfully changed, it returns to the user login screen.

After successful login to the system, registered users are shown a control panel with a table of all open tickets. The user can filter and search for tickets.

The administrator has the privilege to delete (disable) and add users in the form of two pages.

Logged-in users can change personal data: username, first name, last name, email and password.

## Tickets

Each ticket in the system has the following fields:

• title (brief description of the problem),  
• date and time of ticket opening,  
• device type,  
• device model,  
• device brand,  
• device serial number,  
• detailed description of the problem,  
• to whom the ticket was assigned,  
• status whether the ticket has been resolved.

There are four pages to view and add tickets:  

• Review of resolved tickets,  
• Review of unresolved tickets,  
• Adding tickets,  
• My tickets.

An overview of resolved and unresolved tickets is displayed in the form of a table where, in addition to the listed fields, there is a field with the option to mark tickets as resolved, which can be used only by users assigned to a given ticket or administrator, and a field for deleting tickets.

The page for adding a ticket contains a form with fields: short description, device type and manufacturer in the form of a drop-down list, device model, serial number, detailed description of the fault and to whom the ticket is assigned in the form of a drop-down list. The fields of the ticket opening date and the resolution status are filled in automatically when entering the database.

The "My Tickets" page lists all the tickets that have been assigned to the currently logged in user with the same options as in the above overview.

## Authorized services

There is a page to review the manufacturers and their respective authorized services.

The table for services has basic fields: name and date added.

## User activities

The application monitors user activity with the following items:  
• registration and deregistration of users to and from the system,  
• adding and deleting tickets,  
• changing profile data (username, first name, last name, e-mail and password),  
• marking the ticket as "Resolved",  
• adding and deleting users

Each user has the ability to view his activities. Activities cannot be deleted.

## Statistics

The administrator has the ability to view the number of resolved tickets for each user and in each sector (logistics and IT service).

## Other specifications

Each page contains a navigation menu and a header.
Each page shows a link to return to the home page.
Each user has the option to log out of the system.
After 30 minutes of inactivity, the user will be automatically logged out of the system.

## Migration

You can migrate database simply buy running command `php spark migrate -all`

*Migrations are without seeds. You need to manually add admin

## Myth Auth

The application uses a Myth Auth library.
Instruction for installation can be found here:
[Myth Auth repo](https://github.com/lonnieezell/myth-auth)

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
