@if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success</strong>:&nbsp;
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error</strong>:&nbsp;
                    {{ Session::get('error') }}
                    </div>
                @endif