<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Send Message WA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style type="text/css" media="screen">
      html, body {
        height: 100%;
      }
    </style>
  </head>
  <body class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col">
          <div class="card w-50 mx-auto">
            <div class="card-body">
              <form action="{{ route('send-message.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Nomor Telp</label>
                  <input class="form-control" type="text" placeholder="8123xxxx" name="phone">
                </div>
                <div class="form-group">
                  <label>Pesan Anda</label>
                  <textarea name="message" class="form-control">Your appointment is coming up on {1} at {2}</textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-outline-success">
                    submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
