## Installation

1. After cloning repository rename *.env.example* to *.env* and setup variables.

2. Open cmd and run:

> composer install

On first run system will configure automatically. No need to run artisan commands. By default system will seed one account (admin@admin.com : password)

## Adminpanel to manage companies

Basically, project to manage companies and their employees. Mini-CRM.

*   Basic Laravel Auth: ability to log in as administrator
*   Use database seeds to create first user with email admin@admin.com and password “password”
*   CRUD functionality (Create / Read / Update / Delete) for two menu items: **Companies** and **Employees**.
*   Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
*   Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
*   Use database migrations to create those schemas above
*   Store companies logos in **storage/app/public** folder and make them accessible from public
*   Use basic Laravel resource controllers with default methods – index, create, store etc.
*   Use Laravel’s validation function, using Request classes
*   Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
*   Use Laravel **make:auth** as default Bootstrap-based design theme, but remove ability to register

![company-crud](https://laraveldaily.com/wp-content/uploads/2018/02/company-crud-1024x505.png)

Basically, that’s it. With this simple exercise junior developer shows the skills in basic Laravel things:

*   MVC
*   Auth
*   CRUD and Resource Controllers
*   Eloquent and Relationships
*   Database migrations and seeds
*   Form Validation and Requests
*   File management
*   Basic Bootstrap front-end
*   Pagination

Guess what – most of the basics web-applications will have these functions as core. There will be a lot more on top of that, but without these fundamentals you cannot move further.

So this task would actually test if the person can create simple projects. And then it’s practice, practice, practice on more projects, each of them individual and adding more to their knowledge base.

From my own experience, different developers are “creative” in different code places – some don’t use Resource controllers and put Route::get everywhere, some don’t validate forms, some don’t test their code properly etc. That’s exactly the things you want to spot as early as possible.

* * *

## Extra Task for “Advanced” Juniors

If you feel like this task is too small and simple, you can add these things on top:

*   Use Datatables.net library to show table – with our without server-side rendering
*   Use more complicated front-end theme like AdminLTE
*   Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)
*   Make the project multi-language (using **resources/lang** folder)
*   Basic testing with phpunit (I know some would argue it should be the basics, but I disagree)
