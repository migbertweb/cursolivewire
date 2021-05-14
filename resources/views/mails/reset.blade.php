<x-mail-mails>
    <table align="center" cellspacing="0px" cellpadding="0px" style="width: 80%;">
        <tbody>
            <tr>
                <td style="height:17px">
                </td>
            </tr>
            <tr>
                <td align="center" style="background: #ffffff; padding: 22px 30px; font-family: arial; font-size: 16px;">
                    <img width="250px" src="{{ asset('img/titulo-logo.svg') }}" alt="Global .Inc">
                    <p>
                        {{ $contacto }}
                    </p>
                    <p align="left" style="font-size: 22px; margin-top:15px; font-weight:700; line-height:24px;">
                        Hola!
                    </p>
                    <p align="left" style="line-height:22px;margin-top:10px;">
                        Ha recibido este mensaje porque se solicitó un restablecimiento de contraseña para su cuenta.
                    </p>
                    {{-- Button --}}
                    <table align="center" style="margin:40px 50px 25px 50px;">
                        <tbody>
                            <tr>
                                <td style="background-color: #2d3748; border-radius: 12px; -webkit-border-radius: 12px; -moz-border-radius: 12px; text-align: center;">
                                    <a href="#" style="padding: 16px 27px; display: block; text-decoration: none; color: #fff; font-size: 16px; text-align: center;font-family: arial;">
                                        Restablecer contraseña
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- fin Button --}}
                    <p align="left" style="line-height:22px;margin-top:10px;">
                        Este enlace de restablecimiento de contraseña expirará en 60 minutos.
                        <br>
                        Si no ha solicitado el restablecimiento de contraseña, omita este mensaje de correo electrónico.
                    </p>
                    <div align="left" style="padding-top: 10px; text-align: center; font-family: arial;">
                        Saludos.
                        <br>
                        Global .Inc- Curso Livewire
                    </div>
                    <hr>
                    <p align="left" style="font-size: 12px;">
                        Si tiene problemas para hacer clic en el botón "Restablecer contraseña", copie y pegue la siguiente URL en su navegador web: http://www.cursolivewire.io/reset-password/9a2eded14c3d40d6006ffc550811aeae87e3440514aed05339a28c4f85087f1b?email=migbertyanez%40disroot.org
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- footer --}}
    <table align="center" style="max-width: 650px;">
        <tbody>
            <tr>
                <td style="color: #737373; font-size: 12px; padding-bottom: 40px; padding-top: 20px; line-height: 15px; font-family: arial;">
                    © 2021 Global .Inc- Curso Livewire. Todos los derechos reservados.
                </td>
            </tr>
        </tbody>
    </table>
</x-mail-mails>
