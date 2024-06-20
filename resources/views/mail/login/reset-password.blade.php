<x-mail::message>
# Hello

You are receiving this email because we received a password reset request for your account.

<x-mail::button :url="$url">
Reset password
</x-mail::button>

This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.
</x-mail::message>
