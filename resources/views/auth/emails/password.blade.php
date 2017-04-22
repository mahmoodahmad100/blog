Click the next link to reset your password:<br/>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" >{{ $link }}</a>
