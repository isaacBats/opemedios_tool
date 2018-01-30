@component('mail::message')
<body style="margin: 0;padding: 0;font-size: 100%;height: 100%;background:#f8f8f8;width: 100% !important;">
    <table style="margin: 0;padding: 0;height: 100%;background: #f8f8f8;width: 100% !important;">
        <tr style="margin: 0;padding: 0;">
            <td style="margin: 0 auto !important;padding: 0;font-size: 100%;display: block !important;clear: both !important;max-width: 580px !important;">
                <table style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                    <tr>
                        <td align="center" class="masthead" style="margin: 0;padding: 0 0;"> <img src="{{asset('images/agrobio.jpg')}}" style="max-width: 100%;display: block;"> </td>
                    </tr>
                    <tr>
                        <td style="background-color: #015199;">
                            <p style="margin: 0;padding: 15px 30px;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #fff;text-align: right;">{{ ucwords($today) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 30px;background: white;"></td>
                    </tr>
                    @foreach ($newsSorted as $key => $element)
                        <tr>
                            <td style="padding: 10px 30px;background: white;">
                                <h2 style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.25;margin-bottom: 5px;font-weight: bold;">
                                    {{ $key }}
                                </h2>
                        @if (is_array($element))
                            @foreach ($element as $val)
                                <h3 style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.25;margin-bottom: 5px;font-weight: bold;color: #015199;">
                                    <a href="{{ $val->link }}" style="color: #015199;text-decoration:none">
                                        {{ $val->title }}
                                    </a>
                                </h3>
                                <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                                    {!! $val->content !!}<span style="color: #015199;font-weight: bold;"></span>
                                </p>
                            @endforeach
                                <hr style="margin:0 !important;border: none;border-bottom: dotted 1px #ccc;">
                            </td>
                        </tr>    
                        @else
                            <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                                {{ $element }}
                            </p>
                            <hr style="margin:0 !important;border: none;border-bottom: dotted 1px #ccc;">
                        @endif
                        <!-- N1 -->
                    @endforeach
                </table>
            </td>
        </tr>
        <tr style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;">
            <td class="container" style="margin: 0 auto !important;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 580px !important;">
                <table style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;">
                        <td class="content footer" align="center" style="margin: 0;padding: 20px 30px;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;background: none;">
                            <p style="margin: 0;padding: 0;font-size: 11px;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #015199;text-align: center;">
                                @if ($primerasP)
                                    <a href="{{ $linkPrimeras }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;">PRIMERAS PLANAS </a> |
                                @endif
                                @if ($portadas)
                                    <a href="{{ $linkPortadas }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> PORTADAS NEGOCIOS</a> |
                                @endif
                                @if ($cartones)
                                    <a href="{{ $linkCartones }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> CARTONES</a> |
                                @endif
                                @if ($columnasF)
                                    <a href="{{ $linkColumnasF }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> COLUMNAS NEGOCIOS</a> |
                                @endif
                                @if ($columnasP)
                                    <a href="{{ $linkColumnas }}" style="margin: 0;padding: 0;font-size: 100%;font-family: Arial, Helvetica, sans-serif;line-height: 1.65;color: #015199;text-decoration: none;"> COLUMNAS POLÍTICAS</a>
                                @endif
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
@endcomponent
