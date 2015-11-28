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
use Illuminate\Support\Facades\App;

trait MailApi
{
    /**
     * メールの送信
     *
     * @param $email
     */
    public function push(Request $r){
        //$message = view('mails.registrationForClerk', compact($email, $password));
//         $messages = <<<EOT
// {
//   "image": base64_img,
//   "date": datetime
// }
// EOT;
        $photo = Image::orderBy('created_at', 'DESC')->take(1)->get();
        $response = [
          "image" => $photo[0]['path'],
          "date" => $photo[0]['date'] 
        ];

       //  Mail::raw($messages, function($message)
       // {
       //     $message->from('naoto.shibata510@gmail.com');
       //     $message->to('keita.mitsuhashi83@gmail.com');
       // });
       // 
       
       return response()->json($response, 200);
    }

    public function save_s3(Request $r)
    {
        // S3に保存する
        $result = $this->s3->putObject([
                    'Bucket' => 'photoline-images',
                    'Key'  => $r->input('path'),
                    'SourceFile' => storage_path()."/app/".$r->input('path').".jpg",
                    'ACL' => 'public-read',
                    'MetaData' => [
                        'ContentType' => 'images/jpeg',
                    ],
        ]);
        Storage::delete($r->input('path').".jpg");
        print $result['ObjectURL']."\n";
        $datetime = date("Y年m月d日 H時i分");
        Image::create(['path' => $result['ObjectURL'], 'date' => $datetime]);
    }
}