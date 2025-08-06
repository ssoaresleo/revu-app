@php
    $reading = $user->userReadings()->latest()->first();
    $status = $reading->status ?? null;

    $gradientClass = match ($status) {
        'lendo' => 'bg-gradient-to-r from-[#D743C8] to-[#7435DB]',
        'pausado' => 'bg-gray-600',
        default => 'bg-transparent',
    };
@endphp

<div class="rounded-full p-[2px] {{ $gradientClass }} inline-block">
    <div class="size-10 rounded-full overflow-hidden">
        <x-user-profile-picture :user="$user" />
    </div>
</div>
