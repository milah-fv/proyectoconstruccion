@component('emails.layout.app')
    @slot('main')
        @component('emails.layout.header')@endcomponent
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                    <td class="header-lg">
                        ¡Hola {{ $customer->name }}!
                    </td>
                    </tr>
                    <tr>
                    <td class="free-text">
                        Gracias por registrarte en El Pibe!, por favor confirma tu correo electrónico, para ello, debes hacer click en el botón de abajo.
                    </td>
                    </tr>
                </table>
                </center>
            </td>
        </tr>
        @component('emails.layout.button', ['url' => url('cliente/verificacion/'.$customer->customerVerify->token),'text' => 'CONFIRMAR CORREO'])
        @endcomponent

        @component('emails.layout.footer')@endcomponent
    @endslot
@endcomponent