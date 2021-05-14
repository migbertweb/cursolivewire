<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>

<body bgcolor="#E1E2E8">
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
                    </p>
                    <p align="left" style="font-size: 22px; margin-top:15px; font-weight:700; line-height:24px;">
                        <!-- Page Content -->
                        <main>
                            {{ $slot }}
                        </main>
                    </p>
                    <div align="left" style="padding-top: 10px; text-align: center; font-family: arial;">
                        Saludos.
                        <br>
                        Global .Inc- Curso Livewire
                    </div>
                    <hr>
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
</body>

</html>
