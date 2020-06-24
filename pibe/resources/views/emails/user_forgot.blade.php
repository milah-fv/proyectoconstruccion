@component('emails.layout.app')
    @slot('main')
        @component('emails.layout.header')@endcomponent
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td class="header-lg">
                            ¡Hola!
                        </td>
                    </tr>
                    <tr>
                        <td class="free-text">
                        Recibiste este correo, porque se solicitó un restablecimiento de contraseña para tu cuenta
                        </td>
                    </tr>
                </table>
                </center>
            </td>
        </tr>
        @component('emails.layout.button', ['width' => 'width:15rem' ,'url' => url($token),'text' => 'Restablecer Contraseña'])
        @endcomponent
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">

                    <tr>
                        <td class="free-text">
                        Si no realizaste esta petición, ignora este correo, y nada habrá cambiado.

                        </td>
                    </tr>
                </table>
                </center>
            </td>
        </tr>
        @component('emails.layout.footer')@endcomponent
    @endslot
@endcomponent