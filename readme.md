# Program: Basic web Login and Signup (using pure PHP)
Program description: This program just using for self-teaching myself about to PHP. I have a long time to do not learn PHP, this time and this web I just create for learning PHP again <br />
Date Created: 12/07/2023 - 10:30 (AM GMT +7) <br />
Date Finished: 12/07/2023 - 15:54 (PM GMT +7)  <br />

# Index content
* [General info](#general-info)
* [Technologies](#technologies)
* [Feature](#feature)
* [Explain](#explain)

# General info
- This web will be based on user management
- User need to create a new account and login
- After login successfully, user can see your information as Username/day created/...
- Because this is just demo, so I don't create more feature

# Technologies
- This web using MySQL as main database for storing data
- Main programming language: PHP (alot of Javascript for check in client side)

# Explain
### Program Flow
- Open this web, it will automaticaly route to index.php file
- When click Login Button, it will check in side for valid data and next, recall myself with PHP logic for checking in Server side, if has exists account, return true and move to home.php
- When click Signup, it will move to signup.php file. In this file will let to user can create a new account, after that, click Signup button in this file, it will check in client side for validating value then it will recall itself to check with logic of server side, if true, the account will be created and move user go back to index to login again.
- In Home page, just show up user information
