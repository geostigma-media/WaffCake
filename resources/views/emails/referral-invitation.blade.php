@include('emails.common.header')

<body
    style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;">
    <center>
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"
            style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #FFFFFF;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;">
            <tr>
                <td align="center" valign="top" id="bodyCell"
                    style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 10px;width: 100%;border-top: 0;">
                    @include('emails.common.ie-fix-start')
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer"
                        style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
                        @include('emails.common.logo')
                        <tr>
                            <td valign="top" id="templateBody"
                                style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border-top: 0;border-bottom: 0; padding-top: 35px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnCaptionBlock"
                                    style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <tbody class="mcnCaptionBlockOuter">
                                        <tr>
                                            <td class="mcnCaptionBlockInner" valign="top"
                                                style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    class="mcnCaptionRightContentOuter" width="100%"
                                                    style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" class="mcnCaptionRightContentInner"
                                                                style="padding: 0 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                                <table class="mcnCaptionRightTextContentContainer"
                                                                    align="right" border="0" cellpadding="0"
                                                                    cellspacing="0" width="100%"
                                                                    style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="top" class="mcnTextContent"
                                                                                style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                                                                                <h2 class="mc-toc-title"
                                                                                    style="text-align: center;display: block;margin: 0;padding: 0;color: #202020;font-family: Helvetica;font-size: 22px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;">
                                                                                    <span style="color:#000000">
                                                                                        <span
                                                                                            style="font-family:merriweather sans,helvetica neue,helvetica,arial,sans-serif">¡Has
                                                                                            sido referido!</span>
                                                                                    </span>
                                                                                </h2>
                                                                                &nbsp;
                                                                                <div style="text-align: left;">
                                                                                    <span
                                                                                        style="font-family:merriweather sans,helvetica neue,helvetica,arial,sans-serif; color: #000000;">Hola
                                                                                        registrate en este link con el
                                                                                        código {{$onlyCode}}
                                                                                        <strong>
                                                                                            <a
                                                                                                href="https://clientes.waffcake.com/referidos?onlyCode={{$onlyCode}}&recipient={{$recipient['address']}}">
                                                                                                Click
                                                                                            </a></strong><br>
                                                                                        <br>
                                                                                    </span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @include('emails.common.footer')
                    </table>
                    @include('emails.common.ie-fix-end')
                </td>
            </tr>
        </table>
    </center>
</body>

</html>