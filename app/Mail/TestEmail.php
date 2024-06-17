<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mailer\Envelope;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $content;
    public $files;

    public function __construct($subject,$content,$files)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->files = $files;
    }


    public function build()
    {
//        dd($this->files);
        foreach($this->files['ctn_mail_files'] as $key => $file){

            $filePaths[$key] = 'storage/files/' . $file->getClientOriginalName();
//            $file = $file('file')->store($filePath);
            Storage::putFileAs('public/files/', $file,$file->getClientOriginalName());
        }
//
//        dd($filePaths);

        $mail =  $this->subject($this->subject)->with(['content' => $this->content])
            ->text('carton-order.mail-content');

        // $attachments is an array with file paths of attachments
        foreach ($filePaths as $filePath) {
            $mail->attach($filePath);
        }



        return $mail;

    }

}
