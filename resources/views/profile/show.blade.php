@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @php
        $fmt = fn ($d) => $d ? \Carbon\Carbon::parse($d)->format('F j, Y') : '—';
        $fullName = trim(implode(' ', array_filter([$profile->first_name, $profile->middle_name, $profile->last_name, $profile->suffix])));
        $rows = [
            'Email' => $profile->email_add,
            'Phone Number' => $profile->phone_num,
            'Date of Birth' => $fmt($profile->birth_date),
            'Age' => $age ?? '—',
            'Date of Baptism' => $fmt($profile->baptism_date),
            'Gender' => $profile->gender_desc,
            'Role' => $profile->role_desc,
            'Status' => $profile->status_desc,
            'Remarks' => $profile->remarks_desc,
            'User Type' => $profile->user_type_desc,
            'Group' => $profile->group_num,
        ];
    @endphp

    <h1 class="page-title">Profile</h1>
    <p class="page-desc">Your account information</p>

    <div class="card narrow">
        <h2 class="card-title">{{ $fullName }}</h2>
        <dl class="info-list">
            @foreach ($rows as $label => $value)
                <div>
                    <dt>{{ $label }}</dt>
                    <dd>{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
@endsection
