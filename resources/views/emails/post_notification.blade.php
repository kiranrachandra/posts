@extends('emails.template')

@section('content')
 
<table style="background:white;width:100%">
    <tbody>
        <tr>
            <td style="font-size:0;padding:30px 30px 18px;"> 

                <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:22px;line-height:22px; padding-top:20px;">
                    Hello Admin,
                </div>
            </td>
        </tr>
        <tr>
            <td style="font-size:0;padding:0 30px 6px;">
                <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:14px;line-height:22px; padding:6px 0px;">
                    <p>New Article posted by {{ $name }}</p>
                </div> 
            </td>
        </tr>        
        <tr>
            <td style="font-size:0;padding:0 30px 30px 30px;">
                <div style="cursor:auto;color:#000000;font-family:Proxima Nova, Arial, Arial, Helvetica, sans-serif;font-size:14px;line-height:22px;">
                    Cheers! <br>
                    Support Team
                </div>
            </td>
        </tr>
    </tbody>
</table>

 
@endsection 