@component('mail::message')
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <style type="text/css">
            * { margin: 0; padding: 0; font-size: 100%; font-family: Arial, Helvetica, sans-serif; line-height: 1.65; }
            img { max-width: 100%; margin: 0 auto; display: block; }
            body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; }
            a { color: #71bc37; text-decoration: none; }
            a:hover { text-decoration: underline; }
            .text-center { text-align: center; }
            .text-right { text-align: right; }
            .text-left { text-align: left; }
            .button { display: inline-block; color: white; background:  #015199; border: solid #015199; border-width: 10px 20px 8px;  border-radius: 4px; }
            .button:hover { text-decoration: none; }
            h1, h2, h3, h4, h5, h6 { margin-bottom: 5px; line-height: 1.25; font-weight: normal;}
            h2 { font-size: 14px; color: #666666; font-weight: bold;}
            h3 { font-size: 14px; color: #015199; font-weight: bold;}
            p, ul, ol { font-size: 12px; font-weight: normal; margin-bottom: 10px; color: #666666; }
            .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important; }
            .container table { width: 100% !important; border-collapse: collapse; }
            .container .masthead { padding: 0 0; }
            .container .masthead h1 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }
            .container .content { background: white; padding: 20px 30px; }
            .container .content.footer { background: none; }
            .container .content.footer p { margin-bottom: 0; color: #015199; text-align: center; font-size: 12px; }
            .container .content.footer a { color: #015199; text-decoration: none; }
            .container .content.footer a:hover { text-decoration: underline; }
            .font { color: #015199; font-weight: bold}
            hr {border:none;border-bottom: dotted 1px #ccc;}
            .date { background-color:  #015199; }
            .date p {color:#fff;padding: 8px 30px; margin-bottom: 0; font-size: 12px}
        </style>
    </head>
    <body>
    <table class="body-wrap">
        <tr>
            <td class="container">
                <table>
                    <tr>
                        <td align="center" class="masthead">
                            <img src="{{asset('images/agrobio.jpg')}}">
                        </td>
                    </tr>
                    <tr>
                        <td class=" date">
                            <p class="text-right ">{{ ucwords($today) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="content" >
                            
                        </td>
                    </tr>
                    @foreach ($newsSorted as $key => $element)
                        <tr>
                            <td class="content">
                                <h2>{{ $key }}</h2>
                        @if (is_array($element))
                            @foreach ($element as $val)
                                <h3>{{ $val->title }}</h3>
                                <p>{{{ $val->content }}}<span class="font"></span></p>
                                <table>
                                    <tr>
                                        <td >
                                            <p>
                                                 <a href="{{ $val->link }}" class="button">Continuar Leyendo</a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                            @endforeach
                                <hr>
                            </td>
                        </tr>    
                        @else
                            <p>{{ $element }}</p>
                        @endif
                        <!-- N1 -->
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td class="container">
                <table>
                    <tr>
                        <td class="content footer" align="center">
                            <p>
                                @if ($primerasP)
                                    <a href="{{ $linkPrimeras }}">PRIMERAS PLANAS </a> | 
                                @endif
                                @if ($portadas)
                                    <a href="{{ $linkPortadas }}"> PORTADAS NEGOCIOS</a> | 
                                @endif
                                @if ($cartones)
                                    <a href="{{ $linkCartones }}"> CARTONES</a> | 
                                @endif
                                @if ($columnasF)
                                    <a href="{{ $linkColumnasF }}"> COLUMNAS NEGOCIOS</a> | 
                                @endif
                                @if ($columnasP)
                                    <a href="{{ $linkColumnas }}"> COLUMNAS POLÍTICAS</a>
                                @endif
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
@endcomponent
