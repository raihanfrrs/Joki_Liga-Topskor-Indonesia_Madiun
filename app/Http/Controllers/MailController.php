<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MailController extends Controller
{
    public function download(Mail $mail)
    {
        $pathToFile = public_path("storage/{$mail->file}");
        $extension = pathinfo($mail->file, PATHINFO_EXTENSION);

        return Response::download($pathToFile, $mail->name.".".$extension);
    }
}
