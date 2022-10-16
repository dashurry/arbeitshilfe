<?php

use App\Conversation;
use App\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('User-channel.{id}', function (User $user, Int $id) {
    return auth()->check();
});

Broadcast::channel('Message-notification.{id}', function (User $user, Int $id) {
    return auth()->check();
});

Broadcast::channel("Conversation.{id}",function($user, $id){
    return [
        "id" => $user->id,
        "name" => $user->first_name
    ];
});
/*

|--------------------------------------------------------------------------

| Broadcast Channels

|--------------------------------------------------------------------------

|

| Here you may register all of the event broadcasting channels that your

| application supports. The given channel authorization callbacks are

| used to check if an authenticated user can listen to the channel.

|

*/



// Broadcast::channel(

//     'survey.{survey_id}',

//     function ($user, $survey_id) {

//         return [

//             'id' => $user->id,

//             'image' => $user->image(),

//             'full_name' => $user->full_name

//         ];

//     }

// );

