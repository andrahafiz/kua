{{-- @php
    dd($data);
@endphp --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Calon Pengantin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .content {
            margin: 0 auto;
            width: 100%;
        }

        .title {
            text-align: center;
            font-weight: bold;
            /* margin-top: 20px; */
        }

        .section-title {
            margin-top: 20px;
        }

        .form-section {
            margin-left: 40px;
        }

        .signature-section {
            margin-top: 40px;
            text-align: right;
            /* width: 100%; */
        }

        .sign-line {
            margin-top: 90px;
        }

        #suami td {
            padding: 6px 0px;
        }

        #istri td {
            padding: 6px 0px;
        }
    </style>
</head>

<body>
    <div class="content">
        <p class="title">PERSETUJUAN CALON PENGANTIN</p>
        <hr width="50%" />
        <p>Yang bertanda tangan di bawah ini :</p>

        <div class="section-title">A. Calon Suami</div>
        <div class="form-section">
            <table id="suami">
                <tr>
                    <td>1.</td>
                    <td>Nama lengkap dan alias</td>
                    <td>&nbsp;: {{ $data->husbands?->name_husband }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Bin</td>
                    <td>&nbsp;: {{ $data->husbands?->name_father_husband }}</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>&nbsp;: {{ $data->husbands?->nik_husband }}</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Tempat dan tanggal lahir</td>
                    <td>&nbsp;: {{ $data->husbands?->date_birth }}</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>&nbsp;: {{ $data->husbands?->nationality_husband }}</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>&nbsp;: {{ $data->husbands?->religion_husband }}</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>&nbsp;: {{ $data->husbands?->job_husband }}</td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>&nbsp;: {{ $data->husbands?->address_husband }}</td>
                </tr>
            </table>
        </div>

        <div class="section-title">B. Calon Istri</div>
        <div class="form-section">
            <table id="istri">
                <tr>
                    <td>1.</td>
                    <td>Nama lengkap dan alias</td>
                    <td>&nbsp;: {{ $data->wives?->name_wife }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Bin</td>
                    <td>&nbsp;: {{ $data->wives?->name_father_wife }}</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>&nbsp;: {{ $data->wives?->nik_wife }}</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Tempat dan tanggal lahir</td>
                    <td>&nbsp;: {{ $data->wives?->date_birth }}</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>&nbsp;: {{ $data->wives?->nationality_wife }}</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>&nbsp;: {{ $data->wives?->religion_wife }}</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>&nbsp;: {{ $data->wives?->job_wife }}</td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>&nbsp;: {{ $data->wives?->address_wife }}</td>
                </tr>
            </table>
        </div>

        <p style="text-align: justify">
            Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri,
            tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan perkawinan.
            Demikian surat persetujuan ini dibuat untuk digunakan seperlunya.
        </p>

        <div class="signature-section">
            <p>Pangean, {{ now()->isoFormat('D MMMM Y') }}</p>
        </div>
        <div class="sign-line">
            <table style="width: 100%; text-align:center">
                <tr>
                    <td></td>
                    <td style="border-bottom:2px solid black">{{ $data->husbands?->name_husband }}</td>
                    <td></td>
                    <td style="border-bottom:2px solid black">{{ $data->wives?->name_wife }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 40%">Calon Suami</td>
                    <td></td>
                    <td style="width: 40%">Calon Istri</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
