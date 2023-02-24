<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Discount Codes</title>
  </head>
  <body>
    
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-12">
          @if(Session::has('success'))
            <div class="alert alert-success " role="alert">
            {{Session::get('success')}}
          </div>
          @endif
        </div>
        <div class="col-md-12">
          <form class="row g-3" action="{{route('import_discount_code')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-auto">
              <input type="file" class="form-control" name="excel_file">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Upload an Excel File</button>
            </div>
            @error('excel_file')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </form>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-12">
          <h3>Discount Coupons</h3>
        </div>
        <div class="col-md-12">
          <br><br>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">id #</th>
              <th scope="col">Discount Codes</th>
              <th scope="col">Usage</th>
            </tr>
          </thead>
          <tbody>
            @if(count($discount_codes))
            @foreach($discount_codes as $discount_code)
              <tr>
                <th scope="row">{{$discount_code->id}}</th>
                <td>{{$discount_code->discount_code}}</td>
                <td>
                  @if($discount_code->used == 0)
                    Unused
                  @else
                    Used
                  @endif
                </td>
              </tr>
            @endforeach
            @else
              <tr>
                <td colspan="3">No discount codes were found.</td>
              </tr>
            @endif
          </tbody>
        </table>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>