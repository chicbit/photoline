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
use Services_Twilio;


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

    public function twilio(){
        $sid = "AC54a487131df6f837fec3dba98a055403"; // Account Sid
        $token = "6f427c0e883e171102db394c68771e04"; // Auth Token
        $tel_to = "+81 90-4797-2416";   // 発信先電話番号
        $tel_from = "+81 90-6089-8859"; // 発信元電話番号
        $twiml = "https://s3-ap-northeast-1.amazonaws.com/photoline-images/voice.xml"; // TwiML URL

        $client = new Services_Twilio($sid, $token);
        $call = $client->account->calls->create($tel_from, $tel_to, $twiml);
        if ($call) {
           return response()->json(["status" => True], 200);
        }
        return response()->json(["status" => False], 200);
    }
}