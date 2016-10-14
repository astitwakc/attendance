<div class="row">
    <div class="col-lg-12">
        @if(Session::has('status'))
            <ul class="alert alert-info">
                <p>{{Session::get('status')}}</p>
            </ul>
        @endif
    </div>
</div>
