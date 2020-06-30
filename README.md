# Outbound-PHP-Email-API
Send an outbound email using PHP, via an API or simply just send out through a form using `index.html`

# Main features

- Simple to edit
- Entries are validated
- All emails sent will be logged

# How to?

- Set the `all_emails.txt` file permissions to `755` to allow emails to be logged.
- To use the API, simply upload all files your web server, and visit the file on your browser

```
api.php?to=XXXXX@gmail.com&from=XXXXX@gmail.com&subject=Subject&message=Message
```

All fields will be validated through PHP, and the emails will be validated to ensure the emails entered are correct.
The subject and messages are urlencoded.

# Variables included in API
- `$to` - The destination of the email
- `$from` - Send originator of the email
- `$subject` - The subject of the email
- `$message` - The emails contents (message)

# Other variable
- `$allEmails` - This can be found in api.php, which controls the file location of the logs

# Having issues?

A guide on how to simply setup php.ini on a localhost machine with XAMPP can be found here:
```
https://stackoverflow.com/a/18185233
```
