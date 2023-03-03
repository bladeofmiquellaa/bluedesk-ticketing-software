<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Ticket;
use App\Models\Token;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    public function show(Ticket $tickets) {
       $user_access_key= auth()->user()->user_access_key;
        return view('tickets.manage', [
            'tickets' => $tickets->where('user_access_key',$user_access_key)->get()
        ]);
    }
    public function second_dash($token_body) {
        session()->put('ticket_token_body', $token_body);
        $token=DB::table('tokens')
            ->where('token_body', $token_body)
            ->get();

        $tickets=Ticket::select('*')->where('token_id',$token[0]->id)->get();

        return view('tickets.scdash', [
            'tickets' => $tickets,
            'token_body'=>$token_body
        ]);
    }
    public function delete($ticket_id){
       Ticket::where('id', $ticket_id)->delete();
        return redirect('/tickets/manage')->with('message', 'The listing was deleted');

    }
    public function showSupportChatbox($ticket_id){
        $ticket=Ticket::where('id', $ticket_id)->first();
        return view('chats.support-chatbox.support',[
            'email'=>$ticket->email
            ]);
    }
    public function showCustomerChatbox($ticket_id){

        return view('chats.chatbox');
    }
    public function create($token_body){


        return view('tickets.create',[
            'token_body'=>$token_body
            ]);

    }
    public function store(Request $request,$token_body){
        $ticket['subject']=$request['subject'];
        $ticket['state']="unread";
        $ticket['email']=$request['email'];
        $token=Token::where('token_body', $token_body)->first();

        $ticket['token_id']=$token['id'];
        $ticket['user_access_key']=$token['user_access_key'];
        $ticket_id=Ticket::create($ticket)->id;
        $chat['body']=$request['description'];
        $chat['ticket_id']=$ticket_id;
        $chat['owner']="customer";
        Chat::create($chat);
       return redirect("tickets/open/customer/$ticket_id");


    }

}
