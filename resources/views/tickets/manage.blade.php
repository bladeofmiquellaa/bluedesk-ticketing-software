<x-layout>
  <x-card class="p-10">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Tickets
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

                display: inline-block;
                margin-left: 4%;
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
            .justify{
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

        </style>
    </header>
      <head>

      </head>



<body>

        @unless($tickets->isEmpty())
          <table id="myTable">
              <thead>
              <tr>
                  <th></th>
                  <th >
                      <div class="justify">Subject
                          <div id="box">
                              <div id="dec" onclick="sortTableByAlphabet('dec',1)"></div>
                              <div id="inc" onclick="sortTableByAlphabet('inc',1)" ></div>
                          </div>
                      </div>
                  </th>
                  <th>
                      <div class="justify">State
                          <div id="box">
                              <div></div>
                              <div></div>
                          </div>
                      </div>
                  </th>
                  <th >
                      <div class="justify">Created At
                          <div id="box">
                              <div id="dec" onclick="sortTableByDate('dec')"></div>
                              <div id="inc" onclick="sortTableByDate('inc')" ></div>
                          </div>
                      </div>


                  </th>
                  <th >
                      <div class="justify">Updated At
                          <div id="box">
                              <div id="dec" onclick="sortTableByDate('dec')"></div>
                              <div id="inc" onclick="sortTableByDate('inc')" ></div>
                          </div>
                      </div>


                  </th>
                  <th>

                  </th>
              </tr>
              </thead>
              <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td></td>
                <td>{{$ticket['subject']}}</td>
                <td>{{$ticket['state']}}</td>
                <td>
                    {{$ticket['created_at']}}
                </td>
                <td>
                    {{$ticket['updated_at']}}
                </td>
                <td>
                    <a href="/tickets/open/admin/{{$ticket['id']}}">Edit</a>
                    &nbsp;&nbsp;
                    <a href="/tickets/delete/{{$ticket['id']}}">Delete</a>
                </td>
            </tr>

        @endforeach
              </tbody>

          </table>


        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Tickets Found</p>
          </td>
        </tr>
        @endunless
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
                var table, rows, switching, i, year1,month1,day1,year2,month2,day2, shouldSwitch,boxdate1
                    ,boxdate2,date1,date2,time1,time2,date11,date22,
                    h1,m1,s1,h2,m2,s2;
                table = document.getElementById("myTable");
                switching = true;
                while (switching) {
                    switching = false;
                    rows = table.rows;

                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;

                        boxdate1 = rows[i].getElementsByTagName("TD")[3].innerText;
                        boxdate2 = rows[i+1].getElementsByTagName("TD")[3].innerText;

                        date1=boxdate1.split(" ");
                        date2=boxdate2.split(" ");

                        time1=date1[1].split(":");
                        time2=date2[1].split(":");

                        date11=date1[0].split("-");
                        date22=date2[0].split("-");

                        year1=parseInt(date11[0]);
                        month1=parseInt(date11[1]);
                        day1=parseInt(date11[2]);

                        year2=parseInt(date22[0]);
                        month2=parseInt(date22[1]);
                        day2=parseInt(date22[2]);

                        h1=parseInt(time1[0]);
                        m1=parseInt(time1[1]);
                        s1=parseInt(time1[2]);

                        h2=parseInt(time2[0]);
                        m2=parseInt(time2[1]);
                        s2=parseInt(time2[2]);


                        if(type=="inc"){
                            if ((year1> year2) || (year1==year2 && month1>month2)||(year1==year2 && month1==month2 && day1>day2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1>h2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1>m2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1==m2 && s1>s2) ) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                        else{
                            if ((year1< year2) || (year1==year2 && month1<month2)||(year1==year2 && month1==month2 && day1<day2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1<h2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1<m2)
                                || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1==m2 && s1<s2)) {
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
</body>
  </x-card>
</x-layout>
