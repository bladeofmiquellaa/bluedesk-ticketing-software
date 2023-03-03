const body=document.querySelector("body");
const toggle=document.querySelector("#toggle");
toggle.addEventListener("change",()=>{
    body.classList.toggle("dark");
})

let http=new XMLHttpRequest();
let date,Time,h,m,hm,repeat="",date1;
let All_chats="";
let url="http://localhost:8000/api/chats/get/";
let current_url=window.location.href;
current_url=current_url.split("/");

let ticket_id=current_url[6];
url=url+ticket_id;

http.open("GET",url,true);
http.send();

http.onload = function(){
    let chats = JSON.parse(this.responseText);
    for(let chat of chats)
    {
        date=chat.created_at.split("T");
        Time=date[1].split(":");
        h=Time[0];m=Time[1];
        hm=h+":"+m;

        if(repeat!=date[0])
        {
            repeat=date[0];
            date1=new Date().toJSON().split("T");
            if(date[0]==date1[0])
            {
                date[0]="Today";
            }
            All_chats+=`<div id="show-date">`+date[0]+`</div>`;
        }

        if(chat.owner=="support")
        {
            All_chats += `<div id="sent-chats">
            <div id="sent-msg">
                <div id="sent-msg-inbox">
                    <p>${chat.body}
                        <span id="time">`+hm+`</span>
                    </p>
                </div>
              </div>
            </div>`
        }
        else{
            All_chats+=`<div id="received-chats">

            <div id="received-msg">
                <div id="received-msg-inbox">
                    <p>${chat.body}
                        <span id="time">`+hm+`</span>
                    </p>
                </div>
            </div>
        </div>`
        }
    }
    document.getElementById("msg-page").innerHTML=All_chats;

}

function Sendchats(){
    var send =document.getElementById("send-input").value.trim();
    var current=new Date();
    if(send==""){
        alert("Field is empty");
        document.getElementById("send-input").value="";
    }
    else{
        var sent_msg=document.getElementById("msg-page").innerHTML;

        let http=new XMLHttpRequest();
        let url="http://localhost:8000/api/chats/store";
        let owner="support";
        url+='?body='+send+'&ticket_id='+ticket_id+'&owner='+owner;
        http.open("GET",url,true);

        http.send();
        date=new Date().toJSON().split("T");
        Time=date[1].split(":");
        h=Time[0];m=Time[1];
        hm=h+":"+m;

        var result;
        if(date[0]!="Today"){
            result+=`<div id="show-date">Today</div>`
        }
        result=` <div id="sent-chats">
<div id="sent-msg">
    <div id="sent-msg-inbox">
        <p>`+send+`
            <span id="time">`+hm+`</span>
        </p>
    </div>
</div>
</div>`
        result=sent_msg+result;
        document.getElementById("msg-page").innerHTML=result;
        document.getElementById("send-input").value="";

    }
}
