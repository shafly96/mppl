<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">

        <div class="post clearfix">
          <div class='user-block'>
            <a href="#"><h3>{{ $konsultasi->Judul }}</h3></a>
          </div><!-- /.user-block -->
          <p>
            {{ $konsultasi->Deskripsi_Konsultasi }}
          </p>

          <form class='form-horizontal' method="post" action="storeReply/{{ $konsultasi->ID_Konsultasi }}">
            <div class='form-group margin-bottom-none'>
              @foreach($reply as $n)
              <div class='col-sm-9' style="border-top:solid">
                {{ $n->Isi_Balasan}}
              </div>
              @endforeach
              <div class='col-sm-9'>
                <input class="form-control input-sm" placeholder="Response" name="response" required>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class='col-sm-3'>
                <button type="submit" class="btn btn-primary" id="simpan">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</body>
</html>
