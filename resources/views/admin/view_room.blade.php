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
                    <th class="th_deg" >Room Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Wifi</th>
                    <th class="th_deg">Room Type</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Update</th>
                </tr>

                @foreach($data as $data)
                <tr class="list_room">
                    <td>{{$data -> room_title}}</td>
                    <td>{!! Str::limit($data -> description, 50)!!}</td>
                    <td>{{$data -> price}}</td>
                    <td>{{$data -> wifi}}</td>
                    <td>{{$data -> room_type}}</td>
                    <td><img width="100" src="room/{{$data->image}}" ></td>
                    <td><a onclick="return confirm('Bạn có chắc muốn xóa không?');" class="btn btn-danger" href="{{url('room_delete', $data->id)}}">Delete</a></td>
                    <td><a class="btn btn-warning" href="{{url('room_update', $data->id)}}">Edit</a></td>
                </tr>
                @endforeach
            </table>




        
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
