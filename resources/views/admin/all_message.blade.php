<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
     
     .table_deg {
          border-collapse: separate;
          border-spacing: 0;
          border-radius: 10px;
          overflow: hidden;
          background-color: whitesmoke;
          width: 70%;
          margin: 40px auto;
          text-align: center;
          border: 3px solid white;
      }

      .table_deg th {
          background-color: white;
          padding: 15px;
          color: red;
      }

      .table_deg td {
          padding: 12px;
      }

      .table_deg tr.list_room td {
          border-bottom: 1px solid gray;
      }

      .table_deg tr:last-child td {
          border-bottom: none;
      }

      .list_room img {
        display: flex;
        flex-basis: auto;
      }

    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')





    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">




            <table class="table_deg">
                <tr style="background-color: white;">
                    <th class="th_deg" >Name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Phone Number</th>
                    <th class="th_deg">Message</th>
                    <th class="th_deg">Send Email</th>
                    
                </tr>


                @foreach($data as $data)
                
                <tr class="list_room">
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->message}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('send_mail', $data->id)}}">Send mail</a>
                    </td>
                    
                </tr>

                @endforeach
              
            </table>





            </div>
        </div>
    </div>





    @include('admin.footer')
  </body>
</html>