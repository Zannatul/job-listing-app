@component('mail::message')
# 📄 New Job Application Received

**Job Title:** {{ $job->title }}
**Company:** {{ $job->company_name }}

---

### 👤 Applicant Details

- **Name:** {{ $application->name }}
- **Email:** {{ $application->email }}

Thanks,
{{ config('app.name') }}
@endcomponent
