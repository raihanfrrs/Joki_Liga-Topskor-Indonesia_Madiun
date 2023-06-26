<ul class="contacts">
    @if (count($mails) == 0)
    <div class="alert alert-warning solid alert-rounded m-3">
        <b>No Document Here!</b>
    </div> 
    @endif

    @foreach ($mails as $mail)
    <li>
        <div class="d-flex bd-highlight">
            <div class="user_info">
                <span>{{ $mail->name }}</span>
                <p>{{ $mail->created_at->diffForHumans() }}</p>
            </div>
            <div class="ms-auto">
                <a href="/mail-data/{{ $mail->id }}/download" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-download"></i></a>
            </div>
        </div>
    </li>
    @endforeach
</ul>