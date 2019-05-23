@extends('layouts.app')
@section('title', __("Dashboard"))
@section('content')
<div class="container-fluid p-5">
   <h2>Adminpanel to manage companies</h2>
   <p>Basically, project to manage companies and their employees. Mini-CRM.</p>
   <ul>
      <li>Basic Laravel Auth: ability to log in as administrator</li>
      <li>Use database seeds to create first user with email admin@admin.com and password &ldquo;password&rdquo;</li>
      <li>CRUD functionality (Create / Read / Update / Delete) for two menu items:&nbsp;<strong>Companies</strong>&nbsp;and&nbsp;<strong>Employees</strong>.</li>
      <li>Companies DB table consists of these fields: Name (required), email, logo (minimum 100&times;100), website</li>
      <li>Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone</li>
      <li>Use database migrations to create those schemas above</li>
      <li>Store companies logos in&nbsp;<strong>storage/app/public</strong>&nbsp;folder and make them accessible from public</li>
      <li>Use basic Laravel resource controllers with default methods &ndash; index, create, store etc.</li>
      <li>Use Laravel&rsquo;s validation function, using Request classes</li>
      <li>Use Laravel&rsquo;s pagination for showing Companies/Employees list, 10 entries per page</li>
      <li>Use Laravel&nbsp;<strong>make:auth</strong>&nbsp;as default Bootstrap-based design theme, but remove ability to register</li>
   </ul>
   <p><img class="alignnone size-large wp-image-1975 td-animation-stack-type0-2" src="https://laraveldaily.com/wp-content/uploads/2018/02/company-crud-1024x505.png" alt="company-crud" width="740" height="365" /></p>
   <p>Basically, that&rsquo;s it. With this simple exercise junior developer shows the skills in basic Laravel things:</p>
   <ul>
      <li>MVC</li>
      <li>Auth</li>
      <li>CRUD and Resource Controllers</li>
      <li>Eloquent and Relationships</li>
      <li>Database migrations and seeds</li>
      <li>Form Validation and Requests</li>
      <li>File management</li>
      <li>Basic Bootstrap front-end</li>
      <li>Pagination</li>
   </ul>
   <p>Guess what &ndash; most of the basics web-applications will have these functions as core. There will be a lot more on top of that, but without these fundamentals you cannot move further.</p>
   <p>So this task would actually test if the person can create simple projects. And then it&rsquo;s practice, practice, practice on more projects, each of them individual and adding more to their knowledge base.</p>
   <p>From my own experience, different developers are &ldquo;creative&rdquo; in different code places &ndash; some don&rsquo;t use Resource controllers and put Route::get everywhere, some don&rsquo;t validate forms, some don&rsquo;t test their code properly etc. That&rsquo;s exactly the things you want to spot as early as possible.</p>
   <hr />
   <h2>Extra Task for &ldquo;Advanced&rdquo; Juniors</h2>
   <p>If you feel like this task is too small and simple, you can add these things on top:</p>
   <ul>
      <li>Use Datatables.net library to show table &ndash; with our without server-side rendering</li>
      <li>Use more complicated front-end theme like AdminLTE</li>
      <li>Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)</li>
      <li>Make the project multi-language (using&nbsp;<strong>resources/lang</strong>&nbsp;folder)</li>
      <li>Basic testing with phpunit (I know some would argue it should be the basics, but I disagree)</li>
   </ul>
   <p>Do you agree with such task? What would you change or add to this?<br />And have you had any experience with giving similar tasks, what were your impressions?</p>
</div>
@endsection
