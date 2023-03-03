<x-sclayout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Tickets
            </h1>

            <style>
                table {
                    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    border-spacing: 0;
                    width: 65%;
                    margin: auto;
                    margin-top: 5vh;
                    box-shadow: 3px 3px 4px rgb(71, 71, 71);
                    overflow-y: auto;
                }

                th, td {
                    text-align: left;
                    padding: 14px;
                }

                tbody tr:nth-child(even) {
                    background-color: #f2f2f2
                }

                thead th{
                    background-color: #7092be;
                    color: white;

                }
                thead th:hover{
                    background-color: #537ca8;
                }

                td p{
                    display: inline;
                }
                #box
                {
                    /*position: absolute;*/
                    /*top: 37.1vh;*/
                    display: inline-block;
                    margin-left: 0.6%;
                }
                #dec{
                    width: 0;
                    height: 0;
                    border-left: 5px solid transparent;
                    border-right: 5px solid transparent;
                    border-bottom: 8px solid white;
                    margin-bottom: 4px;
                    cursor: pointer;

                }
                #inc{
                    width: 0;
                    height: 0;
                    border-left: 5px solid transparent;
                    border-right: 5px solid transparent;
                    border-top: 8px solid white;
                    cursor: pointer;
                }
                #dec:active
                {
                    border-bottom: 8px solid rgba(0, 0, 0, 0.555);
                }
                #inc:active
                {
                    border-top: 8px solid rgba(0, 0, 0, 0.555);
                }

            </style>

        </header>


        @unless($tickets->isEmpty())
            <table id="myTable">
                <thead>
                <tr>
                    <th></th>
                    <th >Subject
                        <div id="box">
                            <div id="dec" onclick="sortTableByAlphabet('dec',1)"></div>
                            <div id="inc" onclick="sortTableByAlphabet('inc',1)" ></div>
                        </div>
                    </th>
                    <th >State
                        <div id="box">
                            <div></div>
                            <div></div>
                        </div>
                    </th>
                    <th >Created Date
                        <div id="box">
                            <div id="dec" onclick="sortTableByDate('dec')"></div>
                            <div id="inc" onclick="sortTableByDate('inc')" ></div>
                        </div>
                    </th>
                    <th >
                        <div id="box">
                            <div></div>
                            <div></div>
                        </div>
                    </th>


                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td></td>
                        <td>{{$ticket['subject']}}</td>
                        <td>{{$ticket['state_id']}}</td>
                        <td>
                            {{$ticket['created_at']}}
                        </td>
                        <td>
                            <a href="/tickets/open/customer/{{$ticket['id']}}">Open</a>
                            &nbsp;&nbsp;

                        </td>
                    </tr>


                @endforeach
                </tbody>

            </table>
            <script>
                var table,rows,i;
                table=document.getElementById("myTable");
                rows=table.rows;
                for(i=1;i<rows.length;i++){
                    rows[i].getElementsByTagName("TD")[0].innerHTML=i;
                }

                function sortTableByAlphabet(type,tdNumber) {
                    var table, rows, switching, i, x, y, shouldSwitch;
                    table = document.getElementById("myTable");
                    switching = true;
                    while (switching) {
                        switching = false;
                        rows = table.rows;

                        for (i = 1; i < (rows.length - 1); i++) {
                            shouldSwitch = false;

                            x = rows[i].getElementsByTagName("TD")[tdNumber];
                            y = rows[i + 1].getElementsByTagName("TD")[tdNumber];
                            if(type=="inc"){
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                            else{
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                        }
                    }
                    for(i=1;i<rows.length;i++){
                        rows[i].getElementsByTagName("TD")[0].innerHTML=i;
                    }
                }

                function sortTableBynumber(type,tdNumber) {
                    var table, rows, switching, i, x, y, shouldSwitch;
                    table = document.getElementById("myTable");
                    switching = true;
                    while (switching) {
                        switching = false;
                        rows = table.rows;

                        for (i = 1; i < (rows.length - 1); i++) {
                            shouldSwitch = false;

                            x = parseInt(rows[i].getElementsByTagName("TD")[tdNumber].textContent);
                            y = parseInt(rows[i + 1].getElementsByTagName("TD")[tdNumber].textContent);
                            if(type=="inc"){
                                if (x> y) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                            else{
                                if (x< y) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                        }
                    }
                    for(i=1;i<rows.length;i++){
                        rows[i].getElementsByTagName("TD")[0].innerHTML=i;
                    }
                }

                function sortTableByDate(type) {
                    var table, rows, switching, i, year1,month1,day1,year2,month2,day2, shouldSwitch;
                    table = document.getElementById("myTable");
                    switching = true;
                    while (switching) {
                        switching = false;
                        rows = table.rows;

                        for (i = 1; i < (rows.length - 1); i++) {
                            shouldSwitch = false;

                            year1 = parseInt(rows[i].getElementsByTagName("P")[2].innerHTML);
                            month1 =parseInt(rows[i].getElementsByTagName("P")[0].innerHTML);
                            day1 = parseInt(rows[i].getElementsByTagName("P")[1].innerHTML);

                            year2 = parseInt(rows[i+1].getElementsByTagName("P")[2].innerHTML);
                            month2 = parseInt(rows[i+1].getElementsByTagName("P")[0].innerHTML);
                            day2 = parseInt(rows[i+1].getElementsByTagName("P")[1].innerHTML);

                            if(type=="inc"){
                                if ((year1> year2) || (year1==year2 && month1>month2)||(year1==year2 && month1==month2 && day1>day2)) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                            else{
                                if ((year1< year2) || (year1==year2 && month1<month2)||(year1==year2 && month1==month2 && day1<day2)) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                        }
                    }
                    for(i=1;i<rows.length;i++){
                        rows[i].getElementsByTagName("TD")[0].innerHTML=i;
                    }
                }
            </script>
        @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No Tickets Found</p>
                </td>
            </tr>
        @endunless
        <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <a href="/ticket/create/{{$token_body}}" class="hover:text-laravel"> Create Ticket</a>

            </td>
        </tr>

    </x-card>
</x-sclayout>
