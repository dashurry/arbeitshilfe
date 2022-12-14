<?php

/**

 * Class MessageController.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @version <PHP: 1.0.0>

 * @link    https://maurofrappietro.com/

 */



namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

use App\Message;

use DB;

use App\User;

use App\Helper;

use Auth;

use Carbon\Carbon;

use App\SiteManagement;



/**

 * Class MessageController

 *

 */

class MessageController extends Controller

{

    protected $message;



    /**

     * Create a new controller instance.

     *

     * @param mixed $message make instance

     *

     * @return void

     */

    public function __construct(Message $message)

    {

        $this->message = $message;

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(){
        // Check if the user is authenticated
        if (Auth::user()) {
            // Get the authenticated user
            $user = Auth::user();
            // Get the last conversation the user had, if any
            $lastConversation = Conversation::where("employer_id", $user->id)->orWhere("freelancer_id", $user->id)
                ->orderBy("created_at", "desc")->first();
            // If the user has a conversation, redirect to the conversation page
            if(!empty($lastConversation)) {
                return redirect("/message-center/thread/$lastConversation->id");
            } 
            // If the user does not have a conversation
            else {
                // Check if the extended chat room view file exists
                if (file_exists(resource_path('views/extend/back-end/chat-room/index.blade.php'))) {
                    // If the extended view file exists, use it
                    return View('extend.back-end.chat-room.index');
                } 
                // If the extended view file does not exist, use the default view file
                else {
                    return View('back-end.chat-room.index');
                }    
            }
        } 
        else {
            abort(404);
        }
    }

    public function openChat()

    {

        if (Auth::user()) {

            if (file_exists(resource_path('views/extend/back-end/chat-room/index.blade.php'))) {

                return View('extend.back-end.chat-room.index');

            } else {

                return View('back-end.chat-room.index');

            }

        } else {

            abort(404);

        }

    }



    /**

     * Get Users.

     *

     * @return \Illuminate\Http\Response

     */

    public function getUsers()

    {

        $unreadNotifyClass  = '';

        $user_id = auth()->user()->id;

        $users = DB::select(

            DB::raw(

                "SELECT * FROM messages

                    WHERE id IN (

                        SELECT MAX(id) AS id

                FROM (

                    SELECT id, user_id AS chat_sender

                    FROM messages

                    WHERE receiver_id = $user_id OR user_id = $user_id

                UNION ALL

                    SELECT id, receiver_id AS chat_sender

                    FROM messages

                    WHERE user_id = $user_id OR receiver_id = $user_id )

                    t GROUP BY chat_sender ) ORDER BY id DESC"

            )

        );

        $json = array();

        if (!empty($users)) {

            foreach ($users as $key => $userVal) {

                $chat_user_id   = '';

                if ($user_id === intval($userVal->user_id)) {

                    $chat_user_id = intval($userVal->receiver_id);

                } else {

                    $chat_user_id = intval($userVal->user_id);

                }

                if (!empty($chat_user_id)) {

                    $json[$key]['id'] = $chat_user_id;

                    $json[$key]['image'] = Helper::getProfileImage($chat_user_id);

                    $json[$key]['name'] = Helper::getUserName($chat_user_id);

                    $json[$key]['tagline'] = !empty(User::find($chat_user_id)) ? User::find($chat_user_id)->profile->tagline : '';

                    $json[$key]['image_name'] = !empty(User::find($chat_user_id)) ? User::find($chat_user_id)->profile->avater :'';

                }

            }

            $message_status = $this->message::where('receiver_id', $user_id)->where('status', 0)->count();

            if ($message_status > 0) {

                $unreadNotifyClass = 'wt-dotnotification';

            }

            $json[$key]['status_class'] = $unreadNotifyClass;

            return response()->json($json);

        } else {

            $json['type'] = 'error';

            $json['message'] = trans('lang.user_not_found');

            return $json;

        }

    }



    /**

     * Get user messages.

     *

     * @param mixed $request $req->attr

     *

     * @return \Illuminate\Http\Response

     */

    public function getUserMessages(Request $request)

    {

        $json = array();

        if (!empty($request['sender_id'])) {

            $user_id = auth()->user()->id;

            $receiver_id = $request['sender_id'];

            $selected_user = User::find($receiver_id);

            DB::table('messages')

                ->where('user_id', $receiver_id)

                ->where('receiver_id', $user_id)

                ->update(['status' => 1]);

            $messages = DB::table('messages')->select('*')

                ->where(

                    function ($query) use ($user_id, $receiver_id) {

                        $query->where('user_id', '=', $user_id)

                            ->Where('receiver_id', '=', $receiver_id);

                    }

                )

                ->orWhere(

                    function ($query) use ($user_id, $receiver_id) {

                        $query->where('receiver_id', '=', $user_id)

                            ->Where('user_id', '=', $receiver_id);

                    }

                )

                ->get()->toArray();

            foreach ($messages as $key => $message) {

                $message_read = '';

                if ($message->status == 1 && $message->user_id == $user_id) {

                    $message_read = 'wt-readmessage';

                }

                $json['messages'][$key]['is_sender'] = 'no';

                if ($message->user_id == $user_id) {

                    $json['messages'][$key]['is_sender'] = 'yes';

                }

                $json['messages'][$key]['id'] = $message->id;

                $json['messages'][$key]['user_id'] = $message->user_id;

                $json['messages'][$key]['image'] = url(Helper::getProfileImage($message->user_id, 'medium-small-'));

                $json['messages'][$key]['message'] = $message->body;

                $json['messages'][$key]['date'] =  $message->created_at;

                $json['messages'][$key]['read_status'] = $message_read;

            }

            $json['selected']['selected_user_name'] = Helper::getUserName($receiver_id);

            $json['selected']['selected_user_slug'] = $selected_user->slug;

            $json['selected']['selected_user_tagline'] = $selected_user->profile->tagline;

            $json['selected']['selected_user_image'] = url(Helper::getProfileImage($receiver_id));

            $json['selected']['selected_user_verified'] = $selected_user->user_verified;

            return response()->json($json);

        }

    }





    /**

     * Store messages.

     *

     * @param mixed $request $req->attr

     *

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $messsage = $this->message->sendMessage($request);

        return response()->json($messsage);

    }

}

