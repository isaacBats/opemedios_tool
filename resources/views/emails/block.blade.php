@component('mail::message')
    <div class="container-fluid">
        <div class="row" style="height: 100px; background-color: #00ced1; border-bottom: solid 10px #b2b2bb;">
            <img src="{{asset('images/logo-agrobio-mexico.jpeg')}}" style="height: 80px; padding: 10px;">
            <span style=" margin: 0px 40px 0 35%; color: #5f9ea0; font-size: 35px;">Newsletter</span>
        </div>
        <span style="margin-left: 60%" >{{ ucwords($today) }}</span>
        <div class="row">
            @foreach ($newsSorted as $key => $element)
                <h3 class="new-title" style="color: #AAA; font-size: 24px;">{{ $key }}</h3>
                @if (is_array($element))
                    @foreach ($element as $val)
                        <p>
                            <a style="font-size: 20px; text-decoration: none;" href="{{ $val->link }}">{{ $val->title }}</a>
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
        <div class="row" style="background-color: #00ced1; color: #5f9ea0; font-size: 23px;">
            <div style="width: 50%;" >
                @if ($primerasP)
                    <a style="text-decoration: none; color: #838588" href="{{ $linkPrimeras }}">Primeras Planas</a><br>
                @endif
                @if ($portadas)
                    <a style="text-decoration: none; color: #838588" href="{{ $linkPortadas }}">Portadas Financieras</a><br>
                @endif
                @if ($columnasP)
                    <a style="text-decoration: none; color: #838588" href="{{ $linkColumnas }}">Columnas Políticas</a><br>
                @endif
            </div>
            <div style="width: 50%; margin: -62px 50% 0px 50%;">
                @if ($columnasF)
                    <a style="text-decoration: none; color: #838588" href="{{ $linkColumnasF }}">Columnas Financieras</a><br>
                @endif
                @if ($cartones)
                    <a style="text-decoration: none; color: #838588" href="{{ $linkCartones }}">Cartones</a>
                @endif
            </div>
        </div>
    </div>
@endcomponent
