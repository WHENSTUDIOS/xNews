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
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                    </div>
                @endif
            <div style="display:none" id="success" class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success</strong>:&nbsp;
                <span id="successMsg"></span>
            </div>