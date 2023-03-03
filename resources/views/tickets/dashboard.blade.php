<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Dashboard
            </h1>
            <style>
                .ticket-List{
                    width: 70%;
                    display: flex;
                    justify-content: flex-start;
                    align-items: center;
                    margin-top: 10vh;
                    margin-left: 18%;
                }
                .ticket-div{
                    width: 23%;
                    display: flex;
                    justify-content:space-between;
                    margin-left: 6%;
                    background:linear-gradient(50deg,#e1e1e1,rgb(109, 163, 245));
                    border-radius: 2px;
                    padding: 2rem;
                    box-shadow: 3px 3px 4px gray;
                }

                .ticket-div div:last-child span{
                    font-size: 4rem;
                    color: white;
                }
                .ticket-div div:first-child span{
                    color:rgb(78, 78, 78);
                }
                .ticket-div h1{
                    margin-bottom: 5%;
                    margin-top: 2%;
                }
            </style>
        </header>
        <head>

        </head>



        <body>
        <div class="ticket-List">
            <div class="ticket-div">
                <div>
                    <h1>{{$ticket_count}}</h1>
                    <span>All Tickets</span>
                </div>
                <div><span class="las la-ticket-alt"></span></div>
            </div>
            <div class="ticket-div">
                <div>
                    <h1>{{$ticket_count-$ticket_unread_count}}</h1>
                    <span>Answered</span>
                </div>
                <div><span class="las la-check-circle"></span></div>
            </div>
            <div class="ticket-div">
                <div>
                    <h1>{{$ticket_unread_count}}</h1>
                    <span>Not Answered</span>
                </div>
                <div><span class="las la-circle"></span></div>
            </div>
        </div>
        </body>
    </x-card>
</x-layout>
