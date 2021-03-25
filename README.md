# laravel-send-markdown-email
How to send markdown emails in laravel


## generate email markdown
```
php artisan make:mail ContactFormMail --markdown=emails.contact.contact-form
```


### generated files with artisan
```
\Mail\ContactFormMail.php
\resources\emails\contact\contact-form.blade.php
```


## post request
 ```php
 use App\Mail\ContactFormMail;
 use Illuminate\Support\Facades\Mail;

 
 public function contact_form_post(Request $request)
    {

        $email = 'writeyouremail@domain.com';
        
        $contact = request()->validate([
            'email' => 'required',
            'msg' => 'required',
        ]);

        Mail::to($email)->send(new ContactFormMail($contact));
    }
```

## ContactFormMail.php
```
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contacto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto)
    {


        $this->contacto = $contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact.contact-form', [
            'contacto' => $this->contacto
        ]);
    }
}
```


## contact-form.blade.php
```php
@component('mail::message')
# Email

site: {{ config('app.name') }}

email: {{ $contact['email'] }}<br>
message: {{ $contact['msg'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
```
