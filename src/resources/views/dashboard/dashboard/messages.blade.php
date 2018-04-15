@if(Session::get('success'))
                    <div class="alert alert-success">
                    <strong>Success</strong>:&nbsp;
                    {{ Session::get('success') }}
                    </div>
                @elseif(Session::get('error'))
                    <div class="alert alert-danger">
                    <strong>Error</strong>:&nbsp;
                    {{ Session::get('error') }}
                    </div>
                @endif