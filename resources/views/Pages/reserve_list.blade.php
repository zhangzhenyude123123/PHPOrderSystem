@if (count($reserves))


        @foreach ($reserves as $reserve)
            <li >

            <tr>
                <td>
                    {{$reserve->user_id}}
                </td>
                <td>
                    {{$reserve->reserve_code}}
                </td>
                <td>
                    {{ $reserve->event_id }}
                </td>
                <td>
                    {{ $reserve->current_day }}
                </td>
                <td>
                    @if($reserve->validate == 1)
                        <p color="red">Validated</p>
                    @elseif($reserve->event_id>$reserve->current_day)
                        <button >Cancel</button>
                    @elseif($reserve->event_id<$reserve->current_day)
                        <p>Expire</p>
                    @endif
                </td>
            </tr>
            </li>
        @endforeach


@else
    <div class="empty-block">No reverse!!!</div>
@endif
