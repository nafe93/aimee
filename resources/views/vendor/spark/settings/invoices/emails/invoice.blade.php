{{ trans('settings/invoices/emails/invoice.hi') }} {{ explode(' ', $billable->name)[0] }}!

<br><br>

{{ trans('settings/invoices/emails/invoice.thanks-continued-support') }}

<br><br>

{{ trans('settings/invoices/emails/invoice.thanks') }}

<br>

{{ $invoiceData['product'] }}

