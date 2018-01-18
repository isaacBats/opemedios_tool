@component('mail::message')
    <div class="container-fluid">
        <div class="row" style="height: 100px;">
            <img src="{{asset('images/logo-agrobio-mexico.jpeg')}}" style="height: 80px; padding: 10px;">
            <span style=" margin: 0px 40px 0 50px; color: black; font-size: 20px;">Newsletter</span>
            <span style="margin-left: 35px" >{{ ucwords($today) }}</span>
        </div>
        <div class="row">
            @foreach ($newsSorted as $key => $element)
                <h3 class="new-title" >{{ $key }}</h3>
                @if (is_array($element))
                    @foreach ($element as $val)
                        <p>
                            <a href="{{ $val->link }}">{{ $val->title }}</a>
                        </p>
                        <p>
                            {{ $val->content }}
                        </p>
                    @endforeach
                @else
                    <p>{{ $element }}</p>
                @endif
            @endforeach
        </div>
    </div>
@endcomponent
