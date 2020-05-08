<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data){
        $this->data =$data;
    }

    public function build(){
    	return $this->from('sistema.sea2019@gmail.com')
    				->view('mails.plantilla')
    				->text('mails.plantilla_plain');
    }
}
