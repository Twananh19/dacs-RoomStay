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
    width: 100%;
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

.list_room td {
  align-items: center;
  text-align: center;
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
                        <th class="th_deg" >Room id</th>
                        <th class="th_deg">Customer name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Arrival Date</th>
                        <th class="th_deg">Leaving Date</th>
                        <th class="th_deg">Status</th>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Image</th>
                        <!-- <th class="th_deg">Delete</th> -->
                        <th class="th_deg">Status Update</th>

                    </tr>

                    @foreach($data as $data)

                    <tr class="list_room">
                        <td>{{$data->room_id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->end_date}}</td>

                        <td>
                          @if($data -> status == 'approved')

                          <span style="color: green;">Approved</span>

                          @endif

                          @if($data -> status == 'rejected')

                          <span style="color: red;">Rejected</span>

                          @endif

                          @if($data -> status == 'waiting')

                          <span style="color: lightsalmon;">Waiting</span>

                          @endif
                        </td>    

                        <td>{{$data->room->room_title}}</td>                        
                        <td>{{$data->room->price}}</td>   

                        <td>
                          <img src="/room/{{$data->room->image}}">
                        </td>  

                        <!-- <td>
                          <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?!')" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}"> Delete </a>
                        </td>   -->

                        <td>
                          <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?!')" class="btn btn-danger" href="{{url('delete_booking', $data->id)}}"> Delete </a>
                          <a style="margin: 10px 0;" class="btn btn-success" href="{{url('approve_book', $data->id)}}">Approve</a>
                          <a class="btn btn-warning" href="{{url('reject_book', $data->id)}}">Rejected</a>
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