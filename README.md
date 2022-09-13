# Hospital Management App

Hospital management app built with Laravel 9. It has regular and admin user and allows both logged in and non logged in users to book an appointment with the doctor. Logged in users can view their appointments and have the privilege to cancel an appointment on their own. Admin can add employee, update or delete an employee record, assign salary to employee, confirm or cancel a user appointment etc ... upon registration, an email notification is automatically sent to the user. Also, the Admin/Doctor can respond to the user's appointment request with a custom message that will be delivered directly to their email.


## Environment Variables

- `API_KEY`

Add below settings in your environment variable to aid the email sending from the web app

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=*****@gmail.com
MAIL_PASSWORD=**your email password**
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="****@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"