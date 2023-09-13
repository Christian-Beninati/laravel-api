<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function message(Request $request)
    {
        //Retrieving data from the form
        $data = $request->all();

        // Valid fields
        $validator = Validator::make($data, [
            "email" => "required|email",
            "subject" => "required|string",
            "content" => "required|string",
        ], [
            "email.required" => "E-mail is required",
            "email.email" => "The e-mail you entered is not valid",
            "subject.required" => "The email must contain the subject line",
            "content.required" => "The e-mail must contain a content"
        ]);

        // If there is an error, send it back
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        // Preparing the e-mail
        $mail = new ContactMessageMail(
            sender: $data["email"],
            subject: $data["subject"],
            content: $data["content"],
        );

        // Sending the e-mail
        Mail::to(env("MAIL_TO_ADDRESS"))->send($mail);
        return response(null, 204);
    }
}
