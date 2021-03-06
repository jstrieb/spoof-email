# Simple Email Spoofer

This code is an extremely simple PHP wrapper around the `sendmail` utility
present on some web servers. The ability to manually edit the email headers
when calling this function enables a user to select who it appears their email
comes from. Thus, it is possible to do a very simple form of email "spoofing"
with this tool.

# Installation

- Clone the repository.

  ```.bash
  git clone git@github.com:jstrieb/spoof-email.git && cd spoof-email
  ```

- Upload `generate_hash.php` to your webserver and navigate to the page from a
  browser.
  - If PHP is running correctly, you should see a web form displayed with a
    password input.
- Enter a password in this input and submit.
- Copy the resulting hash that is generated and paste it into the appropriate
  location in `spoof_email.php`.
- Upload `spoof_email.php` to the correct location on your webserver.
- Visit this page, enter the appropriate details (including the correct
  password), and if everything is set up correctly, it will send spoofed
  emails.
