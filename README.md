# rEDUceRideshare
## Websys Team 3:
### Michael Biscotti, Alston Chau, Will Eiref, Daniel Westover, Tony Zheng
Project Installation:
    Using an XAMPP Environment (used for development) the install is as follows: 
    
    1. Start Apache and MySQL Servers
    2. Navigate to the address that the server is serving the site on
       and nagivate to the install.php file
        ex: labs.websys/rEDUceRideshare/install.php
       this step installs the database and all the proper tables
        (with some test data).
    3. Now simply navigate to the index.php of the site
        (should be redirected to the splashpage unless logged in)

Project Features:

    1. User Registration / Login:
        User registration and login is completed securly through PHP,
        Usernames and Passwords are stored in the 'users' table, and 
        passwords are protected by the builting 'password_hash()' function
        in PHP. This function stores the salt inline with the hashed password
        so there is no need for a seperate salt column in the users table.

    [PHP Reference](http://php.net/manual/en/faq.passwords.php#faq.passwords.salt)

    2. Posting as a Rider
        When the form is submitted on rideform.php, insert.php is called and inserts data into the riders table. The
        data is retrieved using POST requests from the forms. The user is then redirected to the offerride result page.
        

    3. Posting as a Driver
        When the form is submitted on offerform.php, insert.php is called and inserts data into the drivers table. The
        data is retrieved using POST requests from the forms. The user is then redirected to the ride result page.

    4. Profiles
        Profile pages are generated via a GET request with a given username
            ex: profile.php?user=bob
        This loads the user's username, "home" location, average review score
        and list of reviews.

        If an invalid username is given, then the user is redirected to the
        home page.


    5. Profile Reviews
        Users viewing profiles other than their own are able to post reviews
        with review text and a star rating. This is then displayed on the profile
        page, and updated the "average review" calculation also displayed on the page.



    
