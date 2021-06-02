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
            </tr>
            </li>
        @endforeach


@else
    <div class="empty-block">No reverse!!!</div>
@endif
