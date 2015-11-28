<?php
/**
 * Created by IntelliJ IDEA.
 * User: shibatanaoto
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
use Storage;

trait MailApi
{
    /**
     * メールの送信
     *
     * @param $email
     */
    public function send_mail(Request $r){
        //$message = view('mails.registrationForClerk', compact($email, $password));
        $path = storage_path()."/app/".$r->input('path');
        $datetime = date("Y年m月d日 H時i分");
        $base64_img = base64_encode(Storage::get($r->input('path')));
        $messages = <<<EOT
{
  "image": $base64_img,
  "date": $datetime
}
EOT;
        echo $messages;
        Storage::delete($r->input('path'));
        Image::create(['token' => $base64_img, 'date' => $datetime]);
        Mail::raw($messages, function($message)
       {
           $message->from('naoto.shibata510@gmail.com');
           $message->to('keita.mitsuhashi83@gmail.com');
       });
    }
}