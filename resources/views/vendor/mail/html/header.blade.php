@props(['url'])
<!-- <tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
            <img src="https://trademarkusp.com/imagees/logo-new-BIG.png" class="logo" alt="Trademark USP">
            @else
            {!! $slot !!}
            @endif
        </a>
    </td>
</tr> -->

<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            <img src="https://trademarkusp.com/imagees/logo-new-BIG.png" class="logo" alt="Trademark USP">
        </a>
    </td>
</tr>