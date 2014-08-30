
@forelse($statuses as $status)
@include('statuses.partials.status')
@empty
<div class="panel">This user has no statuse yet!</div>
@endforelse