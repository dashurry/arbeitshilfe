<?php

namespace App\Http\Controllers;

use App\AllMessages;
use App\Conversation;
use App\Helper;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:employer|freelancer|admin");
    }

    public function getConversation(Request $req)
    {
        $userId = auth()->user()->id;
        $roleId=  Helper::getRoleByUserID($userId);
        $roleName = Helper::getRoleNameByRoleID($roleId);
        $data = array();
        $allConversation = array();
        $totalUnseen = 0;
        $nameColor = new \App\NameThumbColor();

        // 
        if($roleName == "employer")
        {
            $conversations = Conversation::where("employer_id",$userId)->orderBy("updated_at","desc")->get();
        }
        elseif($roleName == "freelancer")
        {
            $conversations = Conversation::where("freelancer_id", $userId)->orderBy("updated_at","desc")->get();
        }
        else
        {
            $conversations = Conversation::where("employer_id", $userId)->orderBy("updated_at", "desc")->get();
        }

        foreach($conversations as $conv)
        {
            $data["id"] = $conv->id;

            
            // Check if the roleName is "employer"
            if ($roleName == "employer") {
                // Create the participant array with several key-value pairs
                $data["participant"] = array(
                // The id of the freelancer
                "id" => $conv->freelancer_id,
                // The name of the freelancer, obtained using the Helper::getUserName() function
                "name" => Helper::getUserName($conv->freelancer_id),
                // The profile image of the freelancer, obtained using the Helper::getProfileImage() function
                "thumb" => Helper::getProfileImage($conv->freelancer_id, "medium"),
                // The initials of the freelancer's first and last name, with the first letter capitalized
                "thumb_alter" => ucfirst(substr(User::find($conv->freelancer_id)->first_name, 0, 1)) . ucfirst(substr(User::find($conv->freelancer_id)->last_name, 0, 1)),
                // The color associated with the first letter of the freelancer's first name, obtained using the $nameColor->getColor() function
                "thumb_color" => $nameColor->getColor(ucfirst(substr(User::find($conv->freelancer_id)->first_name, 0, 1))),
                // Whether the freelancer is currently online or not (assumed to be false in this case)
                "is_online" => false,
                );
            }
  
            // Check if the roleName is "freelancer"
            elseif ($roleName == "freelancer") {
                // Create the participant array with several key-value pairs
                $data["participant"] = array(
                // The id of the employer
                "id" => $conv->employer_id,
                // The name of the employer, obtained using the Helper::getUserName() function
                "name" => Helper::getUserName($conv->employer_id),
                // The profile image of the employer, obtained using the Helper::getProfileImage() function
                "thumb" => Helper::getProfileImage($conv->employer_id, "medium"),
                // The initials of the employer's first and last name, with the first letter capitalized
                "thumb_alter" => ucfirst(substr(User::find($conv->employer_id)->first_name, 0, 1)) . ucfirst(substr(User::find($conv->employer_id)->last_name, 0, 1)),
                // The color associated with the first letter of the employer's first name, obtained using the $nameColor->getColor() function
                "thumb_color" => $nameColor->getColor(ucfirst(substr(User::find($conv->employer_id)->first_name, 0, 1))),
                // Whether the employer is currently online or not (assumed to be false in this case)
                "is_online" => false,
                );
            }
  

            // Get the last message in the conversation by ordering the messages by the ID in descending order and taking the first one
            $last_msg = AllMessages::where("conversation_id", $conv->id)->orderBy("id", "desc")->first();
            // If the last message is not empty
            if(!empty($last_msg)) {
            // Create an array with the data for the last message
            $data["last_msg"] = array(
            "id" => $last_msg->id,
            "conversation_id" => $conv->id,
            "msg" => str_limit($last_msg->msg,40,"..."), // Limit the message to 40 characters and add "..." at the end if it was truncated
            "hasFile" => $last_msg->hasFile,
            "file" => $last_msg->file,
            "sent_by" => $last_msg->sent_by,
            // If the message was sent by the current user, mark it as "seen". Otherwise, use the value of the "seen" field of the message
            "seen" => $last_msg->sent_by==$userId?"seen":$last_msg->seen,
            "created_at" => $last_msg->created_at->format("Y-m-d H:i:s"),
            "updated_at" => $last_msg->updated_at->format("Y-m-d H:i:s"),
            );
            // If the message has not been seen and it was not sent by the current user, increment the total number of unseen messages
            if($last_msg->seen == "unseen" && $last_msg->sent_by != $userId) {$totalUnseen += 1;}
            }
            else
            {
                $totalUnseen += 1;
                $data["last_msg"] = array(
                    "id" => null,
                    "conversation_id" => $conv->id,
                    "msg" => "Great ! Project Chat Initiated.",
                    "hasFile" => 0,
                    "file" => null,
                    "sent_by" => null,
                    "seen" => "unseen",
                    "created_at" => $conv->created_at->format("Y-m-d H:i:s"),
                    "updated_at" => $conv->updated_at->format("Y-m-d H:i:s"),
                );
            }
            

            array_push($allConversation,$data);
        }

        return [
            "data" => $allConversation,
            "unseen" => $totalUnseen,
        ];
    }

    public function detail(Request $req)
    {
        $nameColor = new \App\NameThumbColor();
        if($req->convId != "" && $conv = Conversation::find($req->convId))
        {
            $userId = auth()->user()->id;
            $roleId =  Helper::getRoleByUserID($userId);
            $roleName = Helper::getRoleNameByRoleID($roleId);
            $job = null;

            $data = array();

            if($conv->type == "job")
            {
                $job = Job::find($conv->project_id);
            }

            if ($roleName == "employer") {
                $data["participant"] = array(
                    "id" => $conv->freelancer_id,
                    "user_slug" => User::find($conv->freelancer_id)->slug,
                    "name" => Helper::getUserName($conv->freelancer_id),
                    "thumb" => Helper::getProfileImage($conv->freelancer_id, "medium"),
                    "thumb_alter" => ucfirst(substr(User::find($conv->freelancer_id)->first_name, 0, 1)) . ucfirst(substr(User::find($conv->freelancer_id)->last_name, 0, 1)),
                    "thumb_color" => $nameColor->getColor(ucfirst(substr(User::find($conv->freelancer_id)->first_name, 0, 1))),
                );
            } elseif ($roleName == "freelancer") {
                $data["participant"] = array(
                    "id" => $conv->employer_id,
                    "user_slug" => User::find($conv->employer_id)->slug,
                    "name" => Helper::getUserName($conv->employer_id),
                    "thumb" => Helper::getProfileImage($conv->employer_id), "medium",
                    "thumb_alter" => ucfirst(substr(User::find($conv->employer_id)->first_name, 0, 1)) . ucfirst(substr(User::find($conv->employer_id)->last_name, 0, 1)),
                    "thumb_color" => $nameColor->getColor(ucfirst(substr(User::find($conv->employer_id)->first_name, 0, 1))),
                );
            }
            $data["project"] = array(
                "name" => $job->title,
                "slug" => $job->slug,
                "id" => $job->id,
            );

            $data["conv_status"] = $conv->status;

            return [
                "status" => "ok",
                "data" => $data
            ];
        }
        else
        {
            return [
                "status" => "fail"
            ];
        }
    }


    public function getMessage(Request $req)
    {
        if($req->convId!= "" && $conv = Conversation::find($req->convId))
        {
            if(auth()->user()->id == $conv->freelancer_id || auth()->user()->id == $conv->employer_id)
            {
                $messages = AllMessages::where("conversation_id", $req->convId)->orderBy("id", "desc")->limit(30)->get();
                $msgData = array();
                foreach ($messages as $msg) {
                    if (Carbon::parse($msg->created_at)->isToday()) {
                        $date = "Today - " . $msg->created_at->format("h:i A");
                    } else if (Carbon::parse($msg->created_at)->isYesterday()) {
                        $date = "Yesterday - " . $msg->created_at->format("h:i A");
                    } else {
                        $date = $msg->created_at->format("d M y - h:i A");
                    }
                    array_push($msgData, array(
                        "id" => $msg->id,
                        "conversation_id" => $msg->conversation_id,
                        "msg" => $msg->msg,
                        "hasFile" => $msg->hasFile,
                        "file" => $msg->file,
                        "fileType" => $msg->fileType,
                        "sent_by" => $msg->sent_by,
                        "seen" => $msg->seen,
                        "created_at" => $date,
                        "updated_at" => $msg->updated_at,
                    ));
                }

                return response()->json($msgData);
            }
            else
            {
                return [
                    "status" => "denied"
                ];
            }
        }
        else
        {
            return [
                "status" => "denied"
            ];
        }
    }


    public function seeLastMsg(Request $req)
    {
        if($req->convId && $conv = Conversation::find($req->convId))
        {
            $last_msg = AllMessages::where("conversation_id", $conv->id)->where("sent_by","not like",auth()->user()->id)->orderBy("id", "desc")->first();
            if(!empty($last_msg))
            {
                if ($last_msg->sent_by != auth()->user()->id) {
                    $last_msg->seen = "seen";
                    $last_msg->save();
                    return [
                        "staus" => "ok",
                        "msg" => "seen - $req->convId"
                    ];
                }
            }
        }
    }


    public function send(Request $req)
    {
        $this->validate($req,[
            "convId" => "required|exists:conversations,id",
        ]);
        $userId = Auth::user()->id;
        $conv = Conversation::find($req->convId);
        if($conv->freelancer_id == $userId || $conv->employer_id == $userId)
        {
            $msg = new AllMessages();
            $msg->conversation_id = $req->convId;
            $msg->msg = $req->msgText;
            $msg->sent_by = auth()->user()->id;
            if ($req->userOnline == true) {
                $msg->seen = "seen";
            }
            else
            {
                $msg->seen = "unseen";
            }

            // Check if the request contains a file input named "msgFile"
            if($req->hasFile("msgFile"))
            {
                // Get the uploaded file from the request
                $file = $req->file("msgFile");

                // Generate a new name for the file using the current time and a random number
                $new_name = time()."_".rand().".".$file->getClientOriginalExtension();

                // Move the uploaded file to the "uploads/conversation/$conv->id/" directory with the new name
                $file->move(public_path("uploads/conversation/$conv->id/"),$new_name);

                // Set hasFile and file properties of the $msg object to 1 and the new file name, respectively
                $msg->hasFile = 1;
                $msg->file = $new_name;

                // Get the file type of the uploaded file
                $file_type = $file->getClientOriginalExtension();

                // Set an array of image file extensions
                $image_ext = ["JPG","jpg","jpeg","JPEG","png","PNG","gif","GIF","svg","SVG"];

                // Check if the file type is an image file
                if(in_array($file_type,$image_ext))
                {
                    // Set the fileType property of the $msg object to "image"
                    $msg->fileType = "image";
                }
                else
                {
                    // Set the fileType property of the $msg object to "other"
                    $msg->fileType = "other";
                }
            }
            else
            {
                // If no file was uploaded, set hasFile, file, and fileType properties of the $msg object to 0, null, and null, respectively
                $msg->hasFile = 0;
                $msg->file = null;
                $msg->fileType = null;
            }



            $conv->updated_at = Carbon::now();
            $conv->save();
            $msg->save();


            if (Carbon::parse($msg->created_at)->isToday()) {
                $date = "Today - " . $msg->created_at->format("h:i A");
            } else if (Carbon::parse($msg->created_at)->isYesterday()) {
                $date = "Yesterday - " . $msg->created_at->format("h:i A");
            } else {
                $date = $msg->created_at->format("d F y - h:i A");
            }

            // Broadcast new message
            $msgNotification = array();
            $msgNotification["convid"] = $req->convId;
            $msgNotification["msg"] = array(
                "id" => $msg->id,
                "conversation_id" => $msg->conversation_id,
                "msg" => $msg->msg,
                "hasFile" => $msg->hasFile,
                "file" => $msg->file,
                "fileType" => $msg->fileType,
                "sent_by" => $msg->sent_by,
                "seen" => $msg->seen,
                "created_at" => $date,
                "updated_at" => $msg->updated_at,
            );
            broadcast(new \App\Events\ChatRoom($msgNotification))->toOthers();
            // 

            // Send notification if message coming from another user
            $nameColor = new \App\NameThumbColor();
            $msgNotify = array(
                "id" => $msg->conversation_id,
                "participant" => array(
                    "name" => Helper::getUserName(Auth::user()->id),
                    "thumb" => Helper::getProfileImage(Auth::user()->id, "medium"),
                    "thumb_alter" => ucfirst(substr(Auth::user()->first_name, 0, 1)) . ucfirst(substr(Auth::user()->last_name, 0, 1)),
                    "thumb_color" => $nameColor->getColor(ucfirst(substr(Auth::user()->first_name, 0, 1))),
                ),
                "last_msg" => array(
                    "id" => null,
                    "conversation_id" => $msg->conversation_id,
                    "msg" => str_limit($msg->msg,16,"..."),
                    "hasFile" => $msg->hasFile,
                    "file" => $msg->file,
                    "sent_by" => $msg->sent_by,
                    "seen" => $msg->seen,
                    "created_at" => $msg->created_at->format("Y-m-d H:i:s"),
                    "updated_at" => $msg->updated_at->format("Y-m-d H:i:s"),
                )
            );
            $userMsgNotification["data"] = $msgNotify;
            if($userId == $conv->freelancer_id)
            {
                $userMsgNotification["send_to_user"] = $conv->employer_id;
            }
            elseif($userId == $conv->employer_id)
            {
                $userMsgNotification["send_to_user"] = $conv->freelancer_id;
            }
            $userMsgNotification["type"] = "new_msg";
            broadcast(new \App\Events\MesseageNotification($userMsgNotification));
            //End

            return [
                "status" => "ok",
                "msg" => $msg,
            ];
        }
        else
        {
            return [
                "status" => "fail",
                "msg" => "failed"
            ];
        }
    }
}
