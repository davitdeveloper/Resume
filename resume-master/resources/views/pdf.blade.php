<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="name" style="line-height: 70px; font-size: 22px; color: green;" scope="col">Contact Details</th>
        </tr>
    </thead>
    <tbody class="contact_details_child">
        <tr>
            <td>
                First Name: {{$resume['firstname']}}
            </td>
        <tr>
            <td>
                Last Name: {{$resume['lastname']	}}
            </td>
        </tr>
        <tr>
            <td>
                Email: {{$resume['email']}}
            </td>
        </tr>
        <tr>
            <td>
                Phone: {{$resume['phone']}}
            </td>
        </tr>
        <tr>
            <td>
             Birthday   {{$resume['birth_day']}}
            </td>
        </tr>
        <tr>
            <td>
             Address:   {{$resume['address']}}
            </td>
        </tr>
    </tbody>

    <thead>
        <tr>
            <th style="line-height: 70px; font-size: 22px; color: green;" scope="col">Academic Qualifications</th>
        </tr>
    </thead>
    <tbody style="font-size: 18px; font-weight: bold; font-family: cursive;">
    @foreach($resume->educations as $education)
        <tr>
            <td>
                {{$education['name']}}
            </td>
        </tr>
    @endforeach
    </tbody>

    <thead>
        <tr>
            <th style="line-height: 70px; font-size: 22px; color: green;" scope="col">Work Experience</th>
        </tr>
    </thead>
    <tbody style="font-size: 18px; font-weight: bold; font-family: cursive;">
    @foreach($resume['experiences'] as $experience)
        <tr>
            <td>
                {{$experience['name']}}
            </td>
        </tr>
    @endforeach
    </tbody>

    <thead>
        <tr>
            <th style="line-height: 70px; font-size: 22px; color: green;" scope="col">Language Skills</th>
        </tr>
    </thead>
    <tbody style="font-size: 18px; font-weight: bold; font-family: cursive;">
    @foreach($resume['languageSkills'] as $language)
        <tr>
            <td>
                {{$language['name']}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
