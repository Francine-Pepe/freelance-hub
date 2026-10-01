<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verify your Freelance Hub email</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background-color: #F3E5E4;
    font-family: Arial, Helvetica, sans-serif;
    color: #012022;
">

<table
    role="presentation"
    width="100%"
    cellspacing="0"
    cellpadding="0"
    border="0"
    style="background-color: #F3E5E4; margin: 0; padding: 40px 20px;"
>
    <tr>
        <td align="center">

            <table
                role="presentation"
                width="100%"
                cellspacing="0"
                cellpadding="0"
                border="0"
                style="
                    max-width: 560px;
                    background-color: #ffffff;
                    border-radius: 12px;
                    overflow: hidden;
                "
            >

                {{-- Header --}}
                <tr>
                    <td
                        style="
                            background-color: #012022;
                            padding: 32px 40px;
                            text-align: center;
                        "
                    >
                        <div style="
                            color: #49BFB3;
                            font-size: 26px;
                            font-weight: bold;
                            letter-spacing: -0.5px;
                        ">
                            Freelance Hub
                        </div>
                    </td>
                </tr>

                {{-- Content --}}
                <tr>
                    <td style="padding: 40px;">

                        <h1 style="
                            margin: 0 0 20px;
                            color: #012022;
                            font-size: 26px;
                            line-height: 1.3;
                            font-weight: 600;
                        ">
                            Verify your email
                        </h1>

                        <p style="
                            margin: 0 0 16px;
                            color: #012022;
                            font-size: 16px;
                            line-height: 1.6;
                        ">
                            Hi {{ $user->name }},
                        </p>

                        <p style="
                            margin: 0 0 16px;
                            color: #012022;
                            font-size: 16px;
                            line-height: 1.6;
                        ">
                            Welcome to Freelance Hub!
                        </p>

                        <p style="
                            margin: 0 0 28px;
                            color: #33484a;
                            font-size: 15px;
                            line-height: 1.7;
                        ">
                            Please verify your email address by clicking the
                            button below. This helps us keep your account secure.
                        </p>

                        {{-- Button --}}
                        <table
                            role="presentation"
                            cellspacing="0"
                            cellpadding="0"
                            border="0"
                            style="margin: 0 auto 30px;"
                        >
                            <tr>
                                <td
                                    align="center"
                                    style="
                                        border-radius: 7px;
                                        background-color: #49BFB3;
                                    "
                                >
                                    <a
                                        href="{{ $url }}"
                                        target="_blank"
                                        style="
                                            display: inline-block;
                                            padding: 14px 26px;
                                            color: #ffffff;
                                            background-color: #49BFB3;
                                            border-radius: 7px;
                                            font-size: 15px;
                                            font-weight: bold;
                                            text-decoration: none;
                                        "
                                    >
                                        Verify Email Address
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p style="
                            margin: 0 0 12px;
                            color: #687778;
                            font-size: 13px;
                            line-height: 1.6;
                        ">
                            If the button doesn't work, copy and paste the
                            following link into your browser:
                        </p>

                        <p style="
                            margin: 0 0 28px;
                            padding: 14px;
                            background-color: #F3E5E4;
                            border-radius: 6px;
                            word-break: break-all;
                            font-size: 12px;
                            line-height: 1.5;
                        ">
                            <a
                                href="{{ $url }}"
                                target="_blank"
                                style="
                                    color: #012022;
                                    text-decoration: underline;
                                "
                            >
                                {{ $url }}
                            </a>
                        </p>

                        <p style="
                            margin: 0;
                            color: #687778;
                            font-size: 13px;
                            line-height: 1.6;
                        ">
                            If you didn't create a Freelance Hub account,
                            you can safely ignore this email.
                        </p>

                    </td>
                </tr>

                {{-- Footer --}}
                <tr>
                    <td
                        style="
                            padding: 24px 40px;
                            background-color: #012022;
                            text-align: center;
                        "
                    >
                        <p style="
                            margin: 0;
                            color: #F3E5E4;
                            font-size: 12px;
                            line-height: 1.5;
                        ">
                            © {{ date('Y') }} Freelance Hub
                        </p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
