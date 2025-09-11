<x-mail::message>
# Appointment Confirmation

Dear {{ $patientName }},

لقد تم تأكيد موعدك بالتفاصيل التالية:

- **رقم الموعد:** {{ $appointmentId }}
- **التاريخ:** {{ $appointmentDate }}
- **الوقت:** {{ $appointmentTime }}

@if(!empty($appointment['report_path']))
You can find your report attached to this email.
@endif

Thanks,<br>
**Hospital Team**
</x-mail::message>

{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
