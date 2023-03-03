<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChats($ticket_id){
        if(Ticket::where('id', $ticket_id)->exists()) {

            return response(json_encode(Chat::select('*')->where('ticket_id',$ticket_id)->get()),200);
          }else{
            return response("wrong ticket id",405);
        }
        }
        public function store(Request $request){

//            $chat['body']=$chatjson['body'];
//            $chat['ticket_id']=$chatjson['ticket_id'];
//            $chat['owner']=$chatjson['owner'];
            if($request['owner']=='customer'){

                Ticket::where('id',$request['ticket_id'])->update(['state'=>'Support Attention']);
            }else{
                Ticket::where('id',$request['ticket_id'])->update(['state'=>'Customer Attention']);
            }
            $formFields = $request->validate([
                'body' => 'required',
                'ticket_id' => 'required',
                'owner'=>'required'
            ]);
            $chat = Chat::create($formFields);
             return response("save Successfully");
        }
}
