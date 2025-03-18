<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
    @include('admin.css')
    <style>
      label {
        display: inline-block;
        width: 200px;
      }
      .div_deg {
        padding-top: 30px;
      }
      .div_center {
        text-align: center;
        padding-top: 40px;
      }
      /* Thêm một số style cho form nếu cần */
      .form-group {
        margin-bottom: 15px;
        text-align: left;
      }
      .form-group input,
      .form-group select,
      .form-group textarea {
        width: 50%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }
      .form-group label {
        margin-bottom: 5px;
      }
      
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="div_center">
            <h1 style="font-size: 30px;">Edit Room</h1>

            <form id="create-room-form" action="{{ url('edit_room',$data->id)}}" method="Post" enctype="multipart/form-data">
              @csrf

              <div class="div_deg form-group">
                <label for="room-title">Room Title</label>
                <input type="text" id="room-title" name="title" value="{{$data->room_title}}">
              </div>
      
              <div class="div_deg form-group">
                <label for="room-description">Description</label>
                <textarea id="room-description" name="description" rows="4">{{$data->description}}</textarea>
              </div>

              <div class="div_deg form-group">
                <label for="room-price">Price</label>
                <input type="number" id="room-price" name="price" value="{{$data->price}}">
              </div>

              <div class="div_deg form-group">
                <label for="room-type">Room Type</label>
                <select id="room-type" name="type" required>
                  <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="deluxe">Deluxe</option>
                </select>
              </div>

              <div class="div_deg form-group">
                <label for="room-wifi">Free Wifi</label>
                <select id="room-wifi" name="wifi" required>
                  <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="div_deg form-group">
                <label for="room-image">Current Image</label>
                <img style="margin:auto" width="300" height="250" src="/room/{{$data->image}}">
              </div>

              <div class="div_deg form-group">
                <label for="room-image">Upload Image</label>
                <input type="file" id="room-image" name="image" required>
              </div>

              <div class="div_deg form-group">
                <input class="btn btn-primary" type="submit" value="Update Room">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')

    <!-- Script JS -->
    <script>
      document.getElementById("create-room-form").addEventListener("submit", function(e) {
        // Bạn có thể thực hiện validate hoặc xử lý dữ liệu trước khi submit nếu cần
        const title = document.getElementById("room-title").value;
        const type = document.getElementById("room-type").value;
        const price = document.getElementById("room-price").value;
        console.log("Room Title:", title);
        console.log("Room Type:", type);
        console.log("Room Price:", price);
        // Nếu dùng AJAX, bạn có thể xử lý tại đây. Nếu không, form sẽ tự submit theo action đã khai báo.
      });
    </script>
  </body>
</html>
