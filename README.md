# TO DO LIST
This todolist is made via PHP and SQL. It contains a registration/login system in which users may enter their details and login.
They are able to enter chores they would like to do, set a frequency of the chore or a deadline of when it is due. It is an efficient and 
robust system which allows the user to be continually informed on when they have chores due. The data entered by a user is stored in a database.
Common security practicies have been caried out, such as serialisation of input strings, POST methods, hashing passwords, which produces a simple yet robust system.

This is the main documentation on to how it works and what it does.

1)Login:
When you first open the file, you'll most likely see the login page. This is where you are able to login or register using the link on the bottom
The interface works by checking through a database and using the email checks for the account in the database. 
If the credentials are incorrect, you will be redirected back to the login page. If values are left empty, then error values are displayed

2)Register:
You are allowed to register through here. You are required to input a name, email, and password, as well as confirmations for both the email and password.
If the credentials don't match or some fields are missing, error values are displayed as a result.
If an email already in the database is entered, then an error will occur as duplicate emails are not allowed

3)Index:
The index page is the main part of the program. This is where most of the information is displayed to the user in the form of a table.
The chore is given, with a status, frequency and complete button. 
Chore - The chore is a link to a description page containing the time left and the description of the chore.
Frequency - This is how often the chore should be done.
Status - The status can either be pending or overdue (more on this in the admin section)
Complete - This is the complete button which when clicked removes the task from the list because it is now complete button
Above are navigation links to other pages. One is to the household tasks (admin page) where tasks can be managed by the user, chores can be added, and documentation on how users are carrying out work

4)Admin:
This page is the main section where things can be edited and viewed (hence the name admin).
There is no special access to it as anyone should be able to see how users are doing and shouldn't have to reply on one individual or a few out of everyone to add chores.
The admin page consists of a list of all the users in the household. Each name is a link to a details page consisting of statistics of how the user is doing (more on that in the description section).
It also contains a form in which data can be added. The way the form works is as follows:
First the frequency is chosen, this is how often the task can be done. It has 4 options:
    - One Time --> only one time carried out
    - Every Day --> The chore is carried out every Day
    - Every Fortnight --> The chore is carried out every fortnight
    - Every Week --> The chore is carried out every Week
This is very simple to follow and makes it easier for users to do tasks in a given time frame
Next is the difficulty of the task from 1 - 5. This is an arbitrary value and is based on how daunting of a task the user perceives it to be.
The reasoning is because a task can only be carried out one time, but be extremely difficult and therefore is much more difficult than it seems by frequency.
Therefore to balance out tasks, an arbitrary difficulty value is added.
Using the calendar, a start date can be given, based on this the application will calculate the due date to be based off the frequency after that.
For example a task set on 20th of March 2021 that has a frequency of once a week will be due on the 27th March 2021 at 23:59
Finally the name of the chore and its description are given

5)Description:
The description comes after the index page, this is where the description of the task is shown and time left. 
The time left is calculated using jQuery, and then given back as html. It is a fairly basic design but it gives you the details needed that don't come in the index page.
Above are links to back to other pages.

6)Other files:
All files have comments on them, and the rest of the files have details on how they work in the background to support the application.
The readme section just focuses on the user interface and what the user will view.

7)Extension work:
I have implemented emails for the system, this is the notification feature and is how the user will know when tasks are due. The way it works is that after login, the system updates.
It checks for neglected tasks, as well as tasks that have less than a day left to do. It emails the user, showing the chore, description and due date of the chore to the user.
Emails is also used when a chore is assigned. This way the user is staying up to date with chores they have been assigned, chores they've neglected and chores that are due soon.
It provides more functionality to the user ensuring they are less likely to forget if they don't frequently check the website.

Please note that the database is already compiled correctly for viewing but just incase could be done again if anything appears wrong
This is done using the following commands:
sqlite3 data.db < schema.sql
sqlite3 data.db < data.sql
