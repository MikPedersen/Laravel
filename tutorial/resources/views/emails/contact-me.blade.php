@component('mail::message')
    # A heading

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce et justo tincidunt, pretium massa id, malesuada diam. Donec sed tortor et leo tempus gravida. Fusce rutrum sagittis risus, eu pulvinar tellus euismod sit amet. Nunc congue massa ut consequat convallis.

    - A list
    - goes
    - here

    @component('mail::button', ['url' => 'https://laracasts.com'])
        Visit Laracasts
    @endcomponent

@endcomponent
