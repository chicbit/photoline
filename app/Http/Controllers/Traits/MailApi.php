<?php
/**
 * Created by IntelliJ IDEA.
 * User: satomiyako
 * Date: 15/06/21
 * Time: 18:05
 */
namespace App\Http\Controllers\Traits;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\PublishClerkAccountRequest;
use App\Http\Requests\EditShopProfileRequest;
use Mail;
use App\Models\Image;


trait MailApi
{
    /**
     * メールの送信
     *
     * @param $email
     */
    public function send_mail(Request $r, $name="柴田肇"){
        //$message = view('mails.registrationForClerk', compact($email, $password));
        $messages = <<<EOT
        ☆お知らせ☆\n
        $name さんはテレビを見ています。
        安心してください。今日もあなたのおじいちゃんは元気ですよ.
EOT;
        echo $messages;
        Image::create(['path' => $r->input('path')]);
        Mail::raw($messages, function($message)
       {
           $message->from('naoto.shibata510@gmail.com');
           $message->to('keita.mitsuhashi83@gmail.com');
       });
    }
}
