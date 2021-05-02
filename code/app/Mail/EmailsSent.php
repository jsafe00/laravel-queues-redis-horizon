<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class EmailsSent extends Mailable
{
    use Queueable, SerializesModels;

  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  

        return $this->markdown('emails.users.sent')
            ->attach(
                Excel::download(
                    new UsersExport, 'users.xlsx'
                )->getFile(), ['as' => 'report.xlsx']
            );
    }
}
