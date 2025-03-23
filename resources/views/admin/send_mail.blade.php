<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
    @include('admin.css')

    <style type="text/css">
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






            <center>




                <h1 style="font-size: 30px; font-weight: bold;">Mail send to {{$data->name}}</h1>

                <form action="{{url('mail', $data->id)}}" method="Post" >
              @csrf

              <div class="div_deg form-group">
                <label for="room-title">Greeting</label>
                <input type="text" id="room-title" name="greeting" >
              </div>
      
              <div class="div_deg form-group">
                <label for="room-description">Mail body</label>
                <textarea id="room-description" name="body" placeholder="" rows="4"></textarea>
              </div>

              <div class="div_deg form-group">
                <label for="room-price">Action text</label>
                <input type="text" id="room-price" name="action_text" >
              </div>

              
              <div class="div_deg form-group">
                <label for="room-price">Action Url</label>
                <input type="text" id="room-price" name="action_url" >
              </div>

              
              <div class="div_deg form-group">
                <label for="room-price">End Line</label>
                <input type="text" id="room-price" name="endline" >
              </div>

              


              <div class="div_deg form-group">
                <input class="btn btn-primary" type="submit" value="Send Mail">
              </div>
            </form>



            </center>








            </div>
        </div>
    </div>







    @include('admin.footer')
  </body>
</html>