@if (count($reserves))

    <table class="table table-hover">
        <tr>
            <th ><h5>Event Day</h5></th>
            <th scope="col"><h5>Reserve_code</h5></th>
            <th scope="col"><h5>Status</h5></th>
        </tr>
        @foreach ($reserves as $reserve)
            <tr>
                <td>
                    <h6>{{ $reserve->event_id }}</h6>
                </td>
                <td>
                    <h6>{{$reserve->reserve_code}}</h6>
                </td>
                <td>
                    @if($reserve->validate == 1)
                        <span class="badge bg-success">Verified</span>
                    @else
                        @if($reserve->event_id>getCarnivalDay())
                        <form action="{{ route('reserve.cancel',$reserve->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit" name="button">Cancel</button>
                        </form>
                        @endif
                        @if($reserve->event_id<getCarnivalDay())
                            <span class="badge bg-warning">Passed</span>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

@else
    <div class="empty-block">No Reservation Yet</div>
@endif
